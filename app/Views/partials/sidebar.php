<aside class="sidebar" id="sidebar" role="navigation" aria-label="Navigasi utama">
        <div style="padding:22px 20px 18px;">
            <div style="display:flex;align-items:center;gap:10px;">
                <div style="width:36px;height:36px;border-radius:10px;background:var(--accent);display:flex;align-items:center;justify-content:center;box-shadow:0 2px 8px var(--accent-glow);">
                    <i class="fa-solid fa-film" style="color:white;font-size:16px;"></i>
                </div>
                <div>
                    <span style="font-family:'Space Grotesk',sans-serif;font-weight:700;font-size:17px;color:var(--fg);">CineMax</span>
                    <div style="font-size:10px;color:var(--fg-dim);margin-top:-2px;letter-spacing:0.5px;">BOOKING SYSTEM</div>
                </div>
            </div>
        </div>

        <div style="padding:0 16px 14px;">
            <div class="sidebar-search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Cari film, booking..." aria-label="Pencarian">
                <kbd>⌘K</kbd>
            </div>
        </div>

        <div style="padding:0 12px;flex:1;overflow-y:auto;">
            <div class="sidebar-label">Menu Utama</div>
            <div class="nav-item active" onclick="setActiveNav(this)">
                <i class="fa-solid fa-house"></i>
                <span>Beranda</span>
            </div>
            <div class="nav-item" onclick="setActiveNav(this)">
                <i class="fa-solid fa-clapperboard"></i>
                <span>Film</span>
                <!-- <span class="nav-badge" style="background:var(--accent);">12</span> -->
            </div>
            <div class="nav-item" onclick="setActiveNav(this)">
                <i class="fa-solid fa-ticket"></i>
                <span>Pesanan</span>
                <!-- <span class="nav-badge" style="background:var(--rose);">4</span> -->
            </div>
            <div class="nav-item" onclick="setActiveNav(this)">
                <i class="fa-solid fa-door-open"></i>
                <span>Studio</span>
            </div>
            <div class="nav-item" onclick="setActiveNav(this)">
                <i class="fa-regular fa-calendar"></i>
                <span>Jadwal Tayang</span>
            </div>
            <div class="nav-item" onclick="setActiveNav(this)">
                <i class="fa-solid fa-users"></i>
                <span>Pelanggan</span>
            </div>

            <div class="sidebar-label" style="padding-top:20px;">Manajemen</div>
            <div class="nav-item" onclick="setActiveNav(this)">
                <i class="fa-solid fa-building"></i>
                <span>Cinema</span>
            </div>
            <div class="nav-item" onclick="setActiveNav(this)">
                <i class="fa-solid fa-chart-line"></i>
                <span>Pendapatan</span>
            </div>
            <div class="nav-item" onclick="setActiveNav(this)">
                <i class="fa-solid fa-chart-pie"></i>
                <span>Laporan</span>
            </div>
            <div class="nav-item" onclick="setActiveNav(this)">
                <i class="fa-solid fa-gear"></i>
                <span>Pengaturan</span>
            </div>
        </div>

        <div style="padding:12px 16px;border-top:1px solid var(--border);">
            <div class="sidebar-user">
                <img src="https://picsum.photos/seed/cinemax-user/80/80.jpg" alt="Avatar" style="width:36px;height:36px;border-radius:10px;object-fit:cover;border:2px solid var(--border);">
                <div style="flex:1;min-width:0;">
                    <div style="font-size:13px;font-weight:600;color:var(--fg);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Admin</div>
                    <div style="font-size:11px;color:var(--fg-muted);">Cinemax Manager</div>
                </div>
                <i class="fa-solid fa-ellipsis-vertical" style="color:var(--fg-dim);font-size:13px;"></i>
            </div>
        </div>
    </aside>