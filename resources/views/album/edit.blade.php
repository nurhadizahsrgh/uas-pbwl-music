@extends('layouts.app')   
  
@section('content')   
 
<div class="container">   

        <h3>Edit Data Album</h3>   
        <form action="{{ url('/album/' . $row->album_id) }}" method="POST">
        <input name="_method" type="hidden" value="PATCH">    
            @csrf   
            <div class="form-group">
                <label for="">NAME</label>
                <input type="text" name="album_name" class="form-control" value="{{ $row->album_name }}">
            </div>
            <div class="form-group">
                <label for="">ARTIST</label>
                    <select name="artist_id" class="form-control">
						@foreach($lst as $row)
						<option value ="{{ $row->artist_id }}">{{ $row->artist_name }}</option>
						@endforeach
				    </select>
            </div>
            <div class="form-group">
            <input type="submit" value="SIMPAN" class="btn btn-primary btn-sm">
            </div> 
        </form>   
</div>   
@endsection 