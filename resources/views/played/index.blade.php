@extends('layouts.app')

@section('content')

<div class="container">

    <h3> Daftar Played <a href="{{ url('/played/create') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a></h3>

    <table class="table table-bordered">
        <tr>
            <th>ARTIS</th>
            <th>ALBUM</th>
            <th>JUDUL</th>
            <th>PLAYED</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
        @foreach($rows as $row)
        <tr>
            <td>{{ $row->artist->artist_name }}</td>
			<td>{{ $row->album->album_name }}</td>
			<td>{{ $row->track->track_name }}</td>
			<td>{{ $row->played }}</td>
            <td><a href="{{ url('played/' . $row->played . '/edit') }}" class="btn btn-success btn-sm">Edit</a></td>
            <td>
                <form action="{{ url('/played/' . $row->played) }}" method="POST">
                    <input name="_method" type="hidden" value="DELETE">
                    @csrf
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

@endsection