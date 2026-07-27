<section id="kegiatan" class="kegiatan">
  <div class="container">
    <div class="kegiatan-header fade-up">
      <span class="section-label">Jom Sertai Kami</span>
      <h2 class="section-title">JOM SERTAI TAK BANYAK ALASAN</h2>
      <p class="mengenai-text">Program kempen dan komuniti UMNO Putrajaya yang dekat dengan rakyat.</p>
    </div>

    <div class="kegiatan-grid">
      @forelse($events as $index => $event)
        @php
          $fallbackImgs = ['assets/event-6.jpg', 'assets/event-5.jpg', 'assets/event-4.jpg'];
          $img = $event['image_url'] ?? $event['image'] ?? $fallbackImgs[$index] ?? 'assets/event-1.jpg';
          // Resolve relative paths via asset()
          $imgUrl = (str_starts_with($img, 'http') || str_starts_with($img, 'data:'))
            ? $img
            : asset(ltrim($img, '/'));
        @endphp
        <article class="kegiatan-card fade-up">
          <img loading="lazy" src="{{ $imgUrl }}" alt="{{ $event['title'] ?? 'Kegiatan' }}" class="kegiatan-img">
          <div class="kegiatan-content">
            <p class="event-meta">{{ $event['date'] ?? 'Program komuniti' }}</p>
            <h3 class="kegiatan-title">{{ $event['title'] ?? 'Gerak kerja komuniti' }}</h3>
            <p class="kegiatan-desc">{{ $event['desc'] ?? 'Kegiatan bersama warga Putrajaya.' }}</p>
            <a href="#sertai" class="kegiatan-link">Sertai Kegiatan &rarr;</a>
          </div>
        </article>
      @empty
        @foreach([
          ['28 Ogos 2026', 'DIALOG ASPIRASI WARGA PUTRAJAYA', 'Program komuniti Campaign Tak Banyak Alasan untuk menggerakkan warga Putrajaya melalui aktiviti, bantuan, dan ruang aspirasi bersama.', 'assets/event-6.jpg'],
          ['21 Ogos 2026', 'BANTUAN MAKANAN ASAS KOMUNITI', 'Program komuniti Campaign Tak Banyak Alasan untuk menggerakkan warga Putrajaya melalui aktiviti, bantuan, dan ruang aspirasi bersama.', 'assets/event-5.jpg'],
          ['14 Ogos 2026', 'SUKAN RAKYAT PUTRAJAYA', 'Program komuniti Campaign Tak Banyak Alasan untuk menggerakkan warga Putrajaya melalui aktiviti, bantuan, dan ruang aspirasi bersama.', 'assets/event-4.jpg'],
        ] as [$meta, $title, $desc, $img])
          <article class="kegiatan-card fade-up">
            <img loading="lazy" src="{{ asset($img) }}" alt="{{ $title }}" class="kegiatan-img">
            <div class="kegiatan-content">
              <p class="event-meta">{{ $meta }}</p>
              <h3 class="kegiatan-title">{{ $title }}</h3>
              <p class="kegiatan-desc">{{ $desc }}</p>
              <a href="#sertai" class="kegiatan-link">Sertai Kegiatan &rarr;</a>
            </div>
          </article>
        @endforeach
      @endforelse
    </div>
  </div>
</section>
