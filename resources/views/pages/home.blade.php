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
      <div class="row">
        <div class="col-md-7">
          
          <div class="row">
           
            <div class="col-4">
                   <label for="">Foto Profile</label>
                    <input type="hidden" name="oldImage" id="" value="{{ $user->foto ?? '' }}">
                    <div class="my-3" style="width: 150px; height: 150px; min-width: 150px; max-height: 150px; border: 2px dashed #ddd; display: flex; align-items: center; justify-content: center; cursor: pointer; border-radius: 50%;">
                        @if ($user->foto ?? '')
                            {{-- <a data-fancybox="gallery" href="{{ config('app.base_url') . $dokumen->ktp }}"> --}}
                                {{-- <img src="{{ config('app.base_url') . $dokumen->ktp }}" alt="Image 1" class="rounded-circle" style="width: 150px; height:150px"> --}}
                                {{-- <div style="width: 150px; height: 150px; overflow: hidden; border-radius: 50%;"> --}}
                                    {{-- <img src="{{ config('app.base_url') . $dokumen->ktp }}" alt="Image 1" style="width: 150px; height: auto; object-fit: cover;"> --}}
                                {{-- </div> --}}
                            {{-- </a> --}}
                            <img class="" src="{{ asset('storage/' . $user->foto) }}" alt="Uploaded Image" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; object-position: center;">
                        @else
                            {{-- <p class="placeholderText">No image selected</p> --}}
                            <img class="" src="#" alt="Uploaded Image" style="width: 150px; height: 150px; display: none; border-radius: 50%; object-fit: cover; object-position: center;">
                        @endif
                    </div>
                    {{-- <input type="file" name="ktp" class="uploadInput" onchange="previewImage(event)" style="display: none;" class="form-control @error('ktp') is-invalid @enderror"> --}}
                    @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-7">
                  <h3 class="fw-bold">{{ $user->name ?? '' }}</h3>
                  <p>{{ $user->posisi ?? '' }}</p>

                  <div class="row">
                      <div class="col my-3">
                          <p class="fw-bold fs-5">Email</p>
                          <p>{{ $user->email ?? '' }}</p>

                           <p class="fw-bold fs-5">No HP</p>
                          <p>{{ $user->no_hp }}</p>
                      </div>
                  </div>
                  
              </div>

                <div class="col-1">
                  <button type="button" class="btn btn-light rounded-circle " data-bs-toggle="modal" data-bs-target="#datadiri" style="top: 10px; right: 10px;">
                      <i class="bi bi-pencil"></i>
                  </button>

                   <div class="modal fade" id="datadiri" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    
                    <div class="modal-content">
                      <form action="{{ route('usercv.update', $user) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Data Diri</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="mb-3">
                          <div class="row justify-content-center">
                                 <input type="hidden" name="user_id" id="" value="{{ $user->id ?? '' }}">
                                <input type="hidden" name="oldImage" value="{{ $user->foto ?? '' }}">
                                <div class="imageBox my-3" style="width: 150px; height: 150px; min-width: 150px; max-height: 150px; border: 2px dashed #ddd; display: flex; align-items: center; justify-content: center; cursor: pointer; border-radius: 50%;">
                                    @if ($user->foto ?? '')
                                        <img class="imagePreview" src="{{ asset('storage/' . $user->foto) }}" alt="Uploaded Image" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; object-position: center;">
                                    @else
                                        <span class="placeholderText">No image selected</span>
                                        <img class="imagePreview" src="#" alt="Uploaded Image" style="width: 150px; height: 150px; display: none; border-radius: 50%; object-fit: cover; object-position: center;">
                                    @endif
                                </div>
                                <input type="file" name="foto" class="uploadInput form-control @error('foto') is-invalid @enderror" onchange="previewImage(event)" style="display: none;">
                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                 <div class="container">
                                  <div class="">
                                     <label for="">Nama</label> 
                                    <input type="text"  class="form-control" id="" name="name" value="{{ $user->name ?? ''  }}">
                                  </div>

                                  <div class="my-4">
                                     <label for="">Posisi</label> 
                                    <input type="text"  class="form-control" id="" name="posisi" value="{{ $user->posisi ?? ''  }}">
                                  </div>
                                  
                                 <div class="my-4">
                                   <label for="">Email</label> 
                                  <input type="text"  class="form-control" id="" name="email" value="{{ $user->email ?? ''  }}">
                                 </div>
                                  
                                  <div>
                                    <label for="">No HP</label> 
                                  <input type="text"  class="form-control" id="" name="no_hp" value="{{ $user->no_hp ?? ''  }}">
                                  </div>
                                 </div>
                          </div>
                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                      </form>

                    </div>
                    
                  </div>
                  </div>
                </div>

          </div>
          
        <div>
          <h3 class="mt-5 fw-bold">About Me</h3>
            <div class="border border-3 p-3 rounded-3 position-relative" style="min-height: 150px;width: 85%">
              <div class="row">
                <div class="col-11">
                  <p>{{ $about->tentang ?? '' }}</p>
                </div>
                <div class="col-1">
                   <button type="button" class="btn btn-light rounded-circle position-absolute" data-bs-toggle="modal" data-bs-target="#aboutMe" style="top: 10px; right: 10px;">
                      <i class="bi bi-pencil"></i>
                    </button>
                </div>
              </div>

                <div class="modal fade" id="aboutMe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                          <form id="aboutMeForm">
                              <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="exampleModalLabel">About Me</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <div class="mb-3">
                                      <h5 for="exampleFormControlInput1" class="fw-normal">Beritahu tentangmu pada perusahaan</h5>
                                      <textarea class="form-control" name="tentang" cols="30" rows="9">{{ $about->tentang ?? '' }}</textarea>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <input type="hidden" class="form-control" id="about_id" name="user_detail_id" value="{{ $user->id ?? '' }}">
                                  <button type="button" class="btn btn-primary" id="saveAboutMe">Save changes</button>
                              </div>
                          </form>
                      </div>
                  </div>
                </div>

            </div>
        </div>

        <div>
          <h3 class="fw-bold mt-5">Riwayat Karir</h3>
          @foreach ($karirs as $karir)
          <div class="border border-3 p-3 rounded-3 position-relative mt-3" style="min-height: 250px;width:85%">
            <div class="row">
              <div class="col-11">
                  <span class="fs-4 fw-bold">{{ $karir->posisi ?? '' }}</span>
                  <p class="fs-5 fw-normal">{{ $karir->perusahaan ?? '' }}</p>
                  <span class="fs-5 fw-normal"> <p>Periode: {{ $karir->formatted_tanggal_mulai ?? '' }} - {{ $karir->formatted_tanggal_selesai ?? '' }} ({{ $karir->selisih_bulan ??'' }} bulan)</p></span>
                    <ul>
                        @if($karir->deskripsi)
                            @foreach(explode("\n", $karir->deskripsi) as $line)
                                <li>{{ trim($line) }}</li>
                            @endforeach
                        @else
                            <li>Tidak ada deskripsi.</li>
                        @endif
                    </ul>
              </div>
              
              <div class="col-1">
                <button type="button" class="btn btn-light rounded-circle position-absolute btn-edit-karir" data-bs-toggle="modal" data-bs-target="#riwayatKarir" data-karir-id="{{ $karir->id }}" data-posisi="{{ $karir->posisi }}" data-perusahaan="{{ $karir->perusahaan }}" data-tanggal-mulai="{{ $karir->tanggal_mulai }}" data-tanggal-selesai="{{ $karir->tanggal_selesai }}" data-deskripsi="{{ $karir->deskripsi }}" style="top: 10px; right: 10px;">
                  <i class="bi bi-pencil"></i>
                </button>

                  <!-- Modal -->
                  <div class="modal fade" id="riwayatKarir" tabindex="-1" aria-labelledby="riwayatKarirLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="riwayatKarirLabel">Edit Riwayat Karir</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form id="editKarirForm">
                            <div class="mb-3">
                              <label for="posisi" class="form-label">Posisi</label>
                              <input type="text" class="form-control" id="posisi" name="posisi">
                            </div>
                            {{-- @foreach ($karirs as $karir) --}}
                              <input type="hidden" class="form-control" name="user_detail_id" id="user_detail_id" >
                            {{-- @endforeach --}}
                            <div class="mb-3">
                              <label for="perusahaan" class="form-label">Perusahaan</label>
                              <input type="text" class="form-control" id="perusahaan" name="perusahaan">
                            </div>
                            <div class="mb-3">
                              <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                              <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                            </div>
                            <div class="mb-3">
                              <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                              <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
                            </div>
                            <div class="mb-3">
                              <label for="deskripsi" class="form-label">Deskripsi</label>
                              <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                            </div>
                            <input type="hidden" class="form-control" id="karir_id" name="karir_id">
                             <button type="button" class="btn btn-danger" id="hapusKarirBtn">Hapus</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

             
              </div>
            </div>
          </div>
          @endforeach

          <button class="btn btn-outline-primary my-4" data-bs-toggle="modal" data-bs-target="#tambahKarir">Tambah Karir</button>

            <div class="modal fade" id="tambahKarir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="min-width:200px; width:100%">
                      <form action="{{ route('karir.store') }}" method="POST">
                        @csrf
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Riwayat Karir</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="mb-3">
                          <h5 for="exampleFormControlInput1" class="fw-semibold">Tulis Riwayat Karirmu</h5>
                          <div class="row">
                           <div class="container">
                             <span class="fs-5 fw-bold">Posisi</span>
                            <input type="text" class="form-control" name="posisi">
                            
                              
                            <input type="hidden" class="form-control" name="user_detail_id" value="{{ $user->id ?? '' }}">
                          

                            <div class="mt-3">
                                <span class="fs-5 fw-bold mt-3">Perusahaan</span>
                                <input type="text" class="form-control" name="perusahaan">
                            </div>
                           </div>
                            <div class="col-6">
                              <div class="mt-3">
                                <span class="fs-5 fw-bold mt-3">Tanggal Mulai</span>
                                <input type="date" class="form-control" name="tanggal_mulai">
                            </div>
                            </div>
                            <div class="col-6">
                              <div class="mt-3">
                                <span class="fs-5 fw-bold mt-3">Tanggal Selesai</span>
                                <input type="date" class="form-control" name="tanggal_selesai">
                            </div>
                            </div>
                            <div class="mt-3">
                                <p class="fs-5 fw-bold mt-3">Deskripsi</p>
                                <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control" ></textarea>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
        </div>
        


       
         <div>
          <h3 class="fw-bold mt-5">Riwayat Pendidikan</h3>
          @foreach ($pendidikans as $pendidikan)
          <div class="border border-3 p-3 rounded-3 position-relative mt-3" style="min-height: 250px;width:85%">
            <div class="row">
              <div class="col-11">
                  <span class="fs-4 fw-bold">{{ $pendidikan->tingkat ?? '' }}</span>
                  <p class="fs-5 fw-normal">{{ $pendidikan->institusi ?? '' }}</p>
                  <span class="fs-5 fw-normal"> <p>Periode: {{ $pendidikan->formatted_tanggal_mulai ?? ''}} - {{ $pendidikan->formatted_tanggal_selesai ?? '' }} ({{ $pendidikan->selisih_bulan ?? '' }} bulan)</p></span>
                    <ul>
                        @if($pendidikan->deskripsi)
                            @foreach(explode("\n", $pendidikan->deskripsi) as $line)
                                <li>{{ trim($line) }}</li>
                            @endforeach
                        @else
                            <li>Tidak ada deskripsi.</li>
                        @endif
                    </ul>
              </div>
              
              <div class="col-1">
                <button type="button" class="btn btn-light rounded-circle position-absolute btn-edit-pendidikan" data-bs-toggle="modal" data-bs-target="#riwayatPendidikan" data-pendidikan-id="{{ $pendidikan->id }}" data-tingkat="{{ $pendidikan->tingkat }}" data-institusi="{{ $pendidikan->institusi }}" data-tanggal-mulai="{{ $pendidikan->tanggal_mulai }}" data-tanggal-selesai="{{ $pendidikan->tanggal_selesai }}" data-deskripsi="{{ $pendidikan->deskripsi }}" style="top: 10px; right: 10px;">
                  <i class="bi bi-pencil"></i>
                </button>

                  <!-- Modal -->
                  <div class="modal fade" id="riwayatPendidikan" tabindex="-1" aria-labelledby="riwayatPendidikanLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="riwayatPendidikanLabel">Edit Pendidikan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form id="editPendidikanForm">
                            <div class="mb-3">
                              <label for="tingkat" class="form-label">Tingkat</label>
                              <input type="text" class="form-control" id="tingkat" name="tingkat">
                            </div>
                            {{-- @foreach ($karirs as $karir) --}}
                              <input type="hidden" class="form-control" name="user_detail_id" id="user_detail_id_pendidikan" >
                            {{-- @endforeach --}}
                            <div class="mb-3">
                              <label for="institusi" class="form-label">institusi</label>
                              <input type="text" class="form-control" id="institusi" name="institusi">
                            </div>
                            <div class="mb-3">
                              <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                              <input type="date" class="form-control" id="tanggal_mulai_pendidikan" name="tanggal_mulai">
                            </div>
                            <div class="mb-3">
                              <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                              <input type="date" class="form-control" id="tanggal_selesai_pendidikan" name="tanggal_selesai">
                            </div>
                            <div class="mb-3">
                              <label for="deskripsi" class="form-label">Deskripsi</label>
                              <textarea class="form-control" id="deskripsi_pendidikan" name="deskripsi" rows="3"></textarea>
                            </div>
                             {{-- <input type="hidden" class="form-control" id="karir_id" name="karir_id"> --}}
                            <input type="hidden" class="form-control" id="pendidikan_id" name="pendidikan_id">
                             <button type="button" class="btn btn-danger" id="hapusPendidikanBtn">Hapus</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

             
              </div>
            </div>
          </div>
          @endforeach

          <button class="btn btn-outline-primary my-4" data-bs-toggle="modal" data-bs-target="#tambahPendidikan">Tambah Karir</button>

            <div class="modal fade" id="tambahPendidikan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="min-width:200px; width:100%">
                      <form action="{{ route('pendidikan.store') }}" method="POST">
                        @csrf
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Riwayat Pendidikan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="mb-3">
                          <h5 for="exampleFormControlInput1" class="fw-semibold">Tulis Riwayat Karirmu</h5>
                          <div class="row">
                           <div class="container">

                             <span class="fs-5 fw-bold">Tingkat</span>
                            <input type="text" class="form-control" name="tingkat">
                            
                              
                            <input type="hidden" class="form-control" name="user_detail_id" value="{{ $user->id }}">
                          

                            <div class="mt-3">
                                <span class="fs-5 fw-bold mt-3">Institusi</span>
                                <input type="text" class="form-control" name="institusi">
                            </div>
                           </div>
                            <div class="col-6">
                              <div class="mt-3">
                                <span class="fs-5 fw-bold mt-3">Tanggal Mulai</span>
                                <input type="date" class="form-control" name="tanggal_mulai">
                            </div>
                            </div>
                            <div class="col-6">
                              <div class="mt-3">
                                <span class="fs-5 fw-bold mt-3">Tanggal Selesai</span>
                                <input type="date" class="form-control" name="tanggal_selesai">
                            </div>
                            </div>
                            <div class="mt-3">
                                <p class="fs-5 fw-bold mt-3">Deskripsi</p>
                                <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control" ></textarea>
                            </div>
                          </div>
                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
        </div>
        
        <div>
          <h3 class="fw-bold mt-5">Keahlian</h3>
          
          <div class="border border-3 p-3 rounded-3 position-relative" style="min-height: 250px; width:85%">
            <div class="d-flex flex-wrap gap-2">
                @foreach ($keahlianUser as $keahlian)
                    <div class="keahlian-item position-relative">
                        <button class="btn btn-primary rounded delete-keahlian" data-id="{{ $keahlian->id }}">{{ $keahlian->keahlian }} </button>
                       
                    </div>
                @endforeach
            </div>
            <button type="button" class="btn btn-light rounded-circle position-absolute" data-bs-toggle="modal" data-bs-target="#keahlian" style="top: 10px; right: 10px;">
                <i class="bi bi-pencil"></i>
            </button>
        </div>



           <div class="modal fade" id="keahlian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="min-width:200px; width:100%">
                      <form id="formKeahlian">
                        @csrf
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Riwayat Karir</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="mb-3">
                          <h5 for="exampleFormControlInput1" class="fw-semibold">Tambahkan keahlianmu</h5>
                          <div class="row">
                           <div class="container">

                            <input type="hidden" name="user_detail_id" value="{{ $user->id ?? ''}}">
                            <select class="chosen-select form-control" name="keahlian[]" multiple="multiple">
                                @foreach ($keahlians as $keahlian)
                                    <option value="{{ $keahlian->nama }}">{{ $keahlian->nama }} </option>
                                @endforeach
                            </select>
                           </div>
                          </div>
                          
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
         

            </div>
        </div>

        <div class="col-md-5">
          <h4 class="fw-bold">Status Pekerjaan</h4>
          <input type="text" class="form-control" disabled value="Aktif Mencari Pekerjaan">
          <a href="{{ route('print.cv') }}" target="_blank">
            <button class="btn btn-primary mt-4">Buat CV</button>
          </a>
        
        </div>

        


        




    </section>
 
@endsection

@push('styles')
  <style>
       @media print {
          .sidebar {
              display: none; /* Menyembunyikan elemen sidebar saat cetak */
          }
          .sejajar {
            display: none
          }
          #rincian {
            display: none
          }
          .header {
            display: none
          }

          .hapus {
            display: none
          }
          .cekbox {
            display: none
          }
      }

      .no-border {
        border: none;
      }

      .no-border:hover {
        background: #f0f0f0;
      }

      .no-border:focus {
        border: none;
      }

      ul {
          padding: 0;
          margin: 0;
          list-style: none; /* Menghilangkan bullet points */
      }

      li {
          margin: 0;
          padding: 0;
      }
      
  </style>
@endpush

@push('script')
 <script>
  function previewImage(event) {
    const input = event.target;
    const imagePreview = document.querySelector('.imagePreview');
    const placeholderText = document.querySelector('.placeholderText');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block';
            placeholderText.style.display = 'none'; // Hide the placeholder text
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        imagePreview.src = '#';
        imagePreview.style.display = 'none';
        placeholderText.style.display = 'flex'; // Show the placeholder text
    }
}

// Event listener to open file dialog when imageBox is clicked
document.querySelector('.imageBox').addEventListener('click', function() {
    document.querySelector('.uploadInput').click();
});


</script>
<script>

$(document).ready(function() {
  // Event handler untuk tombol edit
  $('.btn-edit-karir').on('click', function() {
    var karirId = $(this).data('karir-id');
    
    // Mengambil data dari API
    $.ajax({
      url: '/karir/' + karirId,
      method: 'GET',
      success: function(data) {
        // Mengisi form di dalam modal dengan data yang diterima
        $('#posisi').val(data.posisi);
        $('#user_detail_id').val(data.user_detail_id);
        $('#perusahaan').val(data.perusahaan);
        $('#tanggal_mulai').val(data.tanggal_mulai);
        $('#tanggal_selesai').val(data.tanggal_selesai);
        $('#deskripsi').val(data.deskripsi);
        $('#karir_id').val(data.id);
      },
      error: function(xhr) {
        // Tampilkan pesan kesalahan jika ada
        alert('Terjadi kesalahan saat mengambil data.');
      }
    });
  });

  // Event handler untuk formulir pengeditan
   // Ambil CSRF token dari meta tag
  $('#editKarirForm').on('submit', function(e) {
    e.preventDefault();

    // Ambil ID dan nilai dari form
    var karirId = $('#karir_id').val();
    var posisi = $('#posisi').val();
    var userDetailId = $('#user_detail_id').val();
    var perusahaan = $('#perusahaan').val();
    var tanggalMulai = $('#tanggal_mulai').val();
    var tanggalSelesai = $('#tanggal_selesai').val();
    var deskripsi = $('#deskripsi').val();

    // Buat objek data untuk dikirim
    var formData = {
        posisi: posisi,
        user_detail_id: userDetailId,
        perusahaan: perusahaan,
        tanggal_mulai: tanggalMulai,
        tanggal_selesai: tanggalSelesai,
        deskripsi: deskripsi
    };

    // Ambil CSRF token dari meta tag
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Mengirim data ke API untuk diperbarui
    $.ajax({
        url: '/karir/' + karirId,
        method: 'PUT',
        headers: {
            'X-CSRF-TOKEN': csrfToken // Menambahkan CSRF token ke header
        },
        contentType: 'application/json', // Mengatur header konten
        data: JSON.stringify(formData),    // Mengirim data dalam format JSON
        success: function(data) {
            // Tampilkan pesan sukses
            // alert('Data karir telah diperbarui.');

            // Update tampilan halaman
            $('#karir-' + karirId + ' .posisi').text(data.posisi);
            $('#karir-' + karirId + ' .perusahaan').text(data.perusahaan);
            $('#karir-' + karirId + ' .tanggal_mulai').text(data.tanggal_mulai);
            $('#karir-' + karirId + ' .tanggal_selesai').text(data.tanggal_selesai);
            $('#karir-' + karirId + ' .deskripsi').text(data.deskripsi);

            // Tutup modal
             location.reload();
            $('#riwayatKarir').modal('hide');
        },
        error: function(xhr) {
            // Tampilkan pesan kesalahan jika ada
            console.log('Error:', xhr.status, xhr.statusText);
            console.log('Response Text:', xhr.responseText);
            alert('Terjadi kesalahan saat memperbarui data.');
        }
    });
});

$('#hapusKarirBtn').on('click', function() {
    var karirId = $('#karir_id').val();

    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/karir/' + karirId,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(data) {
                // alert('Data karir telah dihapus.');
                location.reload();
                $('#riwayatKarir').modal('hide');
              
                
                $('#karir-' + karirId).remove();
            },
            error: function(xhr) {
                console.log('Error:', xhr.status, xhr.statusText);
                console.log('Response Text:', xhr.responseText);
                alert('Terjadi kesalahan saat menghapus data.');
            }
        });
    }
})
  
$('.btn-edit-pendidikan').on('click', function() {
    var pendidikanId = $(this).data('pendidikan-id');
    
    // Mengambil data dari API
    $.ajax({
      url: '/pendidikan/' + pendidikanId,
      method: 'GET',
      success: function(data) {
        // Mengisi form di dalam modal dengan data yang diterima
        $('#tingkat').val(data.tingkat);
        $('#user_detail_id_pendidikan').val(data.user_detail_id);
        $('#institusi').val(data.institusi);
        $('#tanggal_mulai_pendidikan').val(data.tanggal_mulai);
        $('#tanggal_selesai_pendidikan').val(data.tanggal_selesai);
        $('#deskripsi_pendidikan').val(data.deskripsi);
        $('#pendidikan_id').val(data.id);
      },
      error: function(xhr) {
        // Tampilkan pesan kesalahan jika ada
        alert('Terjadi kesalahan saat mengambil data.');
      }
    });
});

$('#editPendidikanForm').on('submit', function(e) {
    e.preventDefault();

    // Ambil ID dan nilai dari form
    var pendidikanId = $('#pendidikan_id').val();
    var tingkat = $('#tingkat').val();
    var userDetailId = $('#user_detail_id_pendidikan').val();
    var institusi = $('#institusi').val();
    var tanggalMulai = $('#tanggal_mulai_pendidikan').val();
    var tanggalSelesai = $('#tanggal_selesai_pendidikan').val();
    var deskripsi = $('#deskripsi_pendidikan').val();

    // Buat objek data untuk dikirim
    var formData = {
        tingkat: tingkat,
        user_detail_id: userDetailId,
        institusi: institusi,
        tanggal_mulai: tanggalMulai,
        tanggal_selesai: tanggalSelesai,
        deskripsi: deskripsi
    };

    // Ambil CSRF token dari meta tag
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Mengirim data ke API untuk diperbarui
    $.ajax({
        url: '/pendidikan/' + pendidikanId,
        method: 'PUT',
        headers: {
            'X-CSRF-TOKEN': csrfToken // Menambahkan CSRF token ke header
        },
        contentType: 'application/json', // Mengatur header konten
        data: JSON.stringify(formData),    // Mengirim data dalam format JSON
        success: function(data) {
            // Tampilkan pesan sukses
            // alert('Data karir telah diperbarui.');

            // Update tampilan halaman
            // $('#karir-' + karirId + ' .posisi').text(data.posisi);
            // $('#karir-' + karirId + ' .perusahaan').text(data.perusahaan);
            // $('#karir-' + karirId + ' .tanggal_mulai').text(data.tanggal_mulai);
            // $('#karir-' + karirId + ' .tanggal_selesai').text(data.tanggal_selesai);
            // $('#karir-' + karirId + ' .deskripsi').text(data.deskripsi);

            // Tutup modal
             location.reload();
            $('#riwayatPendidikan').modal('hide');
        },
        error: function(xhr) {
            // Tampilkan pesan kesalahan jika ada
            console.log('Error:', xhr.status, xhr.statusText);
            console.log('Response Text:', xhr.responseText);
            alert('Terjadi kesalahan saat memperbarui data.');
        }
    });
});

$('#hapusPendidikanBtn').on('click', function() {
    var pendidikanId = $('#pendidikan_id').val();

    if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/pendidikan/' + pendidikanId,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function(data) {
                // alert('Data karir telah dihapus.');
                location.reload();
                $('#riwayatPendidikan').modal('hide');
              
                
                // $('#karir-' + karirId).remove();
            },
            error: function(xhr) {
                console.log('Error:', xhr.status, xhr.statusText);
                console.log('Response Text:', xhr.responseText);
                alert('Terjadi kesalahan saat menghapus data.');
            }
        });
    }
})

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#saveAboutMe').on('click', function(e) {
    e.preventDefault();
     var aboutId = $('#about_id').val();

    // Ambil data dari form
    var formData = $('#aboutMeForm').serialize();

    // Kirim data melalui AJAX
    $.ajax({
        url: '/about/' + aboutId, // Ganti dengan URL yang sesuai untuk update data
        type: 'PUT',
        data: formData,
        success: function(response) {
            // Berhasil melakukan update
            // alert('Data berhasil diupdate!');
            location.reload();
            $('#aboutMe').modal('hide'); // Tutup modal
        },
        error: function(xhr) {
            // Tampilkan error di console log
            console.log('Error: ' + xhr.status + ' ' + xhr.statusText);
            
            if (xhr.responseJSON && xhr.responseJSON.message) {
                console.log('Message: ' + xhr.responseJSON.message);
            }
            // location.reload();
            // Tampilkan alert untuk error umum
           
        }
    });
});
  
 $('#formKeahlian').on('submit', function(e) {
    e.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
        url: '/keahlian',
        type: 'POST',
        data: formData,
        success: function(response) {
            
            // Optionally, you can close the modal and reset the form
            $('#keahlian').modal('hide');
            $('#formKeahlian')[0].reset();
            location.reload()
        },
        error: function(xhr) {
            alert('Error: ' + xhr.responseJSON.message);
        }
    });
});

 $(document).on('click', '.delete-keahlian', function() {
    // Ambil keahlianId dari data-id pada tombol yang diklik
    var keahlianId = $(this).data('id');
    console.log(keahlianId);
    
    // Ambil elemen .keahlian-item yang paling dekat
    var $keahlianItem = $(this).closest('.keahlian-item');

    // Konfirmasi sebelum menghapus
    if (confirm('Apakah Anda yakin ingin menghapus keahlian ini?')) {
        $.ajax({
            url: '/keahlian/' + keahlianId,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status === 'success') {
                    // Hapus elemen .keahlian-item dari DOM jika berhasil dihapus dari server
                    $keahlianItem.remove();
                    location.reload()
                } else {
                    alert('Gagal menghapus keahlian.');
                }
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseJSON.message);
            }
        });
    }
});




});

</script>

<script>
  $(document).ready(function() {
    $('.chosen-select').chosen({
      placeholder_text_multiple: 'Pilih keahlian',
      no_results_text: 'Tidak ada hasil ditemukan',
      width: '100%'
    });
  });
</script>

@endpush