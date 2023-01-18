@extends('main.layout')
@section('content')
  <center>
    <b>
    <h2>LIST DATA GURU</h2>
        <a href="/guru/create" class="button-primary">TAMBAH DATA</a>
        @if (session('success'))
        <p class="text-success">{{ session('success') }}</p>
        @endif
        @if (session('error'))
        <p class="text-danger">{{ session('error') }}</p>
        @endif
        <table cellpadding="10">
                <tr>
                    <td>NO</td>
                    <td>NIP</td>
                    <td>NAMA GURU</td>
                    <td>JENIS KELAMIN</td>
                    <td>ALAMAT</td>
                    <td>PASSWORD</td>
                    <td>ACTION</td>
                </tr>
                @foreach ($guru as $g)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $g->nip }}</td>
                        <td>{{ $g->nama_guru }}</td>
                        <td>{{ $g->jk == 'L' ? 'LAKI-LAKI' : 'PEREMPUAN' }}</td>
                        <td>{{ $g->alamat }}</td>
                        <td>{{ $g->password }}</td>
                        <td>
                            <a href="/guru/edit/{{ $g->id }}" class="button-warning">EDIT</a>
                            <a href="/guru/destroy/{{ $g->id }}" class="button-danger" onclick="return confirm ('Yakin hapus?')">HAPUS</a>
                        </td>
                    </tr>
                @endforeach
        </table>    
    </b>    
</center>  
@endsection