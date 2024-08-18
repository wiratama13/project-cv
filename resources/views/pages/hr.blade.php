@extends('layouts.master')

@section('content')
 @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            });
        </script>
        @endif

@if(session('error'))
<script>
  document.addEventListener('DOMContentLoaded', function() {
    Swal.fire({
      title: 'Error!',
      text: '{{ session('
      error ') }}',
      icon: 'error',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'OK'
    });
  });
</script>
@endif

<div class="pagetitle">
  <h1>CV</h1>
  <nav>
    <ol class="breadcrumb">
      {{-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> --}}
      <li class="breadcrumb-item active">Desain CV</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

@if(session()->has('error'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Error</strong> {{ session('error') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<section class="section dashboard">
  @foreach ($cvs as $cv)
    <p>
      <a href="{{ route('download.cv', $cv->id) }}">
       {{ $cv->user_detail->name }} Download CV
      </a>
    </p>
  @endforeach
</section>

@endsection

@push('styles')
<style>
 
</style>
@endpush

@push('script')


@endpush