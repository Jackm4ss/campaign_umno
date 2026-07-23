    <section class="adm-view" id="adm-view-settings">

      <!-- SETTINGS OVERVIEW HEADER -->
      <section class="adm-panel" style="margin-bottom: 20px;">
        <div class="adm-panel-head">
          <h2 class="adm-panel-title">Tetapan Sistem</h2>
          <span class="adm-badge active">Online</span>
        </div>
        <div class="adm-account-profile" style="background: linear-gradient(115deg, #0a2a0a 0%, #1a5c1a 55%, #0a3a1a 100%);">
          <div class="adm-account-avatar" style="font-size:26px; background: rgba(255,255,255,0.12);">⚙</div>
          <div class="adm-account-meta">
            <strong id="settingOrgNameDisplay">Campaign Tak Banyak Alasan</strong>
            <span id="settingOrgTaglineDisplay">Wilayah Persekutuan Putrajaya • EST. 1946</span>
          </div>
          <div class="adm-account-stats">
            <div class="adm-account-stat">
              <strong id="settingVersionDisplay">v2.1</strong>
              <span>Versi Panel</span>
            </div>
            <div class="adm-account-stat">
              <strong id="settingEnvDisplay">DEV</strong>
              <span>Persekitaran</span>
            </div>
          </div>
        </div>
      </section>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; align-items: start;" class="adm-account-two-col">

        <!-- LEFT COLUMN -->
        <div style="display: flex; flex-direction: column; gap: 20px;">

          <!-- 1. IDENTITI ORGANISASI -->
          <section class="adm-panel">
            <div class="adm-panel-head"><h2 class="adm-panel-title">Identiti Organisasi</h2></div>
            <div class="adm-section-divider" style="margin-top:16px;"><span>Maklumat Asas</span></div>
            <div class="adm-editor-grid" style="padding: 0 24px 20px;">
              <div class="adm-field full">
                <label for="settingOrgName">Nama Penuh Organisasi</label>
                <input id="settingOrgName" type="text" value="Campaign Tak Banyak Alasan" placeholder="Nama rasmi organisasi">
              </div>
              <div class="adm-field full">
                <label for="settingOrgTagline">Tagline / Motto</label>
                <input id="settingOrgTagline" type="text" value="Bersama Kita Bergerak, Bersama Kita Membina" placeholder="Slogan atau tagline rasmi">
              </div>
              <div class="adm-field">
                <label for="settingOrgEst">Tahun Ditubuhkan</label>
                <input id="settingOrgEst" type="text" value="1946" placeholder="cth: 1946">
              </div>
              <div class="adm-field">
                <label for="settingOrgRegNo">No. Pendaftaran ROS</label>
                <input id="settingOrgRegNo" type="text" placeholder="cth: PPM-001-10-XXXX">
              </div>
              <div class="adm-field full">
                <label for="settingOrgDesc">Perihal Singkat Organisasi</label>
                <textarea id="settingOrgDesc" placeholder="Deskripsi ringkas yang dipaparkan di bahagian Mengenai Kami" style="min-height: 80px;">Tak Banyak Alasan adalah gerakan komuniti yang berdedikasi untuk membangun dan memperkasa rakyat Wilayah Persekutuan Putrajaya.</textarea>
              </div>
            </div>
          </section>

          <!-- 2. HUBUNGAN & SOSIAL MEDIA -->
          <section class="adm-panel">
            <div class="adm-panel-head"><h2 class="adm-panel-title">Hubungan & Sosial Media</h2></div>
            <div class="adm-section-divider" style="margin-top:16px;"><span>Maklumat Hubungan</span></div>
            <div class="adm-editor-grid" style="padding: 0 24px 12px;">
              <div class="adm-field">
                <label for="settingContact">E-mel Awam</label>
                <input id="settingContact" type="email" value="info@takbanyakalasan.org.my" placeholder="E-mel yang dipaparkan di laman web">
              </div>
              <div class="adm-field">
                <label for="settingPhone">No. Telefon</label>
                <input id="settingPhone" type="tel" value="+603-8888 XXXX" placeholder="+60X-XXXX XXXX">
              </div>
              <div class="adm-field full">
                <label for="settingAddress">Alamat Pejabat</label>
                <input id="settingAddress" type="text" value="Presint 9, Putrajaya, WP Malaysia" placeholder="Alamat penuh pejabat">
              </div>
              <div class="adm-field full">
                <label for="settingWebsite">URL Laman Web Rasmi</label>
                <input id="settingWebsite" type="url" value="https://takbanyakalasan.org.my" placeholder="https://takbanyakalasan.org.my">
              </div>
            </div>
            <div class="adm-section-divider"><span>Pautan Sosial Media</span></div>
            <div class="adm-editor-grid" style="padding: 0 24px 20px;">
              <div class="adm-field">
                <label for="settingSocialFb">Facebook</label>
                <input id="settingSocialFb" type="url" placeholder="https://facebook.com/takbanyakalasan">
              </div>
              <div class="adm-field">
                <label for="settingSocialIg">Instagram</label>
                <input id="settingSocialIg" type="url" placeholder="https://instagram.com/takbanyakalasan">
              </div>
              <div class="adm-field">
                <label for="settingSocialYt">YouTube</label>
                <input id="settingSocialYt" type="url" placeholder="https://youtube.com/@takbanyakalasan">
              </div>
              <div class="adm-field">
                <label for="settingSocialTt">TikTok</label>
                <input id="settingSocialTt" type="url" placeholder="https://tiktok.com/@takbanyakalasan">
              </div>
              <div class="adm-field full">
                <label for="settingSocialWa">WhatsApp / Telegram (Pautan Kumpulan)</label>
                <input id="settingSocialWa" type="url" placeholder="https://chat.whatsapp.com/...">
              </div>
            </div>
          </section>

        </div>

        <!-- RIGHT COLUMN -->
        <div style="display: flex; flex-direction: column; gap: 20px;">

          <!-- 3. PAPARAN & PORTAL -->
          <section class="adm-panel">
            <div class="adm-panel-head"><h2 class="adm-panel-title">Paparan & Portal</h2></div>
            <div class="adm-section-divider" style="margin-top:16px;"><span>Konfigurasi Paparan</span></div>
            <div class="adm-editor-grid" style="padding: 0 24px 12px;">
              <div class="adm-field full">
                <label for="settingMetaTitle">Tajuk SEO Laman Utama</label>
                <input id="settingMetaTitle" type="text" value="Campaign Tak Banyak Alasan" placeholder="Tajuk yang muncul di tab pelayar">
              </div>
              <div class="adm-field full">
                <label for="settingMetaDesc">Deskripsi Meta (SEO)</label>
                <textarea id="settingMetaDesc" placeholder="Deskripsi ringkas untuk enjin carian (Google, Bing)" style="min-height: 70px;">Gerakan komuniti bersepadu untuk membangun kesejahteraan rakyat Wilayah Persekutuan Putrajaya.</textarea>
              </div>
              <div class="adm-field">
                <label for="settingCopyrightYear">Tahun Hak Cipta</label>
                <input id="settingCopyrightYear" type="text" value="2026" placeholder="2026">
              </div>
              <div class="adm-field">
                <label for="settingAdminEmail">E-mel Admin Sistem</label>
                <input id="settingAdminEmail" type="email" value="{{ auth()->user()->email }}" placeholder="E-mel admin dalaman">
              </div>
            </div>

            <div class="adm-section-divider"><span>Nota Dalaman</span></div>
            <div style="padding: 0 24px 20px;">
              <div class="adm-field">
                <label for="admSettingNote">Catatan Pentadbir</label>
                <textarea id="admSettingNote" placeholder="Nota dalaman untuk kegunaan pentadbir sahaja — tidak dipaparkan kepada orang awam" style="min-height: 90px;"></textarea>
              </div>
            </div>
          </section>

          <!-- 4. PEMBERITAHUAN -->
          <section class="adm-panel">
            <div class="adm-panel-head"><h2 class="adm-panel-title">Pemberitahuan</h2></div>
            <div class="adm-section-divider" style="margin-top:16px;"><span>Pilihan Notifikasi</span></div>
            <div style="padding: 0 24px 20px; display: flex; flex-direction: column; gap: 14px;">

              <div class="adm-toggle-row" id="toggleNotifNew">
                <div class="adm-toggle-info">
                  <strong>Ahli Baru Didaftarkan</strong>
                  <span>E-mel dihantar apabila ahli baru mendaftar</span>
                </div>
                <button class="adm-toggle active" type="button" data-setting="notifNew" aria-pressed="true">
                  <span class="adm-toggle-knob"></span>
                </button>
              </div>

              <div class="adm-toggle-row" id="toggleNotifEvent">
                <div class="adm-toggle-info">
                  <strong>Kegiatan Baharu Ditambah</strong>
                  <span>Notifikasi apabila event baru dicipta</span>
                </div>
                <button class="adm-toggle active" type="button" data-setting="notifEvent" aria-pressed="true">
                  <span class="adm-toggle-knob"></span>
                </button>
              </div>

              <div class="adm-toggle-row" id="toggleNotifAspirasi">
                <div class="adm-toggle-info">
                  <strong>Aspirasi Baharu Diterima</strong>
                  <span>Notifikasi borang aspirasi dari orang awam</span>
                </div>
                <button class="adm-toggle" type="button" data-setting="notifAspirasi" aria-pressed="false">
                  <span class="adm-toggle-knob"></span>
                </button>
              </div>

              <div class="adm-toggle-row" id="toggleNotifLogin">
                <div class="adm-toggle-info">
                  <strong>Log Masuk Admin Berjaya</strong>
                  <span>Maklumkan setiap kali log masuk berjaya</span>
                </div>
                <button class="adm-toggle active" type="button" data-setting="notifLogin" aria-pressed="true">
                  <span class="adm-toggle-knob"></span>
                </button>
              </div>

            </div>
          </section>

          <!-- 5. ZON BAHAYA -->
          <section class="adm-panel" style="border: 1px solid #fecaca;">
            <div class="adm-panel-head" style="border-bottom-color: #fecaca;">
              <h2 class="adm-panel-title" style="color: #dc2626;">⚠ Zon Bahaya</h2>
            </div>
            <div style="padding: 16px 24px 20px; display: flex; flex-direction: column; gap: 14px;">

              <div class="adm-toggle-row" style="background: #fff8f8; border: 1px solid #fee2e2; border-radius: 8px; padding: 12px 14px;">
                <div class="adm-toggle-info">
                  <strong style="color: #dc2626;">Mod Penyelenggaraan</strong>
                  <span>Laman utama dipaparkan sebagai "Sedang diselenggara" kepada pengunjung</span>
                </div>
                <button class="adm-toggle" type="button" data-setting="maintenanceMode" aria-pressed="false" id="toggleMaintenance">
                  <span class="adm-toggle-knob"></span>
                </button>
              </div>

              <div class="adm-toggle-row" style="background: #fff8f8; border: 1px solid #fee2e2; border-radius: 8px; padding: 12px 14px;">
                <div class="adm-toggle-info">
                  <strong style="color: #dc2626;">Borang Aspirasi Ditutup</strong>
                  <span>Borang penyertaan awam tidak akan menerima sebarang input baru</span>
                </div>
                <button class="adm-toggle" type="button" data-setting="disableAspirasi" aria-pressed="false">
                  <span class="adm-toggle-knob"></span>
                </button>
              </div>

              <div style="margin-top: 4px;">
                <button class="adm-ghost" type="button" id="admClearCacheBtn" style="font-size: 11px; color: #dc2626; border-color: #fecaca; width: 100%;">🗑 Kosongkan Cache Pelayar</button>
              </div>
            </div>
          </section>

        </div>
      </div>

      <!-- SAVE / RESET FOOTER -->
      <div style="margin-top: 20px;">
        <section class="adm-panel">
          <div class="adm-action-row" style="padding: 20px 24px;">
            <button class="adm-ghost" type="button" id="admResetSettings">↺ Pulihkan Semua ke Asal</button>
            <button class="adm-primary" id="admSaveSettings" type="button">Simpan Semua Tetapan</button>
          </div>
        </section>
      </div>

    </section>
  </main>

  <div class="adm-modal-backdrop" id="admItemModal" aria-hidden="true">
    <section class="adm-modal" role="dialog" aria-modal="true" aria-labelledby="admModalTitle">
      <div class="adm-modal-head">
        <h2 id="admModalTitle">Tambah Kegiatan</h2>
        <button class="adm-close" id="admCloseModal" type="button" aria-label="Tutup">x</button>
      </div>
      <form id="admItemForm">
        <div class="adm-form">
          <div class="adm-field">
            <label for="admItemName">Nama Item</label>
            <input id="admItemName" name="name" type="text" required>
          </div>
          <div class="adm-field">
            <label for="admItemCategory">Kategori</label>
            <select id="admItemCategory" name="category" required>
              <option>Kegiatan</option>
              <option>Bantuan</option>
              <option>Artikel</option>
              <option>Data Ahli</option>
              <option>CMS</option>
            </select>
          </div>
          <div class="adm-field">
            <label for="admItemDate">Tarikh</label>
            <input id="admItemDate" name="date" type="date" required>
          </div>
          <div class="adm-field">
            <label for="admItemStatus">Status</label>
            <select id="admItemStatus" name="status" required>
              <option>Aktif</option>
              <option>Menunggu</option>
              <option>Draft</option>
            </select>
          </div>
          <div class="adm-field full">
            <label for="admItemLocation">Lokasi / Modul</label>
            <input id="admItemLocation" name="location" type="text" required>
          </div>
          <div class="adm-field full">
            <label for="admItemDesc">Catatan</label>
            <textarea id="admItemDesc" name="desc" required></textarea>
          </div>
        </div>
        <div class="adm-modal-foot">
          <button class="adm-ghost" id="admCancelModal" type="button">Batal</button>
          <button class="adm-primary" type="submit">Simpan</button>
        </div>
      </form>
    </section>
  </div>
