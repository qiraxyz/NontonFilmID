<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>
<?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>">
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section style="margin-bottom:28px;">
    <h1 id="greetingText" style="font-family:'Space Grotesk',sans-serif;font-size:30px;font-weight:700;color:var(--fg);line-height:1.2;">
        Selamat siang, <span style="color:var(--accent);">Admin</span>
    </h1>
    <p style="color:var(--fg-muted);font-size:14px;margin-top:6px;">Ada <span style="color:var(--teal);font-weight:600;">5 film</span> sedang tayang hari ini. <span style="color:var(--teal);font-weight:600;"></span> Tetap semangat! 🚀</p>
</section>

<!-- Stat Cards -->
<section style="display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:28px;" id="statsGrid">

    <div class="stat-card">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
            <div style="width:40px;height:40px;border-radius:10px;background:var(--accent-soft);display:flex;align-items:center;justify-content:center;">
                <i class="fa-solid fa-clapperboard" style="color:var(--accent);font-size:16px;"></i>
            </div>
            <span style="font-size:11px;color:var(--teal);font-weight:600;display:flex;align-items:center;gap:3px;"><i class="fa-solid fa-arrow-up" style="font-size:9px;"></i> 12%</span>
        </div>
        <div style="font-size:28px;font-weight:800;font-family:'Space Grotesk',sans-serif;color:var(--fg);">12</div>
        <div style="font-size:12px;color:var(--fg-muted);margin-top:2px;">Total Film</div>
    </div>

    <div class="stat-card">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
            <div style="width:40px;height:40px;border-radius:10px;background:var(--teal-soft);display:flex;align-items:center;justify-content:center;">
                <i class="fa-solid fa-ticket" style="color:var(--teal);font-size:16px;"></i>
            </div>
            <span style="font-size:11px;color:var(--teal);font-weight:600;display:flex;align-items:center;gap:3px;"><i class="fa-solid fa-arrow-up" style="font-size:9px;"></i> 24%</span>
        </div>
        <div style="font-size:28px;font-weight:800;font-family:'Space Grotesk',sans-serif;color:var(--fg);">847</div>
        <div style="font-size:12px;color:var(--fg-muted);margin-top:2px;">Tiket Terjual</div>
    </div>

    <div class="stat-card">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
            <div style="width:40px;height:40px;border-radius:10px;background:var(--orange-soft);display:flex;align-items:center;justify-content:center;">
                <i class="fa-solid fa-circle-play" style="color:var(--orange);font-size:16px;"></i>
            </div>
            <span style="font-size:11px;color:var(--orange);font-weight:600;">Aktif</span>
        </div>
        <div style="font-size:28px;font-weight:800;font-family:'Space Grotesk',sans-serif;color:var(--fg);">5</div>
        <div style="font-size:12px;color:var(--fg-muted);margin-top:2px;">Sedang Tayang</div>
    </div>

    <div class="stat-card">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
            <div style="width:40px;height:40px;border-radius:10px;background:var(--blue-soft);display:flex;align-items:center;justify-content:center;">
                <i class="fa-solid fa-money-bill-wave" style="color:var(--blue);font-size:16px;"></i>
            </div>
            <span style="font-size:11px;color:var(--rose);font-weight:600;display:flex;align-items:center;gap:3px;"><i class="fa-solid fa-arrow-down" style="font-size:9px;"></i> 8%</span>
        </div>
        <div style="font-size:28px;font-weight:800;font-family:'Space Grotesk',sans-serif;color:var(--fg);">24.5<span style="font-size:16px;font-weight:500;color:var(--fg-muted);">jt</span></div>
        <div style="font-size:12px;color:var(--fg-muted);margin-top:2px;">Pendapatan Hari Ini</div>
    </div>

</section>


<!-- Jadwal Showtime + Pengingat -->
<section style="display:grid;grid-template-columns:1.4fr 1fr;gap:20px;margin-bottom:28px;">

    <!-- Jadwal Showtime Hari Ini -->
    <div class="card">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;">
            <div>
                <h2 style="font-family:'Space Grotesk',sans-serif;font-size:17px;font-weight:700;color:var(--fg);">Showtime Hari Ini</h2>
                <p style="font-size:12px;color:var(--fg-muted);margin-top:2px;" id="calendarDateLabel"></p>
            </div>
            <div style="display:flex;gap:6px;">
                <button style="width:32px;height:32px;border-radius:8px;background:#F1F5F9;border:1px solid var(--border);color:var(--fg-muted);cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all 0.2s;" onmouseover="this.style.borderColor='var(--accent)';this.style.color='var(--accent)'" onmouseout="this.style.borderColor='var(--border)';this.style.color='var(--fg-muted)'" aria-label="Sebelumnya"><i class="fa-solid fa-chevron-left" style="font-size:11px;"></i></button>
                <button style="width:32px;height:32px;border-radius:8px;background:#F1F5F9;border:1px solid var(--border);color:var(--fg-muted);cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all 0.2s;" onmouseover="this.style.borderColor='var(--accent)';this.style.color='var(--accent)'" onmouseout="this.style.borderColor='var(--border)';this.style.color='var(--fg-muted)'" aria-label="Berikutnya"><i class="fa-solid fa-chevron-right" style="font-size:11px;"></i></button>
            </div>
        </div>
        <div>

            <div class="showtime-item" onclick="showToast('Membuka showtime: Inception Reborn 14:30', 'var(--accent)')">
                <div class="cal-dot" style="background:var(--accent);"></div>
                <div style="flex:1;min-width:0;">
                    <div style="font-size:13px;font-weight:600;color:var(--fg);">Inception Reborn</div>
                    <div style="font-size:11px;color:var(--fg-muted);margin-top:2px;">Studio A · 76 kursi terisi</div>
                </div>
                <div style="text-align:right;">
                    <div style="font-size:12px;color:var(--fg-muted);font-weight:500;white-space:nowrap;">14:30</div>
                    <span class="badge" style="background:var(--teal-soft);color:var(--teal);font-size:10px;">Berjalan</span>
                </div>
            </div>

            <div class="showtime-item" onclick="showToast('Membuka showtime: Senyap di Utara 13:00', 'var(--teal)')">
                <div class="cal-dot" style="background:var(--teal);"></div>
                <div style="flex:1;min-width:0;">
                    <div style="font-size:13px;font-weight:600;color:var(--fg);">Senyap di Utara</div>
                    <div style="font-size:11px;color:var(--fg-muted);margin-top:2px;">Studio B · 48 kursi terisi</div>
                </div>
                <div style="text-align:right;">
                    <div style="font-size:12px;color:var(--fg-muted);font-weight:500;white-space:nowrap;">13:00</div>
                    <span class="badge" style="background:var(--teal-soft);color:var(--teal);font-size:10px;">Berjalan</span>
                </div>
            </div>

            <div class="showtime-item" onclick="showToast('Membuka showtime: Riang Ria 2 15:30', 'var(--orange)')">
                <div class="cal-dot" style="background:var(--orange);"></div>
                <div style="flex:1;min-width:0;">
                    <div style="font-size:13px;font-weight:600;color:var(--fg);">Riang Ria 2</div>
                    <div style="font-size:11px;color:var(--fg-muted);margin-top:2px;">Studio C · 22 kursi terisi</div>
                </div>
                <div style="text-align:right;">
                    <div style="font-size:12px;color:var(--fg-muted);font-weight:500;white-space:nowrap;">15:30</div>
                    <span class="badge" style="background:var(--orange-soft);color:var(--orange);font-size:10px;">Mulai 43 mnt</span>
                </div>
            </div>

            <div class="showtime-item" onclick="showToast('Membuka showtime: Bayangan Emas 17:00', 'var(--blue)')">
                <div class="cal-dot" style="background:var(--blue);"></div>
                <div style="flex:1;min-width:0;">
                    <div style="font-size:13px;font-weight:600;color:var(--fg);">Bayangan Emas</div>
                    <div style="font-size:11px;color:var(--fg-muted);margin-top:2px;">Studio D · 12 kursi terisi</div>
                </div>
                <div style="text-align:right;">
                    <div style="font-size:12px;color:var(--fg-muted);font-weight:500;white-space:nowrap;">17:00</div>
                    <span class="badge" style="background:var(--blue-soft);color:var(--blue);font-size:10px;">Buka booking</span>
                </div>
            </div>

            <div class="showtime-item" onclick="showToast('Membuka showtime: Inception Reborn 17:00', 'var(--accent)')">
                <div class="cal-dot" style="background:var(--accent);"></div>
                <div style="flex:1;min-width:0;">
                    <div style="font-size:13px;font-weight:600;color:var(--fg);">Inception Reborn</div>
                    <div style="font-size:11px;color:var(--fg-muted);margin-top:2px;">Studio A · 4 kursi terisi</div>
                </div>
                <div style="text-align:right;">
                    <div style="font-size:12px;color:var(--fg-muted);font-weight:500;white-space:nowrap;">17:00</div>
                    <span class="badge" style="background:var(--blue-soft);color:var(--blue);font-size:10px;">Buka booking</span>
                </div>
            </div>

        </div>
    </div>

    <!-- Pengingat  -->
    <div class="card">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;">
            <div>
                <h2 style="font-family:'Space Grotesk',sans-serif;font-size:17px;font-weight:700;color:var(--fg);">Pengingat</h2>
                <p style="font-size:12px;color:var(--fg-muted);margin-top:2px;">Tindakan diperlukan</p>
            </div>
            <div class="pulse-dot" style="background:var(--rose);color:var(--rose);"></div>
        </div>
        <div>

            <div class="reminder-item" onclick="showToast('Pesanan Andika akan kadaluarsa dalam 15 menit!', 'var(--rose)')">
                <div style="width:36px;height:36px;min-width:36px;border-radius:10px;background:#F1F5F9;border:1px solid var(--border);display:flex;align-items:center;justify-content:center;">
                    <i class="fa-solid fa-clock" style="color:var(--rose);font-size:14px;"></i>
                </div>
                <div style="flex:1;min-width:0;">
                    <div style="font-size:13px;font-weight:500;color:var(--fg);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Pesanan Andika akan expired</div>
                    <div style="font-size:11px;color:var(--fg-muted);margin-top:2px;">15 menit lagi · B3, B4</div>
                </div>
                <i class="fa-solid fa-bell" style="color:var(--fg-dim);font-size:12px;"></i>
            </div>

            <div class="reminder-item" onclick="showToast('5 kursi terkunci di Studio A perlu dilepas', 'var(--accent)')">
                <div style="width:36px;height:36px;min-width:36px;border-radius:10px;background:#F1F5F9;border:1px solid var(--border);display:flex;align-items:center;justify-content:center;">
                    <i class="fa-solid fa-lock" style="color:var(--accent);font-size:14px;"></i>
                </div>
                <div style="flex:1;min-width:0;">
                    <div style="font-size:13px;font-weight:500;color:var(--fg);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">5 kursi terkunci di Studio A</div>
                    <div style="font-size:11px;color:var(--fg-muted);margin-top:2px;">Release otomatis 10 mnt lagi</div>
                </div>
                <i class="fa-solid fa-bell" style="color:var(--fg-dim);font-size:12px;"></i>
            </div>

            <div class="reminder-item" onclick="showToast('Studio B maintenance terjadwal!', 'var(--orange)')">
                <div style="width:36px;height:36px;min-width:36px;border-radius:10px;background:#F1F5F9;border:1px solid var(--border);display:flex;align-items:center;justify-content:center;">
                    <i class="fa-solid fa-screwdriver-wrench" style="color:var(--orange);font-size:14px;"></i>
                </div>
                <div style="flex:1;min-width:0;">
                    <div style="font-size:13px;font-weight:500;color:var(--fg);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Maintenance Studio B</div>
                    <div style="font-size:11px;color:var(--fg-muted);margin-top:2px;">Besok, 06:00 – 08:00</div>
                </div>
                <i class="fa-solid fa-bell" style="color:var(--fg-dim);font-size:12px;"></i>
            </div>

            <div class="reminder-item" onclick="showToast('Laporan pendapatan mingguan siap!', 'var(--blue)')">
                <div style="width:36px;height:36px;min-width:36px;border-radius:10px;background:#F1F5F9;border:1px solid var(--border);display:flex;align-items:center;justify-content:center;">
                    <i class="fa-solid fa-file-invoice-dollar" style="color:var(--blue);font-size:14px;"></i>
                </div>
                <div style="flex:1;min-width:0;">
                    <div style="font-size:13px;font-weight:500;color:var(--fg);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Laporan pendapatan mingguan</div>
                    <div style="font-size:11px;color:var(--fg-muted);margin-top:2px;">3 hari lagi</div>
                </div>
                <i class="fa-solid fa-bell" style="color:var(--fg-dim);font-size:12px;"></i>
            </div>

            <div class="reminder-item" onclick="showToast('Film Bayangan Emas mulai tayang minggu depan!', 'var(--fg-muted)')">
                <div style="width:36px;height:36px;min-width:36px;border-radius:10px;background:#F1F5F9;border:1px solid var(--border);display:flex;align-items:center;justify-content:center;">
                    <i class="fa-solid fa-clapperboard" style="color:var(--fg-muted);font-size:14px;"></i>
                </div>
                <div style="flex:1;min-width:0;">
                    <div style="font-size:13px;font-weight:500;color:var(--fg);white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Film baru: Langit Terakhir</div>
                    <div style="font-size:11px;color:var(--fg-muted);margin-top:2px;">Tayang 26 Apr 2026</div>
                </div>
                <i class="fa-solid fa-bell" style="color:var(--fg-dim);font-size:12px;"></i>
            </div>

        </div>
    </div>
</section>

<!-- Studio Occupancy Overview -->
<section style="margin-bottom:28px;">
    <div class="card">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:18px;">
            <div>
                <h2 style="font-family:'Space Grotesk',sans-serif;font-size:17px;font-weight:700;color:var(--fg);">Kapasitas Studio Saat Ini</h2>
                <p style="font-size:12px;color:var(--fg-muted);margin-top:2px;">Real-time · Showtime aktif</p>
            </div>
            <!-- <span class="live-indicator"><span class="live-dot"></span>Live Update</span> -->
        </div>
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:12px;">

            <div class="studio-bar" onclick="openSeatModalForMovie('Inception Reborn', 'Studio A')">
                <div style="width:32px;height:32px;border-radius:8px;background:var(--accent-soft);display:flex;align-items:center;justify-content:center;min-width:32px;">
                    <span style="font-size:11px;font-weight:800;color:var(--accent);">A</span>
                </div>
                <div style="flex:1;min-width:0;">
                    <div style="font-size:12px;font-weight:600;color:var(--fg);">Studio A</div>
                    <div class="progress-bar" style="margin-top:5px;">
                        <div class="progress-fill" style="width:76%;background:var(--accent);"></div>
                    </div>
                    <div style="font-size:10px;color:var(--fg-dim);margin-top:3px;">76 / 100 kursi</div>
                </div>
            </div>

            <div class="studio-bar" onclick="openSeatModalForMovie('Senyap di Utara', 'Studio B')">
                <div style="width:32px;height:32px;border-radius:8px;background:var(--teal-soft);display:flex;align-items:center;justify-content:center;min-width:32px;">
                    <span style="font-size:11px;font-weight:800;color:var(--teal);">B</span>
                </div>
                <div style="flex:1;min-width:0;">
                    <div style="font-size:12px;font-weight:600;color:var(--fg);">Studio B</div>
                    <div class="progress-bar" style="margin-top:5px;">
                        <div class="progress-fill" style="width:45%;background:var(--teal);"></div>
                    </div>
                    <div style="font-size:10px;color:var(--fg-dim);margin-top:3px;">48 / 100 kursi</div>
                </div>
            </div>

            <div class="studio-bar" onclick="openSeatModalForMovie('Riang Ria 2', 'Studio C')">
                <div style="width:32px;height:32px;border-radius:8px;background:var(--orange-soft);display:flex;align-items:center;justify-content:center;min-width:32px;">
                    <span style="font-size:11px;font-weight:800;color:var(--orange);">C</span>
                </div>
                <div style="flex:1;min-width:0;">
                    <div style="font-size:12px;font-weight:600;color:var(--fg);">Studio C</div>
                    <div class="progress-bar" style="margin-top:5px;">
                        <div class="progress-fill" style="width:22%;background:var(--orange);"></div>
                    </div>
                    <div style="font-size:10px;color:var(--fg-dim);margin-top:3px;">22 / 100 kursi</div>
                </div>
            </div>

            <div class="studio-bar" onclick="openSeatModalForMovie('Bayangan Emas', 'Studio D')">
                <div style="width:32px;height:32px;border-radius:8px;background:var(--blue-soft);display:flex;align-items:center;justify-content:center;min-width:32px;">
                    <span style="font-size:11px;font-weight:800;color:var(--blue);">D</span>
                </div>
                <div style="flex:1;min-width:0;">
                    <div style="font-size:12px;font-weight:600;color:var(--fg);">Studio D</div>
                    <div class="progress-bar" style="margin-top:5px;">
                        <div class="progress-fill" style="width:12%;background:var(--blue);"></div>
                    </div>
                    <div style="font-size:10px;color:var(--fg-dim);margin-top:3px;">12 / 100 kursi</div>
                </div>
            </div>

        </div>
    </div>
</section>
<style>
    @media (max-width: 900px) {
        main .card {
            padding: 18px;
        }

        section[style*="grid-template-columns: 1fr 1fr"],
        section[style*="grid-template-columns: 1.4fr 1fr"] {
            grid-template-columns: 1fr !important;
        }
    }

    @media (max-width: 640px) {
        main div[style*="padding:28px 32px"] {
            padding: 16px !important;
        }

        header {
            padding: 12px 16px !important;
        }

        h1 {
            font-size: 22px !important;
        }

        #statsGrid {
            gap: 10px !important;
        }

        .stat-card {
            padding: 14px !important;
        }
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('assets/js/dashboard.js') ?>"></script>
<?= $this->endSection() ?>