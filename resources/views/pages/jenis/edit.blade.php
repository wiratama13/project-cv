@extends('layouts.master')

@section('content')

<section class="section">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('jenis.index') }}">Jenis Transaksi</a></li>
           
          </ol>
          <h5 class="fw-bold">Edit Jenis Transaksi</h5>
    </nav>

      <div class="row">
        <div class="col-lg-12">
            <form method="POST" action="{{ route('jenis.update', $jenis->KODE_TJEN) }}">
                @csrf
                @method('PUT')
                    <div class="card">
                        <div class="card-body p-3">
                            <h3 class="mb-4 text-center fw-bold">Edit Data Jenis Transaksi</h3>
                           <div class="row">
                            {{-- <div class="mb-3 w-50">
                                <label for="nama" class="form-label">Nama Sentra</label>
                                <input type="text" class="form-control" name="KODE_TJEN" value="{{ $dso->nama_dso }}" required>
                            </div> --}}
                            <div class="mb-3 w-50">
                                <label for="nama" class="form-label">Nama </label>
                                <input type="text" class="form-control" name="NAMA_TJEN" value="{{ $jenis->NAMA_TJEN }}" required>
                            </div>
                           
                           </div>


                          <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Edit Jenis Transaksi</button>
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
