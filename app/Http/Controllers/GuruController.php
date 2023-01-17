<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Mengajar;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guru.index', [
            'guru' => Guru::all()
        
    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_guru = $request->validate([
            'nip' => 'required|numeric',
            'nama_guru' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'password' => 'required'
        ]);
        Guru::create($data_guru);
        return redirect('/guru/index')->with('success', 'Data Guru Berhasil Ditambah');
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
    public function edit(Guru $guru)
    {
        return view('guru.edit', [
            'guru' => $guru
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        $data_guru = $request->validate([
            'nip' => 'required|numeric',
            'nama_guru' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'password' => 'required'
        ]);
        $guru->update($data_guru);
        return redirect('/guru/index')->with('success', 'Data guru berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        $mengajar = Mengajar::where('guru_id', $guru->id)->first();
        if($mengajar) {
            return back()->with('error',"$guru->nama_guru masih digunakan dimenu mengajar");
        }

        $guru->delete();
        return redirect('/guru/index')->with('success', 'Data Berhasil Dihapus');
    }
}
