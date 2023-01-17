@extends('main.layout')
@section('content')
    <center>
    <br>
    <h2>EDIT DATA KELAS</h2>
        <form method="POST" action="/kelas/update/{{ $kelas->id }}">
            @csrf
            <table width="50">
                <tr>
                    <td class="bar">NAMA KELAS</td>
                    <td class="bar">
                        <input type="text" name="nama_kelas" value="{{ $kelas->nama_kelas }}">
                    </td>
                </tr>
                <tr>
                    <td class="bar">NAMA JURUSAN</td>
                    <td class="bar">
                        <select name="jurusan_id" id="">
                                <option value=""></option>
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j->id }}"@if ($j->id == $kelas->jurusan_id) selected
                                        
                                    @endif>{{ $j->nama_jurusan }}</option>
                                @endforeach
                        </select>
                    </td>
                </tr>
                
                    <td colspan="2">
                        <center><button class="button-primary" type="submit">SIMPAN</button></center>
                    </td>
                </tr>
            </table>
        </form>
    </center>   
@endsection