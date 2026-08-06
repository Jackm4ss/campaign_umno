    <section class="adm-view" id="adm-view-events">

      <!-- EVENT STATS -->
      <section class="adm-stats" style="grid-template-columns:repeat(3,1fr);margin-bottom:20px;">
        <article class="adm-stat" style="background:#dbeafe;text-align:center;">
          <div class="adm-value" style="font-size:28px;color:#1d4ed8;">3</div>
          <div class="adm-label" style="color:#1d4ed8;">Sedang Berlangsung</div>
        </article>
        <article class="adm-stat" style="background:#fef9c3;text-align:center;">
          <div class="adm-value" style="font-size:28px;color:#ca8a04;">3</div>
          <div class="adm-label" style="color:#ca8a04;">Akan Datang</div>
        </article>
        <article class="adm-stat" style="background:#f1f5f9;text-align:center;">
          <div class="adm-value" style="font-size:28px;color:#64748b;">81</div>
          <div class="adm-label" style="color:#64748b;">Selesai / Lepas</div>
        </article>
      </section>

      <section class="adm-panel">
        <div class="adm-panel-head adm-event-head">
          <h2 class="adm-panel-title">Senarai Kegiatan</h2>
          <div class="adm-event-actions" style="display:flex;gap:8px;">
            <button class="adm-ghost" type="button" id="admExportEvents" style="font-size:11px;">⬇ Eksport</button>
            <button class="adm-primary" id="admOpenEventModal" type="button">+ Tambah Kegiatan</button>
          </div>
        </div>
        <p class="adm-card-note">Klik <strong>Semak</strong> untuk pratonton, <strong>Kemaskini</strong> untuk sunting, atau <strong>Padam</strong> untuk membuang rekod kegiatan.</p>
        <div class="adm-filters">
          <input id="admEventSearch" type="search" placeholder="🔍 Cari nama kegiatan / lokasi">
          <select id="admEventFilterCategory">
            <option value="">Semua Kategori</option>
            <option>Ceramah</option>
            <option>Gotong Royong</option>
            <option>Kesihatan</option>
            <option>Sukan</option>
            <option>Kemasyarakatan</option>
            <option>Pendidikan</option>
          </select>
          <select id="admEventFilterStatus">
            <option value="">Semua Status</option>
            <option>Ongoing</option>
            <option>Upcoming</option>
            <option>Past</option>
          </select>
        </div>
        <div class="adm-table-wrap">
          <table class="adm-table">
            <thead>
              <tr>
                <th>Nama Kegiatan</th>
                <th>Kategori</th>
                <th>Tarikh</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody id="admEventRows">
              <tr>
                <td><div style="font-weight:600;color:#1e293b;">Ceramah Ulang Tahun Tak Banyak Alasan Ke-80</div></td>
                <td><span style="background:#dbeafe;color:#1d4ed8;padding:2px 8px;border-radius:99px;font-size:11px;font-weight:600;">Ceramah</span></td>
                <td style="font-size:12px;color:#64748b;">20 Jun 2026</td>
                <td style="font-size:12px;color:#64748b;">Dewan Komuniti P9</td>
                <td><span class="adm-badge active">Ongoing</span></td>
                <td style="display:flex;gap:4px;">
                  <button class="adm-mini" data-event-action="view" type="button">Semak</button>
                  <button class="adm-mini" data-event-action="edit" type="button">Kemaskini</button>
                  <button class="adm-mini danger" data-event-action="delete" type="button">Padam</button>
                </td>
              </tr>
              <tr>
                <td><div style="font-weight:600;color:#1e293b;">Klinik Komuniti Percuma Tak Banyak Alasan</div></td>
                <td><span style="background:#dcfce7;color:#16a34a;padding:2px 8px;border-radius:99px;font-size:11px;font-weight:600;">Kesihatan</span></td>
                <td style="font-size:12px;color:#64748b;">28 Jun 2026</td>
                <td style="font-size:12px;color:#64748b;">Presint 11, Putrajaya</td>
                <td><span class="adm-badge pending">Upcoming</span></td>
                <td style="display:flex;gap:4px;">
                  <button class="adm-mini" data-event-action="view" type="button">Semak</button>
                  <button class="adm-mini" data-event-action="edit" type="button">Kemaskini</button>
                  <button class="adm-mini danger" data-event-action="delete" type="button">Padam</button>
                </td>
              </tr>
              <tr>
                <td><div style="font-weight:600;color:#1e293b;">Gotong Royong Mega Presint 5</div></td>
                <td><span style="background:#f3e8ff;color:#7c3aed;padding:2px 8px;border-radius:99px;font-size:11px;font-weight:600;">Gotong Royong</span></td>
                <td style="font-size:12px;color:#64748b;">5 Julai 2026</td>
                <td style="font-size:12px;color:#64748b;">Tasik Putrajaya</td>
                <td><span class="adm-badge pending">Upcoming</span></td>
                <td style="display:flex;gap:4px;">
                  <button class="adm-mini" data-event-action="view" type="button">Semak</button>
                  <button class="adm-mini" data-event-action="edit" type="button">Kemaskini</button>
                  <button class="adm-mini danger" data-event-action="delete" type="button">Padam</button>
                </td>
              </tr>
              <tr>
                <td><div style="font-weight:600;color:#1e293b;">Program Gotong Royong Presint 5</div></td>
                <td><span style="background:#f3e8ff;color:#7c3aed;padding:2px 8px;border-radius:99px;font-size:11px;font-weight:600;">Komuniti</span></td>
                <td style="font-size:12px;color:#64748b;">15 Mac 2026</td>
                <td style="font-size:12px;color:#64748b;">Presint 5, Putrajaya</td>
                <td><span class="adm-badge draft">Past</span></td>
                <td style="display:flex;gap:4px;">
                  <button class="adm-mini" data-event-action="view" type="button">Semak</button>
                  <button class="adm-mini" data-event-action="edit" type="button">Kemaskini</button>
                  <button class="adm-mini danger" data-event-action="delete" type="button">Padam</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div style="padding:12px 24px;border-top:1px solid var(--adm-line);display:flex;align-items:center;justify-content:space-between;">
          <span style="font-size:11px;color:#8490a8;">Menunjukkan 4 daripada 87 rekod</span>
          <div style="display:flex;gap:6px;">
            <button class="adm-ghost" style="font-size:11px;padding:4px 12px;" disabled>‹ Sebelum</button>
            <button class="adm-ghost" style="font-size:11px;padding:4px 12px;">Seterusnya ›</button>
          </div>
        </div>
      </section>
    </section>

