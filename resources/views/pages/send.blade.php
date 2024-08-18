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
  @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  <form action="{{ route('send.hr') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="user_detail_id" value="{{ $user->id }}">
    <div class="mb-3 w-25">
      <label for="formFile" class="form-label">Default file input example</label>
      <input class="form-control" type="file" name="cv" id="formFile">
       @error('cv')
          <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Kirim</button>
  </form>
</section>

@endsection

@push('styles')
<style>
 
</style>
@endpush

@push('script')


@endpush