<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\JEN;
use App\Models\About;
use App\Models\Karir;
use App\Models\BARANG;
use App\Models\Customer;
use App\Models\CVHR;
use App\Models\Keahlian;
use App\Models\Pendidikan;
use App\Models\UserDetail;
use App\Models\SetKeahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\FuncCall;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
        $user = UserDetail::where('user_id', auth()->user()->id)->first();
        
        $about = About::where('user_detail_id', $user->id)->first();
        $karirs = Karir::where('user_detail_id', $user->id)->get();
        $pendidikans = Pendidikan::where('user_detail_id', $user->id)->get();
        $keahlians = SetKeahlian::all();
        $keahlianUser = Keahlian::where('user_detail_id', $user->id)->get();
        if ($karirs) {
            foreach ($karirs as $karir) {
                // Format tanggal_mulai dan tanggal_selesai
                $tanggalMulai = Carbon::parse($karir->tanggal_mulai)->translatedFormat('F Y');
                $tanggalSelesai = Carbon::parse($karir->tanggal_selesai)->translatedFormat('F Y');

                // Hitung selisih bulan
                $selisihBulan = Carbon::parse($karir->tanggal_mulai)->diffInMonths(Carbon::parse($karir->tanggal_selesai));

                // Simpan hasilnya
                $karir->formatted_tanggal_mulai = $tanggalMulai;
                $karir->formatted_tanggal_selesai = $tanggalSelesai;
                $karir->selisih_bulan = $selisihBulan;
            }
        }

        if ($pendidikans) {
            foreach ($pendidikans as $pendidikan) {
                // Format tanggal_mulai dan tanggal_selesai
                $tanggalMulaiPendidikan = Carbon::parse($pendidikan->tanggal_mulai)->translatedFormat('F Y');
                $tanggalSelesaiPendidikan = Carbon::parse($pendidikan->tanggal_selesai)->translatedFormat('F Y');

                // Hitung selisih bulan
                $selisihBulanPendidikan = Carbon::parse($pendidikan->tanggal_mulai)->diffInMonths(Carbon::parse($pendidikan->tanggal_selesai));

                // Simpan hasilnya
                $pendidikan->formatted_tanggal_mulai = $tanggalMulaiPendidikan;
                $pendidikan->formatted_tanggal_selesai = $tanggalSelesaiPendidikan;
                $pendidikan->selisih_bulan = $selisihBulanPendidikan;
            }
        }

        $data = compact('user', 'about', 'keahlians', 'keahlianUser');

        // Tambahkan $karirs jika ada
        if ($karirs) {
            $data['karirs'] = $karirs;
        }

        // Tambahkan $pendidikans jika ada
        if ($pendidikans) {
            $data['pendidikans'] = $pendidikans;
        }
        return view('pages.home', $data);
    }

    public function printcv()
    {
        $user = UserDetail::where('user_id', auth()->user()->id)->first();

        $about = About::where('user_detail_id', $user->id)->first();
        $karirs = Karir::where('user_detail_id', $user->id)->get();
        $pendidikans = Pendidikan::where('user_detail_id', $user->id)->get();
        $keahlians = SetKeahlian::all();
        $keahlianUser = Keahlian::all();
        
        foreach ($karirs as $karir) {
            // Format tanggal_mulai dan tanggal_selesai
            $tanggalMulai = Carbon::parse($karir->tanggal_mulai)->translatedFormat('F Y');
            $tanggalSelesai = Carbon::parse($karir->tanggal_selesai)->translatedFormat('F Y');

            // Hitung selisih bulan
            $selisihBulan = Carbon::parse($karir->tanggal_mulai)->diffInMonths(Carbon::parse($karir->tanggal_selesai));

            // Output atau simpan hasilnya
            // Untuk dikirim ke view atau digunakan di sini
            $karir->formatted_tanggal_mulai = $tanggalMulai;
            $karir->formatted_tanggal_selesai = $tanggalSelesai;
            $karir->selisih_bulan = $selisihBulan;
        }

        foreach ($pendidikans as $pendidikan) {
            // Format tanggal_mulai dan tanggal_selesai
            $tanggalMulaiPendidikan = Carbon::parse($pendidikan->tanggal_mulai)->translatedFormat('F Y');
            $tanggalSelesaiPendidikan = Carbon::parse($pendidikan->tanggal_selesai)->translatedFormat('F Y');

            // Hitung selisih bulan
            $selisihBulanPendidikan = Carbon::parse($pendidikan->tanggal_mulai)->diffInMonths(Carbon::parse($pendidikan->tanggal_selesai));

            // Output atau simpan hasilnya
            // Untuk dikirim ke view atau digunakan di sini
            $pendidikan->formatted_tanggal_mulai = $tanggalMulaiPendidikan;
            $pendidikan->formatted_tanggal_selesai = $tanggalSelesaiPendidikan;
            $pendidikan->selisih_bulan = $selisihBulanPendidikan;
        }
       
        return view('pages.print', compact(
            'user',
            'about',
            'karirs',
            'pendidikans',
            'keahlians',
            'keahlianUser',
            'tanggalMulai',
            'tanggalSelesai',
            'selisihBulan',
            'tanggalMulaiPendidikan',
            'tanggalSelesaiPendidikan',
            'selisihBulanPendidikan',
        ));
    }

    public function viewSendHR()
    {
        $user = UserDetail::where('user_id', auth()->user()->id)->first();
        return view('pages.send', compact('user'));
    }

    public function  SendHR(Request $request)
    {
       
        $request->validate([
            'user_detail_id' => 'required', // Validasi ID pengguna
            'cv' => 'nullable|file|mimes:pdf|max:2048', // Validasi hanya file PDF dengan ukuran maksimal 2MB
        ]);

        $cvhr = new CVHR();
        $cvhr->user_detail_id = $request->input('user_detail_id');

        if ($request->hasFile('cv')) {
           
            $cvPath = $request->file('cv')->store('cv', 'public');
            $cvhr->cv = $cvPath;
        }

        $cvhr->save();
        return redirect()->route('send.hr')->with('success','berhasil kirim cv ke hr');
    }

    public function pageHR()
    {
        $cvs = CVHR::all();
        return view('pages.hr', compact('cvs'));
    }

    public function download($id)
    {
        $cv = CVHR::findOrFail($id);

        // Asumsi CV disimpan dalam storage, gunakan Storage::download
        return Storage::download('public/' . $cv->cv);
    }

}
