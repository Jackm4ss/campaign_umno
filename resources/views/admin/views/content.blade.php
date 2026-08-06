    <section class="adm-view" id="adm-view-content">
      <section class="adm-panel">
        <div class="adm-panel-head">
          <h2 class="adm-panel-title">CMS Frontpage</h2>
          <div style="display:flex;gap:8px;">
            <button class="adm-ghost" type="button" style="font-size:11px;" onclick="window.open('/', '_blank')">🔗 Lihat Laman Utama</button>
          </div>
        </div>
        <p class="adm-card-note">Klik pada mana-mana modul di bawah untuk menyunting kandungannya. Modul yang <span class="adm-badge active" style="font-size:10px;display:inline;">Published</span> akan dipaparkan kepada pengunjung laman utama.</p>

        <!-- STATUS BAR -->
        <div class="adm-cms-summary" style="display:flex;gap:10px;padding:0 24px 20px;flex-wrap:wrap;">
          <div style="display:flex;align-items:center;gap:6px;background:#dcfce7;border-radius:8px;padding:8px 14px;">
            <div style="width:8px;height:8px;border-radius:50%;background:#16a34a;"></div>
            <span style="font-size:11px;font-weight:700;color:#16a34a;">4 Modul Published</span>
          </div>
          <div style="display:flex;align-items:center;gap:6px;background:#f1f5f9;border-radius:8px;padding:8px 14px;">
            <div style="width:8px;height:8px;border-radius:50%;background:#94a3b8;"></div>
            <span style="font-size:11px;font-weight:700;color:#64748b;">0 Modul Draft</span>
          </div>
          <div style="display:flex;align-items:center;gap:6px;background:#dbeafe;border-radius:8px;padding:8px 14px;">
            <span style="font-size:11px;font-weight:700;color:#1d4ed8;">Kemaskini Terakhir: Hari Ini</span>
          </div>
        </div>

        <div class="adm-module-grid" id="admCmsModules" style="margin-bottom: 24px;">
          <article class="adm-module-card" data-cms-key="hero" style="position:relative; background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/hafiz-tak-banyak-alasan.jpg') center/cover; color:#fff;">
            <div style="position:absolute;top:12px;right:12px;"><span class="adm-badge active" style="font-size:10px;">Published</span></div>
            <span style="font-size:11px;font-weight:800;letter-spacing:2px;text-transform:uppercase;color:#e2e8f0;">🏠 Hero</span>
            <h3 style="margin:8px 0 4px; color:#fff;">Bersama Kita Bergerak</h3>
            <p style="color:#e2e8f0;font-size:12px;">Headline utama, tagline, butang CTA dan visual kempen.</p>
            <div style="margin-top:10px;font-size:10px;color:#cbd5e1;">Kemaskini: 3 hari lalu</div>
          </article>
          <article class="adm-module-card" data-cms-key="events" style="position:relative; background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/adnan-ramadan-2026.jpeg') center/cover; color:#fff;">
            <div style="position:absolute;top:12px;right:12px;"><span class="adm-badge active" style="font-size:10px;">Published</span></div>
            <span style="font-size:11px;font-weight:800;letter-spacing:2px;text-transform:uppercase;color:#e2e8f0;">📅 Kegiatan</span>
            <h3 style="margin:8px 0 4px; color:#fff;">Ceramah Tak Banyak Alasan Ke-80</h3>
            <p style="color:#e2e8f0;font-size:12px;">Event unggulan dan senarai kegiatan yang dipaparkan ke awam.</p>
            <div style="margin-top:10px;font-size:10px;color:#cbd5e1;">Kemaskini: Semalam</div>
          </article>
          <article class="adm-module-card" data-cms-key="articles" style="position:relative; background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/adnan-sumbangan-2025.jpeg') center/cover; color:#fff;">
            <div style="position:absolute;top:12px;right:12px;"><span class="adm-badge active" style="font-size:10px;">Published</span></div>
            <span style="font-size:11px;font-weight:800;letter-spacing:2px;text-transform:uppercase;color:#e2e8f0;">📰 Artikel</span>
            <h3 style="margin:8px 0 4px; color:#fff;">Program Bantuan Katil Hospital</h3>
            <p style="color:#e2e8f0;font-size:12px;">Artikel utama dan senarai artikel terkini di halaman depan.</p>
            <div style="margin-top:10px;font-size:10px;color:#cbd5e1;">Kemaskini: 5 hari lalu</div>
          </article>
          <article class="adm-module-card" data-cms-key="leaders" style="position:relative; background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('assets/adnan-profile.jpg') center/cover; color:#fff;">
            <div style="position:absolute;top:12px;right:12px;"><span class="adm-badge active" style="font-size:10px;">Published</span></div>
            <span style="font-size:11px;font-weight:800;letter-spacing:2px;text-transform:uppercase;color:#e2e8f0;">👤 Pimpinan</span>
            <h3 style="margin:8px 0 4px; color:#fff;">Profil Kepimpinan Tak Banyak Alasan</h3>
            <p style="color:#e2e8f0;font-size:12px;">Nama, jawatan dan bio ringkas pimpinan yang ditampilkan ke awam.</p>
            <div style="margin-top:10px;font-size:10px;color:#cbd5e1;">Kemaskini: 1 minggu lalu</div>
          </article>
        </div>
      </section>
    </section>

