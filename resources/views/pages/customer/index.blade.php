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
      <h1>Customer</h1>
      <nav>
        <ol class="breadcrumb">
          {{-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> --}}
          <li class="breadcrumb-item active">Operasi Data Customer</li>
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
                        <h4>Customer 
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#CreateCustomer">
                                Tambah Customer
                            </button>
                        </h4>
                    </div>

                     <div class="modal fade" id="CreateCustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="{{ route('customer.store') }}">
                              @csrf
                                <div class="row">
                                    <h3 class="mb-4 text-center fw-bold">Membuat Data Kemitraan</h3>
                                    <div class="mb-3 w-50">
                                        <label for="Kode_Customer" class="form-label">Kode</label>
                                        <input type="text" class="form-control" name="Kode_Customer" required>
                                    </div>

                                    <div class="mb-3 w-50">
                                        <label for="Nama_Customer" class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="Nama_Customer" required>
                                    </div>
                                </div>
                            </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-primary">Buat Customer</button>
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
                                @forelse ($customers as $customer)
                                    <tr>
                                        <td>{{ ($customers->currentPage() - 1) * $customers->perPage() + $loop->iteration }}</td>
                                        <td>{{ $customer->Kode_Customer }}</td>
                                        <td>{{ $customer->Nama_Customer }}</td>
                                        <td class="d-flex gap-2">
                                              <div class="">
                                                    <a href="{{ route('customer.edit', $customer->Kode_Customer) }}">
                                                        <span class="btn btn-primary "><i class="bi bi-person-fill-gear"></i></span>
                                                    </a>
                                                </div>
                                             <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('customer.destroy', $customer->Kode_Customer) }}" method="post">
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
                        <div class="my-2">
                            {{ $customers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

 
@endsection