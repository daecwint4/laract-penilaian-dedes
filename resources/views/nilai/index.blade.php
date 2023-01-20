@extends('main.layout')
@section('content')
    <center>
        <b>
            <h2>LIST DATA NILAI</h2>
            @if (session('user')->role == 'guru')
                <a href="/nilai/create" class="button-primary">Tambah Data</a>
                @endif
            @if (session('success'))
                <p class="text-success">{{ session('success') }}</p>
            @endif
            @if (session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif

            <table cellpadding="10">
                <tr>
                    <td>NO</td>
                    <td>GURU MAPEL</td>
                    <td>NAMA SISWA</td>
                    <td>UH</td>
                    <td>UTS</td>
                    <td>UAS</td>
                    <td>NA</td>
                    @if (session('user')->role == 'guru')
                        <td>ACTION</td>
                    @endif
                        
                </tr>
                @foreach ($nilai as $n)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $n->mengajar->guru->nama_guru }} &nbsp;&nbsp; {{ $n->mengajar->mapel->nama_mapel }}</td>
                        <td>{{ $n->siswa->nama_siswa }}</td>
                        <td>{{ $n->uh }}</td>
                        <td>{{ $n->uts }}</td>
                        <td>{{ $n->uas }}</td>
                        <td>{{ $n->na }}</td>
                        @if (session('user')->role == 'guru')
                            <td>
                                <a href="/nilai/edit/{{ $n->id }}" class="button-warning">EDIT</a>
                                <a href="/nilai/destroy/{{ $n->id }}" onclick="return confirm('Yakin Hapus')" class="button-danger">HAPUS</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </table>
        </b>
    </center>
@endsection