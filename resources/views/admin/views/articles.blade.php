    <section class="adm-view" id="adm-view-articles">

      <!-- ARTICLE STATS -->
      <section class="adm-stats" style="grid-template-columns:repeat(3,1fr);margin-bottom:20px;">
        <article class="adm-stat green" style="text-align:center;">
          <div class="adm-value" style="font-size:28px;">19</div>
          <div class="adm-label">Artikel Diterbit</div>
        </article>
        <article class="adm-stat" style="background:#fef9c3;text-align:center;">
          <div class="adm-value" style="font-size:28px;color:#ca8a04;">4</div>
          <div class="adm-label" style="color:#ca8a04;">Draft</div>
        </article>
        <article class="adm-stat" style="background:#f1f5f9;text-align:center;">
          <div class="adm-value" style="font-size:28px;color:#64748b;">8</div>
          <div class="adm-label" style="color:#64748b;">Penulis Aktif</div>
        </article>
      </section>

      <section class="adm-panel">
        <div class="adm-panel-head adm-article-head">
          <h2 class="adm-panel-title">Senarai Artikel</h2>
          <div class="adm-article-actions" style="display:flex;gap:8px;">
            <button class="adm-ghost" type="button" id="admExportArticles" style="font-size:11px;">⬇ Eksport</button>
            <button class="adm-primary" id="admOpenArticleModal" type="button">+ Tulis Artikel</button>
          </div>
        </div>
        <p class="adm-card-note">Klik <strong>Semak</strong> untuk pratonton artikel, <strong>Kemaskini</strong> untuk sunting, atau <strong>Padam</strong> untuk membuang.</p>
        <div class="adm-filters">
          <input id="admArticleSearch" type="search" placeholder="🔍 Cari tajuk artikel / penulis">
          <select id="admArticleFilterCategory">
            <option value="">Semua Kategori</option>
            <option>Komuniti</option>
            <option>Kesihatan</option>
            <option>Pendidikan</option>
            <option>Sukan</option>
            <option>Teknologi</option>
            <option>Ekonomi</option>
          </select>
          <select id="admArticleFilterStatus">
            <option value="">Semua Status</option>
            <option>Published</option>
            <option>Draft</option>
          </select>
        </div>
        <div class="adm-table-wrap">
          <table class="adm-table">
            <thead>
              <tr>
                <th>Tajuk Artikel</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Tarikh</th>
                <th>Status</th>
                <th>Tindakan</th>
              </tr>
            </thead>
            <tbody id="admArticleRows">
              <tr>
                <td><div style="font-weight:600;color:#1e293b;">Tak Banyak Alasan Melancarkan Program Bantuan Katil Hospital untuk Asnaf Putrajaya</div></td>
                <td style="font-size:12px;">Ahmad Firdaus</td>
                <td><span style="background:#dbeafe;color:#1d4ed8;padding:2px 8px;border-radius:99px;font-size:11px;font-weight:600;">Komuniti</span></td>
                <td style="font-size:12px;color:#64748b;">10 Jun 2026</td>
                <td><span class="adm-badge active">Published</span></td>
                <td style="display:flex;gap:4px;">
                  <button class="adm-mini" data-article-action="view" type="button">Semak</button>
                  <button class="adm-mini" data-article-action="edit" type="button">Kemaskini</button>
                  <button class="adm-mini danger" data-article-action="delete" type="button">Padam</button>
                </td>
              </tr>
              <tr>
                <td><div style="font-weight:600;color:#1e293b;">Klinik Bergerak Tak Banyak Alasan Capai 500 Pesakit dalam Sebulan</div></td>
                <td style="font-size:12px;">Siti Hajar</td>
                <td><span style="background:#dcfce7;color:#16a34a;padding:2px 8px;border-radius:99px;font-size:11px;font-weight:600;">Kesihatan</span></td>
                <td style="font-size:12px;color:#64748b;">8 Jun 2026</td>
                <td><span class="adm-badge active">Published</span></td>
                <td style="display:flex;gap:4px;">
                  <button class="adm-mini" data-article-action="view" type="button">Semak</button>
                  <button class="adm-mini" data-article-action="edit" type="button">Kemaskini</button>
                  <button class="adm-mini danger" data-article-action="delete" type="button">Padam</button>
                </td>
              </tr>
              <tr>
                <td><div style="font-weight:600;color:#1e293b;">Biasiswa Tak Banyak Alasan 2026: 50 Pelajar Cemerlang Terpilih</div></td>
                <td style="font-size:12px;">Norzila Hamid</td>
                <td><span style="background:#f3e8ff;color:#7c3aed;padding:2px 8px;border-radius:99px;font-size:11px;font-weight:600;">Pendidikan</span></td>
                <td style="font-size:12px;color:#64748b;">3 Jun 2026</td>
                <td><span class="adm-badge draft">Draft</span></td>
                <td style="display:flex;gap:4px;">
                  <button class="adm-mini" data-article-action="view" type="button">Semak</button>
                  <button class="adm-mini" data-article-action="edit" type="button">Kemaskini</button>
                  <button class="adm-mini danger" data-article-action="delete" type="button">Padam</button>
                </td>
              </tr>
              <tr>
                <td><div style="font-weight:600;color:#1e293b;">Gotong Royong Mega: 400 Sukarelawan Bersih Tasik Putrajaya</div></td>
                <td style="font-size:12px;">Razif Aman</td>
                <td><span style="background:#dbeafe;color:#1d4ed8;padding:2px 8px;border-radius:99px;font-size:11px;font-weight:600;">Komuniti</span></td>
                <td style="font-size:12px;color:#64748b;">5 Jun 2026</td>
                <td><span class="adm-badge draft">Draft</span></td>
                <td style="display:flex;gap:4px;">
                  <button class="adm-mini" data-article-action="view" type="button">Semak</button>
                  <button class="adm-mini" data-article-action="edit" type="button">Kemaskini</button>
                  <button class="adm-mini danger" data-article-action="delete" type="button">Padam</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div style="padding:12px 24px;border-top:1px solid var(--adm-line);display:flex;align-items:center;justify-content:space-between;">
          <span style="font-size:11px;color:#8490a8;">Menunjukkan 4 daripada 23 rekod</span>
          <div style="display:flex;gap:6px;">
            <button class="adm-ghost" style="font-size:11px;padding:4px 12px;" disabled>‹ Sebelum</button>
            <button class="adm-ghost" style="font-size:11px;padding:4px 12px;">Seterusnya ›</button>
          </div>
        </div>
      </section>
    </section>

