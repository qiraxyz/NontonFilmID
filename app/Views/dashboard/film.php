<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>
<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/dashboard-detail.css') ?>">
<?= $this->endSection() ?>
<?= $this->section('content') ?>


    <div style="padding:28px 32px;position:relative;z-index:1;">
        <section style="margin-bottom:24px;">
            <h1
                style="font-family:'Space Grotesk',sans-serif;font-size:28px;font-weight:700;color:var(--fg);line-height:1.2;">
                Manajemen Film</h1>
            <p style="color:var(--fg-muted);font-size:14px;margin-top:4px;">Kelola data film, kategori, venue, harga tiket, dan status penayangan.</p>
        </section>

        <!-- Stats Cards -->
        <section style="display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:24px;"
            id="statsGrid">
            <div class="stat-card">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:12px;">
                    <div
                        style="width:40px;height:40px;border-radius:10px;background:var(--accent-soft);display:flex;align-items:center;justify-content:center;">
                        <i class="fa-solid fa-film" style="color:var(--accent);font-size:16px;"></i>
                    </div>
                </div>
                <div style="font-size:28px;font-weight:800;font-family:'Space Grotesk',sans-serif;color:var(--fg);"
                    id="statTotal">0</div>
                <div style="font-size:12px;color:var(--fg-muted);margin-top:2px;">Total Film</div>
            </div>
            <div class="stat-card">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:12px;">
                    <div
                        style="width:40px;height:40px;border-radius:10px;background:var(--teal-soft);display:flex;align-items:center;justify-content:center;">
                        <i class="fa-solid fa-circle-check" style="color:var(--teal);font-size:16px;"></i>
                    </div>
                </div>
                <div style="font-size:28px;font-weight:800;font-family:'Space Grotesk',sans-serif;color:var(--fg);"
                    id="statPublished">0</div>
                <div style="font-size:12px;color:var(--fg-muted);margin-top:2px;">Published</div>
            </div>
            <div class="stat-card">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:12px;">
                    <div
                        style="width:40px;height:40px;border-radius:10px;background:var(--orange-soft);display:flex;align-items:center;justify-content:center;">
                        <i class="fa-solid fa-file-pen" style="color:var(--orange);font-size:16px;"></i>
                    </div>
                </div>
                <div style="font-size:28px;font-weight:800;font-family:'Space Grotesk',sans-serif;color:var(--fg);"
                    id="statDraft">0</div>
                <div style="font-size:12px;color:var(--fg-muted);margin-top:2px;">Draft</div>
            </div>
            <div class="stat-card">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:12px;">
                    <div
                        style="width:40px;height:40px;border-radius:10px;background:var(--blue-soft);display:flex;align-items:center;justify-content:center;">
                        <i class="fa-solid fa-flag-checkered" style="color:var(--blue);font-size:16px;"></i>
                    </div>
                </div>
                <div style="font-size:28px;font-weight:800;font-family:'Space Grotesk',sans-serif;color:var(--fg);"
                    id="statCompleted">0</div>
                <div style="font-size:12px;color:var(--fg-muted);margin-top:2px;">Completed</div>
            </div>
        </section>

        <!-- Table Card -->
        <div class="card" style="overflow:hidden;">
            <div
                style="padding:20px 24px;display:flex;align-items:center;justify-content:space-between;gap:16px;flex-wrap:wrap;border-bottom:1px solid var(--border);">
                <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap;">
                    <div style="position:relative;"><i class="fa-solid fa-magnifying-glass"
                            style="position:absolute;left:14px;top:50%;transform:translateY(-50%);color:var(--fg-dim);font-size:12px;"></i><input
                            type="text" class="search-input" id="searchInput" placeholder="Cari judul film..."
                            oninput="filterTable()" aria-label="Cari judul film"></div>
                    <select class="form-select" style="width:auto;padding:9px 36px 9px 14px;font-size:13px;"
                        id="filterCategory" onchange="filterTable()">
                        <option value="">Semua Kategori</option>
                        <option value="Action">Action</option>
                        <option value="Drama">Drama</option>
                        <option value="Comedy">Comedy</option>
                        <option value="Horror">Horror</option>
                        <option value="Sci-Fi">Sci-Fi</option>
                        <option value="Animation">Animation</option>
                        <option value="Thriller">Thriller</option>
                        <option value="Romance">Romance</option>
                    </select>
                    <select class="form-select" style="width:auto;padding:9px 36px 9px 14px;font-size:13px;"
                        id="filterStatus" onchange="filterTable()">
                        <option value="">Semua Status</option>
                        <option value="draft">Draft</option>
                        <option value="published">Published</option>
                        <option value="cancelled">Cancelled</option>
                        <option value="completed">Completed</option>
                    </select>
                    <select class="form-select" style="width:auto;padding:9px 36px 9px 14px;font-size:13px;"
                        id="filterVenue" onchange="filterTable()">
                        <option value="">Semua Venue</option>
                        <option value="1">Studio 1</option>
                        <option value="2">Studio 2</option>
                        <option value="3">Studio IMAX</option>
                        <option value="4">Studio Premiere</option>
                        <option value="5">Studio Gold</option>
                    </select>
                </div>
                <button class="btn-primary" onclick="openAddModal()"><i class="fa-solid fa-plus"
                        style="font-size:12px;"></i> Tambah Film</button>
            </div>
            <div class="table-wrap">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th style="width:50px;">ID</th>
                            <th>Judul Film</th>
                            <th>Kategori</th>
                            <th>Venue</th>
                            <th style="width:160px;">Harga</th>
                            <th style="width:110px;">Status</th>
                            <th style="width:120px;">Tanggal Mulai</th>
                            <th style="width:120px;text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                    </tbody>
                </table>
                <div class="empty-state" id="emptyState" style="display:none;">
                    <i class="fa-solid fa-film"></i>
                    <p style="color:var(--fg-muted);font-size:14px;">Tidak ada film ditemukan</p>
                    <p style="color:var(--fg-dim);font-size:12px;margin-top:4px;">Coba ubah filter atau kata kunci pencarian.</p>
                </div>
            </div>
            <div style="padding:16px 24px;display:flex;align-items:center;justify-content:space-between;border-top:1px solid var(--border);flex-wrap:wrap;gap:12px;">
                <span style="font-size:12px;color:var(--fg-muted);" id="tableInfo">Menampilkan 0-0 dari 0 data</span>
                <div style="display:flex;align-items:center;gap:4px;" id="paginationButtons"></div>
            </div>
        </div>
    </div>

<!-- Modal: Form (Add/Edit) -->
<div class="modal-overlay" id="formModal">
    <div class="modal-box" onclick="event.stopPropagation()" style="max-width:580px;">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:24px;">
            <h3 style="font-family:'Space Grotesk',sans-serif;font-size:18px;font-weight:700;color:var(--fg);"
                id="formModalTitle">Tambah Film</h3>
            <button onclick="closeFormModal()"
                style="width:32px;height:32px;border-radius:8px;background:#F1F5F9;border:1px solid var(--border);color:var(--fg-muted);cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
                onmouseover="this.style.borderColor='var(--rose)';this.style.color='var(--rose)'"
                onmouseout="this.style.borderColor='var(--border)';this.style.color='var(--fg-muted)'"
                aria-label="Tutup"><i class="fa-solid fa-xmark" style="font-size:14px;"></i></button>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
            <div style="grid-column:span 2;">
                <label class="form-label">Judul Film</label>
                <input type="text" class="form-input" id="formTitle" placeholder="Masukkan judul film" oninput="autoSlug()">
                <div class="form-error" id="errTitle">Judul film wajib diisi</div>
            </div>
            <div style="grid-column:span 2;">
                <label class="form-label">Slug</label>
                <input type="text" class="form-input" id="formSlug" placeholder="otomatis-dari-judul">
                <div class="form-error" id="errSlug">Slug wajib diisi</div>
            </div>
            <div>
                <label class="form-label">Kategori</label>
                <select class="form-select" id="formCategory">
                    <option value="">Pilih kategori</option>
                    <option value="Action">Action</option>
                    <option value="Drama">Drama</option>
                    <option value="Comedy">Comedy</option>
                    <option value="Horror">Horror</option>
                    <option value="Sci-Fi">Sci-Fi</option>
                    <option value="Animation">Animation</option>
                    <option value="Thriller">Thriller</option>
                    <option value="Romance">Romance</option>
                </select>
                <div class="form-error" id="errCategory">Kategori wajib dipilih</div>
            </div>
            <div>
                <label class="form-label">Venue</label>
                <div class="multi-select" id="venueMultiSelect">
                    <div class="multi-select-trigger" id="venueTrigger" onclick="toggleVenueDropdown(event)">
                        <div class="multi-select-tags" id="venueTags">
                            <span class="placeholder">Pilih venue...</span>
                        </div>
                        <i class="fa-solid fa-chevron-down chevron"></i>
                    </div>
                    <div class="multi-select-dropdown" id="venueDropdown">
                        <div class="multi-select-option" onclick="toggleVenueOption(1, event)">
                            <input type="checkbox" id="venueOpt1">
                            <label for="venueOpt1">AEON MALL JGC CGV 1</label>
                        </div>
                        <div class="multi-select-option" onclick="toggleVenueOption(2, event)">
                            <input type="checkbox" id="venueOpt2">
                            <label for="venueOpt2">AEON MALL TANJUNG BARAT</label>
                        </div>
                        <div class="multi-select-option" onclick="toggleVenueOption(3, event)">
                            <input type="checkbox" id="venueOpt3">
                            <label for="venueOpt3">PESONA SQUARE</label>
                        </div>
                        <div class="multi-select-option" onclick="toggleVenueOption(4, event)">
                            <input type="checkbox" id="venueOpt4">
                            <label for="venueOpt4">BLOK M SQUARE</label>
                        </div>
                        <div class="multi-select-option" onclick="toggleVenueOption(5, event)">
                            <input type="checkbox" id="venueOpt5">
                            <label for="venueOpt5">BLOK M XXI</label>
                        </div>
                    </div>
                </div>
                <div class="form-error" id="errVenue">Minimal pilih 1 venue</div>
            </div>
            <div style="grid-column:span 2;">
                <label class="form-label">Deskripsi</label>
                <textarea class="form-input" id="formDescription" rows="3" placeholder="Deskripsi singkat film..." style="resize:vertical;"></textarea>
            </div>
            <div>
                <label class="form-label">Status</label>
                <select class="form-select" id="formStatus">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                    <option value="cancelled">Cancelled</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <div>
                <label class="form-label">Harga Minimum (Rp)</label>
                <input type="number" class="form-input" id="formMinPrice" placeholder="35000" min="0">
                <div class="form-error" id="errMinPrice">Harga minimum wajib diisi</div>
            </div>
            <div>
                <label class="form-label">Harga Maksimum (Rp)</label>
                <input type="number" class="form-input" id="formMaxPrice" placeholder="150000" min="0">
                <div class="form-error" id="errMaxPrice">Harga maksimum wajib diisi</div>
            </div>
            <div>
                <label class="form-label">Tanggal Mulai</label>
                <input type="datetime-local" class="form-input" id="formStartAt">
                <div class="form-error" id="errStartAt">Tanggal mulai wajib diisi</div>
            </div>
            <div>
                <label class="form-label">Tanggal Selesai</label>
                <input type="datetime-local" class="form-input" id="formEndAt">
                <div class="form-error" id="errEndAt">Tanggal selesai wajib diisi</div>
            </div>
        </div>
        <div style="margin-top:24px;display:flex;justify-content:flex-end;gap:10px;">
            <button class="btn-ghost" onclick="closeFormModal()">Batal</button>
            <button class="btn-primary" id="formSubmitBtn" onclick="submitForm()"><i class="fa-solid fa-plus" style="font-size:12px;"></i> Simpan</button>
        </div>
    </div>
</div>

<!-- Modal: Detail -->
<div class="modal-overlay" id="detailModal">
    <div class="modal-box" onclick="event.stopPropagation()">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px;">
            <h3 style="font-family:'Space Grotesk',sans-serif;font-size:18px;font-weight:700;color:var(--fg);">
                Detail Film</h3>
            <button onclick="closeDetailModal()"
                style="width:32px;height:32px;border-radius:8px;background:#F1F5F9;border:1px solid var(--border);color:var(--fg-muted);cursor:pointer;display:flex;align-items:center;justify-content:center;transition:all 0.2s;"
                onmouseover="this.style.borderColor='var(--rose)';this.style.color='var(--rose)'"
                onmouseout="this.style.borderColor='var(--border)';this.style.color='var(--fg-muted)'"
                aria-label="Tutup"><i class="fa-solid fa-xmark" style="font-size:14px;"></i></button>
        </div>
        <div id="detailContent"></div>
        <div style="margin-top:20px;display:flex;justify-content:flex-end;"><button class="btn-ghost"
                onclick="closeDetailModal()">Tutup</button></div>
    </div>
</div>

<!-- Modal: Hapus -->
<div class="modal-overlay" id="deleteModal">
    <div class="modal-box" onclick="event.stopPropagation()" style="max-width:400px;text-align:center;">
        <div
            style="width:56px;height:56px;border-radius:50%;background:var(--rose-soft);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
            <i class="fa-solid fa-triangle-exclamation" style="color:var(--rose);font-size:24px;"></i>
        </div>
        <h3
            style="font-family:'Space Grotesk',sans-serif;font-size:18px;font-weight:700;color:var(--fg);margin-bottom:8px;">
            Hapus Film?</h3>
        <p style="font-size:13px;color:var(--fg-muted);margin-bottom:24px;" id="deleteMessage">Data yang dihapus
            tidak dapat dikembalikan.</p>
        <div style="display:flex;gap:10px;justify-content:center;"><button class="btn-ghost"
                onclick="closeDeleteModal()">Batal</button><button class="btn-danger" onclick="confirmDelete()"><i
                    class="fa-solid fa-trash" style="font-size:12px;"></i> Hapus</button></div>
    </div>
</div>

<!-- Toast -->
<div class="toast" id="toast">
    <i class="fa-solid fa-circle-check" id="toastIcon" style="font-size:16px;"></i>
    <span id="toastMessage"></span>
</div>

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
<script src="<?= base_url('assets/js/dashboard-detail.js') ?>"></script>
<?= $this->endSection() ?>