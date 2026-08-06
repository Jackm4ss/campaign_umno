<!doctype html>
<html lang="ms">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="Tak Banyak Alasan ialah kempen UMNO Putrajaya yang membawa gerak kerja penerangan, khidmat rakyat, dan mobilisasi akar umbi.">
  <title>@yield('title', $settings['metaTitle'] ?? 'Tak Banyak Alasan - Kempen UMNO Putrajaya')</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/admin-logo-blue.png') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter+Tight:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&display=swap" rel="stylesheet">
  @vite(['resources/css/public/site.css', 'resources/js/public/site.js'])
</head>
<body>
  @include('public.partials.preloader')
  @include('public.partials.navigation')

  <main>@yield('content')</main>

  @include('public.partials.footer')
  @include('public.partials.back-to-top')
</body>
</html>
