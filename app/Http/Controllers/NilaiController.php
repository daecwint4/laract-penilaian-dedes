<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mengajar;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Mapel;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('nilai.index', [
            'nilai' => Nilai::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('nilai.create', [
            'siswa' => Siswa::all(),
            'nilai' => Nilai::all(),
            'mengajar' => Mengajar::all(),
            'mapel' => Mapel::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data_nilai = $request->validate([
            'mengajar_id' => 'required',
            'siswa_id' => 'required',
            'uh' => 'required|numeric',
            'uts' => 'required|numeric',
            'uas' => 'required|numeric',
        ]);

        $data_nilai['na'] = round(($request->uh + $request->uts + $request->uas) / 3);
        Nilai::create($data_nilai);
        return redirect('/nilai/index')->with('success', "Data Nilai Berhasil Ditambah");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        //
        return view('nilai.edit', [
            'nilai' => $nilai,
            'mengajar' => Mengajar::all(),
            'siswa' => Siswa::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        //
        $data_nilai = $request->validate([
            'mengajar_id' => 'required',
            'siswa_id' => 'required',
            'uh' => 'required|numeric',
            'uts' => 'required|numeric',
            'uas' => 'required|numeric',
        ]);

        $data_nilai['na'] = round(($request->uh + $request->uts + $request->uas) / 3);
        $nilai->update($data_nilai);
        return redirect('/nilai/index')->with('success', "Data Nilai Berhasil di Ubah");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        // 
        $nilai->delete();
        return back()->with('success', "Data Nilai Berhasil Di hapus");
    }
}
