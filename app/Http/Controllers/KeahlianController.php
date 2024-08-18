<?php

namespace App\Http\Controllers;

use App\Models\Keahlian;
use Illuminate\Http\Request;

class KeahlianController extends Controller
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
        
        $result = [];
        // Loop melalui array keahlian dan simpan ke database
        foreach ($request->keahlian as $namaKeahlian) {
            $data = [
                'user_detail_id' => $request->user_detail_id,
                'keahlian' => $namaKeahlian,
            ];

            $save =  Keahlian::create($data);

            $result[] = $save;
        }

        session()->flash('success', 'Data keahlian telah ditambah.');
        return response()->json($result);
    
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $keahlian = Keahlian::where('id',$id)->first();
       
        $keahlian->delete();
        session()->flash('success', 'Data keahlian telah ditambah.');

        return response()->json([
            'status' => 'success',
            'message' => 'Keahlian berhasil dihapus'
        ]);

    }
}
