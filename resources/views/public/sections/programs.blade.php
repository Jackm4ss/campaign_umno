<section id="program" class="program section-pad">
  <div class="container">
    <div class="program-header fade-up">
      <span class="section-label">Program Kami</span>
      <h2 class="section-title">PROGRAM TAK BANYAK ALASAN</h2>
      <p class="mengenai-text">Enam teras program kempen untuk warga Putrajaya.</p>
    </div>

    <div class="program-grid">
      @php
        $programs = [
          ['img' => 'assets/program-sukan.jpg',      'title' => 'Sukan & Gaya Hidup',      'desc' => 'Aktiviti sukan dan gaya hidup sihat untuk semua peringkat umur.'],
          ['img' => 'assets/program-kebajikan.jpg',  'title' => 'Kebajikan & Sosial',       'desc' => 'Bantuan kebajikan dan program sosial untuk warga yang memerlukan.'],
          ['img' => 'assets/program-pendidikan.jpg', 'title' => 'Pendidikan & Kemahiran',   'desc' => 'Peluang pendidikan dan latihan kemahiran untuk masa depan.'],
          ['img' => 'assets/program-komuniti.jpg',   'title' => 'Komuniti & Sukarelawan',   'desc' => 'Jaringan sukarelawan dan aktiviti komuniti yang bermakna.'],
          ['img' => 'assets/program-rohani.jpg',     'title' => 'Kerohanian',               'desc' => 'Program kerohanian dan keagamaan untuk kesejahteraan ummah.'],
          ['img' => 'assets/program-ekonomi.jpg',    'title' => 'Ekonomi & Keusahawanan',   'desc' => 'Sokongan keusahawanan dan peluang ekonomi untuk warga.'],
        ];
      @endphp

      @foreach($programs as $program)
        <article class="program-card fade-up">
          <div class="program-icon-wrap">
            <img src="{{ asset($program['img']) }}" alt="{{ $program['title'] }}" class="program-icon-img" loading="lazy">
          </div>
          <h3 class="program-title">{{ $program['title'] }}</h3>
          <p class="program-desc">{{ $program['desc'] }}</p>
        </article>
      @endforeach
    </div>
  </div>
</section>
