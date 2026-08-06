<section id="acara" class="acara section-pad-top">
  <div class="container">
    <div class="acara-header fade-up">
      <span class="section-label">Acara Akan Datang</span>
      <h2 class="section-title">ACARA AKAN DATANG</h2>
      <p class="mengenai-text">Jadual program dan kehadiran lapangan Tak Banyak Alasan untuk warga Putrajaya.</p>
    </div>
  </div>

  <div class="acara-marquee-track" role="region" aria-label="Senarai acara akan datang">
    <div class="acara-marquee-inner">
      @php
        $upcomingEvents = \App\Support\CampaignEvents::all();
      @endphp

      @foreach([1, 2] as $loopSet)
        @foreach($upcomingEvents as $event)
          <a
            href="{{ route('events.show', $event['slug']) }}"
            class="acara-card"
            @if($loopSet === 2) aria-hidden="true" tabindex="-1" @endif
            aria-label="{{ $event['title'] }} — Detail selengkapnya"
          >
            <div class="acara-card-media">
              <img
                src="{{ asset($event['image']) }}"
                alt="{{ $loopSet === 1 ? $event['title'] : '' }}"
                loading="lazy"
                class="acara-card-img"
              >
              <div class="acara-card-overlay">
                <span class="acara-card-cta">Detail selengkapnya</span>
              </div>
            </div>
            <div class="acara-card-meta">
              <span class="acara-card-date">{{ $event['dateLabel'] }}</span>
              <span class="acara-card-title">{{ $event['title'] }}</span>
              <span class="acara-card-place">{{ $event['place'] }}</span>
            </div>
          </a>
        @endforeach
      @endforeach
    </div>
  </div>
</section>
