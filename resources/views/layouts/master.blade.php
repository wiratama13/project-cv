<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">
   @include('includes.style')
   @stack('styles')
   
</head>

<body>

  @include('includes.header')

  @include('includes.sidebar')
  <main id="main" class="main" style="background: #fff">
  @yield('content')
  </main>
  @include('includes.script')
  @stack('script')
  
  
</body>

</html>