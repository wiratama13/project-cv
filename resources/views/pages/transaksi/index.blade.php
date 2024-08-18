@extends('layouts.master')

@section('title')
    Rekap Absen
@endsection

@section('content')
<section class="section">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('transaksi.index') }}">Rekap Transaksi</a></li>

          </ol>
          <h5 class="fw-bold">Transaksi</h5>
    </nav>
    @if(session('error'))
         <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'gagal!',
                text: '{{ session('error') }}',
                icon: 'error',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        });
    </script>
    @endif

      <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <h3 class="fw-bold text-center mb-4">Rekap Transaksi</h3>
                            <div class="col-md-6">
                                <div>
                                    <table class="table table-borderless">

                                        <tr style="">
                                            <td style="width:10%">
                                                <label for="" class="form-label">Tanggal Awal</label>
                                            </td>
                                            <td style="width:90%">
                                                <input type="date" class="form-control" name="tanggal[1]">
                                            </td>
                                        </tr>
                                        <tr style="">
                                            <td style="width:30%">
                                                <label for="" class="form-label">Tanggal Akhir</label>
                                            </td>
                                            <td style="width:40%">
                                                <input type="date" class="form-control" name="tanggal[2]">
                                            </td>
                                        </tr>
                                       
                                    </table>
                                    <div >
                                        <button class="btn btn-primary px-5 mt-5 ms-3">Cari</button>
                                    </div>
                                </div>
                            </div>

                           
                        </div>

                    </div>
                </div>

            </form>
          </div>
        </div>
</section>

@endsection


