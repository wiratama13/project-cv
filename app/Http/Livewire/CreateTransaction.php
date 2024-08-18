<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\JEN;
use App\Models\JUAL;
use App\Models\DJUAL;
use App\Models\BARANG;
use Livewire\Component;
use App\Models\Customer;
use Illuminate\Database\QueryException;

class CreateTransaction extends Component
{
    
    public $NO_FAKTUR, $Kode_Customer, $KODE_TJEN, $TGL_FAKTUR, 
    $TOTAL_BRUTO = 0,
    $TOTAL_DISKON = 0, 
    $TOTAL_JUMLAH = 0,
    $TOTAL_BRUTO_FORMATTED = 0,
    $TOTAL_DISKON_FORMATTED = 0, 
    $TOTAL_JUMLAH_FORMATTED = 0,
    $TOTAL_ITEM = 0, $TOTAL_ITEM_BERBEDA = 0, $kode_barang, $nama_barang, $harga, $qty, $bruto, $diskon, $total,
    $customers,
    $jenis_transaksi,
    $Nama_Customer, $NAMA_TJEN;
    


    public function render()
    {
        $customers = Customer::all();
        $jenis = JEN::all();
        $barangs = BARANG::all();
        $djuals = DJUAL::all();
        return view('livewire.create-transaction', [
            'customers' => $customers,
            'jenis'     => $jenis,
            'barangs'     => $barangs,
            'djuals'        => $djuals
        ]);
    }


    public function mount()
    {
        // Inisialisasi daftar pelanggan
        $this->customers = Customer::all();
        $this->jenis_transaksi = JEN::all();
        // Setel nilai default untuk Nama_Customer jika ada
        $this->Nama_Customer = $this->customers->first()->Nama_Customer ?? null;
        $this->NAMA_TJEN = $this->jenis_transaksi->first()->NAMA_TJEN ?? null;

    }

    public $rows = [
        ['kode_barang' => '', 
        'nama_barang' => '', 
        'harga' => '',
        'harga_formatted' => 'Rp 0,00',
        'bruto_formatted' => 'Rp 0,00',
        'total_formatted' => 'Rp 0,00',
        'qty' => '', 
        'diskon' => '', 
        'bruto' => '', 
        'total' => '']
    ];

    public function store()
    {
      
       
        $kodeCustomer = Customer::where('Nama_Customer', $this->Nama_Customer)->pluck('Kode_Customer')->first() ?? null;
        
        $tr = JEN::where('NAMA_TJEN', $this->NAMA_TJEN)->pluck('KODE_TJEN')->first() ?? null;
        

        try {
            foreach ($this->rows as $row) {
                DJUAL::create([
                    'NO_FAKTUR' => $this->NO_FAKTUR,
                    'KODE_BARANG' => $row['kode_barang'],
                    'HARGA' => $row['harga'],
                    'QTY' => $row['qty'],
                    'DISKON' => $row['diskon'],
                    'BRUTO' => $row['bruto'],
                    'JUMLAH' => $row['total'],
                ]);
            }
                $jual = JUAL::create([
                    'NO_FAKTUR'         => $this->NO_FAKTUR,
                    'Kode_Customer'     => $kodeCustomer,
                    'KODE_TJEN'         => $tr,
                    'TGL_FAKTUR'        => $this->TGL_FAKTUR,
                    'TOTAL_BRUTO'       => $this->TOTAL_BRUTO,
                    'TOTAL_DISKON'      => $this->TOTAL_DISKON,
                    'TOTAL_JUMLAH'      => $this->TOTAL_JUMLAH,
                ]);
            
            return redirect()->route('home')->with('success', 'Data Berhasil Disimpan');
        } catch (QueryException $e) {
            if ($e->getCode() == 23000 && str_contains($e->getMessage(), '1452')) {
                return redirect()->route('home')->with('error', $e->getMessage());
            } else {
                return redirect()->route('home')->with('error', $e->getMessage());
            }

            
        } catch (\Throwable $e) {
            return redirect()->route('home')->with('error', $e->getMessage());
        }
        
    }

    

    public function tambahRincian()
    {
        // Tambahkan satu baris kosong
        $this->rows[] = [
            'barang' => '',
            'nama_barang' => '',
            'harga' => '',
            'harga_formatted' => 'Rp 0,00',
            'bruto_formatted' => 'Rp 0,00',
            'total_formatted' => 'Rp 0,00',
            'qty' => '',
            'diskon' => '',
            'bruto' => '',
            'total' => '',
        ];
    }

    private function formatRupiah($value)
    {
        return 'Rp ' . number_format($value, 2, ',', '.');
    }

    public function hitungTotal()
    {
        $brutoValues = array_filter(array_column($this->rows, 'bruto'), fn($value) => is_numeric($value) && $value >= 0);
        $diskonValues = array_filter(array_column($this->rows, 'diskon'), fn($value) => is_numeric($value) && $value >= 0);
        $totalValues = array_filter(array_column($this->rows, 'total'), fn($value) => is_numeric($value) && $value >= 0);

        // Hitung total untuk setiap kategori jika ada nilai yang valid
        $this->TOTAL_BRUTO = !empty($brutoValues) ? array_sum($brutoValues) : 0;
        $this->TOTAL_JUMLAH = !empty($totalValues) ? array_sum($totalValues) : 0;
        $this->TOTAL_DISKON = $this->TOTAL_BRUTO - $this->TOTAL_JUMLAH;

        $this->TOTAL_BRUTO_FORMATTED = $this->formatRupiah($this->TOTAL_BRUTO);
        $this->TOTAL_JUMLAH_FORMATTED = $this->formatRupiah($this->TOTAL_JUMLAH);
        $this->TOTAL_DISKON_FORMATTED = $this->formatRupiah($this->TOTAL_DISKON);
        // Hitung jumlah item jika ada
       
    
    }


    public function hitungTotalItemBerbeda()
    {
        $items = [];

        foreach ($this->rows as $row) {
            // Pastikan nama_barang dan qty sudah terisi dan valid
            if (!empty($row['nama_barang']) && isset($row['qty']) && $row['qty'] > 0) {
                if (!isset($items[$row['nama_barang']])) {
                    $items[$row['nama_barang']] = 0;
                }
                $items[$row['nama_barang']] += $row['qty'];
            }
        }

        $this->TOTAL_ITEM_BERBEDA = array_sum($items);
    }

   


    public function updated($field)
    {

        $kodeBarangArray = array_column($this->rows, 'kode_barang');
        $kodeBarangCounts = array_count_values($kodeBarangArray);
        $duplicateKodeBarangs = array_keys(array_filter($kodeBarangCounts, function ($count) {
            return $count > 1;
        }));

        if (!empty($duplicateKodeBarangs)) {
            // Mendapatkan index dari field yang di-update
            $index = explode('.', $field)[1];

            if (in_array($this->rows[$index]['kode_barang'], $duplicateKodeBarangs)) {
                // Menghapus teks yang menyebabkan duplikasi
                $this->rows[$index]['kode_barang'] = '';
                $this->rows[$index]['nama_barang'] = '';
                $this->rows[$index]['harga'] = '';
                $this->rows[$index]['qty'] = '';
                $this->rows[$index]['diskon'] = '';
                $this->rows[$index]['bruto'] = '';
                $this->rows[$index]['total'] = '';

                // Emit error message
                $this->emit('error', 'Item dengan kode_barang yang sama sudah ditambahkan!');
            }

            return;
        }

        // Ambil index dari field yang diperbarui
        if (str_starts_with($field, 'rows.')) {
            $index = explode('.', $field)[1];

            if (str_ends_with($field, 'kode_barang')) {
                $kodeBarang = $this->rows[$index]['kode_barang'];
                $barang = BARANG::where('KODE_BARANG', $kodeBarang)->first();

                if ($barang) {
                    $this->rows[$index]['nama_barang'] = $barang['NAMA_BARANG'];
                    // $this->rows[$index]['harga'] = $barang['HARGA_BARANG'];
                    // $this->rows[$index]['harga'] = $this->formatRupiah($barang['HARGA_BARANG']);
                    $this->rows[$index]['harga'] = $barang['HARGA_BARANG'];

                    // Simpan harga dengan format Rupiah untuk tampilan
                    $this->rows[$index]['harga_formatted'] = $this->formatRupiah($barang['HARGA_BARANG']);
                } else {
                    $this->rows[$index]['nama_barang'] = null; // Reset jika kode_barang tidak ditemukan
                }
            }

            // Periksa apakah harga dan qty sudah terisi
            $harga = $this->rows[$index]['harga'];
            $qty = $this->rows[$index]['qty'];
            $diskon = $this->rows[$index]['diskon'];
            

            if (!is_null($harga) && $harga > 0 && !is_null($qty) && $qty > 0 && !is_null($diskon) && $diskon >= 0) {
                $bruto = $harga * $qty;
                $this->rows[$index]['bruto'] = $bruto;
                $this->rows[$index]['bruto_formatted'] = $this->formatRupiah(number_format($bruto, 2, '.', ''));


                $total = $bruto - ($bruto * ($diskon / 100));
                $this->rows[$index]['total'] = $total;
                $this->rows[$index]['total_formatted'] = $this->formatRupiah(number_format($total, 2, '.', ''));

            }

            $this->hitungTotal();
            // $this->hitungTotalItemBerbeda();
        }
    }

    public function hapusRincian($index)
    {
        // Hapus baris pada index tertentu
        unset($this->rows[$index]);

        // Re-index array untuk mencegah masalah dengan binding data
        $this->rows = array_values($this->rows);
        $this->hitungTotal();
        $this->hitungTotalItemBerbeda();
    }

   
}
