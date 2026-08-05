@extends('layouts.public')

@section('title', $event['title'].' - Tak Banyak Alasan')

@section('content')
@php
    $primaryCta = $event['cta']['primary'];
    $secondaryCta = $event['cta']['secondary'];
    $primaryHref = $primaryCta['href'] === 'bantuan'
        ? route('bantuan.index')
        : url('/#'.$primaryCta['href']);
    $secondaryHref = $secondaryCta['href'] === 'acara-list'
        ? url('/#acara')
        : url('/#'.$secondaryCta['href']);
@endphp

<section class="event-detail-page section-pad">
  <div class="container event-detail-container">
    <div class="event-detail-shell">
      <a href="{{ url('/#acara') }}" class="event-detail-back" title="Kembali ke senarai acara">
        <span class="event-detail-back-pad">
          <svg class="event-detail-back-fillet event-detail-back-fillet--a" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" aria-hidden="true"><path d="m100,0H0v100C0,44.77,44.77,0,100,0Z" fill="currentColor"></path></svg>
          <span class="event-detail-back-circle">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
          </span>
          <svg class="event-detail-back-fillet event-detail-back-fillet--b" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" aria-hidden="true"><path d="m100,0H0v100C0,44.77,44.77,0,100,0Z" fill="currentColor"></path></svg>
        </span>
      </a>

      <article class="event-detail-card">
        <header class="event-detail-header">
          <span class="section-label">Acara Akan Datang</span>
          <h1 class="section-title event-detail-title">{{ $event['title'] }}</h1>
          <div class="event-detail-meta">
            <span class="event-detail-meta-item">
              <strong>Tarikh</strong> {{ $event['dateLabel'] }}
            </span>
            <span class="event-detail-meta-sep" aria-hidden="true">·</span>
            <span class="event-detail-meta-item">
              <strong>Lokasi</strong> {{ $event['place'] }}
            </span>
          </div>
          <p class="event-detail-lead">{{ $event['lead'] }}</p>
        </header>

        <div class="event-detail-media">
          <img
            src="{{ asset($event['image']) }}"
            alt="{{ $event['title'] }}"
            class="event-detail-image"
            loading="eager"
          >
        </div>

        <div class="event-detail-body">
          @foreach($event['sections'] as $section)
            <section class="event-detail-block">
              <h2 class="event-detail-heading">{{ $section['heading'] }}</h2>
              @foreach($section['paragraphs'] ?? [] as $paragraph)
                <p class="event-detail-text">{{ $paragraph }}</p>
              @endforeach
              @if(!empty($section['bullets']))
                <ul class="event-detail-list">
                  @foreach($section['bullets'] as $bullet)
                    <li>{{ $bullet }}</li>
                  @endforeach
                </ul>
              @endif
            </section>
          @endforeach

          <p class="event-detail-closing">
            Tak Banyak Alasan — terbukti, terlihat &amp; terjamin. Sertai kehadiran lapangan bersama warga Putrajaya.
          </p>

          <div class="event-detail-cta">
            <a class="btn btn-red" href="{{ $primaryHref }}">{{ $primaryCta['label'] }} &rarr;</a>
            <a class="btn btn-outline-dark" href="{{ $secondaryHref }}">{{ $secondaryCta['label'] }}</a>
          </div>
        </div>

        @if(count($siblings) > 0)
          <aside class="event-detail-siblings" aria-label="Acara lain">
            <h2 class="event-detail-siblings-title">Acara lain</h2>
            <ul class="event-detail-siblings-list">
              @foreach($siblings as $sibling)
                <li>
                  <a href="{{ route('events.show', $sibling['slug']) }}">{{ $sibling['title'] }}</a>
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
