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
      <h1>Data Transaksi</h1>
      <nav>
        <ol class="breadcrumb">
          {{-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> --}}
          <li class="breadcrumb-item active"> Data Transaksi </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

   {{-- @livewire('create-transaction') --}}
   
        <div class="row">
            <div class="col-md-12">
               

                <div class="card">
                    <div class="card-header">
                        <h4>Data Transaksi Dari {{ $tanggal_awal . ' s.d ' . $tanggal_akhir }}
                            
                        </h4>
                    </div>

                    <div class="card-body">
                        <table class="table table-borderd table-striped">
                            <thead>
                                
                                <tr>
                                    <th>ID</th>
                                    <th>NO_FAKTUR</th>
                                    <th>Kode_Customer</th>
                                    <th>KODE_TJEN</th>
                                    <th>TGL_FAKTUR</th>
                                    <th>TOTAL_BRUTO</th>
                                    <th>TOTAL_DISKON</th>
                                    <th>TOTAL_JUMLAH</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($trs as $tr)
                                    <tr>
                                        
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $tr->NO_FAKTUR }}</td>
                                        <td>{{ $tr->Kode_Customer }}</td>
                                        <td>{{ $tr->KODE_TJEN }}</td>
                                        <td>{{ $tr->TGL_FAKTUR }}</td>
                                      
                                        <td>{{ $tr->TOTAL_BRUTO }}</td>
                                        <td>{{ $tr->TOTAL_DISKON }}</td>
                                        <td>{{ $tr->TOTAL_JUMLAH }}</td>
                                       
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="9">Data tidak tersedia</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- <div>
                            {{ $jeniss->links() }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    

 
@endsection