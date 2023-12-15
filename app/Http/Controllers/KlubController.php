<?php

namespace App\Http\Controllers;

use App\Models\Klub;
use Illuminate\Http\Request;

class KlubController extends Controller
{
    public function index() 
    {
        return view('klub',['title' => 'Form Klub']);
    }
    public function add(Request $request) 
    {
        // dd($request->all());
        $valid = $request->validate([
            'nama_klub' => 'required|unique:klub',
            'kota' => 'required',
        ],[
            'nama_klub.required' => 'Nama Klub Tidak Boleh Kosong',
            'nama_klub.unique' => 'Nama Klub Sudah Pernah Ditambahkan',
            'kota.required' => 'Kota Tidak Boleh Kosong',
        ]);

        Klub::create($valid);
        return redirect(route('form-klub'))->with('success','Data Klub Berhasil Ditambahkan!!');
    }
    public function klasemen() 
    {
        return view('klasemen',['title' => 'Klasemen','kl'=>Klub::orderBy('point','desc')->get()]);
    }
}
