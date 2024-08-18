@extends('layouts.master')

@section('content')

<section class="section">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          
            <li class="breadcrumb-item" aria-current="page"><a href="{{ route('customer.index') }}">Customer</a></li>
           
          </ol>
          <h5 class="fw-bold">Edit Customer</h5>
    </nav>

      <div class="row">
        <div class="col-lg-12">
            <form method="POST" action="{{ route('customer.update', $customer->Kode_Customer) }}">
                @csrf
                @method('PUT')
                    <div class="card">
                        <div class="card-body p-3">
                            <h3 class="mb-4 text-center fw-bold">Edit Customer</h3>
                           <div class="row">
                            {{-- <div class="mb-3 w-50">
                                <label for="nama" class="form-label">Nama Sentra</label>
                                <input type="text" class="form-control" name="KODE_TJEN" value="{{ $dso->nama_dso }}" required>
                            </div> --}}
                            <div class="mb-3 w-50">
                                <label for="nama" class="form-label">Nama </label>
                                <input type="text" class="form-control" name="Nama_Customer" value="{{ $customer->Nama_Customer }}" required>
                            </div>
                           
                           </div>


                          <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Edit Customer Transaksi</button>
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
