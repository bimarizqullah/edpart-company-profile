<?php

namespace App\Http\Controllers;

use App\Models\Ukuran;
use Illuminate\Http\Request;

class UkuranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('masterdata.ukuran.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masterdata.ukuran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ukuran $ukuran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ukuran $ukuran)
    {
        return view('masterdata.ukuran.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ukuran $ukuran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ukuran $ukuran)
    {
        $ukuran->delete();
        return redirect()->route('ukuran.index')->with('success', 'Ukuran berhasil dihapus!');
    }
}
