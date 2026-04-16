<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CineVault – Pilih Kursi</title>
  <link rel="stylesheet" href="<?= base_url('assets/css/seat.css') ?>">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
  <style>
  
  </style>
</head>
<body>

<!-- Noise overlay -->
<div id="noise"></div>

<!--  MAIN  -->
<main style="position:relative;z-index:10;flex:1;display:flex;justify-content:center;padding:32px 16px 48px;">
  <div class="fade-up" style="width:100%;max-width:700px;">

    <!-- Header -->
    <header style="display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:32px;">
      <div style="flex:1;min-width:0;">
        <div style="display:flex;align-items:center;gap:8px;margin-bottom:4px;">
          <svg style="width:14px;height:14px;color:#4ade80;" viewBox="0 0 24 24" fill="none" stroke="#4ade80" stroke-width="2">
            <path d="M20.2 6 3 11l-.9-2.4 7.1-2.7L7.7 1 9.2 0l2.8 3.7L20.2 6Z"/>
            <path d="m4.5 13.4 2.6 8.6h.8l1.6-5.3"/>
            <path d="m14.1 16.7 1.6 5.3h.8l2.6-8.6"/>
          </svg>
          <span style="font-size:0.68rem;font-weight:700;letter-spacing:0.22em;color:rgba(74,222,128,0.7);text-transform:uppercase;">
            CineVault &mdash; Studio 3
          </span>
        </div>
        <h1 style="font-size:clamp(1.5rem,4vw,1.875rem);font-weight:800;color:#fff;line-height:1.2;letter-spacing:-0.02em;">
          Pilih Kursi
        </h1>
        <p style="font-size:0.875rem;margin-top:6px;color:#8a93b0;">
          Avengers: Doomsday &nbsp;&middot;&nbsp; Jum 18 Apr &nbsp;&middot;&nbsp; 19:30
        </p>
      </div>
      <div style="text-align:center;margin-left:16px;flex-shrink:0;">
        <p style="font-size:0.68rem;color:#5a6480;margin-bottom:2px;">Studio</p>
        <div style="width:44px;height:44px;border-radius:12px;background:#141820;border:1px solid #1e2840;display:flex;align-items:center;justify-content:center;">
          <span style="font-size:1.25rem;font-weight:800;color:#fff;">3</span>
        </div>
      </div>
    </header>

    <!-- Screen -->
    <div style="padding:0 24px;margin-bottom:40px;">
      <div class="screen-bar"></div>
      <p style="text-align:center;padding-top:8px;font-size:0.65rem;font-weight:700;letter-spacing:0.35em;color:rgba(34,197,94,0.5);display:flex;align-items:center;justify-content:center;gap:8px;">
        <svg style="width:12px;height:12px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
        SCREEN
        <svg style="width:12px;height:12px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
      </p>
    </div>

    <!-- Seat Grid -->
    <div id="seatGridWrap" style="overflow-x:auto;padding-bottom:8px;">
      <div id="seatGrid"></div>
    </div>

    <!-- Legend -->
    <div style="display:flex;flex-wrap:wrap;justify-content:center;gap:12px 20px;margin-top:32px;font-size:0.75rem;color:#8a93b0;">
      <div style="display:flex;align-items:center;gap:6px;">
        <div style="width:16px;height:16px;border-radius:4px;border:1.5px solid #2a3347;background:#1e2433;"></div><span>Tersedia</span>
      </div>
      <div style="display:flex;align-items:center;gap:6px;">
        <div style="width:16px;height:16px;border-radius:4px;border:1.5px solid #22c55e;background:#14532d;box-shadow:0 0 5px rgba(34,197,94,0.35);"></div><span>Dipilih</span>
      </div>
      <div style="display:flex;align-items:center;gap:6px;">
        <div style="width:16px;height:16px;border-radius:4px;border:1.5px solid #3d1515;background:#1a0e0e;opacity:0.6;"></div><span>Dipesan</span>
      </div>
      <div style="display:flex;align-items:center;gap:6px;">
        <div style="width:16px;height:16px;border-radius:4px;border:1.5px solid #eab308;background:#1c1505;"></div><span>VIP Gold</span>
      </div>
      <div style="display:flex;align-items:center;gap:6px;">
        <div style="width:16px;height:16px;border-radius:4px;border:1.5px solid #a855f7;background:#130b1f;"></div><span>VIP Premium</span>
      </div>
    </div>

    <!-- Summary Panel -->
    <div class="summary-card fade-up-delay" style="margin-top:24px;">
      <div style="display:flex;flex-wrap:wrap;align-items:center;gap:16px 24px;">
        <!-- selected seats -->
        <div style="flex:1;min-width:150px;">
          <p class="label-micro" style="margin-bottom:4px;">KURSI DIPILIH</p>
          <div id="selectedList" style="display:flex;flex-wrap:wrap;gap:4px;">
            <span style="font-size:0.875rem;color:#8a93b0;">&mdash;</span>
          </div>
        </div>
        <!-- count -->
        <div style="text-align:center;">
          <p class="label-micro" style="margin-bottom:2px;">KURSI</p>
          <p id="seatCount" style="font-size:1.875rem;font-weight:800;color:#fff;line-height:1;">0</p>
        </div>
        <!-- total -->
        <div style="text-align:right;">
          <p class="label-micro" style="margin-bottom:2px;">TOTAL</p>
          <p id="totalPrice" style="font-size:clamp(1.125rem,3vw,1.5rem);font-weight:800;color:#4ade80;line-height:1;">Rp 0</p>
        </div>
      </div>
      <!-- buttons -->
      <div style="display:flex;gap:8px;margin-top:16px;padding-top:16px;border-top:1px solid #1e2840;">
        <button id="clearBtn" class="btn-clear" disabled>
          <svg style="width:16px;height:16px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
          Hapus Semua
        </button>
        <button id="bookBtn" class="btn-book" disabled>
          <svg style="width:16px;height:16px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 7a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v1H2Z"/><path d="M2 8v10a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8"/><path d="m11 14 2 2 4-4"/></svg>
          Pesan Sekarang
        </button>
      </div>
    </div>

  </div>
</main>

<!-- Footer -->
<footer style="position:relative;z-index:10;padding:20px;text-align:center;">
  <p style="font-size:0.75rem;color:#3a4460;">&copy; 2025 CineVault. All rights reserved.</p>
</footer>

<!--  MODAL  -->
<div id="modal">
  <div class="modal-box">
    <!-- modal header -->
    <div style="display:flex;align-items:center;gap:12px;margin-bottom:20px;">
      <div style="width:44px;height:44px;border-radius:12px;background:rgba(34,197,94,0.1);border:1px solid rgba(34,197,94,0.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
        <svg style="width:20px;height:20px;color:#4ade80;" viewBox="0 0 24 24" fill="none" stroke="#4ade80" stroke-width="2"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
      </div>
      <div style="flex:1;min-width:0;">
        <h2 style="font-size:1.125rem;font-weight:800;color:#fff;letter-spacing:-0.01em;">Konfirmasi Pemesanan</h2>
        <p style="font-size:0.875rem;color:#5a6480;margin-top:2px;">Periksa detail sebelum melanjutkan pembayaran</p>
      </div>
      <button id="modalCloseBtn" style="background:none;border:none;color:#5a6480;cursor:pointer;padding:4px;border-radius:6px;transition:color 0.2s;"
        onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#5a6480'">
        <svg style="width:20px;height:20px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
    </div>

    <!-- movie info -->
    <div class="modal-inner-card" style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
      <div style="width:36px;height:36px;border-radius:8px;background:rgba(34,197,94,0.1);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
        <svg style="width:16px;height:16px;" viewBox="0 0 24 24" fill="none" stroke="#4ade80" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
      </div>
      <div style="min-width:0;">
        <p style="font-weight:700;color:#fff;font-size:0.92rem;">Avengers: Doomsday</p>
        <p style="font-size:0.74rem;color:#8a93b0;margin-top:2px;">Studio 3 &nbsp;&middot;&nbsp; Jum, 18 Apr 2025 &nbsp;&middot;&nbsp; 19:30 WIB</p>
      </div>
    </div>

    <!-- seat chips -->
    <div style="margin-bottom:16px;">
      <p class="label-micro" style="margin-bottom:8px;">KURSI DIPILIH</p>
      <div id="modalChips" style="display:flex;flex-wrap:wrap;gap:6px;"></div>
    </div>

    <!-- price breakdown -->
    <div class="modal-inner-card" style="margin-bottom:20px;">
      <div id="modalBreakdown"></div>
    </div>

    <!-- CTA buttons -->
    <div style="display:flex;gap:8px;">
      <button id="modalCancelBtn" class="btn-modal-cancel">Batal</button>
      <button id="modalConfirmBtn" class="btn-modal-confirm">
        <svg style="width:16px;height:16px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
        Konfirmasi &amp; Bayar
      </button>
    </div>
  </div>
</div>

<!-- Toast container -->
<div id="toastContainer"></div>

<!--  Script  -->
<script src="<?= base_url('/assets/js/seat.js') ?>">

(function () {
  /* ── CONFIG ── */
  const ROWS            = ['A','B','C','D','E','F','G','H'];
  const COLS            = 9;
  const PRICES          = { regular: 50000, vipGold: 85000, vipPremium: 120000 };
  const PRICE_LABELS    = { regular: 'Regular', vipGold: 'VIP Gold', vipPremium: 'VIP Premium' };
  const BOOKED_SEATS    = new Set();
  const VIP_PREMIUM_ROWS = new Set(['G','H']);
  const VIP_GOLD_ROWS   = new Set(['F']);
  const selected        = new Set();

  function getSeatType(row) {
    if (VIP_PREMIUM_ROWS.has(row)) return 'vipPremium';
    if (VIP_GOLD_ROWS.has(row))    return 'vipGold';
    return 'regular';
  }

  function fmt(n) { return 'Rp ' + n.toLocaleString('id-ID'); }

  function calcTotal() {
    let t = 0;
    selected.forEach(id => {
      const btn = document.getElementById('seat-' + id);
      t += PRICES[btn?.dataset.type || 'regular'] || PRICES.regular;
    });
    return t;
  }

  /* ── BUILD SEAT GRID ── */
  const grid = document.getElementById('seatGrid');

  ROWS.forEach((row, ri) => {
    const rowEl = document.createElement('div');
    rowEl.className = 'seat-row seat-row-anim';
    rowEl.style.animationDelay = (0.06 * (ri + 1)) + 's';

    // left label
    const lblL = document.createElement('span');
    lblL.className = 'row-label row-label-l';
    lblL.textContent = row;
    rowEl.appendChild(lblL);

    for (let c = 1; c <= COLS; c++) {
      const id   = row + c;
      const type = getSeatType(row);
      const isBooked = BOOKED_SEATS.has(id);

      if (c === 5) {
        const gap = document.createElement('div');
        gap.className = 'seat-aisle';
        rowEl.appendChild(gap);
      }

      const btn = document.createElement('button');
      btn.id           = 'seat-' + id;
      btn.dataset.type = type;
      btn.textContent  = id;
      btn.setAttribute('aria-label', 'Kursi ' + id + (isBooked ? ' sudah dipesan' : ' tersedia'));

      let cls = 'seat-btn';
      if (type === 'vipGold')    cls += ' seat-gold';
      if (type === 'vipPremium') cls += ' seat-purple';
      if (isBooked)              cls += ' seat-booked';
      btn.className = cls;

      // backrest
      const back = document.createElement('span');
      back.className = 'seat-back';
      btn.appendChild(back);

      if (!isBooked) {
        btn.addEventListener('click', () => toggleSeat(btn, id));
      }

      rowEl.appendChild(btn);
    }

    // right label
    const lblR = document.createElement('span');
    lblR.className = 'row-label row-label-r';
    lblR.textContent = row;
    rowEl.appendChild(lblR);

    grid.appendChild(rowEl);
  });

  /* ── TOGGLE SEAT ── */
  function toggleSeat(btn, id) {
    if (selected.has(id)) {
      selected.delete(id);
      btn.classList.remove('seat-selected', 'seat-pop');
    } else {
      selected.add(id);
      btn.classList.add('seat-selected');
      btn.classList.remove('seat-pop');
      void btn.offsetWidth;
      btn.classList.add('seat-pop');
    }
    updateSummary();
  }

  /* ── UPDATE SUMMARY ── */
  const seatCountEl    = document.getElementById('seatCount');
  const totalPriceEl   = document.getElementById('totalPrice');
  const selectedListEl = document.getElementById('selectedList');
  const bookBtn        = document.getElementById('bookBtn');
  const clearBtn       = document.getElementById('clearBtn');

  function updateSummary() {
    const arr = Array.from(selected).sort();
    seatCountEl.textContent  = '' + arr.length;
    totalPriceEl.textContent = fmt(calcTotal());

    selectedListEl.innerHTML = '';
    if (arr.length === 0) {
      selectedListEl.innerHTML = '<span style="font-size:0.875rem;color:#8a93b0;">&mdash;</span>';
    } else {
      arr.forEach(id => {
        const btn = document.getElementById('seat-' + id);
        const t   = btn ? btn.dataset.type : 'regular';
        const chip = document.createElement('span');
        chip.className = 'chip chip-' + (t === 'vipGold' ? 'gold' : t === 'vipPremium' ? 'purple' : 'regular');
        chip.textContent = id;
        selectedListEl.appendChild(chip);
      });
    }

    bookBtn.disabled  = arr.length === 0;
    clearBtn.disabled = arr.length === 0;
  }

  /* ── CLEAR ALL ── */
  clearBtn.addEventListener('click', () => {
    if (selected.size === 0) return;
    selected.forEach(id => {
      const btn = document.getElementById('seat-' + id);
      if (btn) btn.classList.remove('seat-selected','seat-pop');
    });
    selected.clear();
    updateSummary();
    showToast('Semua pilihan kursi dihapus', 'error');
  });

  /* ── MODAL ── */
  const modal      = document.getElementById('modal');
  const modalChips = document.getElementById('modalChips');
  const modalBreak = document.getElementById('modalBreakdown');

  function openModal() {
    const arr = Array.from(selected).sort();

    // chips
    modalChips.innerHTML = '';
    arr.forEach(id => {
      const btn = document.getElementById('seat-' + id);
      const t   = btn ? btn.dataset.type : 'regular';
      const chip = document.createElement('span');
      chip.className = 'modal-chip';

      if (t === 'vipGold') {
        chip.style.cssText = 'border-color:#ca8a04;color:#fbbf24;background:#1c1505;';
        chip.innerHTML = '<svg style="width:10px;height:10px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26"/></svg>' + id;
      } else if (t === 'vipPremium') {
        chip.style.cssText = 'border-color:#9333ea;color:#c084fc;background:#130b1f;';
        chip.innerHTML = '<svg style="width:10px;height:10px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5C7 4 6 9 6 9Z"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5C17 4 18 9 18 9Z"/><path d="M4 22h16"/><path d="M10 22V8a2 2 0 0 1 2-2c1.5 0 2.5 1 2 3.5V22"/></svg>' + id;
      } else {
        chip.style.cssText = 'border-color:#2a3347;color:#8a93b0;background:#141820;';
        chip.textContent = id;
      }
      modalChips.appendChild(chip);
    });

    // price breakdown
    const groups = { regular: [], vipGold: [], vipPremium: [] };
    arr.forEach(id => {
      const btn = document.getElementById('seat-' + id);
      const t   = btn ? btn.dataset.type : 'regular';
      groups[t].push(id);
    });

    modalBreak.innerHTML = '';
    ['regular','vipGold','vipPremium'].forEach((type, i) => {
      const seats = groups[type];
      if (!seats.length) return;

      if (i > 0 && modalBreak.children.length > 0) {
        const sep = document.createElement('div');
        sep.style.cssText = 'border-top:1px solid #1a2030;margin:12px 0;';
        modalBreak.appendChild(sep);
      }

      const n    = seats.length;
      const unit = PRICES[type];
      const accentColor = type === 'vipGold' ? '#fbbf24' : type === 'vipPremium' ? '#c084fc' : '#8a93b0';
      const row  = document.createElement('div');
      row.style.cssText = 'display:flex;justify-content:space-between;align-items:center;padding:4px 0;';
      row.innerHTML =
        '<div>' +
          '<p style="font-size:0.875rem;color:#e2e8f0;font-weight:600;">' + PRICE_LABELS[type] + '</p>' +
          '<p style="font-size:0.75rem;color:#5a6480;margin-top:2px;">' + n + ' kursi &times; ' + fmt(unit) + '</p>' +
        '</div>' +
        '<p style="font-weight:700;font-size:0.875rem;color:' + accentColor + ';">' + fmt(n * unit) + '</p>';
      modalBreak.appendChild(row);
    });

    // total
    const totSep = document.createElement('div');
    totSep.style.cssText = 'border-top:1px solid rgba(34,197,94,0.15);margin:12px 0;';
    modalBreak.appendChild(totSep);
    const totRow = document.createElement('div');
    totRow.style.cssText = 'display:flex;justify-content:space-between;align-items:center;';
    totRow.innerHTML =
      '<span style="font-weight:800;font-size:0.875rem;color:#fff;letter-spacing:0.05em;">TOTAL PEMBAYARAN</span>' +
      '<span style="font-weight:800;font-size:1rem;color:#4ade80;">' + fmt(calcTotal()) + '</span>';
    modalBreak.appendChild(totRow);

    modal.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    modal.classList.remove('open');
    document.body.style.overflow = '';
  }

  document.getElementById('bookBtn').addEventListener('click', openModal);
  document.getElementById('modalCloseBtn').addEventListener('click', closeModal);
  document.getElementById('modalCancelBtn').addEventListener('click', closeModal);
  modal.addEventListener('click', e => { if (e.target === modal) closeModal(); });
  document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });

  /* ── CONFIRM BOOKING ── */
  document.getElementById('modalConfirmBtn').addEventListener('click', () => {
    const count = selected.size;
    const total = calcTotal();

    selected.forEach(id => {
      const btn = document.getElementById('seat-' + id);
      if (btn) {
        btn.className = 'seat-btn seat-booked';
        btn.replaceWith(btn.cloneNode(true)); // remove event listeners
        BOOKED_SEATS.add(id);
      }
    });

    selected.clear();
    updateSummary();
    closeModal();
    showToast('🎨 ' + count + ' kursi berhasil dipesan! Total ' + fmt(total), 'success', 5500);
  });

  /* ── TOAST ── */
  const toastContainer = document.getElementById('toastContainer');

  function showToast(message, type, duration) {
    duration = duration || 4000;
    const toast = document.createElement('div');
    toast.className = 'toast-item';

    const icon = document.createElement('div');
    icon.style.cssText = 'width:36px;height:36px;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:0.875rem;font-weight:700;flex-shrink:0;';
    if (type === 'success') {
      icon.style.background = 'rgba(34,197,94,0.15)';
      icon.style.color      = '#4ade80';
      icon.innerHTML = '<svg style="width:20px;height:20px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>';
    } else {
      icon.style.background = 'rgba(239,68,68,0.15)';
      icon.style.color      = '#f87171';
      icon.innerHTML = '<svg style="width:16px;height:16px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>';
    }

    const text = document.createElement('div');
    text.style.cssText = 'flex:1;color:#e2e8f0;font-size:0.83rem;line-height:1.4;';
    text.textContent   = message;

    const x = document.createElement('button');
    x.innerHTML = '<svg style="width:14px;height:14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>';
    x.style.cssText = 'background:none;border:none;color:#5a6480;cursor:pointer;padding:2px 4px;flex-shrink:0;';
    x.addEventListener('click', dismiss);

    const bar = document.createElement('div');
    bar.style.cssText = 'position:absolute;bottom:0;left:0;height:3px;border-radius:0 0 12px 12px;';
    bar.style.background  = type === 'success'
      ? 'linear-gradient(90deg,#22c55e,#4ade80)'
      : 'linear-gradient(90deg,#ef4444,#f87171)';
    bar.style.animation   = 'toastBar ' + duration + 'ms linear forwards';

    toast.appendChild(icon);
    toast.appendChild(text);
    toast.appendChild(x);
    toast.appendChild(bar);
    toastContainer.appendChild(toast);

    function dismiss() {
      toast.style.animation = 'toastOut 0.3s ease forwards';
      toast.addEventListener('animationend', () => toast.remove(), { once: true });
    }
    setTimeout(dismiss, duration);
  }

  /* init */
  updateSummary();
})();
</script>
</body>
</html>