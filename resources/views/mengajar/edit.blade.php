@extends('main.layout')
@section('content')
    <center>
    <br>
    <h2>EDIT DATA MENGAJAR</h2>
        <form method="POST" action="/mengajar/update/{{ $mengajar->id }}">
            @csrf
            <table width="50">
                <tr>
                    <td class="bar">GURU</td>
                    <td class="bar">
                        <select name="guru_id">
                            <option></option>
                            @foreach ($guru as $g)
                                @if ($mengajar->guru_id == $g->id)
                                    <option value="{{ $g->id }}" selected>{{ $g->nama_guru }}</option>
                                @else
                                    <option value="{{ $g->id }}">{{ $g->nama_guru }}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>

                <tr>
                    <td class="bar">MATA PELAJARAN</td>
                    <td class="bar">
                        <select name="mapel_id">
                            <option></option>
                            @foreach ($mapel as $m)
                                @if ($mengajar->mapel_id == $m->id)
                                    <option value="{{ $m->id }}" selected>{{ $m->nama_mapel }}</option>
                                @else
                                    <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>

                <tr>
                    <td class="bar">KELAS</td>
                    <td class="bar">
                        <select name="kelas_id">
                            <option></option>
                            @foreach ($kelas as $k)
                                @if ($mengajar->kelas_id == $k->id)
                                    <option value="{{ $k->id }}" selected>{{ $k->nama_kelas }}</option>
                                @else
                                    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                </tr>
                
                    <td colspan="2">
                        <center><button class="button-primary" type="submit">UBAH</button></center>
                    </td>
                </tr>
            </table>
        </form>
    </center>   
@endsection