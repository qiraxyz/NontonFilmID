<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineVault — Masuk / Daftar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        bg: '#07070d',
                        surface: '#0f0f1a',
                        card: '#141422',
                        border: '#1e1e35',
                        fg: '#e8e8f0',
                        muted: '#6b6b8d',
                        accent: '#e11d48',
                        accentHover: '#f43f5e',
                        green: '#22c55e',
                        greenDark: '#14532d',
                        greenLight: '#4ade80',
                        gold: '#d4a017',
                        goldLight: '#f5c842',
                        premium: '#e67e22',
                    },
                    fontFamily: {
                        display: ['"Bebas Neue"', 'sans-serif'],
                        body: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen flex items-center justify-center p-4">

    <!-- Background Scene -->
    <div class="bg-scene" aria-hidden="true"></div>
    <div class="grid-overlay" aria-hidden="true"></div>

    <!-- Film Strip -->
    <div class="film-strip" aria-hidden="true">
        <div class="holes">
            <div class="hole"></div><div class="hole"></div><div class="hole"></div>
            <div class="hole"></div><div class="hole"></div><div class="hole"></div>
            <div class="hole"></div><div class="hole"></div><div class="hole"></div>
            <div class="hole"></div><div class="hole"></div><div class="hole"></div>
            <div class="hole"></div><div class="hole"></div><div class="hole"></div>
            <div class="hole"></div><div class="hole"></div><div class="hole"></div>
            <div class="hole"></div><div class="hole"></div><div class="hole"></div>
            <div class="hole"></div><div class="hole"></div><div class="hole"></div>
            <div class="hole"></div><div class="hole"></div><div class="hole"></div>
            <div class="hole"></div><div class="hole"></div><div class="hole"></div>
            <div class="hole"></div><div class="hole"></div><div class="hole"></div>
        </div>
    </div>

    <!-- Floating Particles -->
    <div id="particles" aria-hidden="true"></div>

    <!-- Toast Container -->
    <div class="toast-container" id="toastContainer"></div>

    <!-- Main Content -->
    <main class="relative z-10 w-full max-w-md">

        <!-- Brand Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center gap-3 mb-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-green to-greenDark flex items-center justify-center"
                     style="animation: cardEntrance 0.6s ease 0.1s both;">
                    <i class="fa-solid fa-film text-white text-lg"></i>
                </div>
                <h1 class="font-display text-4xl tracking-wider text-fg"
                    style="animation: cardEntrance 0.6s ease 0.2s both;">CineVault</h1>
            </div>
            <p class="text-muted text-sm" style="animation: cardEntrance 0.6s ease 0.3s both;">Pesan tiket, pilih kursi, nikmati film</p>
        </div>

        <!-- Auth Card -->
        <div class="auth-card rounded-2xl overflow-hidden">
            <div class="p-7 sm:p-8">

                <!-- Tabs -->
                <div class="relative flex mb-2 border-b border-border">
                    <button class="tab-btn active" id="tabLogin" onclick="switchTab('login')" type="button">
                        Masuk
                    </button>
                    <button class="tab-btn" id="tabRegister" onclick="switchTab('register')" type="button">
                        Daftar
                    </button>
                    <div class="tab-indicator" id="tabIndicator" style="left:0; width:50%;"></div>
                </div>

                <!--  LOGIN FORM  -->
                <form class="form-panel active mt-6" id="loginForm" novalidate onsubmit="handleLogin(event)">

                    <div class="space-y-5">
                        <!-- Email -->
                        <div>
                            <label class="field-label" id="loginEmailLabel">Email</label>
                            <div class="input-group">
                                <input type="email" id="loginEmail" placeholder="nama@email.com"
                                       class="w-full pl-11 pr-4 py-3 rounded-xl text-sm" autocomplete="email"
                                       onfocus="document.getElementById('loginEmailLabel').classList.add('active')"
                                       onblur="document.getElementById('loginEmailLabel').classList.remove('active')">
                                <i class="fa-solid fa-envelope input-icon"></i>
                            </div>
                            <div class="field-error" id="loginEmailError"></div>
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="field-label" id="loginPasswordLabel">Kata Sandi</label>
                            <div class="input-group">
                                <input type="password" id="loginPassword" placeholder="Masukkan kata sandi"
                                       class="w-full pl-11 pr-11 py-3 rounded-xl text-sm" autocomplete="current-password"
                                       onfocus="document.getElementById('loginPasswordLabel').classList.add('active')"
                                       onblur="document.getElementById('loginPasswordLabel').classList.remove('active')">
                                <i class="fa-solid fa-lock input-icon"></i>
                                <button type="button" class="toggle-pw" onclick="togglePassword('loginPassword', this)" aria-label="Tampilkan kata sandi">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                            <div class="field-error" id="loginPasswordError"></div>
                        </div>

                        <!-- Remember & Forgot -->
                        <div class="flex items-center justify-between">
                            <label class="flex items-center gap-2 cursor-pointer text-sm text-muted hover:text-fg transition-colors">
                                <input type="checkbox" class="custom-check" id="rememberMe">
                                Ingat saya
                            </label>
                            <a href="#" class="link-accent text-sm"
                               onclick="event.preventDefault(); showToast('Link reset telah dikirim ke email Anda', 'info')">
                                Lupa sandi?
                            </a>
                        </div>

                        <!-- Submit -->
                        <button type="submit" class="btn-primary w-full py-3.5 rounded-xl text-sm flex items-center justify-center gap-2" id="loginBtn">
                            <span>Masuk ke Akun</span>
                            <div class="spinner" id="loginSpinner"></div>
                        </button>
                    </div>

                    <!-- Divider -->
                    <div class="flex items-center gap-4 my-6">
                        <div class="divider-line"></div>
                        <span class="text-xs text-muted whitespace-nowrap">atau masuk dengan</span>
                        <div class="divider-line"></div>
                    </div>

                    <!-- Social Login -->
                    <div class="grid grid-cols-2 gap-3">
                        <button type="button" class="btn-social btn-google py-3 rounded-xl text-sm"
                                onclick="showToast('Login dengan Google belum tersedia', 'info')">
                            <div class="btn-content">
                                <span class="google-icon">
                                    <i class="fa-brands fa-google g-blue"></i>
                                </span>
                                <span>Google</span>
                            </div>
                        </button>
                        <button type="button" class="btn-social btn-apple py-3 rounded-xl text-sm"
                                onclick="showToast('Login dengan Apple belum tersedia', 'info')">
                            <div class="btn-content">
                                <i class="fa-brands fa-apple text-base apple-icon"></i>
                                <span>Apple</span>
                            </div>
                        </button>
                    </div>
                </form>

                <!--  REGISTER FORM  -->
                <form class="form-panel mt-6" id="registerForm" novalidate onsubmit="handleRegister(event)">

                    <div class="space-y-5">
                        <!-- Nama Lengkap -->
                        <div>
                            <label class="field-label" id="regNameLabel">Nama Lengkap</label>
                            <div class="input-group">
                                <input type="text" id="regName" placeholder="John Doe"
                                       class="w-full pl-11 pr-4 py-3 rounded-xl text-sm" autocomplete="name"
                                       onfocus="document.getElementById('regNameLabel').classList.add('active')"
                                       onblur="document.getElementById('regNameLabel').classList.remove('active')">
                                <i class="fa-solid fa-user input-icon"></i>
                            </div>
                            <div class="field-error" id="regNameError"></div>
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="field-label" id="regEmailLabel">Email</label>
                            <div class="input-group">
                                <input type="email" id="regEmail" placeholder="nama@email.com"
                                       class="w-full pl-11 pr-4 py-3 rounded-xl text-sm" autocomplete="email"
                                       onfocus="document.getElementById('regEmailLabel').classList.add('active')"
                                       onblur="document.getElementById('regEmailLabel').classList.remove('active')">
                                <i class="fa-solid fa-envelope input-icon"></i>
                            </div>
                            <div class="field-error" id="regEmailError"></div>
                        </div>

                        <!-- Nomor Telepon -->
                        <div>
                            <label class="field-label" id="regPhoneLabel">Nomor Telepon</label>
                            <div class="input-group">
                                <input type="tel" id="regPhone" placeholder="08xxxxxxxxxx"
                                       class="w-full pl-11 pr-4 py-3 rounded-xl text-sm" autocomplete="tel"
                                       onfocus="document.getElementById('regPhoneLabel').classList.add('active')"
                                       onblur="document.getElementById('regPhoneLabel').classList.remove('active')">
                                <i class="fa-solid fa-phone input-icon"></i>
                            </div>
                            <div class="field-error" id="regPhoneError"></div>
                        </div>

                        <!-- Password -->
                        <div>
                            <label class="field-label" id="regPasswordLabel">Kata Sandi</label>
                            <div class="input-group">
                                <input type="password" id="regPassword" placeholder="Min. 8 karakter"
                                       class="w-full pl-11 pr-11 py-3 rounded-xl text-sm" autocomplete="new-password"
                                       oninput="checkPasswordStrength(this.value)"
                                       onfocus="document.getElementById('regPasswordLabel').classList.add('active')"
                                       onblur="document.getElementById('regPasswordLabel').classList.remove('active')">
                                <i class="fa-solid fa-lock input-icon"></i>
                                <button type="button" class="toggle-pw" onclick="togglePassword('regPassword', this)" aria-label="Tampilkan kata sandi">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                            <div class="field-error" id="regPasswordError"></div>
                            <!-- Strength Bar -->
                            <div class="mt-2">
                                <div class="pw-bar">
                                    <div class="pw-bar-fill" id="pwStrengthBar"></div>
                                </div>
                                <p class="text-xs mt-1 text-muted" id="pwStrengthText">Kekuatan kata sandi</p>
                            </div>
                        </div>

                        <!-- Konfirmasi Password -->
                        <div>
                            <label class="field-label" id="regConfirmLabel">Konfirmasi Kata Sandi</label>
                            <div class="input-group">
                                <input type="password" id="regConfirm" placeholder="Ulangi kata sandi"
                                       class="w-full pl-11 pr-11 py-3 rounded-xl text-sm" autocomplete="new-password"
                                       onfocus="document.getElementById('regConfirmLabel').classList.add('active')"
                                       onblur="document.getElementById('regConfirmLabel').classList.remove('active')">
                                <i class="fa-solid fa-shield-halved input-icon"></i>
                                <button type="button" class="toggle-pw" onclick="togglePassword('regConfirm', this)" aria-label="Tampilkan kata sandi">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                            <div class="field-error" id="regConfirmError"></div>
                        </div>

                        <!-- Terms -->
                        <label class="flex items-start gap-2.5 cursor-pointer text-sm text-muted hover:text-fg transition-colors">
                            <input type="checkbox" class="custom-check mt-0.5" id="agreeTerms">
                            <span>Saya setuju dengan <a href="#" class="link-accent" onclick="event.preventDefault()">Syarat & Ketentuan</a> serta <a href="#" class="link-accent" onclick="event.preventDefault()">Kebijakan Privasi</a></span>
                        </label>
                        <div class="field-error" id="regTermsError" style="margin-top:-8px"></div>

                        <!-- Submit -->
                        <button type="submit" class="btn-primary w-full py-3.5 rounded-xl text-sm flex items-center justify-center gap-2" id="registerBtn">
                            <span>Buat Akun Baru</span>
                            <div class="spinner" id="registerSpinner"></div>
                        </button>
                    </div>

                    <!-- Divider -->
                    <div class="flex items-center gap-4 my-6">
                        <div class="divider-line"></div>
                        <span class="text-xs text-muted whitespace-nowrap">atau daftar dengan</span>
                        <div class="divider-line"></div>
                    </div>

                    <!-- Social Register -->
                    <div class="grid grid-cols-2 gap-3">
                        <button type="button" class="btn-social btn-google py-3 rounded-xl text-sm"
                                onclick="showToast('Daftar dengan Google belum tersedia', 'info')">
                            <div class="btn-content">
                                <span class="google-icon">
                                    <i class="fa-brands fa-google g-blue"></i>
                                </span>
                                <span>Google</span>
                            </div>
                        </button>
                        <button type="button" class="btn-social btn-apple py-3 rounded-xl text-sm"
                                onclick="showToast('Daftar dengan Apple belum tersedia', 'info')">
                            <div class="btn-content">
                                <i class="fa-brands fa-apple text-base apple-icon"></i>
                                <span>Apple</span>
                            </div>
                        </button>
                    </div>
                </form>
            </div>


        </div>

        <!-- Decorative Seat Row -->
        <div class="flex items-center justify-center gap-2 mt-8" aria-hidden="true">
            <div class="seat-deco" style="background:#6b6b8d;"></div>
            <div class="seat-deco" style="background:#22c55e;"></div>
            <div class="seat-deco" style="background:#d4a017;"></div>
            <div class="seat-deco" style="background:#6b6b8d;"></div>
            <div class="seat-deco" style="background:#6b6b8d;"></div>
            <div class="seat-deco" style="background:#e67e22;"></div>
            <div class="seat-deco" style="background:#6b6b8d;"></div>
            <div class="seat-deco" style="background:#22c55e;"></div>
            <div class="seat-deco" style="background:#6b6b8d;"></div>
        </div>
        <p class="text-center text-[11px] text-muted mt-3 opacity-40">CineVault v2.0 — Pengalaman Bioskop Terbaik</p>

    </main>

    <script src="<?= base_url('assets/js/login.js') ?>"></script>
</body>
</html>