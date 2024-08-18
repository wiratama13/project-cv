<?php

namespace App\Http\Controllers;


use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pendidikan = [
            'user_detail_id'    => $request->user_detail_id,
            'tingkat'           => $request->tingkat,
            'institusi'         => $request->institusi,
            'tanggal_mulai'     => $request->tanggal_mulai,
            'tanggal_selesai'   => $request->tanggal_selesai,
            'deskripsi'         => $request->deskripsi,
        ];

        Pendidikan::create($pendidikan);
        return redirect()->route('home')->with('success','berhasil menambah pendidikan baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        return response()->json($pendidikan);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Validasi data
            $validatedData = $request->validate([
                'tingkat' => 'required|string|max:255',
                'user_detail_id' => 'required|integer',
                'institusi' => 'required|string|max:255',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date',
                'deskripsi' => 'nullable|string',
            ]);

            // Temukan dan perbarui data
            // $pendidikan = Pendidikan::where('id',$id)->first();
            $pendidikan = Pendidikan::updateOrCreate(
                ['id' => $id], // Kondisi untuk menentukan apakah akan memperbarui atau membuat data baru
                $validatedData // Data yang akan diperbarui atau dibuat
            );

            // Kembalikan response JSON
            session()->flash('success', 'Data pendidikan telah diperbarui.');
            return response()->json($pendidikan);
        } catch (\Exception $e) {
            // Tangani kesalahan
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $pendidikan = Pendidikan::findOrFail($id);
            $pendidikan->delete();
            session()->flash('success', 'Data pendidikan telah dihapus.');
            return response()->json(['message' => 'Data pendidikan telah dihapus.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data.'], 500);
        }
    }
}
