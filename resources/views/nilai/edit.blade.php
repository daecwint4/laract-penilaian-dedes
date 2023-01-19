@extends('main.layout')
@section('content')
    <center>
        <br>
        <h2>TAMBAH DATA NILAI</h2>
        <form method="POST" action="/nilai/update/{{ $nilai->id }}">
        @csrf
        <table width="50">
            <tr>
                <td class="bar">GURU MAPEL</td>
                <td class="bar">
                    <select name="mengajar_id" id="mengajar_id">
                        <option></option>
                        @foreach ($mengajar as $m)
                            <option value="{{ $m->id }}" {{ $nilai->mengajar_id == $m->id ? 'selected' : '' }}>{{ $m->mapel->nama_mapel }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td class="bar">NAMA SISWA</td>
                <td class="bar">
                    <select name="siswa_id">
                        
                        @foreach ($siswa as $s)
                            <option value="{{ $s->id }}" {{ $nilai->siswa_id == $s->id ? 'selected' : '' }}>{{ $s->nama_siswa }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td class="bar">UH</td>
                <td class="bar">
                    <input type="number" name="uh" id="uh" value="{{ $nilai->uh }}">
                </td>
            </tr>
            <tr>
                <td class="bar">UTS</td>
                <td class="bar">
                    <input type="number" name="uts" id="uts" value="{{ $nilai->uts }}">
                </td>
            </tr>
            <tr>
                <td class="bar">UAS</td>
                <td class="bar">
                    <input type="number" name="uas" id="uas" value="{{ $nilai->uas }}">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <center><button class="button-primary" type="submit">UBAH</button>></center>
                </td>
            </tr>
        </table>
        </form>
    </center>
@endsection