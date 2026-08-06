@extends('layouts.public')

@section('title', $program['title'].' - Tak Banyak Alasan')

@section('content')
@php
    $primaryCta = $program['cta']['primary'];
    $secondaryCta = $program['cta']['secondary'];
    $primaryHref = $primaryCta['href'] === 'bantuan'
        ? route('bantuan.index')
        : url('/#'.$primaryCta['href']);
    $secondaryHref = $secondaryCta['href'] === 'program-list'
        ? url('/#program')
        : url('/#'.$secondaryCta['href']);
@endphp

<section class="program-detail-page section-pad">
  <div class="container program-detail-container">
    <div class="program-detail-shell">
      <a href="{{ url('/#program') }}" class="program-detail-back" title="Kembali ke senarai program">
        <span class="program-detail-back-pad">
          <svg class="program-detail-back-fillet program-detail-back-fillet--a" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" aria-hidden="true"><path d="m100,0H0v100C0,44.77,44.77,0,100,0Z" fill="currentColor"></path></svg>
          <span class="program-detail-back-circle">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
          </span>
          <svg class="program-detail-back-fillet program-detail-back-fillet--b" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" aria-hidden="true"><path d="m100,0H0v100C0,44.77,44.77,0,100,0Z" fill="currentColor"></path></svg>
        </span>
      </a>

      <article class="program-detail-card">
        <header class="program-detail-header">
          <span class="section-label">Program Kami</span>
          <h1 class="section-title program-detail-title">{{ $program['title'] }}</h1>
          <p class="program-detail-lead">{{ $program['lead'] }}</p>
        </header>

        <div class="program-detail-media">
          <img
            src="{{ asset($program['image']) }}"
            alt="{{ $program['title'] }}"
            class="program-detail-image"
            loading="eager"
          >
        </div>

        <div class="program-detail-body">
          @foreach($program['sections'] as $section)
            <section class="program-detail-block">
              <h2 class="program-detail-heading">{{ $section['heading'] }}</h2>
              @foreach($section['paragraphs'] ?? [] as $paragraph)
                <p class="program-detail-text">{{ $paragraph }}</p>
              @endforeach
              @if(!empty($section['bullets']))
                <ul class="program-detail-list">
                  @foreach($section['bullets'] as $bullet)
                    <li>{{ $bullet }}</li>
                  @endforeach
                </ul>
              @endif
            </section>
          @endforeach

          <p class="program-detail-closing">
            Tak Banyak Alasan — terbukti, terlihat &amp; terjamin. Program ini sebahagian daripada tekad kami bersama warga Putrajaya.
          </p>

          <div class="program-detail-cta">
            <a class="btn btn-red" href="{{ $primaryHref }}">{{ $primaryCta['label'] }} &rarr;</a>
            <a class="btn btn-outline-dark" href="{{ $secondaryHref }}">{{ $secondaryCta['label'] }}</a>
          </div>
        </div>

        @if(count($siblings) > 0)
          <aside class="program-detail-siblings" aria-label="Program lain">
            <h2 class="program-detail-siblings-title">Program lain</h2>
            <ul class="program-detail-siblings-list">
              @foreach($siblings as $sibling)
                <li>
                  <a href="{{ route('programs.show', $sibling['slug']) }}">{{ $sibling['title'] }}</a>
                </li>
              @endforeach
            </ul>
          </aside>
        @endif
      </article>
    </div>
  </div>
</section>
@endsection
