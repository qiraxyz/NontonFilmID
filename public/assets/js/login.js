
// ==================== VALIDATION HELPERS ====================

function validateLoginEmail(email) {
    if (!email) return 'Email wajib diisi';
    if (!isValidEmail(email)) return 'Format email tidak valid';
    return null;
}

function validateLoginPassword(password) {
    if (!password) return 'Kata sandi wajib diisi';
    if (password.length < 6) return 'Kata sandi minimal 6 karakter';
    return null;
}

// ==================== LOGIN FORM VALIDATION ====================

function validateLoginForm(fields) {
    const {email, password} = fields;

    const checks = [
        {error: validateLoginEmail(email), id: 'loginEmailError'},
        {error: validateLoginPassword(password), id: 'loginPasswordError'},
    ];

    let valid = true;
    checks.forEach(({error, id}) => {
        if (error) {
            showFieldError(id, error);
            valid = false;
        }
    });

    return valid;
}

// ==================== CSRF HELPER ====================

function getLoginCsrfBody(params) {
    const form = document.getElementById('loginForm');
    const csrfInput = form.querySelector('input[type="hidden"]');

    return new URLSearchParams({
        [csrfInput.name]: csrfInput.value,
        ...params,
    });
}

function refreshLoginCsrfToken(data) {
    if (!data?.csrf) return;
    const form = document.getElementById('loginForm');
    const csrfInput = form.querySelector('input[type="hidden"]');
    csrfInput.name = data.csrf.name;
    csrfInput.value = data.csrf.hash;
}

// ==================== LOGIN API ====================

async function submitLogin(fields) {
    const {email, password} = fields;

    const res = await fetch('/auth/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
            'X-Requested-With': 'XMLHttpRequest',
        },
        body: getLoginCsrfBody({email, password}),
    });

    return res.json();
}

// ==================== LOGIN RESPONSE HANDLERS ====================

function handleLoginErrors(errors) {
    const fieldMap = {
        email: 'loginEmailError',
        password: 'loginPasswordError',
    };

    Object.entries(errors ?? {}).forEach(([field, msg]) => {
        const elId = fieldMap[field];
        if (elId) showFieldError(elId, msg);
        else showToast(msg, 'error');
    });
}

function onLoginSuccess(data) {
    showToast(data.message, 'success');
    setTimeout(() => window.location.href = data.redirect, 800);
}

// ==================== HANDLE LOGIN ====================

async function handleLogin(e) {
    e.preventDefault();
    clearAllErrors();

    const fields = {
        email: document.getElementById('loginEmail').value.trim(),
        password: document.getElementById('loginPassword').value,
    };

    if (!validateLoginForm(fields)) return;

    setLoading('loginBtn', 'loginSpinner', true);

    try {
        const data = await submitLogin(fields);
        refreshLoginCsrfToken(data);

        if (data.success) onLoginSuccess(data);
        else handleLoginErrors(data.errors);

    } catch (err) {
        showToast('Terjadi kesalahan. Coba lagi.', 'error');
    } finally {
        setLoading('loginBtn', 'loginSpinner', false);
    }
}

