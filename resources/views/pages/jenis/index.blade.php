@extends('layouts.master')

@section('content')
  
      {{-- @livewire('jenis-crud') --}}

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
                    title: 'Gagal!',
                    text: '{{ session('error') }}',
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            });
        </script>
        @endif
        
    <div class="pagetitle">
      <h1>Jenis Transaksi</h1>
      <nav>
        <ol class="breadcrumb">
          {{-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> --}}
          <li class="breadcrumb-item active">Operasi Data Jenis Transaksi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

   {{-- @livewire('create-transaction') --}}

   
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Jenis Transaksi 
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#CreateJenis">
                                Tambah Jenis Transaksi
                            </button>
                        </h4>
                    </div>

                     <div class="modal fade" id="CreateJenis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="{{ route('jenis.store') }}">
                              @csrf
                                <div class="row">
                                    <h3 class="mb-4 text-center fw-bold">Membuat Data Kemitraan</h3>
                                    <div class="mb-3 w-50">
                                        <label for="KODE_TJEN" class="form-label">Kode</label>
                                        <input type="text" class="form-control" name="KODE_TJEN" required>
                                    </div>

                                    <div class="mb-3 w-50">
                                        <label for="NAMA_TJEN" class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="NAMA_TJEN" required>
                                    </div>
                                </div>
                            </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-primary">Buat Jenis Transaksi</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jeniss as $jenis)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $jenis->KODE_TJEN }}</td>
                                        <td>{{ $jenis->NAMA_TJEN }}</td>
                                        <td class="d-flex gap-2">
                                              <div class="">
                                                    <a href="{{ route('jenis.edit', $jenis->KODE_TJEN) }}">
                                                        <span class="btn btn-primary "><i class="bi bi-person-fill-gear"></i></span>
                                                    </a>
                                                </div>
                                             <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('jenis.destroy', $jenis->KODE_TJEN) }}" method="post">
                                                @csrf
                                                @method('DELETE')

                                            <div>
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="bi bi-trash"></i>
                                            </button>
                                            </div>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="4">No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $jeniss->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

 
@endsection