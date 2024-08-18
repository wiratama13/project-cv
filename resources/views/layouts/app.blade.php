<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

   @include('includes.style')
   @stack('styles')
   <livewire:styles />
</head>

<body>

  {{-- @include('includes.header') --}}

  {{-- @include('includes.sidebar') --}}

  @yield('content')

  @include('includes.script')
  <livewire:scripts />
  
</body>

</html>