<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserDetailController extends Controller
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
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, $user)
    {
        $user = UserDetail::where('user_id', auth()->user()->id)->first();

        // Jika ada file yang diunggah
        if ($request->hasFile('foto')) {
            // Simpan file ke direktori 'uploads/foto'
            $fotoPath = $request->file('foto')->store('/foto', 'public');

            // Hapus file lama jika ada
            if ($user->foto && Storage::disk('public')->exists($user->foto)) {
                Storage::disk('public')->delete($user->foto);
            }

            // Simpan path foto yang baru ke database
            $user->foto = $fotoPath;
        }

        // Update data user
        $user->update([
            'name'   => $request->name,
            'posisi' => $request->posisi,
            'email'  => $request->email,
            'no_hp'  => $request->no_hp,
        ]);

        return redirect()->route('home')->with('success','Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
