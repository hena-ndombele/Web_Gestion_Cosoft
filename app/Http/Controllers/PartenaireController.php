<?php

namespace App\Http\Controllers;
use App\Models\Partenaire;
use Illuminate\Http\Request;

class PartenaireController extends Controller
{
    public function index(){
        $partenaires=Partenaire::all();
        $partenairecount=Partenaire::count();
        $number=1;
        return view('partenaires.index', compact('partenaires','number'));
    }


    public function store(Request $request){
        $request->validate([

            'partenaire'=>'required|unique:partenaires'
        ]);


        Partenaire::create([
            'partenaire'=>$request->partenaire,
        ]);
        return redirect()->route('partenaires.index')->with('success', 'création du partenaire avec success');
    }


    public function destroy($id)
    {
        $partenaire = Partenaire::find($id);
        $partenaire->delete();
        return redirect()->route('partenaires.index')->with('success', 'suppression du partenaire avec success');

    }

    
    public function update(Request $request, $id){
        
        try{
         $partenaire=Partenaire::find($id);
         $partenaire=$partenaire->update($request->all());
         if($partenaire){
            return response()->json(['message' => 'Le partenaire a été modifier avec success']);
            
         }
        }catch (\Throwable $th) {
            return response()->json(['message' => 'Une erreur s\' est produit de la modification du partenaire'], 500);
        }
 
    }
}
