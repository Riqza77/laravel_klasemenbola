<?php

namespace App\Http\Controllers;

use App\Models\Klub;
use App\Models\Pertandingan;
use App\Models\Skor;
use Illuminate\Http\Request;

class SkorController extends Controller
{
    public function index() 
    {
        return view('skor',['title' => 'Form Skor','klub' => Klub::all()]);
    }

    public function add(Request $request) 
    {
        $valid = $request->validate([
            'klub_id1' => 'required|unique:skor,klub_id1|different:klub_id2',
            'klub_id2' => 'required|unique:skor,klub_id2|different:klub_id1',
            'score1' => 'required',
            'score2' => 'required',
        ],[
            'klub_id1.required' => 'Klub 1 Tidak Boleh Kosong',
            'klub_id2.required' => 'Klub 2 Tidak Boleh Kosong',
            'klub_id1.different' => 'Klub 1 Tidak Boleh Sama Dengan Klub 2',
            'klub_id2.different' => 'Klub 2 Tidak Boleh Sama Dengan Klub 1',
            'klub_id2.unique' => 'Klub 2 Sudah Ada, Silahkan Pilih Klub Lain',
            'klub_id1.unique' => 'Klub 1 Sudah Ada, Silahkan Pilih Klub Lain',
            'score1.required' => 'Score 1 Tidak Boleh Kosong',
            'score2.required' => 'Score 2 Tidak Boleh Kosong',
        ]);
        if($valid['score1'] < $valid['score2'] ){
            $klub1 = Klub::find($valid['klub_id1']);
            $klub1->update([
                'main' => $klub1->main + 1,
                'kalah' => $klub1->kalah + 1,
                'gk' => $klub1->gk + $valid['score2'],
                'gm' => $klub1->gm + $valid['score1'],
            ]);
            $klub2 = Klub::find($valid['klub_id2']);
            $klub2->update([
                'main' => $klub2->main + 1,
                'menang' => $klub2->menang + 1,
                'gk' => $klub2->gk + $valid['score1'],
                'gm' => $klub2->gm + $valid['score2'],
                'point' => $klub2->point + 3,
            ]);
        }elseif ($valid['score1'] > $valid['score2'] ) {
            $klub1 = Klub::find($valid['klub_id1']);
            $klub1->update([
                'main' => $klub1->main + 1,
                'menang' => $klub1->menang + 1,
                'gm' => $klub1->gm + $valid['score1'],
                'gk' => $klub1->gk + $valid['score2'],
                'point' => $klub1->point + 3,
            ]);
            $klub2 = Klub::find($valid['klub_id2']);
            $klub2->update([
                'main' => $klub2->main + 1,
                'kalah' => $klub2->kalah + 1,
                'gk' => $klub2->gk + $valid['score1'],
                'gm' => $klub2->gm + $valid['score2'],
            ]);
        }else {
            $klub1 = Klub::find($valid['klub_id1']);
            $klub1->update([
                'main' => $klub1->main + 1,
                'seri' => $klub1->seri + 1,
                'gm' => $klub1->gm + $valid['score1'],
                'gk' => $klub1->gk + $valid['score2'],
                'point' => $klub1->point + 1,
            ]);
            $klub2 = Klub::find($valid['klub_id2']);
            $klub2->update([
                'main' => $klub2->main + 1,
                'seri' => $klub2->seri + 1,
                'gk' => $klub2->gk + $valid['score1'],
                'gm' => $klub2->gm + $valid['score2'],
                'point' => $klub2->point + 1,
            ]);
        }


        Skor::create($valid);
        return redirect(route('form-skor'))->with('success','Data Skor Pertandingan Berhasil Ditambahkan!!');
        
        
                        
                    
        
    }
}
