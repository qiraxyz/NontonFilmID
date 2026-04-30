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

/*  Variables  */
        var currentPage = 1;
        var perPage = 5;
        var editId = null;
        var deleteId = null;

        /*  Sample Data  */
        var eventsData = [
            { id: 1, category_id: 1, venue_ids: [3, 5], title: 'Avengers: Secret Wars', slug: 'avengers-secret-wars', description: 'Film superhero terbaru dari Marvel Studios yang menghadirkan pertarungan epik antar multiverse.', poster_url: '', status: 'published', min_price: 75000, max_price: 150000, start_at: '2025-07-15T10:00:00', end_at: '2025-08-15T22:00:00', created_at: '2025-03-01', updated_at: '2025-03-01' },
            { id: 2, category_id: 4, venue_ids: [1, 4], title: 'KKN di Desa Penari 2', slug: 'kkn-di-desa-penari-2', description: 'Sequel horor terseram yang mengisahkan kelanjutan teror di desa misterius.', poster_url: '', status: 'published', min_price: 50000, max_price: 100000, start_at: '2025-06-20T10:00:00', end_at: '2025-07-20T22:00:00', created_at: '2025-02-15', updated_at: '2025-02-15' },
            { id: 3, category_id: 1, venue_ids: [3], title: 'Spider-Man: Beyond', slug: 'spider-man-beyond', description: 'Petualangan baru Spider-Man melintasi dimensi yang belum pernah terjamah.', poster_url: '', status: 'draft', min_price: 75000, max_price: 150000, start_at: '2025-08-01T10:00:00', end_at: '2025-09-01T22:00:00', created_at: '2025-03-10', updated_at: '2025-03-10' },
            { id: 4, category_id: 8, venue_ids: [1, 2, 4], title: 'Dilan 1991', slug: 'dilan-1991', description: 'Kisah cinta legendaris Dilan dan Milea yang kembali menghiasi layar lebar.', poster_url: '', status: 'completed', min_price: 35000, max_price: 75000, start_at: '2025-01-25T10:00:00', end_at: '2025-02-25T22:00:00', created_at: '2024-12-01', updated_at: '2025-03-01' },
            { id: 5, category_id: 4, venue_ids: [4], title: 'Pengabdi Setan 3', slug: 'pengabdi-setan-3', description: 'Film horor ikonik karya Joko Anwar yang siap menggelegarkan bioskop.', poster_url: '', status: 'draft', min_price: 50000, max_price: 100000, start_at: '2025-10-31T18:00:00', end_at: '2025-11-30T22:00:00', created_at: '2025-04-01', updated_at: '2025-04-01' },
            { id: 6, category_id: 6, venue_ids: [2, 3], title: 'Inside Out 3', slug: 'inside-out-3', description: 'Petualangan emosi dalam pikiran kembali dengan cerita yang lebih menyentuh hati.', poster_url: '', status: 'published', min_price: 40000, max_price: 80000, start_at: '2025-06-15T10:00:00', end_at: '2025-07-15T22:00:00', created_at: '2025-02-01', updated_at: '2025-02-01' },
            { id: 7, category_id: 1, venue_ids: [5], title: 'John Wick 5', slug: 'john-wick-5', description: 'Aksi tak terhenti dari John Wick dalam misi terakhirnya.', poster_url: '', status: 'cancelled', min_price: 75000, max_price: 150000, start_at: '2025-05-10T10:00:00', end_at: '2025-06-10T22:00:00', created_at: '2025-01-10', updated_at: '2025-04-20' },
            { id: 8, category_id: 2, venue_ids: [1, 2, 5], title: 'Ada Apa dengan Cinta 3', slug: 'ada-apa-dengan-cinta-3', description: 'Kisah cinta Cinta dan Rangga yang melintasi waktu dan jarak.', poster_url: '', status: 'published', min_price: 35000, max_price: 75000, start_at: '2025-04-20T10:00:00', end_at: '2025-05-20T22:00:00', created_at: '2024-12-15', updated_at: '2025-04-20' },
            { id: 9, category_id: 5, venue_ids: [3, 4], title: 'Alien: Earth', slug: 'alien-earth', description: 'Ancaman alien yang mengancam bumi dalam film fiksi ilmiah yang menegangkan.', poster_url: '', status: 'draft', min_price: 75000, max_price: 150000, start_at: '2025-09-12T10:00:00', end_at: '2025-10-12T22:00:00', created_at: '2025-05-01', updated_at: '2025-05-01' },
            { id: 10, category_id: 6, venue_ids: [2], title: 'Kung Fu Panda 5', slug: 'kung-fu-panda-5', description: 'Po si panda lucu kembali dalam petualangan bela diri yang seru dan mengharukan.', poster_url: '', status: 'completed', min_price: 40000, max_price: 80000, start_at: '2025-03-08T10:00:00', end_at: '2025-04-08T22:00:00', created_at: '2024-11-20', updated_at: '2025-04-10' },
            { id: 11, category_id: 1, venue_ids: [3, 5], title: 'Fast & Furious 11', slug: 'fast-and-furious-11', description: 'Aksi balap liar dan misi penyelamatan dunia yang memacu adrenalin.', poster_url: '', status: 'published', min_price: 60000, max_price: 120000, start_at: '2025-07-04T10:00:00', end_at: '2025-08-04T22:00:00', created_at: '2025-03-15', updated_at: '2025-03-15' },
            { id: 12, category_id: 1, venue_ids: [3, 4, 5], title: 'The Batman 2', slug: 'the-batman-2', description: 'Kejahatan baru mengancam Gotham, Batman harus menghadapi musuh terberatnya.', poster_url: '', status: 'draft', min_price: 75000, max_price: 150000, start_at: '2025-11-15T10:00:00', end_at: '2025-12-15T22:00:00', created_at: '2025-05-10', updated_at: '2025-05-10' }
        ];

        var categoryMap = { 1: 'Action', 2: 'Drama', 3: 'Comedy', 4: 'Horror', 5: 'Sci-Fi', 6: 'Animation', 7: 'Thriller', 8: 'Romance' };
        var categoryReverseMap = { 'Action': 1, 'Drama': 2, 'Comedy': 3, 'Horror': 4, 'Sci-Fi': 5, 'Animation': 6, 'Thriller': 7, 'Romance': 8 };
        var venueMap = { 1: 'Studio 1', 2: 'Studio 2', 3: 'Studio IMAX', 4: 'Studio Premiere', 5: 'Studio Gold' };
        var selectedVenueIds = [];

        /*  Multi-select Venue  */
        function toggleVenueDropdown(e) {
            e.stopPropagation();
            var trigger = document.getElementById('venueTrigger');
            var dropdown = document.getElementById('venueDropdown');
            var isOpen = dropdown.classList.contains('open');
            if (isOpen) {
                closeVenueDropdown();
            } else {
                trigger.classList.add('open');
                dropdown.classList.add('open');
            }
        }

        function closeVenueDropdown() {
            document.getElementById('venueTrigger').classList.remove('open');
            document.getElementById('venueDropdown').classList.remove('open');
        }

        function toggleVenueOption(id, e) {
            e.stopPropagation();
            var idx = selectedVenueIds.indexOf(id);
            if (idx === -1) {
                selectedVenueIds.push(id);
            } else {
                selectedVenueIds.splice(idx, 1);
            }
            document.getElementById('venueOpt' + id).checked = (idx === -1);
            renderVenueTags();
        }

        function removeVenueTag(id, e) {
            e.stopPropagation();
            var idx = selectedVenueIds.indexOf(id);
            if (idx !== -1) selectedVenueIds.splice(idx, 1);
            document.getElementById('venueOpt' + id).checked = false;
            renderVenueTags();
        }

        function renderVenueTags() {
            var container = document.getElementById('venueTags');
            if (selectedVenueIds.length === 0) {
                container.innerHTML = '<span class="placeholder">Pilih venue...</span>';
            } else {
                var html = '';
                for (var i = 0; i < selectedVenueIds.length; i++) {
                    var vid = selectedVenueIds[i];
                    html += '<span class="multi-select-tag">' + escapeHtml(venueMap[vid]) +
                        '<span class="tag-remove" onclick="removeVenueTag(' + vid + ', event)"><i class="fa-solid fa-xmark"></i></span></span>';
                }
                container.innerHTML = html;
            }
            // Update option highlight
            for (var j = 1; j <= 5; j++) {
                var opt = document.getElementById('venueOpt' + j).closest('.multi-select-option');
                if (selectedVenueIds.indexOf(j) !== -1) {
                    opt.classList.add('selected');
                } else {
                    opt.classList.remove('selected');
                }
            }
        }

/*  Helpers  */
        function formatPrice(num) {
            return 'Rp ' + Number(num).toLocaleString('id-ID');
        }

        function formatDate(dateStr) {
            var d = new Date(dateStr);
            var months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
            return d.getDate() + ' ' + months[d.getMonth()] + ' ' + d.getFullYear();
        }

        function toDatetimeLocal(dateStr) {
            // Convert ISO string to datetime-local format (YYYY-MM-DDTHH:MM)
            var d = new Date(dateStr);
            var pad = function(n) { return n < 10 ? '0' + n : '' + n; };
            return d.getFullYear() + '-' + pad(d.getMonth() + 1) + '-' + pad(d.getDate()) + 'T' + pad(d.getHours()) + ':' + pad(d.getMinutes());
        }

        function generateSlug(text) {
            return text.toLowerCase().trim()
                .replace(/[\s]+/g, '-')
                .replace(/[^a-z0-9\-]+/g, '')
                .replace(/\-+/g, '-')
                .replace(/^\-|\-$/g, '');
        }

        function getEventById(id) {
            for (var i = 0; i < eventsData.length; i++) {
                if (eventsData[i].id === id) return eventsData[i];
            }
            return null;
        }

        function getNextId() {
            var max = 0;
            eventsData.forEach(function(e) { if (e.id > max) max = e.id; });
            return max + 1;
        }

        function statusBadgeHtml(status) {
            var label = status.charAt(0).toUpperCase() + status.slice(1);
            return '<span class="status-badge ' + status + '"><span class="status-dot"></span> ' + label + '</span>';
        }

        function actionHtml(id) {
            return '<div style="display:flex;gap:6px;justify-content:center;">' +
                '<button class="act-btn view" onclick="openDetail(' + id + ')" title="Lihat"><i class="fa-solid fa-eye"></i></button>' +
                '<button class="act-btn edit" onclick="openEditModal(' + id + ')" title="Edit"><i class="fa-solid fa-pen"></i></button>' +
                '<button class="act-btn delete" onclick="openDeleteModal(' + id + ')" title="Hapus"><i class="fa-solid fa-trash"></i></button>' +
                '</div>';
        }

        /*  Render Table  */
        function renderTable(data) {
            var tbody = document.getElementById('tableBody');
            var html = '';
            for (var i = 0; i < data.length; i++) {
                var e = data[i];
                var cat = categoryMap[e.category_id] || 'Unknown';
                html += '<tr data-id="' + e.id + '" data-matches="1">' +
                    '<td style="color:var(--fg-dim);font-weight:500;">' + e.id + '</td>' +
                    '<td style="font-weight:600;">' + escapeHtml(e.title) + '</td>' +
                    '<td style="color:var(--fg-muted);">' + cat + '</td>' +
                    '<td>' + getVenueNamesHtml(e.venue_ids) + '</td>' +
                    '<td style="color:var(--fg);font-weight:500;">' + formatPrice(e.min_price) + ' - ' + formatPrice(e.max_price) + '</td>' +
                    '<td>' + statusBadgeHtml(e.status) + '</td>' +
                    '<td style="color:var(--fg-muted);">' + formatDate(e.start_at) + '</td>' +
                    '<td style="text-align:center;">' + actionHtml(e.id) + '</td>' +
                    '</tr>';
            }
            tbody.innerHTML = html;
        }

        function escapeHtml(text) {
            var div = document.createElement('div');
            div.appendChild(document.createTextNode(text));
            return div.innerHTML;
        }

        /*  Filter  */
        function getMatchingRows() {
            return Array.from(document.querySelectorAll('#tableBody tr[data-matches="1"]'));
        }

        function applyFilter() {
            var kw = document.getElementById('searchInput').value.toLowerCase();
            var cat = document.getElementById('filterCategory').value;
            var st = document.getElementById('filterStatus').value;
            var vn = document.getElementById('filterVenue').value;
            var rows = document.querySelectorAll('#tableBody tr');
            for (var i = 0; i < rows.length; i++) {
                var id = parseInt(rows[i].getAttribute('data-id'));
                var e = getEventById(id);
                if (!e) { rows[i].setAttribute('data-matches', '0'); continue; }
                var matchKw = !kw || e.title.toLowerCase().indexOf(kw) !== -1;
                var matchCat = !cat || (categoryMap[e.category_id] === cat);
                var matchSt = !st || e.status === st;
                var matchVn = !vn || (e.venue_ids && e.venue_ids.indexOf(parseInt(vn)) !== -1);
                rows[i].setAttribute('data-matches', (matchKw && matchCat && matchSt && matchVn) ? '1' : '0');
            }
        }

        /*  Pagination  */
        function showPage(page) {
            var matching = getMatchingRows();
            var total = matching.length;
            var totalPages = Math.max(1, Math.ceil(total / perPage));
            if (page < 1) page = 1;
            if (page > totalPages) page = totalPages;
            currentPage = page;

            var rows = document.querySelectorAll('#tableBody tr');
            for (var i = 0; i < rows.length; i++) {
                rows[i].style.display = 'none';
            }

            var start = (page - 1) * perPage;
            var end = Math.min(start + perPage, total);
            for (var i = start; i < end; i++) {
                matching[i].style.display = '';
            }

            if (total === 0) {
                document.getElementById('emptyState').style.display = '';
                document.getElementById('tableInfo').textContent = 'Tidak ada data ditemukan';
                document.getElementById('paginationButtons').innerHTML = '';
            } else {
                document.getElementById('emptyState').style.display = 'none';
                document.getElementById('tableInfo').textContent = 'Menampilkan ' + (start + 1) + '-' + end + ' dari ' + total + ' data';
                renderPagination(totalPages);
            }
        }

        function renderPagination(totalPages) {
            var cur = currentPage;
            var html = '';

            // Prev button
            html += '<button class="page-btn' + (cur <= 1 ? ' disabled' : '') + '" onclick="goToPage(' + (cur - 1) + ')"><i class="fa-solid fa-chevron-left" style="font-size:11px;"></i></button>';

            if (totalPages <= 7) {
                for (var i = 1; i <= totalPages; i++) {
                    html += '<button class="page-btn' + (i === cur ? ' active' : '') + '" onclick="goToPage(' + i + ')">' + i + '</button>';
                }
            } else {
                // Always show page 1
                html += '<button class="page-btn' + (1 === cur ? ' active' : '') + '" onclick="goToPage(1)">1</button>';

                if (cur <= 4) {
                    for (var i = 2; i <= 5; i++) {
                        html += '<button class="page-btn' + (i === cur ? ' active' : '') + '" onclick="goToPage(' + i + ')">' + i + '</button>';
                    }
                    html += '<span class="page-btn ellipsis">...</span>';
                    html += '<button class="page-btn' + (totalPages === cur ? ' active' : '') + '" onclick="goToPage(' + totalPages + ')">' + totalPages + '</button>';
                } else if (cur >= totalPages - 3) {
                    html += '<span class="page-btn ellipsis">...</span>';
                    for (var i = totalPages - 4; i <= totalPages; i++) {
                        html += '<button class="page-btn' + (i === cur ? ' active' : '') + '" onclick="goToPage(' + i + ')">' + i + '</button>';
                    }
                } else {
                    html += '<span class="page-btn ellipsis">...</span>';
                    for (var i = cur - 1; i <= cur + 1; i++) {
                        html += '<button class="page-btn' + (i === cur ? ' active' : '') + '" onclick="goToPage(' + i + ')">' + i + '</button>';
                    }
                    html += '<span class="page-btn ellipsis">...</span>';
                    html += '<button class="page-btn' + (totalPages === cur ? ' active' : '') + '" onclick="goToPage(' + totalPages + ')">' + totalPages + '</button>';
                }
            }

            // Next button
            html += '<button class="page-btn' + (cur >= totalPages ? ' disabled' : '') + '" onclick="goToPage(' + (cur + 1) + ')"><i class="fa-solid fa-chevron-right" style="font-size:11px;"></i></button>';

            document.getElementById('paginationButtons').innerHTML = html;
        }

        function goToPage(page) {
            showPage(page);
        }

        function filterTable() {
            applyFilter();
            showPage(1);
        }

        /*  Auto Slug  */
        function autoSlug() {
            var title = document.getElementById('formTitle').value;
            document.getElementById('formSlug').value = generateSlug(title);
        }

        /*  CRUD: Add  */
        function openAddModal() {
            editId = null;
            document.getElementById('formModalTitle').textContent = 'Tambah Film';
            document.getElementById('formSubmitBtn').innerHTML = '<i class="fa-solid fa-plus" style="font-size:12px;"></i> Simpan';
            clearForm();
            document.getElementById('formModal').classList.add('active');
            setTimeout(function () {
                document.getElementById('formTitle').focus();
            }, 100);
        }

        /*  CRUD: Edit  */
        function openEditModal(id) {
            editId = id;
            document.getElementById('formModalTitle').textContent = 'Edit Film';
            document.getElementById('formSubmitBtn').innerHTML = '<i class="fa-solid fa-pen" style="font-size:12px;"></i> Perbarui';
            clearForm();
            var e = getEventById(id);
            if (!e) return;
            document.getElementById('formTitle').value = e.title;
            document.getElementById('formSlug').value = e.slug;
            document.getElementById('formCategory').value = categoryMap[e.category_id] || '';
            setVenueSelection(e.venue_ids || []);
            document.getElementById('formDescription').value = e.description || '';
            document.getElementById('formStatus').value = e.status;
            document.getElementById('formMinPrice').value = e.min_price;
            document.getElementById('formMaxPrice').value = e.max_price;
            document.getElementById('formStartAt').value = toDatetimeLocal(e.start_at);
            document.getElementById('formEndAt').value = toDatetimeLocal(e.end_at);
            document.getElementById('formModal').classList.add('active');
            setTimeout(function () {
                document.getElementById('formTitle').focus();
            }, 100);
        }

        function closeFormModal() {
            document.getElementById('formModal').classList.remove('active');
            clearForm();
        }

        function clearForm() {
            document.getElementById('formTitle').value = '';
            document.getElementById('formSlug').value = '';
            document.getElementById('formCategory').value = '';
            setVenueSelection([]);
            document.getElementById('formDescription').value = '';
            document.getElementById('formStatus').value = 'draft';
            document.getElementById('formMinPrice').value = '';
            document.getElementById('formMaxPrice').value = '';
            document.getElementById('formStartAt').value = '';
            document.getElementById('formEndAt').value = '';
            hideAllErrors();
        }

        function hideAllErrors() {
            document.querySelectorAll('.form-error').forEach(function (el) {
                el.classList.remove('visible');
            });
        }

        /*  Submit  */
        function submitForm() {
            hideAllErrors();
            var valid = true;

            var title = document.getElementById('formTitle').value.trim();
            var slug = document.getElementById('formSlug').value.trim();
            var category = document.getElementById('formCategory').value;
            var venueIds = selectedVenueIds.slice();
            var description = document.getElementById('formDescription').value.trim();
            var status = document.getElementById('formStatus').value;
            var minPrice = document.getElementById('formMinPrice').value;
            var maxPrice = document.getElementById('formMaxPrice').value;
            var startAt = document.getElementById('formStartAt').value;
            var endAt = document.getElementById('formEndAt').value;

            if (!title) { document.getElementById('errTitle').classList.add('visible'); valid = false; }
            if (!slug) { document.getElementById('errSlug').classList.add('visible'); valid = false; }
            if (!category) { document.getElementById('errCategory').classList.add('visible'); valid = false; }
            if (venueIds.length === 0) { document.getElementById('errVenue').classList.add('visible'); valid = false; }
            if (!minPrice || parseInt(minPrice) < 0) { document.getElementById('errMinPrice').classList.add('visible'); valid = false; }
            if (!maxPrice || parseInt(maxPrice) < 0) { document.getElementById('errMaxPrice').classList.add('visible'); valid = false; }
            if (!startAt) { document.getElementById('errStartAt').classList.add('visible'); valid = false; }
            if (!endAt) { document.getElementById('errEndAt').classList.add('visible'); valid = false; }

            if (!valid) return;

            minPrice = parseInt(minPrice);
            maxPrice = parseInt(maxPrice);
            var categoryId = categoryReverseMap[category] || 0;

            if (editId !== null) {
                // Update existing
                var e = getEventById(editId);
                if (e) {
                    e.title = title;
                    e.slug = slug;
                    e.category_id = categoryId;
                    e.venue_ids = venueIds;
                    e.description = description;
                    e.status = status;
                    e.min_price = minPrice;
                    e.max_price = maxPrice;
                    e.start_at = startAt;
                    e.end_at = endAt;
                    e.updated_at = new Date().toISOString().slice(0, 10);
                }
                showToast('Film berhasil diperbarui!', 'var(--accent)');
            } else {
                // Add new
                var newEvent = {
                    id: getNextId(),
                    category_id: categoryId,
                    venue_ids: venueIds,
                    title: title,
                    slug: slug,
                    description: description,
                    poster_url: '',
                    status: status,
                    min_price: minPrice,
                    max_price: maxPrice,
                    start_at: startAt,
                    end_at: endAt,
                    created_at: new Date().toISOString().slice(0, 10),
                    updated_at: new Date().toISOString().slice(0, 10)
                };
                eventsData.push(newEvent);
                showToast('Film berhasil ditambahkan!', 'var(--teal)');
            }

            closeFormModal();
            renderTable(eventsData);
            updateStats();
            filterTable();
        }

        /*  Detail  */
        function openDetail(id) {
            var e = getEventById(id);
            if (!e) return;
            var cat = categoryMap[e.category_id] || 'Unknown';
            var venueText = getVenueNamesText(e.venue_ids);
            document.getElementById('detailContent').innerHTML =
                '<div class="detail-row"><span class="detail-label">ID</span><span class="detail-value">' + e.id + '</span></div>' +
                '<div class="detail-row"><span class="detail-label">Judul Film</span><span class="detail-value">' + escapeHtml(e.title) + '</span></div>' +
                '<div class="detail-row"><span class="detail-label">Slug</span><span class="detail-value" style="font-weight:400;color:var(--fg-muted);">' + escapeHtml(e.slug) + '</span></div>' +
                '<div class="detail-row"><span class="detail-label">Kategori</span><span class="detail-value">' + cat + '</span></div>' +
                '<div class="detail-row"><span class="detail-label">Venue</span><span class="detail-value" style="font-weight:400;text-align:right;max-width:65%;">' + getVenueNamesHtml(e.venue_ids) + '</span></div>' +
                '<div class="detail-row"><span class="detail-label">Deskripsi</span><span class="detail-value" style="font-weight:400;text-align:right;max-width:65%;line-height:1.5;">' + escapeHtml(e.description || '-') + '</span></div>' +
                '<div class="detail-row"><span class="detail-label">Status</span><span class="detail-value">' + statusBadgeHtml(e.status) + '</span></div>' +
                '<div class="detail-row"><span class="detail-label">Harga</span><span class="detail-value">' + formatPrice(e.min_price) + ' - ' + formatPrice(e.max_price) + '</span></div>' +
                '<div class="detail-row"><span class="detail-label">Tanggal Mulai</span><span class="detail-value">' + formatDate(e.start_at) + '</span></div>' +
                '<div class="detail-row"><span class="detail-label">Tanggal Selesai</span><span class="detail-value">' + formatDate(e.end_at) + '</span></div>' +
                '<div class="detail-row"><span class="detail-label">Dibuat</span><span class="detail-value">' + formatDate(e.created_at) + '</span></div>' +
                '<div class="detail-row"><span class="detail-label">Diperbarui</span><span class="detail-value">' + formatDate(e.updated_at) + '</span></div>';
            document.getElementById('detailModal').classList.add('active');
        }

        function closeDetailModal() {
            document.getElementById('detailModal').classList.remove('active');
        }

        /*  Delete  */
        function openDeleteModal(id) {
            deleteId = id;
            var e = getEventById(id);
            document.getElementById('deleteMessage').textContent = 'Apakah Anda yakin ingin menghapus "' + (e ? e.title : '') + '"? Data yang dihapus tidak dapat dikembalikan.';
            document.getElementById('deleteModal').classList.add('active');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('active');
            deleteId = null;
        }

        function confirmDelete() {
            if (deleteId === null) return;
            var e = getEventById(deleteId);
            if (e) {
                var title = e.title;
                eventsData = eventsData.filter(function(item) { return item.id !== deleteId; });
                showToast('"' + title + '" berhasil dihapus!', 'var(--rose)');
                renderTable(eventsData);
                updateStats();
                filterTable();
            }
            closeDeleteModal();
        }

        /*  Stats  */
        function updateStats() {
            var total = eventsData.length;
            var published = 0, draft = 0, completed = 0;
            eventsData.forEach(function (e) {
                if (e.status === 'published') published++;
                if (e.status === 'draft') draft++;
                if (e.status === 'completed') completed++;
            });
            document.getElementById('statTotal').textContent = total;
            document.getElementById('statPublished').textContent = published;
            document.getElementById('statDraft').textContent = draft;
            document.getElementById('statCompleted').textContent = completed;
        }

        function setVenueSelection(ids) {
            selectedVenueIds = ids.slice();
            for (var j = 1; j <= 5; j++) {
                document.getElementById('venueOpt' + j).checked = (selectedVenueIds.indexOf(j) !== -1);
            }
            renderVenueTags();
        }

        function getVenueNamesHtml(ids) {
            if (!ids || ids.length === 0) return '<span style="color:var(--fg-dim);">-</span>';
            var html = '<div class="venue-list">';
            for (var i = 0; i < ids.length; i++) {
                html += '<span class="venue-badge">' + escapeHtml(venueMap[ids[i]] || 'Unknown') + '</span>';
            }
            html += '</div>';
            return html;
        }

        function getVenueNamesText(ids) {
            if (!ids || ids.length === 0) return '-';
            return ids.map(function(id) { return venueMap[id] || 'Unknown'; }).join(', ');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            var ms = document.getElementById('venueMultiSelect');
            if (ms && !ms.contains(e.target)) closeVenueDropdown();
        });