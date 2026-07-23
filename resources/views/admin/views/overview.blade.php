    <section class="adm-view active" id="adm-view-overview">

    <!-- STAT CARDS -->
    <section class="adm-stats" style="grid-template-columns: repeat(5, minmax(0, 1fr)); margin-bottom: 20px;" aria-label="Statistik utama">
      <article class="adm-stat" style="cursor:pointer;" onclick="switchView('members')">
        <div class="adm-ov-icon">
          <div class="adm-ov-icon-box" style="background:rgba(26,60,158,0.1); color:#1A3C9E;"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
          <div class="adm-ov-cat">Ahli</div>
        </div>
        <div class="adm-value">2,400</div>
        <div class="adm-label">Ahli Berdaftar</div>
        <div class="adm-ov-trend" style="color:#22c55e;">↑ +47 bulan ini</div>
      </article>
      <article class="adm-stat red" style="cursor:pointer;" onclick="switchView('events')">
        <div class="adm-ov-icon">
          <div class="adm-ov-icon-box" style="background:rgba(220,38,38,0.1); color:#dc2626;"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/><path d="M16 18h.01"/></svg></div>
          <div class="adm-ov-cat">Kegiatan</div>
        </div>
        <div class="adm-value">87</div>
        <div class="adm-label">Jumlah Kegiatan</div>
        <div class="adm-ov-trend" style="color:#3b82f6;">3 berlangsung</div>
      </article>
      <article class="adm-stat orange" style="cursor:pointer;" onclick="switchView('members')">
        <div class="adm-ov-icon">
          <div class="adm-ov-icon-box" style="background:rgba(249,115,22,0.1); color:#f97316;"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg></div>
          <div class="adm-ov-cat">Bantuan</div>
        </div>
        <div class="adm-value">34</div>
        <div class="adm-label">Bantuan Dirancang</div>
        <div class="adm-ov-trend" style="color:#f59e0b;">18 belum ditindak</div>
      </article>
      <article class="adm-stat green" style="cursor:pointer;">
        <div class="adm-ov-icon">
          <div class="adm-ov-icon-box" style="background:rgba(34,197,94,0.1); color:#22c55e;"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div>
          <div class="adm-ov-cat">Aspirasi</div>
        </div>
        <div class="adm-value">126</div>
        <div class="adm-label">Aspirasi Masuk</div>
        <div class="adm-ov-trend" style="color:#22c55e;">↑ +12 minggu ini</div>
      </article>
      <article class="adm-stat" style="cursor:pointer; border-top-color:#8b5cf6;" onclick="switchView('articles')">
        <div class="adm-ov-icon">
          <div class="adm-ov-icon-box" style="background:rgba(139,92,246,0.1); color:#8b5cf6;"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg></div>
          <div class="adm-ov-cat">Artikel</div>
        </div>
        <div class="adm-value">19</div>
        <div class="adm-label">Artikel Diterbit</div>
        <div class="adm-ov-trend" style="color:#f59e0b;">4 draft menunggu</div>
      </article>
    </section>

    <!-- QUICK ACTIONS + ACTIVITY -->
    <section class="adm-work" aria-label="Tindakan pantas">
      <section class="adm-panel">
        <div class="adm-panel-head">
          <h2 class="adm-panel-title" id="admSummaryTitle">Tindakan Diperlukan</h2>
          <span class="adm-badge pending" style="font-size:10px;">4 item</span>
        </div>
        <div style="display:flex;flex-direction:column;gap:0;">

          <div style="display:flex;align-items:center;gap:14px;padding:14px 24px;border-bottom:1px solid var(--adm-line);cursor:pointer;transition:background .15s;" class="adm-card" onclick="switchView('members')">
            <div style="width:40px;height:40px;border-radius:10px;background:#fef3c7;display:flex;align-items:center;justify-content:center;color:#d97706;flex-shrink:0;"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" x2="12" y1="9" y2="13"/><line x1="12" x2="12.01" y1="17" y2="17"/></svg></div>
            <div style="flex:1;">
              <div style="font-size:13px;font-weight:700;color:#1e293b;margin-bottom:2px;">18 Permohonan Bantuan Belum Ditindak</div>
              <div style="font-size:11px;color:#8490a8;">Semak mengikut keutamaan kawasan — Presint 9, 11, 14</div>
            </div>
            <span class="adm-badge pending" style="flex-shrink:0;">Mendesak</span>
          </div>

          <div style="display:flex;align-items:center;gap:14px;padding:14px 24px;border-bottom:1px solid var(--adm-line);cursor:pointer;transition:background .15s;" class="adm-card" onclick="switchView('events')">
            <div style="width:40px;height:40px;border-radius:10px;background:#dbeafe;display:flex;align-items:center;justify-content:center;color:#2563eb;flex-shrink:0;"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/><path d="M8 14h.01"/><path d="M12 14h.01"/><path d="M16 14h.01"/><path d="M8 18h.01"/><path d="M12 18h.01"/><path d="M16 18h.01"/></svg></div>
            <div style="flex:1;">
              <div style="font-size:13px;font-weight:700;color:#1e293b;margin-bottom:2px;">3 Event Aktif, 3 Akan Datang</div>
              <div style="font-size:11px;color:#8490a8;">Maidatul Rahman 2026, Nur Ramadan 2026, Inisiatif Bersama Rakyat</div>
            </div>
            <span class="adm-badge active" style="flex-shrink:0;">Aktif</span>
          </div>

          <div style="display:flex;align-items:center;gap:14px;padding:14px 24px;border-bottom:1px solid var(--adm-line);cursor:pointer;transition:background .15s;" class="adm-card" onclick="switchView('articles')">
            <div style="width:40px;height:40px;border-radius:10px;background:#f3e8ff;display:flex;align-items:center;justify-content:center;color:#9333ea;flex-shrink:0;"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg></div>
            <div style="flex:1;">
              <div style="font-size:13px;font-weight:700;color:#1e293b;margin-bottom:2px;">4 Artikel Draft Menunggu Semakan</div>
              <div style="font-size:11px;color:#8490a8;">Artikel Tengku Adnan, Tengku Hafiz dan rekod khidmat Putrajaya</div>
            </div>
            <span class="adm-badge draft" style="flex-shrink:0;">Draft</span>
          </div>

          <div style="display:flex;align-items:center;gap:14px;padding:14px 24px;cursor:pointer;transition:background .15s;" class="adm-card" onclick="switchView('content')">
            <div style="width:40px;height:40px;border-radius:10px;background:#dcfce7;display:flex;align-items:center;justify-content:center;color:#16a34a;flex-shrink:0;"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="3" rx="2"/><line x1="8" x2="21" y1="21" y2="21"/><line x1="12" x2="12" y1="17" y2="21"/></svg></div>
            <div style="flex:1;">
              <div style="font-size:13px;font-weight:700;color:#1e293b;margin-bottom:2px;">CMS Frontpage — 4 Modul Aktif</div>
              <div style="font-size:11px;color:#8490a8;">Hero, Kegiatan, Artikel, Pimpinan — Semua Published</div>
            </div>
            <span class="adm-badge active" style="flex-shrink:0;">Online</span>
          </div>

        </div>
      </section>

      <aside class="adm-panel">
        <div class="adm-panel-head">
          <h2 class="adm-panel-title">Log Aktiviti Terkini</h2>
          <span class="adm-badge active" style="font-size:10px;">Live</span>
        </div>
        <div class="adm-activity-log">
          <div class="adm-activity-item">
            <div class="adm-activity-icon success">✓</div>
            <div class="adm-activity-body">
              <strong>Data ahli dikemaskini</strong>
              <span>12 profil baru disahkan oleh admin cawangan</span>
            </div>
            <div class="adm-activity-time">2 jam lalu</div>
          </div>
          <div class="adm-activity-item">
            <div class="adm-activity-icon info">✎</div>
            <div class="adm-activity-body">
              <strong>Artikel frontpage disunting</strong>
              <span>Banner kegiatan & ringkasan pimpinan diperbarui</span>
            </div>
            <div class="adm-activity-time">4 jam lalu</div>
          </div>
          <div class="adm-activity-item">
            <div class="adm-activity-icon warning">⚠</div>
            <div class="adm-activity-body">
              <strong>6 permohonan bantuan masuk</strong>
              <span>Menunggu semakan dokumen sokongan</span>
            </div>
            <div class="adm-activity-time">Semalam</div>
          </div>
          <div class="adm-activity-item">
            <div class="adm-activity-icon success">✓</div>
            <div class="adm-activity-body">
              <strong>Event Ceramah Tak Banyak Alasan Ke-80 dicipta</strong>
              <span>Tarikh: 20 Jun 2026 • Dewan Komuniti P9</span>
            </div>
            <div class="adm-activity-time">2 hari lalu</div>
          </div>
          <div class="adm-activity-item">
            <div class="adm-activity-icon info">✎</div>
            <div class="adm-activity-body">
              <strong>CMS Hero dikemaskini</strong>
              <span>Tajuk & tagline laman utama diubah</span>
            </div>
            <div class="adm-activity-time">3 hari lalu</div>
          </div>
          <div class="adm-activity-item">
            <div class="adm-activity-icon success">✓</div>
            <div class="adm-activity-body">
              <strong>Ahli baru didaftarkan</strong>
              <span>47 rekod baharu dalam bulan Jun 2026</span>
            </div>
            <div class="adm-activity-time">1 minggu lalu</div>
          </div>
        </div>
      </aside>
    </section>

    <!-- WORK TABLE -->
    <section class="adm-panel" aria-labelledby="admWorkTitle" style="margin-top: 20px;">
      <div class="adm-panel-head">
        <h2 class="adm-panel-title" id="admWorkTitle">Daftar Kerja</h2>
        <div class="adm-tabs" role="tablist" aria-label="Filter status">
          <button class="active" type="button" data-adm-filter="all">Semua</button>
          <button type="button" data-adm-filter="Aktif">Aktif</button>
          <button type="button" data-adm-filter="Menunggu">Menunggu</button>
          <button type="button" data-adm-filter="Draft">Draft</button>
        </div>
      </div>
      <div class="adm-table-wrap">
        <table class="adm-table">
          <thead>
            <tr>
              <th>Item</th>
              <th>Kategori</th>
              <th>Tarikh</th>
              <th>Status</th>
              <th>Tindakan</th>
            </tr>
          </thead>
          <tbody id="admWorkTable"></tbody>
        </table>
      </div>
    </section>

    </section>

