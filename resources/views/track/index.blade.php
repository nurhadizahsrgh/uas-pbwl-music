@extends('layouts.app')

@section('content')

<div class="container">

    <h3> Daftar Track <a href="{{ url('/track/create') }}" class="btn btn-primary btn-sm float-right">Tambah Data</a></h3>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>JUDUL</th>
            <th>ARTIS</th>
            <th>ALBUM</th>
            <th>FILE</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
        @foreach($rows as $row)
        <tr>
            <th>{{ $row->track_id }}</td>
            <td>{{ $row->track_name }}</td>
            <td>{{ $row->artist->artist_name }}</td>
			<td>{{ $row->album->album_name }}</td>
			<td>
				<audio controls>
					<source src="lagu/{{ $row->file }}" type="audio/mp3">
				</audio>
			</td>
            <td><a href="{{ url('track/' . $row->track_id . '/edit') }}" class="btn btn-success btn-sm">Edit</a></td>
            <td>
                <form action="{{ url('/track/' . $row->track_id) }}" method="POST">
                    <input name="_method" type="hidden" value="DELETE">
                    @csrf
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
        </tr>
        @endforeach
    </table>
</div>

@endsection