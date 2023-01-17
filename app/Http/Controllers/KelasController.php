<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Mengajar;
use App\Models\Siswa;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('kelas.index', [
            'kelas' => Kelas::all()
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
        return view('kelas.create', [
            'jurusan' => Jurusan::all()
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
        $data_kelas = $request->validate([
            'nama_kelas' => 'required',
            'jurusan_id' => 'required'
        ]);
        Kelas::create($data_kelas);
        return redirect('/kelas/index')->with('success', 'Data Kelas Berhasil Ditambah');
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
    public function edit(Kelas $kelas)
    {
        //
        return view('kelas.edit', [
            'kelas' => $kelas,
            'jurusan' => Jurusan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        //
        $data_kelas = $request->validate([
            'nama_kelas' => 'required',
            'jurusan_id' => 'required'
        ]);
        $kelas->update($data_kelas);
        return redirect('/kelas/index')->with('success', 'Data Kelas Berhasil Ditambah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        //
       $siswa = Siswa::where('kelas_id', $kelas->id)->first();
       $mengajar = Mengajar::where('kelas_id', $kelas->id)->first();

       if($mengajar) {
        return back()->with('error', "$kelas->nama_kelas masih digunakan dimenu siswa");
       }

       if ($siswa) {
        return back()->with('error', "$kelas->nama_kelas masih digunakan dimenu mengajar");
       }

       $kelas->delete();
       return back()->with('success', "Data Kelas Berhasil Dihapus");
    }
}
