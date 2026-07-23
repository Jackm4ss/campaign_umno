        (function initNewAdminDashboard() {
      const items = [
        {
          id: 1,
          name: 'Sorotan Tengku Hafiz: Tak Banyak Alasan Untuk Berkhidmat',
          category: 'CMS',
          date: '2026-06-22',
          status: 'Aktif',
          location: 'Hero & Galeri Frontpage',
          image: 'assets/hafiz-tak-banyak-alasan.jpg',
          desc: 'Konten utama Tengku Muhammad Hafiz Tengku Adnan untuk hero, galeri dan sorotan penerangan Putrajaya.'
        },
        {
          id: 2,
          name: 'Profil Datuk Seri Tengku Adnan Tengku Mansor',
          category: 'Pimpinan',
          date: '2026-06-22',
          status: 'Aktif',
          location: 'Modul Pimpinan',
          image: 'assets/adnan-profile.jpg',
          desc: 'Profil Ketua UMNO Bahagian Putrajaya dan Bendahari UMNO untuk frontpage serta halaman detail.'
        },
        {
          id: 3,
          name: 'Artikel Sumbangan Tak Banyak Alasan Demi Rakyat',
          category: 'Artikel',
          date: '2025-07-30',
          status: 'Aktif',
          location: 'Modul Artikel',
          image: 'assets/adnan-sumbangan-2025.jpeg',
          desc: 'Artikel utama mengenai komitmen Tengku Adnan terhadap khidmat masyarakat dan bantuan di Putrajaya.'
        },
        {
          id: 4,
          name: 'Galeri Tengku Hafiz & Tengku Adnan',
          category: 'CMS',
          date: '2026-06-22',
          status: 'Aktif',
          location: 'Hero, Galeri, Kegiatan, Artikel',
          image: 'assets/hafiz-inisiatif-2024.jpeg',
          desc: 'Dua belas foto lokal telah diselaraskan untuk paparan frontpage dan pratinjau admin panel.'
        }
      ];

      const members = [
        {
          id: 1,
          name: 'Nur Aisyah Binti Rahman',
          kp: '950812-14-4821',
          presint: 'Presint 9',
          aid: 'Katil Hospital',
          date: '16 Jun 2026',
          status: 'Belum Tindakan'
        },
        {
          id: 2,
          name: 'Mohd Hafiz Bin Salleh',
          kp: '880315-10-1190',
          presint: 'Presint 11',
          aid: 'Makanan Asas',
          date: '15 Jun 2026',
          status: 'Dirancang'
        },
        {
          id: 3,
          name: 'Siti Mariam Binti Noor',
          kp: '921104-14-7304',
          presint: 'Presint 14',
          aid: 'Wang Tunai RM300',
          date: '14 Jun 2026',
          status: 'Selesai'
        }
      ];

      const events = [
        {
          id: 1,
          title: 'Sumbangan “Tak Banyak Alasan” Demi Amanah Membela Rakyat',
          category: 'Khidmat Rakyat',
          date: '2025-07-30T12:00',
          place: 'Putrajaya',
          address: 'Putrajaya, Wilayah Persekutuan',
          status: 'Past',
          map: 'https://maps.google.com/',
          image: 'assets/adnan-sumbangan-2025.jpeg',
          desc: 'Sorotan komitmen Datuk Seri Tengku Adnan Tengku Mansor dalam meneruskan bantuan dan khidmat kepada masyarakat.'
        },
        {
          id: 2,
          title: 'Maidatul Rahman Putrajaya Bersama Tengku Adnan',
          category: 'Ramadan',
          date: '2026-02-24T18:00',
          place: 'Putrajaya',
          address: 'Putrajaya, Wilayah Persekutuan',
          status: 'Past',
          map: 'https://maps.google.com/',
          image: 'assets/adnan-ramadan-2026.jpeg',
          desc: 'Program berbuka puasa beramai-ramai yang meneruskan tradisi kebersamaan masyarakat Putrajaya.'
        },
        {
          id: 3,
          title: 'UMNO 78 Tahun: Hayati Nilai Perjuangan',
          category: 'Penerangan',
          date: '2024-05-08T18:15',
          place: 'Kuala Lumpur',
          address: 'Kuala Lumpur, Malaysia',
          status: 'Past',
          map: 'https://maps.google.com/',
          image: 'assets/hafiz-umno-78.jpeg',
          desc: 'Tengku Hafiz mengajak generasi muda menghayati sejarah, perpaduan dan kesinambungan perjuangan.'
        },
        {
          id: 4,
          title: 'Inisiatif Bersama Rakyat Tetap Dilaksana',
          category: 'Kebajikan',
          date: '2024-10-14T14:22',
          place: 'Putrajaya',
          address: 'Putrajaya, Wilayah Persekutuan',
          status: 'Past',
          map: 'https://maps.google.com/',
          image: 'assets/hafiz-inisiatif-2024.jpeg',
          desc: 'Tengku Hafiz memaklumkan usaha mendekati rakyat dan menyalurkan bantuan terus dilaksanakan.'
        }
      ];

      const articles = [
        {
          id: 1,
          title: 'Sumbangan “Tak Banyak Alasan” Demi Amanah Membela Rakyat',
          author: 'Editorial Putrajaya',
          category: 'Khidmat Rakyat',
          date: '2025-07-30',
          image: 'assets/adnan-sumbangan-2025.jpeg',
          body: 'Datuk Seri Tengku Adnan Tengku Mansor menegaskan bahawa perjuangan perlu diterjemahkan melalui tindakan, bantuan langsung dan kehadiran kepimpinan bersama masyarakat Putrajaya.',
          status: 'Published'
        },
        {
          id: 2,
          title: 'Tengku Adnan Imarahkan Ramadan Dengan Maidatul Rahman Putrajaya',
          author: 'Editorial Putrajaya',
          category: 'Ramadan',
          date: '2026-02-24',
          image: 'assets/adnan-ramadan-2026.jpeg',
          body: 'Program Maidatul Rahman menjadi ruang kebersamaan warga Putrajaya dan meneruskan tradisi program kemasyarakatan sepanjang Ramadan.',
          status: 'Published'
        },
        {
          id: 3,
          title: 'Program Sumbangan Nur Ramadan 2026 Diteruskan',
          author: 'Editorial Putrajaya',
          category: 'Kebajikan',
          date: '2026-02-20',
          image: 'assets/adnan-nur-ramadan-2026.jpeg',
          body: 'Bantuan diteruskan kepada warga emas, OKU dan keluarga yang memerlukan di sekitar Putrajaya.',
          status: 'Published'
        },
        {
          id: 4,
          title: 'UMNO 78 Tahun: Tengku Hafiz Ajak Generasi Muda Hayati Nilai Perjuangan',
          author: 'Editorial Putrajaya',
          category: 'Perjuangan',
          date: '2024-05-08',
          image: 'assets/hafiz-umno-78.jpeg',
          body: 'Tengku Muhammad Hafiz Tengku Adnan menyeru generasi muda menghayati sejarah, perpaduan dan tanggungjawab meneruskan perjuangan.',
          status: 'Published'
        },
        {
          id: 5,
          title: 'Tengku Hafiz: Inisiatif Bersama Rakyat Tetap Dilaksana',
          author: 'Editorial Putrajaya',
          category: 'Inisiatif Rakyat',
          date: '2024-10-14',
          image: 'assets/hafiz-inisiatif-2024.jpeg',
          body: 'Gerak kerja mendekati rakyat dan menyalurkan bantuan kepada warga yang memerlukan terus menjadi fokus di Putrajaya.',
          status: 'Published'
        },
        {
          id: 6,
          title: 'Tengku Hafiz Dilantik AJK Pemuda UMNO Malaysia 2023–2026',
          author: 'Editorial Putrajaya',
          category: 'Pemuda',
          date: '2023-04-04',
          image: 'assets/hafiz-profile.jpg',
          body: 'Pelantikan Tengku Hafiz melengkapi peranannya sebagai Ketua Penerangan UMNO Bahagian Putrajaya serta memperluas gerak kerja anak muda.',
          status: 'Published'
        }
      ];

      try {
        const savedMembers = JSON.parse(localStorage.getItem('tbaAdminMembers') || 'null');
        if (Array.isArray(savedMembers)) members.splice(0, members.length, ...savedMembers);
        const savedEvents = JSON.parse(localStorage.getItem('tbaAdminEvents') || 'null');
        if (Array.isArray(savedEvents)) events.splice(0, events.length, ...savedEvents);
        const savedArticles = JSON.parse(localStorage.getItem('tbaAdminArticles') || 'null');
        if (Array.isArray(savedArticles)) articles.splice(0, articles.length, ...savedArticles);
      } catch (error) {}
      const state = {
        selectedId: items[0].id,
        editingId: null,
        editingMemberId: null,
        editingEventId: null,
        editingArticleId: null,
        filter: 'all'
      };

      const table = document.getElementById('admWorkTable');
      const search = document.getElementById('admSearchInput');
      const modal = document.getElementById('admItemModal');
      const form = document.getElementById('admItemForm');
      const modalTitle = document.getElementById('admModalTitle');
      const menuToggle = document.getElementById('admMenuToggle');
      const mobileMenu = document.getElementById('admMobileMenu');
      const feedback = document.getElementById('admFeedback');
      let feedbackTimer;

      // Modals
      const eventModal = document.getElementById('admEventModal');
      const articleModal = document.getElementById('admArticleModal');
      const cmsModal = document.getElementById('admCmsModal');
      const memberModal = document.getElementById('admMemberModal');
      const itemPreviewModal = document.getElementById('admItemPreviewModal');
      const proofModal = document.getElementById('admProofModal');
      const articlePreviewModal = document.getElementById('admArticlePreviewModal');
      const eventPreviewModal = document.getElementById('admEventPreviewModal');
      const cmsPreviewModal = document.getElementById('admCmsPreviewModal');

      // Delete confirmation state & elements
      const deleteConfirmModal = document.getElementById('admDeleteConfirmModal');
      const deleteConfirmTargetName = document.getElementById('deleteConfirmTargetName');
      const deleteConfirmStep1 = document.getElementById('deleteConfirmStep1');
      const deleteConfirmStep2 = document.getElementById('deleteConfirmStep2');
      let deleteTarget = { type: '', id: null, name: '' };

      function openDeleteConfirm(type, id, name) {
        deleteTarget = { type, id, name };
        deleteConfirmTargetName.textContent = name;
        deleteConfirmStep1.style.display = 'block';
        deleteConfirmStep2.style.display = 'none';
        deleteConfirmModal.classList.add('open');
        showFeedback(`Pengesahan padam untuk "${name}".`);
      }

      function closeDeleteConfirm() {
        deleteConfirmModal.classList.remove('open');
        deleteTarget = { type: '', id: null, name: '' };
      }

      // Reset legacy prototype content once so frontpage and admin start from
      // the same curated presentation dataset.
      const curatedDataVersion = 'tengku-putrajaya-2026-06-22-v1';
      if (localStorage.getItem('tbaCuratedDataVersion') !== curatedDataVersion) {
        localStorage.removeItem('tbaCmsFrontpageData');
        localStorage.setItem('tbaCuratedDataVersion', curatedDataVersion);
      }

      // Load saved CMS data from localStorage if available
      const savedCms = localStorage.getItem('tbaCmsFrontpageData');
      const cmsData = savedCms ? JSON.parse(savedCms) : {
        hero: {
          module: 'Hero',
          status: 'Published',
          title: 'Tengku Hafiz: Tak Banyak Alasan Untuk Berkhidmat',
          image: 'assets/hafiz-tak-banyak-alasan.jpg',
          desc: 'Sorotan gerak kerja Tengku Muhammad Hafiz Tengku Adnan dan Datuk Seri Tengku Adnan Tengku Mansor di Putrajaya.'
        },
        events: {
          module: 'Events',
          status: 'Published',
          title: 'Sumbangan Tak Banyak Alasan Demi Rakyat',
          image: 'assets/adnan-sumbangan-2025.jpeg',
          desc: 'Program bantuan, Ramadan, penerangan dan khidmat masyarakat bersama kepimpinan UMNO Putrajaya.'
        },
        articles: {
          module: 'Artikel',
          status: 'Published',
          title: 'Sumbangan “Tak Banyak Alasan” Demi Amanah Membela Rakyat',
          image: 'assets/adnan-sumbangan-2025.jpeg',
          desc: 'Artikel utama mengenai komitmen Tengku Adnan dan kesinambungan khidmat masyarakat Putrajaya.'
        },
        leaders: {
          module: 'Pimpinan',
          status: 'Published',
          title: 'Tengku Adnan & Tengku Hafiz',
          image: 'assets/adnan-profile.jpg',
          desc: 'Profil dua tokoh utama UMNO Bahagian Putrajaya, jawatan dan fokus gerak kerja masyarakat.'
        }
      };

      function syncCmsCards() {
        Object.keys(cmsData).forEach(key => {
          const item = cmsData[key];
          const card = document.querySelector(`.adm-module-card[data-cms-key="${key}"]`);
          if (card) {
            card.querySelector('h3').textContent = item.title;
            card.querySelector('p').textContent = item.desc.substring(0, 50) + (item.desc.length > 50 ? '...' : '');
          }
        });
      }

      function showFeedback(message, type = 'success') {
        if (!feedback) return;
        clearTimeout(feedbackTimer);
        feedback.textContent = message;
        feedback.className = `adm-feedback show${type === 'error' ? ' error' : ''}`;
        feedbackTimer = setTimeout(() => feedback.classList.remove('show'), 3200);
      }

      function exportCsv(filename, columns, rows) {
        const escape = (value) => `"${String(value ?? '').replaceAll('"', '""')}"`;
        const content = [columns.map(escape).join(','), ...rows.map((row) => row.map(escape).join(','))].join('\r\n');
        const url = URL.createObjectURL(new Blob([`\uFEFF${content}`], { type: 'text/csv;charset=utf-8;' }));
        const link = document.createElement('a');
        link.href = url;
        link.download = filename;
        document.body.appendChild(link);
        link.click();
        link.remove();
        URL.revokeObjectURL(url);
      }

      function animateNumbers(section) {
        document.querySelectorAll(`#adm-view-${section} .adm-value`).forEach((el) => {
          const text = el.getAttribute('data-val') || el.innerText.trim();
          if (!el.hasAttribute('data-val')) el.setAttribute('data-val', text);
          
          const finalVal = parseInt(text.replace(/,/g, ''), 10);
          if (isNaN(finalVal)) return;

          const duration = 1000;
          const startTime = performance.now();

          function update(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const easeProgress = progress === 1 ? 1 : 1 - Math.pow(2, -10 * progress);
            
            const currentVal = Math.floor(easeProgress * finalVal);
            el.innerText = currentVal.toLocaleString('en-US');

            if (progress < 1) {
              requestAnimationFrame(update);
            }
          }
          requestAnimationFrame(update);
        });
      }

      function switchView(section) {
        document.querySelectorAll('.adm-link').forEach((item) => item.classList.remove('active'));
        document.querySelectorAll(`.adm-link[data-adm-section="${section}"]`).forEach((item) => item.classList.add('active'));
        document.querySelectorAll('.adm-view').forEach((view) => view.classList.remove('active'));

        const target = document.getElementById(`adm-view-${section}`);
        if (target) target.classList.add('active');

        mobileMenu.classList.remove('open');
        menuToggle.setAttribute('aria-expanded', 'false');
        showFeedback(`Membuka modul ${section}.`);
        
        animateNumbers(section);
      }

      function formatDate(value) {
        if (!value) return '';
        const date = new Date(value + 'T00:00:00');
        if (isNaN(date.getTime())) return value; // Return as-is if string date
        return date.toLocaleDateString('ms-MY', {
          day: 'numeric',
          month: 'short',
          year: 'numeric'
        });
      }

      function statusClass(status) {
        if (status === 'Aktif' || status === 'Ongoing' || status === 'Published' || status === 'Selesai') return 'active';
        if (status === 'Menunggu' || status === 'Upcoming' || status === 'Dirancang') return 'pending';
        return 'draft';
      }

      // ==========================================================================
      // OVERVIEW VIEW ACTIONS
      // ==========================================================================

      function visibleItems() {
        const term = search.value.trim().toLowerCase();
        return items.filter((item) => {
          const matchesFilter = state.filter === 'all' || item.status === state.filter;
          const haystack = [item.name, item.category, item.status, item.location, item.desc].join(' ').toLowerCase();
          return matchesFilter && haystack.includes(term);
        });
      }

      function renderTable() {
        const rows = visibleItems();
        table.innerHTML = '';

        if (!rows.length) {
          table.innerHTML = `
            <tr class="adm-empty-row">
              <td class="adm-empty-cell" colspan="5">
                <div class="adm-table-title">Tiada data ditemui</div>
                <div class="adm-table-sub">Cuba ubah kata carian atau filter status.</div>
              </td>
            </tr>
          `;
          return;
        }

        rows.forEach((item) => {
          const row = document.createElement('tr');
          row.className = item.id === state.selectedId ? 'selected' : '';
          row.innerHTML = `
            <td data-label="Item">
              <div class="adm-work-main" style="display:flex; align-items:center; gap:12px;">
                <img src="${item.image || 'umno-logo.jpg'}" class="adm-table-img" alt="Thumb">
                <div>
                  <div class="adm-table-title">${item.name}</div>
                  <div class="adm-table-sub">${item.location}</div>
                </div>
              </div>
            </td>
            <td data-label="Kategori">${item.category}</td>
            <td data-label="Tarikh">${formatDate(item.date)}</td>
            <td data-label="Status"><span class="adm-badge ${statusClass(item.status)}">${item.status}</span></td>
            <td data-label="Tindakan">
              <div class="adm-actions">
                <button class="adm-mini" type="button" data-adm-action="view" data-adm-id="${item.id}">Semak</button>
                <button class="adm-mini" type="button" data-adm-action="edit" data-adm-id="${item.id}">Kemaskini</button>
                <button class="adm-mini danger" type="button" data-adm-action="delete" data-adm-id="${item.id}">Padam</button>
              </div>
            </td>
          `;
          row.addEventListener('click', () => {
            state.selectedId = item.id;
            document.querySelectorAll('#admWorkTable tr').forEach(r => r.classList.remove('selected'));
            row.classList.add('selected');
          });
          table.appendChild(row);
        });
      }

      function showItemPreview(id) {
        const item = items.find((entry) => entry.id === id);
        if (!item) return;

        document.getElementById('previewItemName').textContent = item.name;
        document.getElementById('previewItemDesc').textContent = item.desc;
        document.getElementById('previewItemCategory').textContent = item.category;
        document.getElementById('previewItemDate').textContent = formatDate(item.date);
        document.getElementById('previewItemLocation').textContent = item.location;
        
        const statusSpan = document.getElementById('previewItemStatus');
        statusSpan.textContent = item.status;
        statusSpan.className = `adm-badge ${statusClass(item.status)}`;

        itemPreviewModal.classList.add('open');
        showFeedback(`Memaparkan butiran "${item.name}".`);
      }

      function openModal(item) {
        form.reset();
        state.editingId = item ? item.id : null;
        modalTitle.textContent = item ? 'Kemaskini Item' : 'Tambah Kegiatan';

        if (item) {
          form.elements.name.value = item.name;
          form.elements.category.value = item.category;
          form.elements.date.value = item.date;
          form.elements.status.value = item.status;
          form.elements.location.value = item.location;
          form.elements.desc.value = item.desc;
        }

        modal.classList.add('open');
        modal.setAttribute('aria-hidden', 'false');
        form.elements.name.focus();
      }

      function closeModal() {
        modal.classList.remove('open');
        modal.setAttribute('aria-hidden', 'true');
        state.editingId = null;
      }

      function saveItem(event) {
        event.preventDefault();

        const payload = {
          name: form.elements.name.value.trim(),
          category: form.elements.category.value,
          date: form.elements.date.value,
          status: form.elements.status.value,
          location: form.elements.location.value.trim(),
          desc: form.elements.desc.value.trim()
        };

        if (state.editingId) {
          const index = items.findIndex((item) => item.id === state.editingId);
          if (index >= 0) {
            items[index] = { ...items[index], ...payload };
            state.selectedId = items[index].id;
          }
        } else {
          const item = { id: Date.now(), ...payload };
          items.unshift(item);
          state.selectedId = item.id;
        }

        closeModal();
        renderTable();
        showFeedback(`Item "${payload.name}" berjaya disimpan.`);
      }

      function deleteItem(id) {
        const item = items.find((entry) => entry.id === id);
        const name = item ? item.name : 'Item';
        openDeleteConfirm('item', id, name);
      }

      // ==========================================================================
      // DATA AHLI (MEMBERS) ACTIONS
      // ==========================================================================

      function renderMembers() {
        window.tbaSyncAdminState?.('tbaAdminMembers', members);
        const term = document.getElementById('admMemberSearch').value.trim().toLowerCase();
        const presint = document.getElementById('admMemberPresint').value;
        const aid = document.getElementById('admMemberAid').value;
        const status = document.getElementById('admMemberStatus').value;
        
        const rowsContainer = document.getElementById('admMemberRows');
        rowsContainer.innerHTML = '';

        let visibleCount = 0;

        members.forEach(member => {
          const text = [member.name, member.kp, member.presint, member.aid, member.status].join(' ').toLowerCase();
          const ok = (!term || text.includes(term)) &&
            (!presint || member.presint === presint) &&
            (!aid || member.aid === aid) &&
            (!status || member.status === status);

          if (ok) {
            visibleCount++;
            const tr = document.createElement('tr');
            
            let actionButtons = `
              <button class="adm-mini" type="button" data-member-action="Semak" data-member-id="${member.id}">Semak</button>
              <button class="adm-mini" type="button" data-member-action="Kemaskini" data-member-id="${member.id}">Kemaskini</button>
            `;
            if (member.status === 'Selesai') {
              actionButtons += `<button class="adm-mini" type="button" data-member-action="Bukti" data-member-id="${member.id}">Bukti</button>`;
            }
            actionButtons += `<button class="adm-mini danger" type="button" data-member-action="Padam" data-member-id="${member.id}">Padam</button>`;

            let avatarSrc = member.photo ? member.photo : `https://ui-avatars.com/api/?name=${encodeURIComponent(member.name)}&background=f1f5f9&color=1e293b&size=80`;
            tr.innerHTML = `
              <td data-label="Nama Ahli">
                <div class="adm-member-main" style="display:flex; align-items:center; gap:10px;">
                  <img src="${avatarSrc}" class="adm-table-img" alt="Avatar" style="object-fit:cover;">
                  <span class="adm-table-title">${member.name}</span>
                </div>
              </td>
              <td data-label="No. KP">${member.kp}</td>
              <td data-label="Presint">${member.presint}</td>
              <td data-label="Jenis Bantuan">${member.aid}</td>
              <td data-label="Tarikh Mohon">${member.date}</td>
              <td data-label="Status"><span class="adm-badge ${statusClass(member.status)}">${member.status}</span></td>
              <td data-label="Tindakan"><div class="adm-actions">${actionButtons}</div></td>
            `;
            
            tr.addEventListener('click', () => {
              document.querySelectorAll('#admMemberRows tr').forEach(r => r.classList.remove('selected'));
              tr.classList.add('selected');
            });
            rowsContainer.appendChild(tr);
          }
        });
      }

      function filterMembers() {
        renderMembers();
        const visible = document.querySelectorAll('#admMemberRows tr').length;
        showFeedback(`${visible} rekod ahli dipaparkan mengikut filter semasa.`);
      }

      function saveMemberData() {
        const name = document.getElementById('admMemberNameInput').value.trim();
        const kp = document.getElementById('admMemberKpInput').value.trim();
        const presint = document.getElementById('admMemberPresintInput').value;
        const aid = document.getElementById('admMemberAidInput').value;
        const date = document.getElementById('admMemberDateInput').value.trim();
        const status = document.getElementById('admMemberStatusInput').value;
        const photo = document.getElementById('admMemberPhotoBase64').value;

        // Photo is mandatory for new members
        if (!name || !kp || !date || (!state.editingMemberId && !photo)) {
          showFeedback('Sila lengkapkan semua medan wajib (Nama, No. KP, Tarikh, Pas Foto).', 'error');
          return;
        }

        if (state.editingMemberId) {
          const index = members.findIndex(m => m.id === state.editingMemberId);
          if (index !== -1) {
            members[index] = { ...members[index], name, kp, presint, aid, date, status };
            if (photo) members[index].photo = photo; // Update photo only if new one uploaded
            showFeedback(`Rekod ahli "${name}" berjaya dikemaskini.`);
          }
        } else {
          const newMember = {
            id: Date.now(),
            name,
            kp,
            presint,
            aid,
            date,
            status,
            photo
          };
          members.unshift(newMember);
          showFeedback(`Rekod ahli "${name}" berjaya ditambahkan.`);
        }

        memberModal.classList.remove('open');
        state.editingMemberId = null;
        renderMembers();
      }

      // ==========================================================================
      // EVENTS ACTIONS
      // ==========================================================================

      function resetEventForm() {
        ['admEventTitle', 'admEventDate', 'admEventPlace', 'admEventAddress', 'admEventMap', 'admEventDesc'].forEach((id) => {
          document.getElementById(id).value = '';
        });
        document.getElementById('admEventCategory').selectedIndex = 0;
        document.getElementById('admEventStatus').selectedIndex = 0;
        document.querySelectorAll('#admEventRows tr').forEach((row) => row.classList.remove('selected'));
        showFeedback('Borang event dikosongkan untuk tambah event baharu.');
      }

      function renderEvents() {
        window.tbaSyncAdminState?.('tbaAdminEvents', events);
        const term = document.getElementById('admEventSearch').value.trim().toLowerCase();
        const category = document.getElementById('admEventFilterCategory').value;
        const status = document.getElementById('admEventFilterStatus').value;
        
        const rowsContainer = document.getElementById('admEventRows');
        rowsContainer.innerHTML = '';

        events.forEach(event => {
          const text = [event.title, event.category, event.place, event.desc].join(' ').toLowerCase();
          const ok = (!term || text.includes(term)) &&
            (!category || event.category === category) &&
            (!status || event.status === status);

          if (ok) {
            const tr = document.createElement('tr');
            tr.innerHTML = `
              <td data-label="Nama Kegiatan">
                <div class="adm-event-main" style="display:flex; align-items:center; gap:10px;">
                  <img src="${event.image || 'umno-logo.jpg'}" class="adm-table-img" alt="Event">
                  <span class="adm-table-title">${event.title}</span>
                </div>
              </td>
              <td data-label="Kategori">${event.category}</td>
              <td data-label="Tarikh">${formatDate(event.date.split('T')[0])}</td>
              <td data-label="Lokasi">${event.place}</td>
              <td data-label="Status"><span class="adm-badge ${statusClass(event.status)}">${event.status}</span></td>
              <td data-label="Tindakan">
                <div class="adm-actions">
                  <button class="adm-mini" type="button" data-event-action="view" data-event-id="${event.id}">Semak</button>
                  <button class="adm-mini" type="button" data-event-action="edit" data-event-id="${event.id}">Kemaskini</button>
                  <button class="adm-mini danger" type="button" data-event-action="delete" data-event-id="${event.id}">Padam</button>
                </div>
              </td>
            `;
            tr.addEventListener('click', () => {
              document.querySelectorAll('#admEventRows tr').forEach(r => r.classList.remove('selected'));
              tr.classList.add('selected');
            });
            rowsContainer.appendChild(tr);
          }
        });
      }

      function filterEvents() {
        renderEvents();
        const visible = document.querySelectorAll('#admEventRows tr').length;
        showFeedback(`${visible} program dipaparkan mengikut filter semasa.`);
      }

      function saveEvent() {
        const title = document.getElementById('admEventTitle').value.trim();
        const date = document.getElementById('admEventDate').value;
        const place = document.getElementById('admEventPlace').value.trim();
        const address = document.getElementById('admEventAddress').value.trim();
        const category = document.getElementById('admEventCategory').value;
        const status = document.getElementById('admEventStatus').value;
        const map = document.getElementById('admEventMap').value.trim();
        const desc = document.getElementById('admEventDesc').value.trim();

        if (!title || !date || !place) {
          showFeedback('Sila lengkapkan semua medan wajib (Judul, Tarikh, Tempat).', 'error');
          return;
        }

        if (state.editingEventId) {
          const index = events.findIndex(e => e.id === state.editingEventId);
          if (index !== -1) {
            events[index] = { ...events[index], title, date, place, address, category, status, map, desc };
            showFeedback(`Event "${title}" berjaya dikemaskini.`);
          }
        } else {
          const newEvent = {
            id: Date.now(),
            title,
            date,
            place,
            address,
            category,
            status,
            map,
            desc
          };
          events.unshift(newEvent);
          showFeedback(`Event "${title}" berjaya ditambahkan.`);
        }

        eventModal.classList.remove('open');
        state.editingEventId = null;
        renderEvents();
      }

      // ==========================================================================
      // ARTICLES ACTIONS
      // ==========================================================================

      function renderArticles() {
        window.tbaSyncAdminState?.('tbaAdminArticles', articles);
        const term = document.getElementById('admArticleSearch').value.trim().toLowerCase();
        const category = document.getElementById('admArticleFilterCategory').value;
        const status = document.getElementById('admArticleFilterStatus').value;
        
        const rowsContainer = document.getElementById('admArticleRows');
        rowsContainer.innerHTML = '';

        articles.forEach(art => {
          const text = [art.title, art.author, art.category, art.body].join(' ').toLowerCase();
          const ok = (!term || text.includes(term)) &&
            (!category || art.category === category) &&
            (!status || art.status === status);

          if (ok) {
            const tr = document.createElement('tr');
            tr.innerHTML = `
              <td data-label="Tajuk Artikel">
                <div class="adm-article-main" style="display:flex; align-items:center; gap:10px;">
                  <img src="${art.image || 'umno-logo.jpg'}" class="adm-table-img" alt="Article">
                  <span class="adm-table-title">${art.title}</span>
                </div>
              </td>
              <td data-label="Penulis">${art.author}</td>
              <td data-label="Kategori">${art.category}</td>
              <td data-label="Tarikh">${formatDate(art.date || new Date().toISOString().slice(0,10))}</td>
              <td data-label="Status"><span class="adm-badge ${statusClass(art.status)}">${art.status}</span></td>
              <td data-label="Tindakan">
                <div class="adm-actions">
                  <button class="adm-mini" type="button" data-article-action="view" data-article-id="${art.id}">Semak</button>
                  <button class="adm-mini" type="button" data-article-action="edit" data-article-id="${art.id}">Kemaskini</button>
                  <button class="adm-mini danger" type="button" data-article-action="delete" data-article-id="${art.id}">Padam</button>
                </div>
              </td>
            `;
            tr.addEventListener('click', () => {
              document.querySelectorAll('#admArticleRows tr').forEach(r => r.classList.remove('selected'));
              tr.classList.add('selected');
            });
            rowsContainer.appendChild(tr);
          }
        });
      }

      function filterArticles() {
        renderArticles();
        const visible = document.querySelectorAll('#admArticleRows tr').length;
        showFeedback(`${visible} artikel dipaparkan mengikut filter semasa.`);
      }

      function showArticlePreview() {
        const title = document.getElementById('admArticleTitle').value.trim() || 'Tajuk Artikel Baru';
        const author = document.getElementById('admArticleAuthor').value.trim() || 'Pentadbir Tak Banyak Alasan';
        const category = document.getElementById('admArticleCategory').value;
        const imagePath = document.getElementById('admArticleImage').value.trim() || 'assets/article-main.jpg';
        const bodyText = document.getElementById('admArticleBody').value.trim() || 'Tiada kandungan ditulis lagi.';

        document.getElementById('previewArticleTitle').textContent = title;
        document.getElementById('previewArticleAuthor').textContent = author;
        document.getElementById('previewArticleCategory').textContent = category;
        document.getElementById('previewArticleDate').textContent = new Date().toLocaleDateString('ms-MY', { day: 'numeric', month: 'short', year: 'numeric' });
        document.getElementById('previewArticleImg').src = imagePath;
        document.getElementById('previewArticleBody').textContent = bodyText;

        articlePreviewModal.classList.add('open');
        showFeedback(`Memaparkan pratinjau artikel "${title}".`);
      }

      function articleAction(action) {
        const title = document.getElementById('admArticleTitle').value.trim();
        const author = document.getElementById('admArticleAuthor').value.trim() || 'Admin';
        const category = document.getElementById('admArticleCategory').value;
        const image = document.getElementById('admArticleImage').value.trim() || 'assets/article-main.jpg';
        const body = document.getElementById('admArticleBody').value.trim();

        if (action === 'preview') {
          showArticlePreview();
          return;
        }

        if (!title || !body) {
          showFeedback('Sila lengkapkan Tajuk dan Kandungan artikel sebelum menyimpan.', 'error');
          return;
        }

        const status = action === 'publish' ? 'Published' : 'Draft';

        if (state.editingArticleId) {
          const index = articles.findIndex(a => a.id === state.editingArticleId);
          if (index !== -1) {
            articles[index] = { ...articles[index], title, author, category, image, body, status, date: articles[index].date || new Date().toISOString().slice(0,10) };
            showFeedback(`Artikel "${title}" berjaya dikemaskini.`);
          }
        } else {
          const newArticle = {
            id: Date.now(),
            title,
            author,
            category,
            date: new Date().toISOString().slice(0,10),
            image,
            body,
            status
          };
          articles.unshift(newArticle);
          showFeedback(`Artikel "${title}" berjaya ditambahkan.`);
        }

        articleModal.classList.remove('open');
        state.editingArticleId = null;
        renderArticles();
      }

      // ==========================================================================
      // CMS ACTIONS
      // ==========================================================================

      function loadCms(key) {
        const item = cmsData[key];
        if (!item) return;
        document.querySelectorAll('.adm-module-card').forEach((card) => card.classList.remove('active'));
        document.querySelector(`.adm-module-card[data-cms-key="${key}"]`)?.classList.add('active');
        document.getElementById('admCmsModule').value = item.module;
        document.getElementById('admCmsStatus').value = item.status;
        document.getElementById('admCmsTitle').value = item.title;
        document.getElementById('admCmsImage').value = item.image;
        document.getElementById('admCmsDesc').value = item.desc;
        document.getElementById('admCmsModalTitle').textContent = `Sunting Modul: ${item.module}`;
        cmsModal.classList.add('open');
        showFeedback(`${item.module} sedia dikemaskini.`);
      }

      function saveCmsData() {
        const key = document.querySelector('.adm-module-card.active')?.dataset.cmsKey;
        if (!key) return;
        const module = document.getElementById('admCmsModule').value;
        const status = document.getElementById('admCmsStatus').value;
        const title = document.getElementById('admCmsTitle').value.trim();
        const image = document.getElementById('admCmsImage').value.trim();
        const desc = document.getElementById('admCmsDesc').value.trim();

        cmsData[key] = { module, status, title, image, desc };

        const activeCard = document.querySelector('.adm-module-card.active');
        if (activeCard) {
          activeCard.querySelector('h3').textContent = title;
          activeCard.querySelector('p').textContent = desc.substring(0, 50) + (desc.length > 50 ? '...' : '');
        }

        localStorage.setItem('tbaCmsFrontpageData', JSON.stringify(cmsData));
        showFeedback(`Modul CMS "${module}" berjaya dikemaskini.`);
        cmsModal.classList.remove('open');
      }

      function showCmsPreview() {
        const activeCard = document.querySelector('.adm-module-card.active');
        const key = activeCard?.dataset.cmsKey;
        if (!key) return;

        const title = document.getElementById('admCmsTitle').value.trim() || 'Modul';
        const desc = document.getElementById('admCmsDesc').value.trim() || '';
        const image = document.getElementById('admCmsImage').value.trim() || '';

        const container = document.getElementById('cmsPreviewContainer');
        container.innerHTML = '';

        if (key === 'hero') {
          container.innerHTML = `
            <div class="hero-mock" style="${image ? `background: linear-gradient(105deg, rgba(158,18,18,0.92) 0%, rgba(26,60,158,0.7) 55%, #1a1a3e 100%), url('${image}') center/cover;` : ''}">
              <div class="hero-tag">Wilayah Persekutuan Putrajaya</div>
              <h1 class="hero-headline">${title}</h1>
              <p class="hero-desc">${desc}</p>
              <div class="hero-btns">
                <button type="button" class="btn-red">Sertai Kami</button>
                <button type="button" class="btn-white">Hubungi Kami</button>
              </div>
            </div>
          `;
        } else if (key === 'events') {
          container.innerHTML = `
            <div style="padding: 24px; background: #f8fafc;">
              <div class="section-label-tag">Acara Kami</div>
              <h2 class="section-title">${title}</h2>
              <div class="event-mock-card">
                <div class="event-mock-thumb" style="${image ? `background: url('${image}') center/cover; color: transparent;` : ''}">📅</div>
                <div class="event-mock-body">
                  <span class="event-mock-badge">SEDANG BERLANGSUNG</span>
                  <div class="event-mock-name">Ceramah Ulang Tahun Tak Banyak Alasan Ke-80</div>
                  <p class="event-mock-desc">${desc}</p>
                </div>
              </div>
            </div>
          `;
        } else if (key === 'articles') {
          container.innerHTML = `
            <div style="padding: 24px; background: #f8fafc;">
              <div class="section-label-tag">Artikel & Berita</div>
              <h2 class="section-title">${title}</h2>
              <div class="article-mock-card">
                <div class="article-mock-thumb" style="${image ? `background: url('${image}') center/cover; color: transparent;` : ''}">📰</div>
                <div class="article-mock-body">
                  <span class="pill-tag">BERITA UTAMA</span>
                  <div class="article-mock-title">Bantuan Katil Hospital Dipergiat</div>
                  <p class="article-mock-desc">${desc}</p>
                </div>
              </div>
            </div>
          `;
        } else if (key === 'leaders') {
          container.innerHTML = `
            <div style="padding: 24px; background: #f8fafc;">
              <div class="section-label-tag">Kepimpinan Kami</div>
              <h2 class="section-title">${title}</h2>
              <div class="leader-mock-card">
                <div class="leader-mock-photo" style="${image ? `background: url('${image}') center/cover; color: transparent;` : ''}">👤</div>
                <div class="leader-mock-name">Dato' Seri Pentadbir</div>
                <div class="leader-mock-jawatan">Ketua Bahagian</div>
                <p class="leader-mock-bio">${desc}</p>
              </div>
            </div>
          `;
        }

        cmsPreviewModal.classList.add('open');
        showFeedback(`Memaparkan pratinjau modul CMS.`);
      }

      // ==========================================================================
      // ==========================================================================
      // ACCOUNT ADMIN ACTIONS
      // ==========================================================================

      // --- Session init ---
      const sessionId = 'SID-' + Math.random().toString(36).slice(2, 10).toUpperCase();
      document.getElementById('admSessionId').textContent = sessionId;

      // --- Login count & time tracking ---
      let loginCount = parseInt(localStorage.getItem('tbaLoginCount') || '0') + 1;
      localStorage.setItem('tbaLoginCount', loginCount);
      document.getElementById('admLoginCount').textContent = loginCount;
      const now = new Date();
      document.getElementById('admLoginTime').textContent =
        now.toLocaleTimeString('ms-MY', { hour: '2-digit', minute: '2-digit' });

      // --- Sync avatar & display from profile ---
      function syncProfileDisplay() {
        const username = document.getElementById('admAccountUsername').value.trim();
        const role = document.getElementById('admAccountRole').value;
        const initials = username.slice(0, 2).toUpperCase() || 'SA';
        document.getElementById('admAccountAvatar').textContent = initials;
        document.getElementById('admAccountDisplayName').textContent =
          document.getElementById('admAccountFullName').value.trim() || username;
        document.getElementById('admAccountRoleDisplay').textContent = role;
      }
      syncProfileDisplay();

      // --- Save profile ---
      function saveAccount() {
        const username = document.getElementById('admAccountUsername').value.trim();
        const email = document.getElementById('admAccountEmail').value.trim();
        const fullName = document.getElementById('admAccountFullName').value.trim();

        if (!username) {
          showFeedback('Nama pengguna wajib diisi.', 'error');
          return;
        }
        if (!email || !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email)) {
          showFeedback('Sila masukkan alamat e-mel yang sah.', 'error');
          return;
        }
        if (username.length < 4) {
          showFeedback('Nama pengguna mestilah sekurang-kurangnya 4 aksara.', 'error');
          return;
        }

        // Persist to localStorage
        localStorage.setItem('tbaAccountProfile', JSON.stringify({ username, email, fullName,
          role: document.getElementById('admAccountRole').value }));

        syncProfileDisplay();
        addActivityLog('Profil akaun dikemaskini', `Nama pengguna: ${username}`, 'info');
        showFeedback(`Profil akaun "${username}" berjaya disimpan.`);
      }

      // --- Password strength checker ---
      function checkPasswordStrength(pw) {
        let score = 0;
        if (pw.length >= 8) score++;
        if (/[A-Z]/.test(pw)) score++;
        if (/[0-9]/.test(pw)) score++;
        if (/[^A-Za-z0-9]/.test(pw)) score++;
        return score; // 0-4
      }

      function updatePwStrength(pw) {
        const score = pw.length ? checkPasswordStrength(pw) : 0;
        const bars = ['pwBar1', 'pwBar2', 'pwBar3', 'pwBar4'];
        const labels = ['', 'Lemah', 'Sederhana', 'Baik', 'Kuat'];
        const classes = ['', 'weak', 'fair', 'good', 'strong'];
        const colors  = ['#a0aabb', '#ef4444', '#f59e0b', '#3b82f6', '#22c55e'];

        bars.forEach((id, i) => {
          const el = document.getElementById(id);
          el.className = 'adm-pw-bar' + (pw.length && i < score ? ' ' + classes[score] : '');
        });

        const lbl = document.getElementById('admPwStrengthLabel');
        lbl.textContent = pw.length ? labels[score] : 'Masukkan kata laluan baru';
        lbl.style.color = pw.length ? colors[score] : '#a0aabb';
      }

      document.getElementById('admAccountNew').addEventListener('input', (e) => {
        updatePwStrength(e.target.value);
      });

      // --- Reset / update password ---
      function resetAccountPassword() {
        const current = document.getElementById('admAccountCurrent').value;
        const next = document.getElementById('admAccountNew').value;
        const confirm = document.getElementById('admAccountConfirm').value;

        if (!current) {
          showFeedback('Sila masukkan kata laluan semasa terlebih dahulu.', 'error');
          document.getElementById('admAccountCurrent').focus();
          return;
        }
        if (!next || !confirm) {
          showFeedback('Sila isi kata laluan baru dan pengesahan.', 'error');
          return;
        }
        if (next.length < 8) {
          showFeedback('Kata laluan baru mestilah sekurang-kurangnya 8 aksara.', 'error');
          return;
        }
        if (checkPasswordStrength(next) < 2) {
          showFeedback('Kata laluan terlalu lemah. Gunakan gabungan huruf besar, nombor, atau simbol.', 'error');
          return;
        }
        if (next !== confirm) {
          showFeedback('Kata laluan baru dan pengesahan tidak sepadan.', 'error');
          document.getElementById('admAccountConfirm').focus();
          return;
        }

        document.getElementById('admAccountCurrent').value = '';
        document.getElementById('admAccountNew').value = '';
        document.getElementById('admAccountConfirm').value = '';
        updatePwStrength('');
        addActivityLog('Kata laluan ditukar', 'Kata laluan berjaya dikemaskini', 'success');
        showFeedback('Kata laluan berjaya dikemaskini.');
      }

      // --- Add dynamic activity log entries ---
      function addActivityLog(title, detail, type) {
        const log = document.getElementById('admActivityLog');
        const icons = { success: '✓', info: '✎', warning: '⚠', danger: '✕' };
        const item = document.createElement('div');
        item.className = 'adm-activity-item';
        item.innerHTML = `
          <div class="adm-activity-icon ${type}">${icons[type] || '•'}</div>
          <div class="adm-activity-body">
            <strong>${title}</strong>
            <span>${detail}</span>
          </div>
          <div class="adm-activity-time">Baru sahaja</div>
        `;
        log.prepend(item);
      }

      // --- Load saved profile ---
      const savedProfile = localStorage.getItem('tbaAccountProfile');
      if (savedProfile) {
        try {
          const p = JSON.parse(savedProfile);
          if (p.username) document.getElementById('admAccountUsername').value = p.username;
          if (p.email) document.getElementById('admAccountEmail').value = p.email;
          if (p.fullName) document.getElementById('admAccountFullName').value = p.fullName;
          if (p.role) document.getElementById('admAccountRole').value = p.role;
          syncProfileDisplay();
        } catch(e) {}
      }

      // ==========================================================================
      // BINDINGS & EVENT LISTENERS
      // ==========================================================================

      document.querySelectorAll('.adm-tabs button').forEach((button) => {
        button.addEventListener('click', () => {
          state.filter = button.dataset.admFilter;
          document.querySelectorAll('.adm-tabs button').forEach((tab) => tab.classList.remove('active'));
          button.classList.add('active');
          renderTable();
        });
      });

      document.querySelectorAll('.adm-link').forEach((link) => {
        link.addEventListener('click', (event) => {
          event.preventDefault();
          switchView(link.dataset.admSection);
        });
      });

      table.addEventListener('click', (event) => {
        const button = event.target.closest('button[data-adm-action]');
        if (!button) return;
        event.stopPropagation();

        const id = Number(button.dataset.admId);
        const action = button.dataset.admAction;
        if (action === 'view') showItemPreview(id);
        if (action === 'edit') openModal(items.find((item) => item.id === id));
        if (action === 'delete') deleteItem(id);
      });

      document.querySelectorAll('#admMemberSearch, #admMemberPresint, #admMemberAid, #admMemberStatus').forEach((field) => {
        field.addEventListener('input', filterMembers);
        field.addEventListener('change', filterMembers);
      });

      document.getElementById('admMemberRows').addEventListener('click', (event) => {
        const button = event.target.closest('[data-member-action]');
        if (!button) return;
        event.stopPropagation();
        
        const id = Number(button.dataset.memberId);
        const action = button.dataset.memberAction;
        const member = members.find(m => m.id === id);
        if (!member) return;

        if (action === 'Semak') {
          document.getElementById('admMemberModalTitle').textContent = 'Semak Rekod Ahli';
          document.getElementById('admMemberPhotoInput').value = '';
          document.getElementById('admMemberPhotoBase64').value = member.photo || '';
          document.getElementById('admMemberPhotoPreview').src = member.photo || `https://ui-avatars.com/api/?name=${encodeURIComponent(member.name)}&background=f1f5f9&color=1e293b&size=80`;
          document.getElementById('admMemberNameInput').value = member.name;
          document.getElementById('admMemberKpInput').value = member.kp;
          document.getElementById('admMemberPresintInput').value = member.presint;
          document.getElementById('admMemberAidInput').value = member.aid;
          document.getElementById('admMemberDateInput').value = member.date;
          document.getElementById('admMemberStatusInput').value = member.status;

          // Lock fields
          ['admMemberNameInput', 'admMemberKpInput', 'admMemberPresintInput', 'admMemberAidInput', 'admMemberDateInput', 'admMemberStatusInput', 'admMemberPhotoInput'].forEach(fid => {
            document.getElementById(fid).disabled = true;
          });
          document.getElementById('admSaveMemberModalBtn').style.display = 'none';
          memberModal.classList.add('open');
          showFeedback(`Menyemak rekod ${member.name}.`);
        } else if (action === 'Kemaskini') {
          state.editingMemberId = id;
          document.getElementById('admMemberModalTitle').textContent = 'Kemaskini Rekod Ahli';
          document.getElementById('admMemberPhotoInput').value = '';
          document.getElementById('admMemberPhotoBase64').value = member.photo || '';
          document.getElementById('admMemberPhotoPreview').src = member.photo || `https://ui-avatars.com/api/?name=${encodeURIComponent(member.name)}&background=f1f5f9&color=1e293b&size=80`;
          document.getElementById('admMemberNameInput').value = member.name;
          document.getElementById('admMemberKpInput').value = member.kp;
          document.getElementById('admMemberPresintInput').value = member.presint;
          document.getElementById('admMemberAidInput').value = member.aid;
          document.getElementById('admMemberDateInput').value = member.date;
          document.getElementById('admMemberStatusInput').value = member.status;

          // Unlock fields
          ['admMemberNameInput', 'admMemberKpInput', 'admMemberPresintInput', 'admMemberAidInput', 'admMemberDateInput', 'admMemberStatusInput', 'admMemberPhotoInput'].forEach(fid => {
            document.getElementById(fid).disabled = false;
          });
          document.getElementById('admSaveMemberModalBtn').style.display = 'inline-block';
          memberModal.classList.add('open');
          showFeedback(`Mengemaskini rekod ${member.name}.`);
        } else if (action === 'Bukti') {
          document.getElementById('admProofMemberName').textContent = member.name;
          document.getElementById('admProofMemberKp').textContent = `No. KP: ${member.kp}`;
          document.getElementById('admProofAidType').textContent = member.aid;
          document.getElementById('admProofDate').textContent = member.date;
          proofModal.classList.add('open');
        } else if (action === 'Padam') {
          openDeleteConfirm('member', id, member.name);
        }
      });

      document.getElementById('admEventRows').addEventListener('click', (event) => {
        const button = event.target.closest('[data-event-action]');
        if (!button) return;
        
        const id = Number(button.dataset.eventId);
        const action = button.dataset.eventAction;
        const ev = events.find(e => e.id === id);
        if (!ev) return;

        if (action === 'view') {
          document.getElementById('previewEventTitle').textContent = ev.title;
          document.getElementById('previewEventDesc').textContent = ev.desc;
          document.getElementById('previewEventCategory').textContent = ev.category;
          
          const statusSpan = document.getElementById('previewEventStatus');
          statusSpan.textContent = ev.status;
          statusSpan.className = `adm-badge ${statusClass(ev.status)}`;

          document.getElementById('previewEventDate').textContent = formatDate(ev.date.split('T')[0]) + ' ' + (ev.date.split('T')[1] || '');
          document.getElementById('previewEventPlace').textContent = ev.place;
          document.getElementById('previewEventAddress').textContent = ev.address || '-';
          
          const mapLink = document.getElementById('previewEventMap');
          if (ev.map) {
            mapLink.href = ev.map;
            mapLink.style.display = 'inline';
          } else {
            mapLink.style.display = 'none';
          }

          eventPreviewModal.classList.add('open');
          showFeedback(`Memaparkan pratinjau event "${ev.title}".`);
          return;
        }

        if (action === 'delete') {
          openDeleteConfirm('event', id, ev.title);
          return;
        }
        
        state.editingEventId = id;
        document.getElementById('admEventTitle').value = ev.title;
        document.getElementById('admEventDate').value = ev.date;
        document.getElementById('admEventPlace').value = ev.place;
        document.getElementById('admEventAddress').value = ev.address;
        document.getElementById('admEventCategory').value = ev.category;
        document.getElementById('admEventStatus').value = ev.status;
        document.getElementById('admEventMap').value = ev.map;
        document.getElementById('admEventDesc').value = ev.desc;
        document.getElementById('admEventModalTitle').textContent = 'Sunting Event';
        eventModal.classList.add('open');
        showFeedback(`Event "${ev.title}" dimuatkan ke borang kemaskini.`);
      });

      document.getElementById('admArticleRows').addEventListener('click', (event) => {
        const button = event.target.closest('[data-article-action]');
        if (!button) return;

        const id = Number(button.dataset.articleId);
        const action = button.dataset.articleAction;
        const art = articles.find(a => a.id === id);
        if (!art) return;

        if (action === 'view') {
          document.getElementById('previewArticleTitle').textContent = art.title;
          document.getElementById('previewArticleAuthor').textContent = art.author;
          document.getElementById('previewArticleCategory').textContent = art.category;
          document.getElementById('previewArticleDate').textContent = 'Terbitan Pentadbir';
          document.getElementById('previewArticleImg').src = art.image || 'assets/article-main.jpg';
          document.getElementById('previewArticleBody').textContent = art.body;

          articlePreviewModal.classList.add('open');
          showFeedback(`Memaparkan pratinjau artikel "${art.title}".`);
          return;
        }

        if (action === 'delete') {
          openDeleteConfirm('article', id, art.title);
          return;
        }

        state.editingArticleId = id;
        document.getElementById('admArticleTitle').value = art.title;
        document.getElementById('admArticleAuthor').value = art.author;
        document.getElementById('admArticleCategory').value = art.category;
        document.getElementById('admArticleImage').value = art.image;
        document.getElementById('admArticleBody').value = art.body;
        
        const statusSpan = document.getElementById('admArticleStatus');
        statusSpan.textContent = art.status;
        statusSpan.className = `adm-badge ${statusClass(art.status)}`;
        
        document.getElementById('admArticleModalTitle').textContent = 'Sunting Artikel';
        articleModal.classList.add('open');
        showFeedback(`Artikel "${art.title}" dimuatkan ke ruang suntingan.`);
      });

      document.querySelectorAll('#admEventSearch, #admEventFilterCategory, #admEventFilterStatus').forEach((field) => {
        field.addEventListener('input', filterEvents);
        field.addEventListener('change', filterEvents);
      });

      document.querySelectorAll('#admArticleSearch, #admArticleFilterCategory, #admArticleFilterStatus').forEach((field) => {
        field.addEventListener('input', filterArticles);
        field.addEventListener('change', filterArticles);
      });

      document.querySelectorAll('[data-article-submit]').forEach((button) => {
        button.addEventListener('click', () => articleAction(button.dataset.articleSubmit));
      });

      document.querySelectorAll('.adm-tool-chip').forEach((chip) => {
        chip.addEventListener('click', () => showFeedback(`Toolbar ${chip.textContent.trim()} ditukar untuk editor artikel.`));
      });

      document.querySelectorAll('.adm-module-card').forEach((card) => {
        card.addEventListener('click', () => loadCms(card.dataset.cmsKey));
      });

      document.querySelectorAll('[data-adm-feedback]').forEach((button) => {
        button.addEventListener('click', () => showFeedback(button.dataset.admFeedback));
      });

      document.querySelectorAll('.adm-card').forEach((card) => {
        card.addEventListener('click', () => {
          const title = card.querySelector('h3')?.textContent || '';
          if (title.includes('Bantuan')) switchView('members');
          if (title.includes('Event')) switchView('events');
          if (title.includes('Artikel')) switchView('articles');
          if (title.includes('Frontpage')) switchView('content');
        });
      });

      document.querySelectorAll('.adm-eye').forEach((button) => {
        button.addEventListener('click', () => {
          const input = document.getElementById(button.dataset.eye);
          input.type = input.type === 'password' ? 'text' : 'password';
          button.textContent = input.type === 'password' ? 'Papar' : 'Sembunyi';
        });
      });

      // Overview Modal bindings
      document.getElementById('admOpenModal').addEventListener('click', () => openModal());
      document.getElementById('admCloseModal').addEventListener('click', closeModal);
      document.getElementById('admCancelModal').addEventListener('click', closeModal);

      // Event Modal bindings
      document.getElementById('admOpenEventModal').addEventListener('click', () => {
        resetEventForm();
        document.getElementById('admEventModalTitle').textContent = 'Tambah Event';
        eventModal.classList.add('open');
      });
      document.getElementById('admCloseEventModal').addEventListener('click', () => eventModal.classList.remove('open'));
      document.getElementById('admCancelEventModal').addEventListener('click', () => eventModal.classList.remove('open'));
      document.getElementById('admSaveEvent').addEventListener('click', saveEvent);

      // Article Modal bindings
      document.getElementById('admOpenArticleModal').addEventListener('click', () => {
        document.getElementById('admArticleTitle').value = '';
        document.getElementById('admArticleAuthor').value = '';
        document.getElementById('admArticleCategory').selectedIndex = 0;
        document.getElementById('admArticleImage').value = '';
        document.getElementById('admArticleBody').value = '';
        document.getElementById('admArticleStatus').textContent = 'Draft';
        document.getElementById('admArticleStatus').className = 'adm-badge draft';
        document.getElementById('admArticleModalTitle').textContent = 'Tambah Artikel';
        articleModal.classList.add('open');
      });
      document.getElementById('admCloseArticleModal').addEventListener('click', () => articleModal.classList.remove('open'));
      document.getElementById('admCancelArticleModal').addEventListener('click', () => articleModal.classList.remove('open'));

      // CMS Modal bindings
      document.getElementById('admCloseCmsModal').addEventListener('click', () => cmsModal.classList.remove('open'));
      document.getElementById('admCancelCmsModal').addEventListener('click', () => cmsModal.classList.remove('open'));
      document.getElementById('admSaveCmsModalBtn').addEventListener('click', saveCmsData);
      document.getElementById('admPreviewCmsBtn').addEventListener('click', showCmsPreview);

      // CMS Preview Modal bindings
      document.getElementById('admCloseCmsPreviewModal').addEventListener('click', () => cmsPreviewModal.classList.remove('open'));
      document.getElementById('admCloseCmsPreviewModalBtn').addEventListener('click', () => cmsPreviewModal.classList.remove('open'));

      // Member Modal bindings
      document.getElementById('admOpenMemberModal').addEventListener('click', () => {
        state.editingMemberId = null;
        document.getElementById('admMemberModalTitle').textContent = 'Borang Tambah Rekod Ahli';
        document.getElementById('admMemberPhotoInput').value = '';
        document.getElementById('admMemberPhotoBase64').value = '';
        document.getElementById('admMemberPhotoPreview').src = 'https://ui-avatars.com/api/?name=Baru&background=f1f5f9&color=1e293b&size=80';
        document.getElementById('admMemberNameInput').value = '';
        document.getElementById('admMemberKpInput').value = '';
        document.getElementById('admMemberPresintInput').selectedIndex = 0;
        document.getElementById('admMemberAidInput').selectedIndex = 0;
        document.getElementById('admMemberDateInput').value = new Date().toLocaleDateString('ms-MY', { day: 'numeric', month: 'short', year: 'numeric' });
        document.getElementById('admMemberStatusInput').selectedIndex = 0;

        // Unlock fields
        ['admMemberNameInput', 'admMemberKpInput', 'admMemberPresintInput', 'admMemberAidInput', 'admMemberDateInput', 'admMemberStatusInput', 'admMemberPhotoInput'].forEach(fid => {
          document.getElementById(fid).disabled = false;
        });
        document.getElementById('admSaveMemberModalBtn').style.display = 'inline-block';
        memberModal.classList.add('open');
      });
      document.getElementById('admCloseMemberModal').addEventListener('click', () => memberModal.classList.remove('open'));
      document.getElementById('admCancelMemberModal').addEventListener('click', () => memberModal.classList.remove('open'));
      document.getElementById('admSaveMemberModalBtn').addEventListener('click', saveMemberData);

      // Close Item Preview Modal
      document.getElementById('admCloseItemPreviewModal').addEventListener('click', () => itemPreviewModal.classList.remove('open'));
      document.getElementById('admCloseItemPreviewModalBtn').addEventListener('click', () => itemPreviewModal.classList.remove('open'));

      // Close Event Preview Modal
      document.getElementById('admCloseEventPreviewModal').addEventListener('click', () => eventPreviewModal.classList.remove('open'));
      document.getElementById('admCloseEventPreviewModalBtn').addEventListener('click', () => eventPreviewModal.classList.remove('open'));

      // Close Proof Modal
      document.getElementById('admCloseProofModal').addEventListener('click', () => proofModal.classList.remove('open'));
      document.getElementById('admCloseProofModalBtn').addEventListener('click', () => proofModal.classList.remove('open'));

      // Close Article Preview Modal
      document.getElementById('admCloseArticlePreviewModal').addEventListener('click', () => articlePreviewModal.classList.remove('open'));
      document.getElementById('admCloseArticlePreviewBtn').addEventListener('click', () => articlePreviewModal.classList.remove('open'));

      // Toggle Account
      document.getElementById('admToggleAccount').addEventListener('click', () => {
        const statusBadge = document.getElementById('admAccountStatus');
        const toggleBtn = document.getElementById('admToggleAccount');
        const profileFields = [
          'admAccountUsername', 'admAccountEmail', 'admAccountFullName',
          'admAccountCurrent', 'admAccountNew', 'admAccountConfirm',
          'admAccountRole', 'admAccountNote',
        ];
        const actionBtns = ['admSaveAccount', 'admResetPassword'];

        const isDeactivated = toggleBtn.textContent.trim() === 'Aktifkan Akaun';

        if (isDeactivated) {
          statusBadge.textContent = 'Aktif';
          statusBadge.className = 'adm-badge active';
          toggleBtn.textContent = 'Nyahaktifkan Akaun';
          toggleBtn.style.cssText = 'color: #dc2626; border-color: #fecaca;';
          [...profileFields, ...actionBtns].forEach(id => {
            const el = document.getElementById(id);
            if (el) { el.disabled = false; el.classList.remove('disabled'); }
          });
          addActivityLog('Akaun diaktifkan semula', 'Akses pentadbir dipulihkan', 'success');
          showFeedback('Akaun pentadbir telah diaktifkan semula.');
        } else {
          statusBadge.textContent = 'Nyahaktif';
          statusBadge.className = 'adm-badge draft';
          toggleBtn.textContent = 'Aktifkan Akaun';
          toggleBtn.style.cssText = '';
          [...profileFields, ...actionBtns].forEach(id => {
            const el = document.getElementById(id);
            if (el) { el.disabled = true; el.classList.add('disabled'); }
          });
          addActivityLog('Akaun dinyahaktifkan', 'Akses pentadbir ditangguhkan', 'warning');
          showFeedback('Akaun pentadbir dinyahaktifkan.', 'error');
        }
      });

      // General bindings
      document.getElementById('admSaveAccount').addEventListener('click', saveAccount);
      document.getElementById('admResetPassword').addEventListener('click', resetAccountPassword);
      document.getElementById('admSaveSettings').addEventListener('click', () => {
        // Collect all settings values
        const orgName    = document.getElementById('settingOrgName')?.value.trim() || '';
        const orgTagline = document.getElementById('settingOrgTagline')?.value.trim() || '';
        const orgEst     = document.getElementById('settingOrgEst')?.value.trim() || '';
        const orgRegNo   = document.getElementById('settingOrgRegNo')?.value.trim() || '';
        const orgDesc    = document.getElementById('settingOrgDesc')?.value.trim() || '';

        const contact  = document.getElementById('settingContact')?.value.trim() || '';
        const phone    = document.getElementById('settingPhone')?.value.trim() || '';
        const address  = document.getElementById('settingAddress')?.value.trim() || '';
        const website  = document.getElementById('settingWebsite')?.value.trim() || '';
        const socialFb = document.getElementById('settingSocialFb')?.value.trim() || '';
        const socialIg = document.getElementById('settingSocialIg')?.value.trim() || '';
        const socialYt = document.getElementById('settingSocialYt')?.value.trim() || '';
        const socialTt = document.getElementById('settingSocialTt')?.value.trim() || '';
        const socialWa = document.getElementById('settingSocialWa')?.value.trim() || '';

        const metaTitle   = document.getElementById('settingMetaTitle')?.value.trim() || '';
        const metaDesc    = document.getElementById('settingMetaDesc')?.value.trim() || '';
        const copyrightYr = document.getElementById('settingCopyrightYear')?.value.trim() || '';
        const adminEmail  = document.getElementById('settingAdminEmail')?.value.trim() || '';
        const note        = document.getElementById('admSettingNote')?.value.trim() || '';

        // Email validation
        if (contact && !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(contact)) {
          showFeedback('Sila masukkan format e-mel awam yang sah.', 'error');
          return;
        }
        if (adminEmail && !/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(adminEmail)) {
          showFeedback('Sila masukkan format e-mel admin yang sah.', 'error');
          return;
        }

        // Collect toggle states
        const toggleStates = {};
        document.querySelectorAll('.adm-toggle[data-setting]').forEach(btn => {
          toggleStates[btn.dataset.setting] = btn.classList.contains('active');
        });

        // Update overview card
        if (orgName) document.getElementById('settingOrgNameDisplay').textContent = orgName;
        if (orgTagline) document.getElementById('settingOrgTaglineDisplay').textContent = `${orgTagline} • EST. ${orgEst || '1946'}`;

        const payload = { orgName, orgTagline, orgEst, orgRegNo, orgDesc, contact, phone, address, website,
          socialFb, socialIg, socialYt, socialTt, socialWa, metaTitle, metaDesc, copyrightYr, adminEmail, note,
          toggleStates };
        localStorage.setItem('tbaSettings', JSON.stringify(payload));

        if (typeof addActivityLog === 'function') {
          addActivityLog('Tetapan sistem disimpan', `Organisasi: ${orgName || 'Tak Banyak Alasan'}`, 'info');
        }
        showFeedback('Semua tetapan sistem berjaya disimpan.');
      });

      document.getElementById('admResetSettings').addEventListener('click', () => {
        document.getElementById('settingOrgName').value = 'Campaign Tak Banyak Alasan';
        document.getElementById('settingOrgTagline').value = 'Bersama Kita Bergerak, Bersama Kita Membina';
        document.getElementById('settingOrgEst').value = '1946';
        document.getElementById('settingOrgRegNo').value = '';
        document.getElementById('settingOrgDesc').value = 'Tak Banyak Alasan adalah gerakan komuniti yang berdedikasi untuk membangun dan memperkasa rakyat Wilayah Persekutuan Putrajaya.';
        document.getElementById('settingContact').value = 'info@takbanyakalasan.org.my';
        document.getElementById('settingPhone').value = '+603-8888 XXXX';
        document.getElementById('settingAddress').value = 'Presint 9, Putrajaya, WP Malaysia';
        document.getElementById('settingWebsite').value = 'https://takbanyakalasan.org.my';
        document.getElementById('settingSocialFb').value = '';
        document.getElementById('settingSocialIg').value = '';
        document.getElementById('settingSocialYt').value = '';
        document.getElementById('settingSocialTt').value = '';
        document.getElementById('settingSocialWa').value = '';
        document.getElementById('settingMetaTitle').value = 'Campaign Tak Banyak Alasan';
        document.getElementById('settingMetaDesc').value = 'Gerakan komuniti bersepadu untuk membangun kesejahteraan rakyat Wilayah Persekutuan Putrajaya.';
        document.getElementById('settingCopyrightYear').value = '2026';
        document.getElementById('settingAdminEmail').value = window.__TBA_ADMIN_EMAIL__ || '';
        document.getElementById('admSettingPassword').value = '';
        document.getElementById('admSettingNote').value = '';
        // Reset toggles
        document.querySelectorAll('.adm-toggle[data-setting]').forEach(btn => {
          const defaultOn = ['notifNew','notifEvent','notifLogin'].includes(btn.dataset.setting);
          btn.classList.toggle('active', defaultOn);
          btn.setAttribute('aria-pressed', defaultOn ? 'true' : 'false');
        });
        document.getElementById('settingOrgNameDisplay').textContent = 'Campaign Tak Banyak Alasan';
        document.getElementById('settingOrgTaglineDisplay').textContent = 'Wilayah Persekutuan Putrajaya • EST. 1946';
        showFeedback('Tetapan dipulihkan ke nilai lalai.');
      });

      // Toggle switch interactions
      document.querySelectorAll('.adm-toggle[data-setting]').forEach(btn => {
        btn.addEventListener('click', () => {
          const isActive = btn.classList.toggle('active');
          btn.setAttribute('aria-pressed', isActive ? 'true' : 'false');
          const label = btn.closest('.adm-toggle-row')?.querySelector('strong')?.textContent || btn.dataset.setting;
          showFeedback(`${label}: ${isActive ? 'Diaktifkan' : 'Dinyahaktifkan'}.`);
        });
      });

      // Clear cache button
      document.getElementById('admClearCacheBtn')?.addEventListener('click', () => {
        ['tbaSettings','tbaAccountProfile','tbaLoginCount','tbaCmsFrontpageData'].forEach(k => localStorage.removeItem(k));
        if (typeof addActivityLog === 'function') addActivityLog('Cache pelayar dikosongkan', 'Data sementara sesi ini telah dibuang', 'warning');
        showFeedback('Cache pelayar telah dikosongkan.');
      });

      document.getElementById('admExportMembers')?.addEventListener('click', () => {
        exportCsv('ahli-bantuan.csv', ['Nama', 'No. KP', 'Presint', 'Bantuan', 'Tarikh', 'Status'], members.map((member) => [member.name, member.kp, member.presint, member.aid, member.date, member.status]));
        showFeedback('Fail CSV ahli berjaya dimuat turun.');
      });
      document.getElementById('admExportEvents')?.addEventListener('click', () => {
        exportCsv('kegiatan.csv', ['Tajuk', 'Kategori', 'Tarikh', 'Lokasi', 'Status'], events.map((event) => [event.title, event.category, event.date, event.place, event.status]));
        showFeedback('Fail CSV kegiatan berjaya dimuat turun.');
      });
      document.getElementById('admExportArticles')?.addEventListener('click', () => {
        exportCsv('artikel.csv', ['Tajuk', 'Penulis', 'Kategori', 'Tarikh', 'Status'], articles.map((article) => [article.title, article.author, article.category, article.date, article.status]));
        showFeedback('Fail CSV artikel berjaya dimuat turun.');
      });

      // Load saved settings on init
      (() => {
        try {
          const savedSettings = localStorage.getItem('tbaSettings');
          if (!savedSettings) return;
          const s = JSON.parse(savedSettings);
          const setVal = (id, val) => { const el = document.getElementById(id); if (el && val !== undefined) el.value = val; };
          setVal('settingOrgName', s.orgName);       setVal('settingOrgTagline', s.orgTagline);
          setVal('settingOrgEst', s.orgEst);         setVal('settingOrgRegNo', s.orgRegNo);
          setVal('settingOrgDesc', s.orgDesc);       setVal('settingContact', s.contact);
          setVal('settingPhone', s.phone);           setVal('settingAddress', s.address);
          setVal('settingWebsite', s.website);       setVal('settingSocialFb', s.socialFb);
          setVal('settingSocialIg', s.socialIg);     setVal('settingSocialYt', s.socialYt);
          setVal('settingSocialTt', s.socialTt);     setVal('settingSocialWa', s.socialWa);
          setVal('settingMetaTitle', s.metaTitle);   setVal('settingMetaDesc', s.metaDesc);
          setVal('settingCopyrightYear', s.copyrightYr); setVal('settingAdminEmail', s.adminEmail);
          setVal('admSettingNote', s.note);
          if (s.orgName) document.getElementById('settingOrgNameDisplay').textContent = s.orgName;
          if (s.orgTagline) document.getElementById('settingOrgTaglineDisplay').textContent = `${s.orgTagline} • EST. ${s.orgEst || '1946'}`;
          // Restore toggles
          if (s.toggleStates) {
            document.querySelectorAll('.adm-toggle[data-setting]').forEach(btn => {
              const val = s.toggleStates[btn.dataset.setting];
              if (val !== undefined) {
                btn.classList.toggle('active', val);
                btn.setAttribute('aria-pressed', val ? 'true' : 'false');
              }
            });
          }
        } catch(e) {}
      })();
      search.addEventListener('input', renderTable);
      form.addEventListener('submit', saveItem);

      // Delete Confirm Modal bindings
      document.getElementById('admCloseDeleteConfirmModal').addEventListener('click', closeDeleteConfirm);
      document.getElementById('admCancelDeleteConfirm1').addEventListener('click', closeDeleteConfirm);
      document.getElementById('admCancelDeleteConfirm2').addEventListener('click', closeDeleteConfirm);
      document.getElementById('admNextDeleteConfirm').addEventListener('click', () => {
        deleteConfirmStep1.style.display = 'none';
        deleteConfirmStep2.style.display = 'block';
      });
      document.getElementById('admFinalDeleteConfirm').addEventListener('click', () => {
        const { type, id, name } = deleteTarget;
        if (type === 'item') {
          const index = items.findIndex((entry) => entry.id === id);
          if (index !== -1) {
            items.splice(index, 1);
            state.selectedId = items[0]?.id || null;
            renderTable();
            showFeedback('Item berjaya dipadam dari daftar kerja.');
          }
        } else if (type === 'member') {
          const idx = members.findIndex(m => m.id === id);
          if (idx !== -1) {
            members.splice(idx, 1);
            renderMembers();
            showFeedback(`Rekod bantuan "${name}" dipadam.`);
          }
        } else if (type === 'event') {
          const idx = events.findIndex(e => e.id === id);
          if (idx !== -1) {
            events.splice(idx, 1);
            renderEvents();
            showFeedback(`Event "${name}" berjaya dipadam.`);
          }
        } else if (type === 'article') {
          const idx = articles.findIndex(a => a.id === id);
          if (idx !== -1) {
            articles.splice(idx, 1);
            renderArticles();
            showFeedback(`Artikel "${name}" berjaya dipadam.`);
          }
        }
        closeDeleteConfirm();
      });

      // Close all modals helper bindings
      function closeAllModals() {
        closeModal();
        eventModal.classList.remove('open');
        articleModal.classList.remove('open');
        cmsModal.classList.remove('open');
        memberModal.classList.remove('open');
        itemPreviewModal.classList.remove('open');
        eventPreviewModal.classList.remove('open');
        cmsPreviewModal.classList.remove('open');
        proofModal.classList.remove('open');
        articlePreviewModal.classList.remove('open');
        closeDeleteConfirm();
        document.querySelectorAll('#admEventRows tr, #admArticleRows tr, #admMemberRows tr').forEach(r => r.classList.remove('selected'));
      }

      document.querySelectorAll('.adm-modal-backdrop').forEach(backdrop => {
        backdrop.addEventListener('click', (event) => {
          if (event.target === backdrop) closeAllModals();
        });
      });

      document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') closeAllModals();
      });

      menuToggle.addEventListener('click', () => {
        const isOpen = mobileMenu.classList.toggle('open');
        menuToggle.setAttribute('aria-expanded', String(isOpen));
      });

      renderTable();
      renderMembers();
      renderEvents();
      renderArticles();
      syncCmsCards();
      animateNumbers('overview');
    })();
