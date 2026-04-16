(function createParticles() {
            const container = document.getElementById('particles');
            const count = 25;
            for (let i = 0; i < count; i++) {
                const p = document.createElement('div');
                p.className = 'particle';
                const rand = Math.random();
                let color;
                if (rand < 0.4) color = 'rgba(34,197,94,0.3)';
                else if (rand < 0.7) color = 'rgba(225,29,72,0.25)';
                else color = 'rgba(212,160,23,0.25)';
                p.style.background = color;
                p.style.left = Math.random() * 100 + 'vw';
                p.style.animationDuration = (8 + Math.random() * 14) + 's';
                p.style.animationDelay = (Math.random() * 10) + 's';
                p.style.width = p.style.height = (1.5 + Math.random() * 2.5) + 'px';
                container.appendChild(p);
            }
        })();

        const users = [
            { name: 'Demo User', email: 'demo@cinemax.id', phone: '081234567890', password: 'demo1234' }
        ];

        function switchTab(tab) {
            const loginTab = document.getElementById('tabLogin');
            const registerTab = document.getElementById('tabRegister');
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');
            const indicator = document.getElementById('tabIndicator');

            clearAllErrors();

            if (tab === 'login') {
                loginTab.classList.add('active');
                registerTab.classList.remove('active');
                loginForm.classList.add('active');
                registerForm.classList.remove('active');
                indicator.style.left = '0';
            } else {
                registerTab.classList.add('active');
                loginTab.classList.remove('active');
                registerForm.classList.add('active');
                loginForm.classList.remove('active');
                indicator.style.left = '50%';
            }
        }

        function togglePassword(inputId, btn) {
            const input = document.getElementById(inputId);
            const icon = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }

        function checkPasswordStrength(pw) {
            const bar = document.getElementById('pwStrengthBar');
            const text = document.getElementById('pwStrengthText');
            let score = 0;

            if (pw.length >= 8) score++;
            if (pw.length >= 12) score++;
            if (/[A-Z]/.test(pw)) score++;
            if (/[0-9]/.test(pw)) score++;
            if (/[^A-Za-z0-9]/.test(pw)) score++;

            const levels = [
                { w: '0%',   c: '#1e1e35', t: 'Kekuatan kata sandi',       tc: '#6b6b8d' },
                { w: '20%',  c: '#e11d48', t: 'Sangat lemah',              tc: '#fda4af' },
                { w: '40%',  c: '#e67e22', t: 'Lemah',                     tc: '#fbbf24' },
                { w: '60%',  c: '#d4a017', t: 'Cukup',                     tc: '#f5c842' },
                { w: '80%',  c: '#16a34a', t: 'Kuat',                      tc: '#6ee7b7' },
                { w: '100%', c: '#22c55e', t: 'Sangat kuat',               tc: '#4ade80' },
            ];

            const level = pw.length === 0 ? levels[0] : levels[Math.min(score, 5)];
            bar.style.width = level.w;
            bar.style.background = level.c;
            text.textContent = level.t;
            text.style.color = level.tc;
        }

        function showFieldError(id, msg) {
            const el = document.getElementById(id);
            el.textContent = msg;
            el.classList.add('show');
            const input = el.previousElementSibling?.querySelector('input')
                        || el.parentElement?.querySelector('input');
            if (input) input.classList.add('input-error');
        }

        function clearFieldError(id) {
            const el = document.getElementById(id);
            if (!el) return;
            el.textContent = '';
            el.classList.remove('show');
            const input = el.previousElementSibling?.querySelector('input')
                        || el.parentElement?.querySelector('input');
            if (input) input.classList.remove('input-error');
        }

        function clearAllErrors() {
            document.querySelectorAll('.field-error').forEach(el => {
                el.textContent = '';
                el.classList.remove('show');
            });
            document.querySelectorAll('.input-error').forEach(el => el.classList.remove('input-error'));
        }

        function isValidEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        function isValidPhone(phone) {
            return /^(\+62|62|0)8[1-9][0-9]{6,10}$/.test(phone.replace(/[\s-]/g, ''));
        }

        function showToast(message, type = 'info') {
            const container = document.getElementById('toastContainer');
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;

            const icons = {
                success: 'fa-circle-check',
                error: 'fa-circle-xmark',
                info: 'fa-circle-info'
            };

            toast.innerHTML = `<i class="fa-solid ${icons[type] || icons.info}"></i><span>${message}</span>`;
            container.appendChild(toast);

            setTimeout(() => {
                toast.classList.add('toast-exit');
                setTimeout(() => toast.remove(), 300);
            }, 3500);
        }

        function setLoading(btnId, spinnerId, loading) {
            const btn = document.getElementById(btnId);
            const spinner = document.getElementById(spinnerId);
            const text = btn.querySelector('span');

            if (loading) {
                btn.disabled = true;
                btn.style.opacity = '0.7';
                btn.style.pointerEvents = 'none';
                text.style.opacity = '0';
                spinner.style.display = 'block';
            } else {
                btn.disabled = false;
                btn.style.opacity = '1';
                btn.style.pointerEvents = 'auto';
                text.style.opacity = '1';
                spinner.style.display = 'none';
            }
        }

        function handleLogin(e) {
            e.preventDefault();
            clearAllErrors();

            const email = document.getElementById('loginEmail').value.trim();
            const password = document.getElementById('loginPassword').value;
            let valid = true;

            if (!email) {
                showFieldError('loginEmailError', 'Email wajib diisi');
                valid = false;
            } else if (!isValidEmail(email)) {
                showFieldError('loginEmailError', 'Format email tidak valid');
                valid = false;
            }

            if (!password) {
                showFieldError('loginPasswordError', 'Kata sandi wajib diisi');
                valid = false;
            } else if (password.length < 6) {
                showFieldError('loginPasswordError', 'Kata sandi minimal 6 karakter');
                valid = false;
            }

            if (!valid) return;

            setLoading('loginBtn', 'loginSpinner', true);

            setTimeout(() => {
                setLoading('loginBtn', 'loginSpinner', false);

                const user = users.find(u => u.email.toLowerCase() === email.toLowerCase());

                if (!user) {
                    showFieldError('loginEmailError', 'Akun tidak ditemukan');
                    return;
                }

                if (user.password !== password) {
                    showFieldError('loginPasswordError', 'Kata sandi salah');
                    return;
                }

                showToast(`Selamat datang kembali, ${user.name}!`, 'success');
                document.getElementById('loginForm').reset();
            }, 1500);
        }

        function handleRegister(e) {
            e.preventDefault();
            clearAllErrors();

            const name = document.getElementById('regName').value.trim();
            const email = document.getElementById('regEmail').value.trim();
            const phone = document.getElementById('regPhone').value.trim();
            const password = document.getElementById('regPassword').value;
            const confirm = document.getElementById('regConfirm').value;
            const terms = document.getElementById('agreeTerms').checked;
            let valid = true;

            if (!name) {
                showFieldError('regNameError', 'Nama lengkap wajib diisi');
                valid = false;
            } else if (name.length < 3) {
                showFieldError('regNameError', 'Nama minimal 3 karakter');
                valid = false;
            }

            if (!email) {
                showFieldError('regEmailError', 'Email wajib diisi');
                valid = false;
            } else if (!isValidEmail(email)) {
                showFieldError('regEmailError', 'Format email tidak valid');
                valid = false;
            } else if (users.find(u => u.email.toLowerCase() === email.toLowerCase())) {
                showFieldError('regEmailError', 'Email sudah terdaftar');
                valid = false;
            }

            if (!phone) {
                showFieldError('regPhoneError', 'Nomor telepon wajib diisi');
                valid = false;
            } else if (!isValidPhone(phone)) {
                showFieldError('regPhoneError', 'Format nomor tidak valid (contoh: 081234567890)');
                valid = false;
            }

            if (!password) {
                showFieldError('regPasswordError', 'Kata sandi wajib diisi');
                valid = false;
            } else if (password.length < 8) {
                showFieldError('regPasswordError', 'Kata sandi minimal 8 karakter');
                valid = false;
            }

            if (!confirm) {
                showFieldError('regConfirmError', 'Konfirmasi kata sandi wajib diisi');
                valid = false;
            } else if (password !== confirm) {
                showFieldError('regConfirmError', 'Kata sandi tidak cocok');
                valid = false;
            }

            if (!terms) {
                showFieldError('regTermsError', 'Anda harus menyetujui syarat & ketentuan');
                valid = false;
            }

            if (!valid) return;

            setLoading('registerBtn', 'registerSpinner', true);

            setTimeout(() => {
                setLoading('registerBtn', 'registerSpinner', false);

                users.push({ name, email, phone, password });

                showToast('Akun berhasil dibuat! Silakan masuk.', 'success');

                document.getElementById('registerForm').reset();
                checkPasswordStrength('');

                setTimeout(() => switchTab('login'), 800);
            }, 1800);
        }

        document.querySelectorAll('input[type="text"], input[type="email"], input[type="tel"], input[type="password"]').forEach(input => {
            input.addEventListener('input', function () {
                const parent = this.closest('div').parentElement;
                const errorEl = parent.querySelector('.field-error');
                if (errorEl) {
                    errorEl.textContent = '';
                    errorEl.classList.remove('show');
                }
                this.classList.remove('input-error');
            });
        });