<?php

namespace App\Controllers;

use AllowDynamicProperties;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\User;
use Google\Client as GoogleClient;

#[AllowDynamicProperties]
class AuthController extends BaseController
{
    public function __construct()
    {
        $this->googleClient = new GoogleClient();
        $this->googleClient->setClientId(env('GOOGLE_CLIENT_ID'));
        $this->googleClient->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $this->googleClient->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $this->googleClient->addScope('email');
        $this->googleClient->addScope('profile');
    }

    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/');
        }
        return view('auth/auth');
    }

    public function login()
    {
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
        ];

        $messages = [
            'email' => ['required' => 'Email wajib diisi.', 'valid_email' => 'Format email tidak valid.'],
            'password' => ['required' => 'Kata sandi wajib diisi.', 'min_length' => 'Kata sandi minimal 6 karakter.'],
        ];

        if (!$this->validate($rules, $messages)) {
            return $this->response
                ->setStatusCode(422)
                ->setJSON([
                    'success' => false,
                    'errors' => $this->validator->getErrors(),
                ]);
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $model = new User();
        $user = $model->where('email', $email)->first();

        if (!$user) {
            return $this->response
                ->setStatusCode(422)
                ->setJSON([
                    'success' => false,
                    'errors' => ['email' => 'Akun tidak ditemukan.'],
                ]);
        }

        if (!password_verify($password, $user['password_hash'])) {
            return $this->response
                ->setStatusCode(422)
                ->setJSON([
                    'success' => false,
                    'errors' => ['password' => 'Kata sandi salah.'],
                ]);
        }

        if (!$user['is_active']) {
            return $this->response
                ->setStatusCode(403)
                ->setJSON([
                    'success' => false,
                    'errors' => ['email' => 'Akun Anda tidak aktif.'],
                ]);
        }

        $session = session();
        $session->set([
            'user_id' => $user['id'],
            'user_name' => $user['name'],
            'user_email' => $user['email'],
            'logged_in' => true,
        ]);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Selamat datang kembali, ' . $user['name'] . '!',
            'redirect' => base_url('/'),
        ]);
    }

    public function register()
    {
        $rules = [
            'name' => 'required|min_length[2]|max_length[150]',
            'email' => 'required|valid_email|max_length[200]|is_unique[users.email]',
            'phone' => 'permit_empty|max_length[20]',
            'password' => 'required|min_length[8]',
            'confirm' => 'required|matches[password]',
        ];

        $messages = [
            'email' => ['is_unique' => 'Email sudah terdaftar.'],
            'confirm' => ['matches' => 'Konfirmasi kata sandi tidak cocok.'],
        ];

        if (!$this->validate($rules, $messages)) {
            return $this->response
                ->setStatusCode(422)
                ->setJSON([
                    'success' => false,
                    'errors' => $this->validator->getErrors(),
                ]);
        }

        $model = new User();

        $model->insert([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'password_hash' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'is_active' => 1,
        ]);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Akun berhasil dibuat. Silakan masuk.',
        ]);
    }

    public function googleRedirect()
    {
        $authUrl = $this->googleClient->createAuthUrl();
        return redirect()->to($authUrl);
    }


    public function googleCallback()
    {
        $code = $this->request->getGet('code');

        if (!$code) {
            showToast('Login Google gagal.', 'error');
            return redirect()->to('/auth');
        }

        try {
            $token = $this->googleClient->fetchAccessTokenWithAuthCode($code);

            if (isset($token['error'])) {
                return redirect()->to('/auth');
            }

            $this->googleClient->setAccessToken($token);

            $google = new \Google\Service\Oauth2($this->googleClient);
            $userInfo = $google->userinfo->get();

            $model = new User();
            $user = $model->where('email', $userInfo->email)->first();

            if (!$user) {
                $model->insert([
                    'name' => $userInfo->name,
                    'email' => $userInfo->email,
                    'avatar_url' => $userInfo->picture,
                    'password_hash' => password_hash(bin2hex(random_bytes(16)), PASSWORD_BCRYPT),
                    'is_active' => 1,
                ]);

                $user = $model->where('email', $userInfo->email)->first();
            }

            if (!$user['is_active']) {
                return redirect()->to('/auth-user');
            }

            session()->set([
                'user_id' => $user['id'],
                'user_name' => $user['name'],
                'user_email' => $user['email'],
                'avatar_url' => $user['avatar_url'],
                'logged_in' => true,
            ]);

            session()->regenerate();
            return redirect()->to('/');

        } catch (\Exception $e) {
            log_message('error', 'Google OAuth error: ' . $e->getMessage());
            return redirect()->to('/auth');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth-user');
    }
}