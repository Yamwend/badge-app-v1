<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personne;
use PDF;
use Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class PersonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Personnes = Personne::all();
        return view ('Personnes.index')->with('Personnes', $Personnes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Personnes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = $request->image;
        $folderPath = "uploads/";

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = $request->matricule . '.png';
        
        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);

        QrCode::size(250)->generate('Email : $request->nom',public_path('qrcode' . $request->matricule . '.svg'));

        $input = $request->all();
        Personne::create($input);
        return redirect('personne')->with('flash_message', 'Personne Addedd!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Personne = Personne::find($id);
        return view('Personnes.show')->with('Personnes', $Personne);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Personne = Personne::find($id);
        return view('Personnes.edit')->with('Personnes', $Personne);
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
        $Personne = Personne::find($id);
        $input = $request->all();
        $Personne->update($input);
        return redirect('personne')->with('flash_message', 'Personne Updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Personne::destroy($id);
        return redirect('Personne')->with('flash_message', 'Personne deleted!');
    }

   
}
