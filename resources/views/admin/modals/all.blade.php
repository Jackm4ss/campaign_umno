
  <!-- EVENT MODAL -->
  <div class="adm-modal-backdrop" id="admEventModal" aria-hidden="true">
    <section class="adm-modal" role="dialog" aria-modal="true" aria-labelledby="admEventModalTitle">
      <div class="adm-modal-head">
        <h2 id="admEventModalTitle">Borang Event</h2>
        <button class="adm-close" id="admCloseEventModal" type="button" aria-label="Tutup">x</button>
      </div>
      <div class="adm-modal-body">
        <div class="adm-editor-grid">
          <div class="adm-field">
            <label for="admEventTitle">Judul Event</label>
            <input id="admEventTitle" type="text" placeholder="Judul event">
          </div>
          <div class="adm-field">
            <label for="admEventDate">Tarikh & Masa</label>
            <input id="admEventDate" type="datetime-local">
          </div>
          <div class="adm-field">
            <label for="admEventPlace">Lokasi / Nama Tempat</label>
            <input id="admEventPlace" type="text" placeholder="Lokasi / nama tempat">
          </div>
          <div class="adm-field">
            <label for="admEventAddress">Alamat Lokasi</label>
            <input id="admEventAddress" type="text" placeholder="Alamat lokasi">
          </div>
          <div class="adm-field">
            <label for="admEventCategory">Kategori</label>
            <select id="admEventCategory"><option>Ceramah</option><option>Gotong Royong</option><option>Kesihatan</option><option>Sukan</option><option>Kemasyarakatan</option></select>
          </div>
          <div class="adm-field">
            <label for="admEventStatus">Status</label>
            <select id="admEventStatus"><option>Ongoing</option><option>Upcoming</option><option>Past</option></select>
          </div>
          <div class="adm-field full">
            <label for="admEventMap">Link Peta Lokasi (Google Maps)</label>
            <input id="admEventMap" class="full" type="text" placeholder="Link peta lokasi">
          </div>
          <div class="adm-field full">
            <label for="admEventDesc">Deskripsi Event</label>
            <textarea id="admEventDesc" placeholder="Deskripsi event" style="min-height: 100px;"></textarea>
          </div>
        </div>
      </div>
      <div class="adm-modal-foot">
        <button class="adm-ghost" type="button" id="admCancelEventModal">Batal</button>
        <button class="adm-primary" type="button" id="admSaveEvent">Simpan Event</button>
      </div>
    </section>
  </div>

  <!-- ARTICLE MODAL -->
  <div class="adm-modal-backdrop" id="admArticleModal" aria-hidden="true">
    <section class="adm-modal" role="dialog" aria-modal="true" aria-labelledby="admArticleModalTitle" style="width: min(800px, 100%);">
      <div class="adm-modal-head">
        <div style="display:flex; align-items:center; gap:12px;">
          <h2 id="admArticleModalTitle">Editor Artikel</h2>
          <span class="adm-badge draft" id="admArticleStatus">Draft</span>
        </div>
        <button class="adm-close" id="admCloseArticleModal" type="button" aria-label="Tutup">x</button>
      </div>
      <div class="adm-modal-body">
        <div class="adm-editor-grid">
          <div class="adm-field">
            <label for="admArticleTitle">Judul Artikel</label>
            <input id="admArticleTitle" type="text" placeholder="Judul artikel">
          </div>
          <div class="adm-field">
            <label for="admArticleAuthor">Penulis</label>
            <input id="admArticleAuthor" type="text" placeholder="Penulis">
          </div>
          <div class="adm-field">
            <label for="admArticleCategory">Kategori</label>
            <select id="admArticleCategory"><option>Komuniti</option><option>Kesihatan</option><option>Pendidikan</option><option>Sukan</option></select>
          </div>
          <div class="adm-field">
            <label for="admArticleImage">Path Gambar</label>
            <input id="admArticleImage" type="text" placeholder="Path gambar">
          </div>
          <div class="adm-toolbar full" style="margin-bottom: 4px;">
            <span class="adm-tool-chip">B</span><span class="adm-tool-chip">I</span><span class="adm-tool-chip">U</span><span class="adm-tool-chip">H1</span><span class="adm-tool-chip">H2</span><span class="adm-tool-chip">List</span><span class="adm-tool-chip">Link</span>
          </div>
          <div class="adm-field full">
            <label for="admArticleBody">Kandungan Artikel</label>
            <textarea id="admArticleBody" placeholder="Tulis isi artikel di sini..." style="min-height: 220px;"></textarea>
          </div>
        </div>
      </div>
      <div class="adm-modal-foot">
        <button class="adm-ghost" type="button" id="admCancelArticleModal">Batal</button>
        <button class="adm-ghost" type="button" data-article-submit="preview">Preview</button>
        <button class="adm-ghost" type="button" data-article-submit="draft">Simpan Draft</button>
        <button class="adm-primary" type="button" data-article-submit="publish">Publish</button>
      </div>
    </section>
  </div>

  <!-- CMS MODAL -->
  <div class="adm-modal-backdrop" id="admCmsModal" aria-hidden="true">
    <section class="adm-modal" role="dialog" aria-modal="true" aria-labelledby="admCmsModalTitle">
      <div class="adm-modal-head">
        <h2 id="admCmsModalTitle">Sunting Modul CMS</h2>
        <button class="adm-close" id="admCloseCmsModal" type="button" aria-label="Tutup">x</button>
      </div>
      <div class="adm-modal-body">
        <div class="adm-editor-grid">
          <div class="adm-field">
            <label for="admCmsModule">Nama Modul</label>
            <input id="admCmsModule" type="text" readonly style="background: #f5f7fb; cursor: not-allowed;">
          </div>
          <div class="adm-field">
            <label for="admCmsStatus">Status</label>
            <select id="admCmsStatus">
              <option>Published</option>
              <option>Draft</option>
            </select>
          </div>
          <div class="adm-field full">
            <label for="admCmsTitle">Judul Modul</label>
            <input id="admCmsTitle" class="full" type="text">
          </div>
          <div class="adm-field full">
            <label for="admCmsImage">Path Gambar / Visual</label>
            <input id="admCmsImage" class="full" type="text">
          </div>
          <div class="adm-field full">
            <label for="admCmsDesc">Keterangan / Deskripsi</label>
            <textarea id="admCmsDesc" style="min-height: 100px;"></textarea>
          </div>
        </div>
      </div>
      <div class="adm-modal-foot">
        <button class="adm-ghost" type="button" id="admCancelCmsModal">Batal</button>
        <button class="adm-ghost" type="button" id="admPreviewCmsBtn">Semak</button>
        <button class="adm-primary" type="button" id="admSaveCmsModalBtn">Simpan CMS</button>
      </div>
    </section>
  </div>

  <!-- MEMBER MODAL -->
  <div class="adm-modal-backdrop" id="admMemberModal" aria-hidden="true">
    <section class="adm-modal" role="dialog" aria-modal="true" aria-labelledby="admMemberModalTitle">
      <div class="adm-modal-head">
        <h2 id="admMemberModalTitle">Borang Rekod Ahli & Bantuan</h2>
        <button class="adm-close" id="admCloseMemberModal" type="button" aria-label="Tutup">x</button>
      </div>
      <div class="adm-modal-body">
        <div class="adm-field" style="margin-bottom:16px;">
          <label>Pas Foto (Wajib)</label>
          <div style="display:flex; gap:16px; align-items:center;">
            <img id="admMemberPhotoPreview" src="https://ui-avatars.com/api/?name=Baru&background=f1f5f9&color=1e293b&size=80" style="width:80px;height:80px;border-radius:8px;object-fit:cover;border:1px solid #e2e8f0;" alt="Preview">
            <input id="admMemberPhotoInput" type="file" accept="image/*" style="flex:1;" onchange="
              const file = this.files[0];
              if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                  document.getElementById('admMemberPhotoPreview').src = e.target.result;
                  document.getElementById('admMemberPhotoBase64').value = e.target.result;
                };
                reader.readAsDataURL(file);
              }
            ">
          </div>
          <input type="hidden" id="admMemberPhotoBase64">
        </div>
        <div class="adm-editor-grid">
          <div class="adm-field">
            <label for="admMemberNameInput">Nama Penuh</label>
            <input id="admMemberNameInput" type="text" placeholder="Nama penuh ahli">
          </div>
          <div class="adm-field">
            <label for="admMemberKpInput">No. Kad Pengenalan</label>
            <input id="admMemberKpInput" type="text" placeholder="XXXXXX-XX-XXXX">
          </div>
          <div class="adm-field">
            <label for="admMemberPresintInput">Presint</label>
            <select id="admMemberPresintInput">
              <option>Presint 9</option>
              <option>Presint 11</option>
              <option>Presint 14</option>
            </select>
          </div>
          <div class="adm-field">
            <label for="admMemberAidInput">Jenis Bantuan</label>
            <select id="admMemberAidInput">
              <option>Katil Hospital</option>
              <option>Makanan Asas</option>
              <option>Wang Tunai RM300</option>
            </select>
          </div>
          <div class="adm-field">
            <label for="admMemberDateInput">Tarikh Permohonan</label>
            <input id="admMemberDateInput" type="text" placeholder="cth: 16 Jun 2026">
          </div>
          <div class="adm-field">
            <label for="admMemberStatusInput">Status Bantuan</label>
            <select id="admMemberStatusInput">
              <option>Belum Tindakan</option>
              <option>Dirancang</option>
              <option>Selesai</option>
            </select>
          </div>
        </div>
      </div>
      <div class="adm-modal-foot">
        <button class="adm-ghost" type="button" id="admCancelMemberModal">Batal</button>
        <button class="adm-primary" type="button" id="admSaveMemberModalBtn">Simpan Rekod</button>
      </div>
    </section>
  </div>

  <!-- ITEM PREVIEW MODAL -->
  <div class="adm-modal-backdrop" id="admItemPreviewModal" aria-hidden="true">
    <section class="adm-modal" role="dialog" aria-modal="true" aria-labelledby="admItemPreviewModalTitle" style="width: min(600px, 100%);">
      <div class="adm-modal-head">
        <h2 id="admItemPreviewModalTitle">Butiran Kegiatan</h2>
        <button class="adm-close" id="admCloseItemPreviewModal" type="button" aria-label="Tutup">x</button>
      </div>
      <div class="adm-modal-body">
        <div style="border: 1px solid var(--adm-line); border-radius: 8px; background: linear-gradient(135deg, #fff6f7 0%, #f7f9ff 100%); padding: 18px; margin-bottom: 16px;">
          <h3 id="previewItemName" style="font-size: 18px; font-weight: 900; color: #050a20; margin: 0;">Nama Kegiatan</h3>
          <p id="previewItemDesc" style="margin-top: 9px; color: #4e5367; font-size: 13px; line-height: 1.75; white-space: pre-wrap;">Catatan kegiatan...</p>
        </div>
        <div class="adm-detail-list">
          <div class="adm-detail-item"><span>Kategori</span><strong id="previewItemCategory">-</strong></div>
          <div class="adm-detail-item"><span>Status</span><strong id="previewItemStatus">-</strong></div>
          <div class="adm-detail-item"><span>Tarikh</span><strong id="previewItemDate">-</strong></div>
          <div class="adm-detail-item"><span>Lokasi</span><strong id="previewItemLocation">-</strong></div>
        </div>
      </div>
      <div class="adm-modal-foot">
        <button class="adm-primary" type="button" id="admCloseItemPreviewModalBtn">Tutup</button>
      </div>
    </section>
  </div>

  <!-- BUKTI MODAL -->
  <div class="adm-modal-backdrop" id="admProofModal" aria-hidden="true">
    <section class="adm-modal" role="dialog" aria-modal="true" aria-labelledby="admProofModalTitle" style="width: min(500px, 100%);">
      <div class="adm-modal-head">
        <h2 id="admProofModalTitle">Bukti Penyerahan Bantuan</h2>
        <button class="adm-close" id="admCloseProofModal" type="button" aria-label="Tutup">x</button>
      </div>
      <div class="adm-modal-body" style="text-align: center;">
        <div style="border: 1px solid var(--adm-line); border-radius: 8px; padding: 16px; background: #fbfcff; margin-bottom: 16px;">
          <h3 id="admProofMemberName" style="font-size: 16px; font-weight: 900; margin-bottom: 4px; color: var(--adm-text);">Nama Ahli</h3>
          <p id="admProofMemberKp" style="font-size: 13px; color: var(--adm-muted); margin-bottom: 12px;">No. KP: XXXXXX-XX-XXXX</p>
          <div style="display: flex; justify-content: space-around; gap: 8px; text-align: left; font-size: 13px; border-top: 1px solid var(--adm-line); padding-top: 12px;">
            <div>
              <span style="display:block; font-size: 10px; font-weight:900; color:var(--adm-muted); text-transform:uppercase;">Jenis Bantuan</span>
              <strong id="admProofAidType">Wang Tunai</strong>
            </div>
            <div>
              <span style="display:block; font-size: 10px; font-weight:900; color:var(--adm-muted); text-transform:uppercase;">Tarikh Selesai</span>
              <strong id="admProofDate">14 Jun 2026</strong>
            </div>
          </div>
        </div>
        <div style="border: 2px dashed var(--adm-line); border-radius: 8px; padding: 30px 20px; background: #fafafa; display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 8px;">
          <span style="font-size: 28px;">📄</span>
          <strong style="font-size: 13px; color: var(--adm-text);">Resit_Penyerahan_Bantuan.pdf</strong>
          <span style="font-size: 11px; color: var(--adm-muted);">Dokumen disahkan & ditandatangani secara digital oleh Penerima & Petugas.</span>
        </div>
      </div>
      <div class="adm-modal-foot">
        <button class="adm-primary" type="button" id="admCloseProofModalBtn">Tutup</button>
      </div>
    </section>
  </div>

  <!-- ARTICLE PREVIEW MODAL -->
  <div class="adm-modal-backdrop" id="admArticlePreviewModal" aria-hidden="true">
    <section class="adm-modal" role="dialog" aria-modal="true" aria-labelledby="admArticlePreviewTitle" style="width: min(800px, 100%);">
      <div class="adm-modal-head">
        <h2 id="admArticlePreviewTitle">Pretonton Artikel</h2>
        <button class="adm-close" id="admCloseArticlePreviewModal" type="button" aria-label="Tutup">x</button>
      </div>
      <div class="adm-modal-body">
        <div style="margin-bottom: 16px;">
          <span id="previewArticleCategory" class="adm-badge active" style="margin-bottom: 8px;">Kategori</span>
          <h1 id="previewArticleTitle" style="font-family: 'Bebas Neue', Impact, sans-serif; font-size: 32px; color: var(--adm-text); line-height: 1.1; margin: 8px 0;">Tajuk Artikel</h1>
          <div style="font-size: 13px; color: var(--adm-muted);">Ditulis oleh <strong id="previewArticleAuthor" style="color: var(--adm-text);">Penulis</strong> pada <span id="previewArticleDate">Tarikh</span></div>
        </div>
        <div id="previewArticleImageContainer" style="margin-bottom: 16px; border-radius: 8px; overflow: hidden; max-height: 300px; border: 1px solid var(--adm-line);">
          <img id="previewArticleImg" src="assets/article-main.jpg" alt="Article image" style="width: 100%; height: auto; object-fit: cover; display: block;">
        </div>
        <div id="previewArticleBody" style="font-size: 14px; line-height: 1.8; color: #333; white-space: pre-wrap;">
          Kandungan artikel...
        </div>
      </div>
      <div class="adm-modal-foot">
        <button class="adm-primary" type="button" id="admCloseArticlePreviewBtn">Tutup</button>
      </div>
    </section>
  </div>

  <!-- EVENT PREVIEW MODAL -->
  <div class="adm-modal-backdrop" id="admEventPreviewModal" aria-hidden="true">
    <section class="adm-modal" role="dialog" aria-modal="true" aria-labelledby="admEventPreviewModalTitle" style="width: min(600px, 100%);">
      <div class="adm-modal-head">
        <h2 id="admEventPreviewModalTitle">Butiran Event</h2>
        <button class="adm-close" id="admCloseEventPreviewModal" type="button" aria-label="Tutup">x</button>
      </div>
      <div class="adm-modal-body">
        <div style="border: 1px solid var(--adm-line); border-radius: 8px; background: linear-gradient(135deg, #fffcf7 0%, #fcf7ff 100%); padding: 18px; margin-bottom: 16px;">
          <h3 id="previewEventTitle" style="font-size: 18px; font-weight: 900; color: #050a20; margin: 0;">Nama Event</h3>
          <p id="previewEventDesc" style="margin-top: 9px; color: #4e5367; font-size: 13px; line-height: 1.75; white-space: pre-wrap;">Deskripsi event...</p>
        </div>
        <div class="adm-detail-list">
          <div class="adm-detail-item"><span>Kategori</span><strong id="previewEventCategory">-</strong></div>
          <div class="adm-detail-item"><span>Status</span><strong id="previewEventStatus">-</strong></div>
          <div class="adm-detail-item"><span>Tarikh & Masa</span><strong id="previewEventDate">-</strong></div>
          <div class="adm-detail-item"><span>Tempat</span><strong id="previewEventPlace">-</strong></div>
          <div class="adm-detail-item" style="grid-column: span 2;"><span>Alamat</span><strong id="previewEventAddress">-</strong></div>
          <div class="adm-detail-item"><span>Peta Google</span><div><a id="previewEventMap" href="#" target="_blank" style="color: var(--adm-blue); font-weight: 800;">Buka Peta ↗</a></div></div>
        </div>
      </div>
      <div class="adm-modal-foot">
        <button class="adm-primary" type="button" id="admCloseEventPreviewModalBtn">Tutup</button>
      </div>
    </section>
  </div>

  <!-- CMS PREVIEW MODAL -->
  <div class="adm-modal-backdrop" id="admCmsPreviewModal" aria-hidden="true">
    <section class="adm-modal" role="dialog" aria-modal="true" aria-labelledby="admCmsPreviewModalTitle" style="width: min(650px, 100%);">
      <div class="adm-modal-head">
        <h2 id="admCmsPreviewModalTitle">Pratinjau Modul CMS</h2>
        <button class="adm-close" id="admCloseCmsPreviewModal" type="button" aria-label="Tutup">x</button>
      </div>
      <div class="adm-modal-body" style="background: #f8fafc;">
        <div id="cmsPreviewContainer" class="cms-preview-wrapper" style="border: 1px solid var(--adm-line); border-radius: 8px; background: #fff; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
          <!-- Live preview content populated by JS -->
        </div>
      </div>
      <div class="adm-modal-foot">
        <button class="adm-primary" type="button" id="admCloseCmsPreviewModalBtn">Tutup</button>
      </div>
    </section>
  </div>

  <!-- DELETE CONFIRM MODAL -->
  <div class="adm-modal-backdrop" id="admDeleteConfirmModal" aria-hidden="true">
    <section class="adm-modal" role="dialog" aria-modal="true" aria-labelledby="admDeleteConfirmTitle" style="width: min(420px, 100%);">
      <div class="adm-modal-head">
        <h2 id="admDeleteConfirmTitle">Pengesahan Padam</h2>
        <button class="adm-close" id="admCloseDeleteConfirmModal" type="button" aria-label="Tutup">x</button>
      </div>
      <div class="adm-modal-body" style="text-align: center; padding: 24px;">
        <span style="font-size: 40px; color: var(--adm-red); display: block; margin-bottom: 12px;">⚠️</span>
        <div id="deleteConfirmStep1">
          <p style="font-size: 15px; color: #11162d; font-weight: 800; line-height: 1.45; margin-bottom: 8px;">Adakah anda pasti mahu memadam?</p>
          <p id="deleteConfirmTargetName" style="font-size: 13px; color: #686d7d; line-height: 1.5; margin-bottom: 20px;">[Nama Item]</p>
          <div style="display: flex; gap: 10px; justify-content: center;">
            <button class="adm-ghost" id="admCancelDeleteConfirm1" type="button" style="min-width: 100px;">Batal</button>
            <button class="adm-primary" id="admNextDeleteConfirm" type="button" style="min-width: 100px; background: var(--adm-red); border-color: var(--adm-red);">Seterusnya</button>
          </div>
        </div>
        <div id="deleteConfirmStep2" style="display: none;">
          <p style="font-size: 15px; color: var(--adm-red); font-weight: 900; line-height: 1.45; margin-bottom: 8px;">AMARAN KESELAMATAN</p>
          <p style="font-size: 13px; color: #333; line-height: 1.5; margin-bottom: 20px;">Tindakan ini tidak boleh dibatalkan. Adakah anda benar-benar pasti?</p>
          <div style="display: flex; gap: 10px; justify-content: center;">
            <button class="adm-ghost" id="admCancelDeleteConfirm2" type="button" style="min-width: 100px;">Batal</button>
            <button class="adm-primary" id="admFinalDeleteConfirm" type="button" style="min-width: 100px; background: var(--adm-red); border-color: var(--adm-red);">Ya, Padam</button>
          </div>
        </div>
      </div>
    </section>
  </div>
