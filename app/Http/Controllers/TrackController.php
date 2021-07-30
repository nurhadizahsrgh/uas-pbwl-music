<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Track;
use App\Models\Album;
use App\Models\Artist;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Track::all();
        return view('track.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lst = Artist::all();
        $ls = Album::all();
        return view('track.add', compact('lst', 'ls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'track_name' => 'required'
        ],
        [
            'track_name.required' => 'Nama wajib diisi'
        ]);

        $file = $request->file('file');
        $nama = $file->getClientOriginalName();
        $simpan = 'lagu';
        $file->move($simpan, $nama);

        Track::create([
            'track_name' => $request->track_name,
            'artist_id' => $request->artist_id,
            'album_id' => $request->album_id,
            'file' => $nama
        ]);
        return redirect('/track');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Track::findOrFail($id);
        $lst = Artist::all();
        $ls = Album::all();
        return view('track.edit', compact('row', 'lst', 'ls'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'track_name' => 'required'
        ],
        [
            'track_name.required' => 'Nama wajib diisi'
        ]);

        $file = $request->file('file');
        $nama = $request->$file->getClientOriginalName();
        $simpan = 'lagu';
        $file->move($simpan, $nama);

        $row = Track::findOrFail($id);
        $row->update([
            'track_name' => $request->track_name,
            'artist_id' => $request->artist_id,
            'album_id' => $request->album_id,
            'file' => $nama
        ]);

        return redirect('/track');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Track::findOrFail($id);
        $row->delete();

        return redirect('/track');
    }
}
