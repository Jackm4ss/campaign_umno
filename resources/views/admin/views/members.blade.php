    <section class="adm-view" id="adm-view-members">

      <!-- MEMBER STATS BAR -->
      <section class="adm-stats" style="grid-template-columns:repeat(4,1fr);margin-bottom:20px;" aria-label="Statistik ahli">
        <article class="adm-stat" style="text-align:center;">
          <div class="adm-value" style="font-size:28px;">2,400</div>
          <div class="adm-label">Jumlah Ahli</div>
        </article>
        <article class="adm-stat orange" style="text-align:center;">
          <div class="adm-value" style="font-size:28px;">34</div>
          <div class="adm-label">Permohonan Aktif</div>
        </article>
        <article class="adm-stat" style="background:#fef9c3;text-align:center;">
          <div class="adm-value" style="font-size:28px;color:#ca8a04;">18</div>
          <div class="adm-label" style="color:#ca8a04;">Belum Ditindak</div>
        </article>
        <article class="adm-stat green" style="text-align:center;">
          <div class="adm-value" style="font-size:28px;">91</div>
          <div class="adm-label">Selesai</div>
        </article>
      </section>

      <section class="adm-panel">
        <div class="adm-panel-head adm-member-head">
          <h2 class="adm-panel-title">Data Ahli & Bantuan</h2>
          <div class="adm-member-actions" style="display:flex;gap:8px;">
            <a href="{{ route('bantuan.qr') }}" download class="adm-ghost" style="font-size:11px;text-decoration:none;display:inline-flex;align-items:center;gap:4px;">⬇ QR Borang Bantuan</a>
            <button class="adm-ghost" type="button" id="admExportMembers" style="font-size:11px;">⬇ Eksport CSV</button>
            <button class="adm-primary" id="admOpenMemberModal" type="button">+ Tambah Rekod</button>
          </div>
        </div>
        <p class="adm-card-note">Gunakan filter untuk menyaring rekod. Klik <strong>Semak</strong> untuk lihat butiran, <strong>Kemaskini</strong> untuk sunting, atau <strong>Padam</strong> untuk membuang rekod.</p>
        <div class="adm-filters">
          <input id="admMemberSearch" type="search" placeholder="🔍 Cari nama / no. KP / presint">
          <select id="admMemberPresint">
            <option value="">Semua Presint</option>
            <option>Presint 9</option>
            <option>Presint 11</option>
            <option>Presint 14</option>
            <option>Presint 15</option>
            <option>Presint 16</option>
          </select>
          <select id="admMemberAid">
            <option value="">Semua Bantuan</option>
            <option>Katil Hospital</option>
            <option>Makanan Asas</option>
            <option>Wang Tunai RM300</option>
            <option>Biasiswa Pelajaran</option>
            <option>Bantuan Perubatan</option>
          </select>
          <select id="admMemberStatus">
            <option value="">Semua Status</option>
            <option>Belum Tindakan</option>
            <option>Dirancang</option>
            <option>Selesai</option>
          </select>
        </div>
        <div class="adm-table-wrap">
          <table class="adm-table">
            <thead>
              <tr>
                <th>Nama Ahli</th>
                <th>No. KP</th>
                <th>Presint</th>
                <th>Jenis Bantuan</th>
                <th>Tarikh Mohon</th>
                <th>Status</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody id="admMemberRows">
              <tr data-presint="Presint 9" data-aid="Katil Hospital" data-status="Belum Tindakan">
                <td><div style="font-weight:600;color:#1e293b;">Nur Aisyah Binti Rahman</div></td>
                <td style="font-family:monospace;font-size:12px;">XXXXXX-XX-4821</td>
                <td>Presint 9</td>
                <td><span style="background:#dbeafe;color:#1d4ed8;padding:2px 8px;border-radius:99px;font-size:11px;font-weight:600;">Katil Hospital</span></td>
                <td style="font-size:12px;color:#64748b;">16 Jun 2026</td>
                <td><span class="adm-badge pending">Belum Tindakan</span></td>
                <td style="display:flex;gap:4px;">
                  <button class="adm-mini" type="button" data-member-action="Semak" data-member-id="1">Semak</button>
                  <button class="adm-mini" type="button" data-member-action="Kemaskini" data-member-id="1">Kemaskini</button>
                  <button class="adm-mini danger" type="button" data-member-action="Padam" data-member-id="1">Padam</button>
                </td>
              </tr>
              <tr data-presint="Presint 11" data-aid="Makanan Asas" data-status="Dirancang">
                <td><div style="font-weight:600;color:#1e293b;">Mohd Hafiz Bin Salleh</div></td>
                <td style="font-family:monospace;font-size:12px;">XXXXXX-XX-1190</td>
                <td>Presint 11</td>
                <td><span style="background:#dcfce7;color:#16a34a;padding:2px 8px;border-radius:99px;font-size:11px;font-weight:600;">Makanan Asas</span></td>
                <td style="font-size:12px;color:#64748b;">15 Jun 2026</td>
                <td><span class="adm-badge draft">Dirancang</span></td>
                <td style="display:flex;gap:4px;">
                  <button class="adm-mini" type="button" data-member-action="Semak" data-member-id="2">Semak</button>
                  <button class="adm-mini" type="button" data-member-action="Kemaskini" data-member-id="2">Kemaskini</button>
                  <button class="adm-mini danger" type="button" data-member-action="Padam" data-member-id="2">Padam</button>
                </td>
              </tr>
              <tr data-presint="Presint 14" data-aid="Wang Tunai RM300" data-status="Selesai">
                <td><div style="font-weight:600;color:#1e293b;">Siti Mariam Binti Noor</div></td>
                <td style="font-family:monospace;font-size:12px;">XXXXXX-XX-7304</td>
                <td>Presint 14</td>
                <td><span style="background:#fef3c7;color:#b45309;padding:2px 8px;border-radius:99px;font-size:11px;font-weight:600;">Wang Tunai RM300</span></td>
                <td style="font-size:12px;color:#64748b;">14 Jun 2026</td>
                <td><span class="adm-badge active">Selesai</span></td>
                <td style="display:flex;gap:4px;">
                  <button class="adm-mini" type="button" data-member-action="Semak" data-member-id="3">Semak</button>
                  <button class="adm-mini" type="button" data-member-action="Kemaskini" data-member-id="3">Kemaskini</button>
                  <button class="adm-mini danger" type="button" data-member-action="Padam" data-member-id="3">Padam</button>
                </td>
              </tr>
              <tr data-presint="Presint 9" data-aid="Bantuan Perubatan" data-status="Belum Tindakan">
                <td><div style="font-weight:600;color:#1e293b;">Ahmad Zaidi Bin Omar</div></td>
                <td style="font-family:monospace;font-size:12px;">XXXXXX-XX-3318</td>
                <td>Presint 9</td>
                <td><span style="background:#fee2e2;color:#dc2626;padding:2px 8px;border-radius:99px;font-size:11px;font-weight:600;">Bantuan Perubatan</span></td>
                <td style="font-size:12px;color:#64748b;">18 Jun 2026</td>
                <td><span class="adm-badge pending">Belum Tindakan</span></td>
                <td style="display:flex;gap:4px;">
                  <button class="adm-mini" type="button" data-member-action="Semak" data-member-id="4">Semak</button>
                  <button class="adm-mini" type="button" data-member-action="Kemaskini" data-member-id="4">Kemaskini</button>
                  <button class="adm-mini danger" type="button" data-member-action="Padam" data-member-id="4">Padam</button>
                </td>
              </tr>
              <tr data-presint="Presint 16" data-aid="Biasiswa Pelajaran" data-status="Dirancang">
                <td><div style="font-weight:600;color:#1e293b;">Nurul Ain Binti Ishak</div></td>
                <td style="font-family:monospace;font-size:12px;">XXXXXX-XX-9902</td>
                <td>Presint 16</td>
                <td><span style="background:#f3e8ff;color:#7c3aed;padding:2px 8px;border-radius:99px;font-size:11px;font-weight:600;">Biasiswa Pelajaran</span></td>
                <td style="font-size:12px;color:#64748b;">12 Jun 2026</td>
                <td><span class="adm-badge draft">Dirancang</span></td>
                <td style="display:flex;gap:4px;">
                  <button class="adm-mini" type="button" data-member-action="Semak" data-member-id="5">Semak</button>
                  <button class="adm-mini" type="button" data-member-action="Kemaskini" data-member-id="5">Kemaskini</button>
                  <button class="adm-mini danger" type="button" data-member-action="Padam" data-member-id="5">Padam</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="adm-member-pagination" style="padding:12px 24px;border-top:1px solid var(--adm-line);display:flex;align-items:center;justify-content:space-between;">
          <span style="font-size:11px;color:#8490a8;">Menunjukkan 5 daripada 2,400 rekod</span>
          <div style="display:flex;gap:6px;">
            <button class="adm-ghost" style="font-size:11px;padding:4px 12px;" disabled>‹ Sebelum</button>
            <button class="adm-ghost" style="font-size:11px;padding:4px 12px;">Seterusnya ›</button>
          </div>
        </div>
      </section>
    </section>

