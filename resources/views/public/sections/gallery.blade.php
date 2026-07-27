<section id="galeri" class="galeri galeri-page section-pad">
  <div class="container">
    <header class="galeri-header fade-up">
      <a href="{{ route('home') }}" class="galeri-back">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
        Kembali ke Laman Utama
      </a>
      <span class="section-label">Dokumentasi Kempen</span>
      <h1 class="section-title galeri-title">Galeri Kempen</h1>
      <p class="mengenai-text galeri-lead">
        Dokumentasi visual kerja kami di Putrajaya — aktiviti, komuniti, dan kepimpinan, dibingkaikan seperti catatan sosial kempen.
      </p>
    </header>

    <div class="galeri-storybar fade-up" role="tablist" aria-label="Tapis galeri mengikut kategori">
      <button type="button" class="galeri-story is-active" data-filter="all" role="tab" aria-selected="true" aria-label="Tapis: Semua">
        <span class="galeri-story-ring" aria-hidden="true"></span>
        <span class="galeri-story-label">Semua</span>
      </button>
      <button type="button" class="galeri-story" data-filter="kegiatan" role="tab" aria-selected="false" aria-label="Tapis: Kegiatan">
        <span class="galeri-story-ring" aria-hidden="true"></span>
        <span class="galeri-story-label">Kegiatan</span>
      </button>
      <button type="button" class="galeri-story" data-filter="komuniti" role="tab" aria-selected="false" aria-label="Tapis: Komuniti">
        <span class="galeri-story-ring" aria-hidden="true"></span>
        <span class="galeri-story-label">Komuniti</span>
      </button>
      <button type="button" class="galeri-story" data-filter="kepimpinan" role="tab" aria-selected="false" aria-label="Tapis: Kepimpinan">
        <span class="galeri-story-ring" aria-hidden="true"></span>
        <span class="galeri-story-label">Kepimpinan</span>
      </button>
      <button type="button" class="galeri-story" data-filter="media" role="tab" aria-selected="false" aria-label="Tapis: Media">
        <span class="galeri-story-ring" aria-hidden="true"></span>
        <span class="galeri-story-label">Media</span>
      </button>
    </div>

    <div class="galeri-feed" id="galeri-grid">
      @foreach($gallery as $item)
        @php
          $i = $loop->index;
          $shape = ($i % 7 === 0) ? 'feature' : (($i % 3 === 0) ? 'square' : 'landscape');
          $isVideo = ! empty($item['video_url']);
        @endphp
        <button
          type="button"
          class="galeri-card galeri-card--{{ $shape }}{{ $isVideo ? ' galeri-card--video' : '' }} fade-up"
          data-category="{{ $item['category'] }}"
          data-src="{{ $item['src'] }}"
          data-title="{{ $item['title'] }}"
          data-caption="{{ $item['caption'] ?? '' }}"
          @if($isVideo) data-embed-id="{{ $item['video_url'] }}" @endif
          aria-label="Buka {{ $item['title'] }}"
        >
          <span class="galeri-card-postbar">
            <span class="galeri-card-avatar" data-cat="{{ $item['category'] }}" aria-hidden="true"></span>
            <span class="galeri-card-handle" translate="no">@umno.putrajaya</span>
            <span class="galeri-card-chip">{{ $item['label'] }}</span>
          </span>
          <span class="galeri-card-media">
            <img
              loading="lazy"
              decoding="async"
              src="{{ $item['src'] }}"
              alt="{{ $item['title'] }}"
              width="{{ $shape === 'feature' ? 1200 : ($shape === 'square' ? 600 : 800) }}"
              height="{{ $shape === 'feature' ? 600 : ($shape === 'square' ? 600 : 600) }}"
            >
            @if($isVideo)
              <span class="galeri-card-play" aria-hidden="true">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
              </span>
            @endif
          </span>
          <span class="galeri-card-copy">
            <span class="galeri-card-title">{{ $item['title'] }}</span>
            @if(! empty($item['caption']))
              <span class="galeri-card-caption">{{ $item['caption'] }}</span>
            @endif
          </span>
        </button>
      @endforeach
    </div>

    <p class="galeri-empty" id="galeri-empty" hidden>Tiada catatan untuk penapis ini.</p>
  </div>
</section>

<div class="galeri-lightbox" id="galeri-lightbox" hidden>
  <div class="galeri-lightbox-backdrop" data-close-lightbox></div>
  <div class="galeri-lightbox-dialog" role="dialog" aria-modal="true" aria-label="Pratonton catatan galeri">
    <button type="button" class="galeri-lightbox-close" data-close-lightbox aria-label="Tutup pratonton">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg>
    </button>
    <div class="galeri-lightbox-media">
      <img src="" alt="" id="galeri-lightbox-img">
    </div>
    <aside class="galeri-lightbox-panel">
      <span class="galeri-lightbox-handle" translate="no">@umno.putrajaya</span>
      <h2 id="galeri-lightbox-title"></h2>
      <p id="galeri-lightbox-caption"></p>
    </aside>
  </div>
</div>
