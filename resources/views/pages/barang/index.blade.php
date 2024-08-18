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
      <h1>Barang</h1>
      <nav>
        <ol class="breadcrumb">
          {{-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> --}}
          <li class="breadcrumb-item active">Operasi Data Barang</li>
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
                        <h4>Barang 
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#CreateBarang">
                                Tambah Barang
                            </button>
                        </h4>
                    </div>

                     <div class="modal fade" id="CreateBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="{{ route('barang.store') }}">
                              @csrf
                                <div class="row">
                                    <h3 class="mb-4 text-center fw-bold">Membuat Data Kemitraan</h3>
                                    <div class="mb-3 w-50">
                                        <label for="KODE_BARANG" class="form-label">Kode Barang</label>
                                        <input type="text" class="form-control" name="KODE_BARANG" required>
                                    </div>

                                    <div class="mb-3 w-50">
                                        <label for="NAMA_BARANG" class="form-label">Nama Barang</label>
                                        <input type="text" class="form-control" name="NAMA_BARANG" required>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="mb-3 w-50">
                                        <label for="HARGA_BARANG" class="form-label">Harga Barang</label>
                                        <input type="text" class="form-control" name="HARGA_BARANG" required>
                                    </div>

                                    
                                </div>
                            </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-primary">Buat Barang</button>
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
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($barangs as $barang)
                                    <tr>
                                        <td>{{ ($barangs->currentPage() - 1) * $barangs->perPage() + $loop->iteration }}</td>
                                        <td>{{ $barang->KODE_BARANG }}</td>
                                        <td>{{ $barang->NAMA_BARANG }}</td>
                                        <td>{{ 'Rp ' . number_format($barang->HARGA_BARANG, 0, ',', '.') }}</td>

                                        <td class="d-flex gap-2">
                                              <div class="">
                                                    <a href="{{ route('barang.edit', $barang->KODE_BARANG) }}">
                                                        <span class="btn btn-primary "><i class="bi bi-person-fill-gear"></i></span>
                                                    </a>
                                                </div>
                                             <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barang.destroy', $barang->KODE_BARANG) }}" method="post">
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
                                        <td colspan="4">Data tidak ditemukan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $barangs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

 
@endsection