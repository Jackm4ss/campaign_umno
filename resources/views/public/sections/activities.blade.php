<section id="kegiatan" class="kegiatan">
  <div class="container">
    <div class="kegiatan-header fade-up">
      <span class="section-label">Aktiviti Tak Banyak Alasan</span>
      <h2 class="section-title">GERAK KERJA DI AKAR UMBI</h2>
      <p class="mengenai-text">Program kempen dan komuniti yang dekat dengan rakyat — tanpa glamor visual, fokus pada tindakan.</p>
    </div>

    <div class="kegiatan-grid kegiatan-grid--text">
      @forelse($events as $event)
        <article class="kegiatan-card kegiatan-card--text fade-up">
          <p class="event-meta">{{ $event['date'] ?? 'Program komuniti' }}</p>
          <h3 class="kegiatan-title">{{ $event['title'] ?? 'Gerak kerja komuniti' }}</h3>
          <p class="kegiatan-desc">{{ $event['desc'] ?? 'Kegiatan bersama warga Putrajaya.' }}</p>
          <a href="{{ route('gallery.index') }}" class="kegiatan-link">Lihat Galeri &rarr;</a>
        </article>
      @empty
        @foreach([
          ['Program komuniti', 'Turun Padang Bersama Warga', 'Kehadiran di padang dengan jentera setempat untuk mendengar dan bertindak.'],
          ['Khidmat bakti', 'Khidmat Bakti Komuniti', 'Bantuan dan program kebajikan yang memberi manfaat terus kepada warga.'],
          ['Penerangan', 'Penerangan UMNO Putrajaya', 'Mesej kempen yang jelas, ringkas, dan mudah difahami di peringkat akar umbi.'],
        ] as [$meta, $title, $desc])
          <article class="kegiatan-card kegiatan-card--text fade-up">
            <p class="event-meta">{{ $meta }}</p>
            <h3 class="kegiatan-title">{{ $title }}</h3>
            <p class="kegiatan-desc">{{ $desc }}</p>
            <a href="{{ route('gallery.index') }}" class="kegiatan-link">Lihat Galeri &rarr;</a>
          </article>
        @endforeach
      @endforelse
    </div>
  </div>
</section>
