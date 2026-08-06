    <section class="adm-view" id="adm-view-account">

      <!-- ACCOUNT OVERVIEW CARD -->
      <section class="adm-panel" style="margin-bottom: 20px;">
        <div class="adm-panel-head">
          <h2 class="adm-panel-title">Akaun Pentadbir</h2>
          <span class="adm-badge active" id="admAccountStatus">Aktif</span>
        </div>
        <div class="adm-account-profile">
          <div class="adm-account-avatar" id="admAccountAvatar">SA</div>
          <div class="adm-account-meta">
            <strong id="admAccountDisplayName">admin_umno_putrajaya</strong>
            <span id="admAccountRoleDisplay">Super Admin</span>
          </div>
          <div class="adm-account-stats">
            <div class="adm-account-stat">
              <strong id="admLoginCount">1</strong>
              <span>Log Masuk</span>
            </div>
            <div class="adm-account-stat">
              <strong id="admLastLogin">Hari ini</strong>
              <span>Terakhir Aktif</span>
            </div>
          </div>
        </div>
      </section>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; align-items: start;" class="adm-account-two-col">

        <!-- LEFT: PROFILE + SECURITY -->
        <div style="display: flex; flex-direction: column; gap: 20px;">

          <!-- PROFILE SECTION -->
          <section class="adm-panel">
            <div class="adm-panel-head"><h2 class="adm-panel-title">Profil Akaun</h2></div>
            <div class="adm-section-divider"><span>Maklumat Log Masuk</span></div>
            <div class="adm-editor-grid" style="padding: 0 24px 20px;">
              <div class="adm-field">
                <label for="admAccountUsername">Nama Pengguna</label>
                <input id="admAccountUsername" type="text" value="admin_umno_putrajaya" placeholder="Nama pengguna unik" autocomplete="username">
              </div>
              <div class="adm-field">
                <label for="admAccountEmail">E-mel Login</label>
                <input id="admAccountEmail" type="email" value="{{ auth()->user()->email }}" placeholder="alamat@domain.com" autocomplete="email">
              </div>
              <div class="adm-field full">
                <label for="admAccountFullName">Nama Penuh</label>
                <input id="admAccountFullName" type="text" value="{{ auth()->user()->name }}" placeholder="Nama penuh pentadbir">
              </div>
              <div class="adm-field full">
                <label for="admAccountRole">Peranan / Akses</label>
                <select id="admAccountRole">
                  <option>Super Admin</option>
                  <option>Editor Konten</option>
                  <option>Pengurus Event</option>
                  <option>Petugas Bantuan</option>
                </select>
              </div>
            </div>
            <div class="adm-action-row">
              <button class="adm-primary" id="admSaveAccount" type="button">Simpan Profil</button>
            </div>
          </section>

          <!-- SECURITY SECTION -->
          <section class="adm-panel">
            <div class="adm-panel-head"><h2 class="adm-panel-title">Keselamatan</h2></div>
            <div class="adm-section-divider"><span>Tukar Kata Laluan</span></div>
            <div class="adm-editor-grid" style="padding: 0 24px 8px;">
              <div class="adm-field full">
                <label for="admAccountCurrent">Kata Laluan Semasa</label>
                <div class="adm-password-field">
                  <input id="admAccountCurrent" type="password" placeholder="Masukkan kata laluan semasa" autocomplete="current-password">
                  <button class="adm-eye" type="button" data-eye="admAccountCurrent" aria-label="Papar kata laluan">👁</button>
                </div>
              </div>
              <div class="adm-field">
                <label for="admAccountNew">Kata Laluan Baru</label>
                <div class="adm-password-field">
                  <input id="admAccountNew" type="password" placeholder="Min. 8 aksara" autocomplete="new-password">
                  <button class="adm-eye" type="button" data-eye="admAccountNew" aria-label="Papar kata laluan baru">👁</button>
                </div>
                <div class="adm-pw-strength" id="admPwStrengthBars">
                  <div class="adm-pw-bar" id="pwBar1"></div>
                  <div class="adm-pw-bar" id="pwBar2"></div>
                  <div class="adm-pw-bar" id="pwBar3"></div>
                  <div class="adm-pw-bar" id="pwBar4"></div>
                </div>
                <div class="adm-pw-label" id="admPwStrengthLabel" style="color:#a0aabb;">Masukkan kata laluan baru</div>
              </div>
              <div class="adm-field">
                <label for="admAccountConfirm">Sahkan Kata Laluan Baru</label>
                <div class="adm-password-field">
                  <input id="admAccountConfirm" type="password" placeholder="Ulang kata laluan baru" autocomplete="new-password">
                  <button class="adm-eye" type="button" data-eye="admAccountConfirm" aria-label="Papar pengesahan">👁</button>
                </div>
              </div>
              <div class="adm-field full">
                <label for="admAccountNote">Catatan / Alasan Perubahan</label>
                <textarea id="admAccountNote" placeholder="Nyatakan alasan perubahan kata laluan (opsional)" style="min-height: 70px;"></textarea>
              </div>
            </div>
            <div class="adm-action-row">
              <button class="adm-ghost" id="admToggleAccount" type="button" style="color: #dc2626; border-color: #fecaca;">Nyahaktifkan Akaun</button>
              <button class="adm-primary" id="admResetPassword" type="button">Kemaskini Kata Laluan</button>
            </div>
          </section>

        </div>

        <!-- RIGHT: ACTIVITY LOG -->
        <div>
          <section class="adm-panel">
            <div class="adm-panel-head">
              <h2 class="adm-panel-title">Log Aktiviti</h2>
              <span class="adm-badge active">Live</span>
            </div>
            <div class="adm-activity-log" id="admActivityLog">
              <div class="adm-activity-item">
                <div class="adm-activity-icon success">✓</div>
                <div class="adm-activity-body">
                  <strong>Log masuk berjaya</strong>
                  <span>panel-admin.html &bull; Chrome/Windows</span>
                </div>
                <div class="adm-activity-time" id="admLoginTime">Baru sahaja</div>
              </div>
              <div class="adm-activity-item">
                <div class="adm-activity-icon info">✎</div>
                <div class="adm-activity-body">
                  <strong>Modul CMS dikemaskini</strong>
                  <span>Modul Hero &bull; Status: Published</span>
                </div>
                <div class="adm-activity-time">Sesi ini</div>
              </div>
              <div class="adm-activity-item">
                <div class="adm-activity-icon info">✎</div>
                <div class="adm-activity-body">
                  <strong>Data kegiatan ditambah</strong>
                  <span>Ceramah Ulang Tahun Tak Banyak Alasan Ke-80</span>
                </div>
                <div class="adm-activity-time">Sesi ini</div>
              </div>
              <div class="adm-activity-item">
                <div class="adm-activity-icon warning">⚠</div>
                <div class="adm-activity-body">
                  <strong>Percubaan log masuk gagal</strong>
                  <span>IP: 192.168.x.x &bull; Kata laluan salah</span>
                </div>
                <div class="adm-activity-time">Kelmarin</div>
              </div>
              <div class="adm-activity-item">
                <div class="adm-activity-icon success">✓</div>
                <div class="adm-activity-body">
                  <strong>Ahli baru didaftarkan</strong>
                  <span>3 rekod baharu ditambah ke pangkalan data</span>
                </div>
                <div class="adm-activity-time">2 hari lalu</div>
              </div>
              <div class="adm-activity-item">
                <div class="adm-activity-icon success">✓</div>
                <div class="adm-activity-body">
                  <strong>Kata laluan ditukar</strong>
                  <span>Perubahan berjaya disimpan</span>
                </div>
                <div class="adm-activity-time">1 minggu lalu</div>
              </div>
            </div>
          </section>

          <!-- SYSTEM INFO CARD -->
          <section class="adm-panel" style="margin-top: 20px;">
            <div class="adm-panel-head"><h2 class="adm-panel-title">Maklumat Sistem</h2></div>
            <div class="adm-activity-log">
              <div class="adm-activity-item">
                <div class="adm-activity-icon info">🖥</div>
                <div class="adm-activity-body">
                  <strong>Versi Panel Admin</strong>
                  <span>Tak Banyak Alasan Admin Portal v2.1.0</span>
                </div>
              </div>
              <div class="adm-activity-item">
                <div class="adm-activity-icon info">🔒</div>
                <div class="adm-activity-body">
                  <strong>Mod Keselamatan</strong>
                  <span>Autentikasi Laravel &amp; penyimpanan MySQL aktif</span>
                </div>
              </div>
              <div class="adm-activity-item">
                <div class="adm-activity-icon success">✓</div>
                <div class="adm-activity-body">
                  <strong>Sesi Semasa</strong>
                  <span id="admSessionId">SID-xxxxxxxx</span>
                </div>
              </div>
            </div>
          </section>
        </div>

      </div>
    </section>

    <!-- SETTINGS SECTION -->
