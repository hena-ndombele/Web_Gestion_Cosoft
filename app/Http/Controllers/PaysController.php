<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pays;

class PaysController extends Controller
{
    public function index(){
        $pays=Pays::all();
        $paysCount=Pays::count();
        $number=1;
        return view('pays.index', compact('pays', 'number'));
    }


    public function store(Request $request){
        $request->validate([
            'pays'=>'required|unique:pays'
        ]);


        Pays::create([
            'pays'=>$request->pays
        ]);
        return redirect()->route('pays.index')->with('success', 'Création du pays avec sucess');
    }
}
