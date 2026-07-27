@php
  $galleryItems = $gallery ?? [];
  $postCount = count($galleryItems);
  $categoryMeta = [
      'all' => 'Semua',
      'kegiatan' => 'Kegiatan',
      'komuniti' => 'Komuniti',
      'kepimpinan' => 'Kepimpinan',
      'media' => 'Media',
  ];
@endphp

<section id="galeri" class="ig-galeri" aria-labelledby="ig-galeri-title">
  <div class="ig-shell">
    <a href="{{ route('home') }}" class="ig-back">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
      <span>back</span>
    </a>

    {{-- Profile header --}}
    <header class="ig-profile">
      <div class="ig-profile-avatar" aria-hidden="true">
        <img src="{{ asset('assets/admin-logo-blue.png') }}" alt="" width="120" height="120" loading="eager">
      </div>
      <div class="ig-profile-meta">
        <div class="ig-profile-row">
          <h1 id="ig-galeri-title" class="ig-handle" translate="no">umno.putrajaya</h1>
          <span class="ig-badge">Galeri</span>
        </div>
        <ul class="ig-stats" aria-label="Statistik galeri">
          <li><strong id="ig-stat-count">{{ $postCount }}</strong> <span>catatan</span></li>
          <li><strong>{{ count(array_filter($galleryItems, fn ($i) => ! empty($i['video_url']))) }}</strong> <span>video</span></li>
          <li><strong>{{ max(0, $postCount - count(array_filter($galleryItems, fn ($i) => ! empty($i['video_url'])))) }}</strong> <span>foto</span></li>
        </ul>
        <div class="ig-bio">
          <p class="ig-bio-name">Tak Banyak Alasan</p>
          <p class="ig-bio-text">Dokumentasi visual kempen UMNO Putrajaya — kegiatan, komuniti, kepimpinan & media.</p>
        </div>
      </div>
    </header>

    {{-- Category chips (Instagram highlights feel, practical filters) --}}
    <div class="ig-filters" role="tablist" aria-label="Tapis galeri">
      @foreach ($categoryMeta as $key => $label)
        <button
          type="button"
          class="ig-chip{{ $key === 'all' ? ' is-active' : '' }}"
          data-filter="{{ $key }}"
          role="tab"
          aria-selected="{{ $key === 'all' ? 'true' : 'false' }}"
        >{{ $label }}</button>
      @endforeach
    </div>

    {{-- Dense square grid --}}
    <div class="ig-grid" id="galeri-grid" role="list">
      @forelse ($galleryItems as $item)
        @php
          $isVideo = ! empty($item['video_url']);
        @endphp
        <button
          type="button"
          class="ig-cell{{ $isVideo ? ' ig-cell--video' : '' }}"
          role="listitem"
          data-category="{{ $item['category'] ?? 'kegiatan' }}"
          data-src="{{ $item['src'] }}"
          data-title="{{ $item['title'] }}"
          data-caption="{{ $item['caption'] ?? '' }}"
          data-label="{{ $item['label'] ?? '' }}"
          @if($isVideo) data-embed-id="{{ $item['video_url'] }}" @endif
          aria-label="Buka {{ $item['title'] }}"
        >
          <img
            loading="lazy"
            decoding="async"
            src="{{ $item['src'] }}"
            alt="{{ $item['title'] }}"
            width="400"
            height="400"
          >
          <span class="ig-cell-shade" aria-hidden="true"></span>
          @if ($isVideo)
            <span class="ig-cell-video" aria-hidden="true">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
            </span>
          @endif
          <span class="ig-cell-hover">
            <span class="ig-cell-title">{{ $item['title'] }}</span>
          </span>
        </button>
      @empty
        <p class="ig-empty-full">Belum ada dokumentasi untuk dipaparkan.</p>
      @endforelse
    </div>

    <p class="ig-empty" id="galeri-empty" hidden>Tiada catatan untuk penapis ini.</p>
  </div>
</section>

{{-- Instagram-style lightbox --}}
<div class="ig-lightbox" id="galeri-lightbox" hidden>
  <div class="ig-lightbox-scrim" data-close-lightbox></div>

  <button type="button" class="ig-lightbox-nav ig-lightbox-prev" id="galeri-prev" aria-label="Catatan sebelumnya">
    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true"><path d="M15 18l-6-6 6-6"/></svg>
  </button>
  <button type="button" class="ig-lightbox-nav ig-lightbox-next" id="galeri-next" aria-label="Catatan seterusnya">
    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true"><path d="M9 18l6-6-6-6"/></svg>
  </button>

  <div class="ig-lightbox-stage" role="dialog" aria-modal="true" aria-labelledby="galeri-lightbox-title">
    <button type="button" class="ig-lightbox-close" data-close-lightbox aria-label="Tutup">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg>
    </button>

    <div class="ig-lightbox-frame">
      <div class="ig-lightbox-media">
        <img src="" alt="" id="galeri-lightbox-img">
      </div>
      <aside class="ig-lightbox-side">
        <div class="ig-lightbox-side-head">
          <span class="ig-lightbox-avatar" aria-hidden="true">
            <img src="{{ asset('assets/admin-logo-blue.png') }}" alt="" width="36" height="36">
          </span>
          <div class="ig-lightbox-side-meta">
            <span class="ig-lightbox-handle" translate="no">umno.putrajaya</span>
            <span class="ig-lightbox-chip" id="galeri-lightbox-chip"></span>
          </div>
        </div>
        <div class="ig-lightbox-side-body">
          <h2 id="galeri-lightbox-title"></h2>
          <p id="galeri-lightbox-caption"></p>
        </div>
        <div class="ig-lightbox-side-foot">
          <span id="galeri-lightbox-counter" class="ig-lightbox-counter"></span>
        </div>
      </aside>
    </div>
  </div>
</div>
