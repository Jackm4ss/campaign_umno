<section id="program" class="program section-pad">
  <div class="container">
    <div class="program-header fade-up">
      <span class="section-label">Program Kami</span>
      <h2 class="section-title">PROGRAM TAK BANYAK ALASAN</h2>
      <p class="mengenai-text">Enam teras program kempen untuk warga Putrajaya.</p>
    </div>

    <div class="program-grid">
      @foreach(\App\Support\CampaignPrograms::all() as $program)
        <a
          href="{{ route('programs.show', $program['slug']) }}"
          class="program-card fade-up"
          aria-label="{{ $program['title'] }}"
        >
          <div class="program-icon-wrap">
            <img src="{{ asset($program['image']) }}" alt="" class="program-icon-img" loading="lazy">
          </div>
          <h3 class="program-title">{{ $program['title'] }}</h3>
          <p class="program-desc">{{ $program['shortDesc'] }}</p>
          <span class="program-card-cta">Ketahui lebih &rarr;</span>
        </a>
      @endforeach
    </div>
  </div>
</section>
