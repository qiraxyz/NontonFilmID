/*  SIDEBAR  */

function toggleSidebar() {
    var s = document.getElementById('sidebar');
    var m = document.getElementById('mainContent');
    var o = document.getElementById('sidebarOverlay');
    if (window.innerWidth <= 1024) {
        s.classList.toggle('open');
        o.classList.toggle('active');
    } else {
        s.classList.toggle('collapsed');
        m.classList.toggle('expanded');
    }
}

function setActiveNav(el) {
    document.querySelectorAll('.nav-item').forEach(function (n) {
        n.classList.remove('active');
    });
    el.classList.add('active');
    if (window.innerWidth <= 1024) toggleSidebar();
    var label = el.querySelector('span').textContent;
    showToast('Navigasi ke: ' + label, 'var(--accent)');
}

/*  TOAST  */

var toastTimeout;

function showToast(msg, color) {
    var t = document.getElementById('toast');
    document.getElementById('toastMessage').textContent = msg;
    document.getElementById('toastIcon').style.color = color || 'var(--teal)';
    t.classList.add('show');
    clearTimeout(toastTimeout);
    toastTimeout = setTimeout(function () {
        t.classList.remove('show');
    }, 3000);
}

/*  DATE & GREETING  */
function updateDate() {
    var now = new Date();
    var opts = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };
    var str = now.toLocaleDateString('id-ID', opts);
    document.getElementById('currentDate').textContent = str;
    document.getElementById('calendarDateLabel').textContent = str;

    var h = now.getHours();
    var g = 'Selamat Pagi';
    if (h >= 12 && h < 15) g = 'Selamat Siang';
    else if (h >= 15 && h < 18) g = 'Selamat Sore';
    else if (h >= 18) g = 'Selamat Malam';
    document.getElementById('greetingText').innerHTML = g + ', <span style="color:var(--accent);">Admin</span>';
}

/*  RESPONSIVE  */

function handleResize() {
    document.getElementById('statsGrid').style.gridTemplateColumns =
        window.innerWidth < 768 ? 'repeat(2,1fr)' : 'repeat(4,1fr)';
}


updateDate();
handleResize();
window.addEventListener('resize', handleResize);
initSeats();

// Progress bar animation on load
setTimeout(function () {
    document.querySelectorAll('.progress-fill').forEach(function (el) {
        var w = el.style.width;
        el.style.width = '0%';
        requestAnimationFrame(function () {
            requestAnimationFrame(function () {
                el.style.width = w;
            });
        });
    });
}, 300);