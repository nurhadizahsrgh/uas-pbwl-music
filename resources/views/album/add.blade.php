@extends('layouts.app')   
  
@section('content')   
 
<div class="container">   

        <h3>Tambah Data Album</h3>   
        <form action="{{ url('/album') }}" method="POST">   
            @csrf   
            <div class="form-group">
                <label for="">NAME</label>
                <input type="text" name="album_name" class="form-control">
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