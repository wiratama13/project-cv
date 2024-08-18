<?php

namespace App\Http\Controllers;

use App\Models\Karir;
use Illuminate\Http\Request;

class KarirController extends Controller
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
        $karir = [
            'user_detail_id'    => $request->user_detail_id,
            'posisi'            => $request->posisi,
            'perusahaan'        => $request->perusahaan,
            'tanggal_mulai'     => $request->tanggal_mulai,
            'tanggal_selesai'   => $request->tanggal_selesai,
            'deskripsi'         => $request->deskripsi,
        ];

        Karir::create($karir);
        return redirect()->route('home')->with('success','berhasil menambah karir baru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $karir = Karir::findOrFail($id);
        return response()->json($karir);
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
                'posisi' => 'required|string|max:255',
                'user_detail_id' => 'required|integer',
                'perusahaan' => 'required|string|max:255',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date',
                'deskripsi' => 'nullable|string',
            ]);

            // Temukan dan perbarui data
            // $karir = Karir::where('id',$id)->first();
            $karir = Karir::updateOrCreate(
                ['id' => $id], // Kondisi untuk menentukan apakah akan memperbarui atau membuat data baru
                $validatedData // Data yang akan diperbarui atau dibuat
            );

            // Kembalikan response JSON
            session()->flash('success', 'Data karir telah diperbarui.');
            return response()->json($karir);
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
            $karir = Karir::findOrFail($id);
            $karir->delete();
            session()->flash('success', 'Data karir telah dihapus.');
            return response()->json(['message' => 'Data karir telah dihapus.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data.'], 500);
        }
    }
}
