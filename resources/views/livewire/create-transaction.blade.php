<div>
   @if(session('error'))
        <script>
            document.addEventListener('livewire:load', function () {
              Livewire.on('flashError', message => {
                  Swal.fire({
                      title: 'Error',
                      text: message,
                      icon: 'error',
                      confirmButtonText: 'OK'
                  });
              });
          });

        </script>
        @endif
     <section class="section dashboard">
      <div class="card info-card sales-card">
        <div class="card-body">
           <div class="d-flex justify-content-start my-3">
                <div class="sejajar">
                   <a href="{{ route('barang.index') }}">
                      <button class="btn btn-primary">Master Barang</button>
                   </a>

                   <a href="{{ route('customer.index') }}">

                     <button type="submit" class="btn btn-primary"></i>Master Customer</button>
                   </a>
              </div>
          </div>

          <div class="border bg-secondary-light p-3 pt-2 mt-3">
             
          
         
            <div class="d-flex gap-1 justify-content-start mt-2">
              <button class="btn btn-light no-border" >Input</button>
              <button class="btn btn-light no-border" >Hapus</button>
              <button class="btn btn-light no-border" >Edit</button>
              <button class="btn btn-light no-border" disabled>Simpan</button>
              <button class="btn btn-light no-border">Cari</button>
              <button class="btn btn-light no-border" disabled>Batal</button>
              <button class="btn btn-light no-border">Print</button>
              <button class="btn btn-light no-border">Preview</button>
              <button class="btn btn-light no-border">CSV</button>
            </div>

            <hr>
            <form wire:submit.prevent="store">
            <div class="row">
              <div class="col-6">
              <div style="width:70%">
                <label for="datalistTransaksi" class="form-label">NO FAKTUR</label>
                <input type="text" wire:model="NO_FAKTUR" class="form-control" >
              </div>
              
              <div class="my-3">
                <label for="customer" class="form-label"><span class="fw-bold">Kode Customer</span></label>
                <select wire:model="Nama_Customer" class="form-control" id="">
                     @foreach ($customers as $customer)
                          <option value="{{ $customer->Nama_Customer }}">{{ $customer->Nama_Customer }}</option>
                      @endforeach
                </select>
                
              </div>
              </div>

              <div class="col-6 ">
                 <div>
                  <label for="datalistCustomer" class="form-label">TANGGAL</label>
                  <input type="date" class="form-control" wire:model="TGL_FAKTUR" list="customer" id="datalistCustomer" >
                  
              
              </div>
              <div class="my-3"> 
                  <label for="datalistJenisTransaksi" class="form-label">JENIS TRANSAKSI</label>
                  <select wire:model="NAMA_TJEN" class="form-control " id="" style="width: 50%">
                      @foreach ($jenis as $transaksi)
                          <option value="{{ $transaksi->NAMA_TJEN }}">{{ $transaksi->NAMA_TJEN }}</option>
                      @endforeach
                  </select>      
              </div>
               
              </div>
              
             
            </div>
            <div class="d-flex justify-content-end">
              <button wire:click="tambahRincian" type="button" class="btn btn-light no-border rincian" >
                  Detail
              </button>
            </div>
          </div>
            
          <div class="border p-3 mt-2 bg-secondary-light">
               
         
            <div class="d-flex gap-1 justify-content-start">
              <button class="btn btn-light no-border" disabled>Input</button>
              <button class="btn btn-light no-border" id="hapus" disabled>Hapus</button>
              <button type="submit" class="btn btn-light no-border">Simpan</button>
              <button class="btn btn-light no-border" disabled>Batal</button>
              <button class="btn btn-light no-border" id="header-hapus" disabled>Header</button>
             
            </div>

            <hr>

          
            <div class="" style="overflow-y:auto;" >
            <table class="" style="width:100%;">
                <thead class="">
                    <tr class="">
                        {{-- <td scope="col" style="white-space: nowrap; width: 10%">Hide</td> --}}
                        <td scope="col" style="white-space: nowrap; width: 10%">Kode Barang</td>
                        <td scope="col" style="white-space: nowrap; width: 10%">Nama Barang</td>
                        <td scope="col" style="white-space: nowrap; width: 5%">Harga</td>
                        <td scope="col" style="white-space: nowrap; width: 5%">QTY</td>
                        <td scope="col" style="white-space: nowrap; width: 5%">Diskon</td>
                        <td scope="col" style="white-space: nowrap; width: 5%">Bruto</td>
                        <td scope="col" style="white-space: nowrap; width: 5%">Jumlah</td>
                    </tr>
                </thead>
               <tbody class="table-body">
                @foreach ($rows as $index => $row)
                    <tr>
                      <td>
                        <input class="form-control" list="getBarangs{{ $index }}" placeholder="" wire:model="rows.{{ $index }}.kode_barang" style="white-space: nowrap; width: 95%">
                        <datalist id="getBarangs{{ $index }}">
                            @foreach ($barangs as $barang)
                                <option value="{{ $barang->KODE_BARANG }}">{{ $barang->NAMA_BARANG }}</option>
                            @endforeach
                        </datalist>
                      </td>
                      <td><input type="text" class="form-control" wire:model="rows.{{ $index }}.nama_barang" style="white-space: nowrap; width: 95%"></td>
                      <td>
                        <input type="text" class="form-control" value="{{ $row['harga_formatted'] }}" style="white-space: nowrap; width: 95%" readonly>
                        <input type="hidden" wire:model="rows.{{ $index }}.harga">
                      </td>
                      <td><input type="text" class="form-control" wire:model="rows.{{ $index }}.qty" name="QTY[]" style="white-space: nowrap; width: 95%"></td>
                      <td><input type="text" class="form-control" wire:model="rows.{{ $index }}.diskon" name="DISKON[]" style="white-space: nowrap; width: 95%"></td>
                      <td>
                        <input type="text" class="form-control" value="{{ $row['bruto_formatted'] }}" style="white-space: nowrap; width: 95%" readonly>
                        <input type="hidden" class="form-control" wire:model="rows.{{ $index }}.bruto" name="BRUTO[]" style="white-space: nowrap; width: 95%">
                      </td>
                      <td>
                        <input type="text" class="form-control" value="{{ $row['total_formatted'] }}" style="white-space: nowrap; width: 95%" readonly>
                        <input type="hidden" class="form-control" wire:model="rows.{{ $index }}.total" name="JUMLAH[]" style="white-space: nowrap; width: 95%"></td>
                    </tr>

                  @endforeach
              </tbody>
              </table>
           
            </div>
          </div>

         
         
          <div class="border bg-secondary-light p-3 my-2">
    
           <div class="table-responsive mt-3" style="overflow-y:auto;" >
            <table class="table overflow-auto table-thead table-borderless" style="width:100%">
                <thead class="table table-light ">
                    <tr>
                        <th scope="col" style="white-space: nowrap; width: 10%">NO FAKTUR</th>
                        <th scope="col" style="white-space: nowrap; width: 10%">KODE BARANG</th>
                        <th scope="col" style="white-space: nowrap; width: 10%">NAMA BARANG</th>
                        <th scope="col" style="white-space: nowrap; width: 5%">HARGA</th>
                        <th scope="col" style="white-space: nowrap; width: 5%">QTY</th>
                        <th scope="col" style="white-space: nowrap; width: 5%">DISKON</th>
                        <th scope="col" style="white-space: nowrap; width: 5%">BRUTO</th>
                        <th scope="col" style="white-space: nowrap; width: 5%">JUMLAH</th>
                    </tr>
                </thead>
               <tbody>
                @foreach ($djuals as $djual)
                {{-- <p>{{ $djual }}</p> --}}
                    <tr>
                        <td>{{ $djual->NO_FAKTUR }}</td>
                        <td>{{ $djual->KODE_BARANG }}</td>
                        <td>{{ $djual->barang->NAMA_BARANG }}</td>
                        <td>{{ $djual->HARGA }}</td>
                        <td>{{ $djual->QTY }}</td>
                        <td>{{ $djual->DISKON }}</td>
                        <td>{{ $djual->BRUTO }}</td>
                        <td>{{ $djual->JUMLAH }}</td>
                    </tr>
                 @endforeach
            </tbody>
            </table>
             </form>
            </div>
            </div>
            
            <div class="d-flex flex-column ms-auto gap-2 bg-secondary-light p-3" style="width: 40%">
              <div class="d-flex flex-row align-items-center gap-5 justify-content-between" style="white-space: nowrap">
                <label class="form-label ">TOTAL BRUTO</label>
                <input type="text" class="form-control border border-primary border-3" wire:model="TOTAL_BRUTO_FORMATTED" disabled style="width: 60%" id="total_bruto">
                <input type="hidden" wire:model="TOTAL_BRUTO">
              </div>
              
              <div class="d-flex flex-row align-items-center gap-5 justify-content-between" style="white-space: nowrap">
                <label class="form-label ">TOTAL DISKON</label>
                <input type="text" class="form-control border border-primary border-3" wire:model="TOTAL_DISKON_FORMATTED" disabled style="width: 60%" id="total_diskon">
                <input type="hidden" wire:model="TOTAL_DISKON">
              </div>

              <div class="d-flex flex-row align-items-center gap-5 justify-content-between" style="white-space: nowrap">
                <label class="form-label ">TOTAL JUMLAH</label>
                <input type="text" class="form-control border border-primary border-3" wire:model="TOTAL_JUMLAH_FORMATTED" disabled style="width: 60%" id="total_jumlah">
                <input type="hidden" wire:model="TOTAL_JUMLAH">
              </div>
            </div>
          </form>
          
      </div>
      </div>

    </section>
</div>
