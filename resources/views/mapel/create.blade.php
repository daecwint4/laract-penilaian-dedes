@extends('main.layout')
@section('content')
    <center>
    <br>
    <h2>TAMBAH DATA MATA PELAJARAN</h2>
        <form method="POST" action="/mapel/store">
            @csrf
            <table width="50">
                <tr>
                    <td class="bar">MAPEL</td>
                    <td class="bar">
                        <input type="text" name="nama_mapel">
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