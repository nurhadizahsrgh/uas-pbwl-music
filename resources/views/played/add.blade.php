@extends('layouts.app')   
  
@section('content')   
 
<div class="container">   

        <h3>Tambah Data Played</h3>   
        <form action="{{ url('/played') }}" method="POST">   
            @csrf   
            <div class="form-group">
                <label for="">ARTIST</label>
					<select name="artist_id" class="form-control">
						@foreach($lst as $row)
						<option value ="{{ $row->artist_id }}">{{ $row->artist_name }}</option>
						@endforeach
					</select>
            </div>
            <div class="form-group">
                <label for="">ALBUM</label>
                    <select name="album_id"  class="form-control">
						@foreach($ls as $row)
						<option value ="{{ $row->album_id }}">{{ $row->album_name }}</option>
						@endforeach
					</select>
            </div>
            <div class="form-group">
                <label for="">JUDUL</label>
                    <select name="track_id" class="form-control">
						@foreach($l as $row)
						<option value ="{{ $row->track_id }}">{{ $row->track_name }}</option>
						@endforeach
					</select> 
            </div>
            <div class="form-group">
                <input type="submit" value="SIMPAN" class="btn btn-primary btn-sm">
            </div> 
        </form>   
</div>   
@endsection 