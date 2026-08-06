<section id="aspirasi" class="aspirasi section-pad">
  <div class="container aspirasi-layout">
    <div class="aspirasi-sticky">
      <span class="section-label">Aspirasi Anda, Tekad Kami</span>
      <h2 class="section-title aspirations-title">ASPIRASI GERAKAN PUTRAJAYA</h2>
      <p class="mengenai-text">Hala tuju Tak Banyak Alasan: mendengar rakyat, memberi penerangan yang jelas, dan bertindak melalui khidmat komuniti.</p>
      <a href="#sertai" class="btn btn-red" style="margin-top: 20px;">Hantar Aspirasi &rarr;</a>
    </div>

    <div class="aspirasi-scroll">
      @foreach([
        ['01', 'Rakyat Didengar', 'Kempen ini menekankan budaya mendengar supaya isu warga Putrajaya sampai kepada tindakan.'],
        ['02', 'Penerangan Jelas', 'Maklumat tentang program dan peluang komuniti disampaikan dengan bahasa yang mudah dan tepat.'],
        ['03', 'Khidmat Rakyat', 'Gerak kerja parti memberi tumpuan kepada aspirasi, kebajikan, dan hubungan komuniti.'],
      ] as $index => [$num, $title, $description])
        <article class="aspirasi-item aspirasi-item--text {{ $index === 0 ? 'active' : '' }}">
          <div class="aspirasi-marker"><div class="aspirasi-dot"></div></div>
          <div class="aspirasi-body">
            <span class="aspirasi-num">{{ $num }}</span>
            <h3>{{ $title }}</h3>
            <p>{{ $description }}</p>
          </div>
        </article>
      @endforeach
    </div>
  </div>
</section>
