<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::latest()->paginate(5);
       return view('siswa.index', compact ('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }


    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [

            'nama'   => 'required',
            'kelas'   => 'required',
        ]);


        //create siswa
        Siswa::create([
            'nama'   => $request->input('nama'),
            'kelas'   => $request->input('kelas'),
        ]);

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact ('siswa'));

    }


    public function update(Request $request, Siswa $siswa)
    {
        //validate form
        $this->validate($request, [

            'nama'     => 'required',
            'kelas'   => 'required'

        ]);
        $siswa->update([
            'nama' => $request->input('nama'),
            'kelas' => $request->input('kelas'),
        ]);

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Berhasil melakukan update data']);
    }


    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
