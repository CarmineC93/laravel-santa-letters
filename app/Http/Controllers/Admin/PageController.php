<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Letter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $letters = Letter::all();
        return view('letters.index', compact('letters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('letters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $this->validation($request->all());
        $letter = new Letter();
        $letter->fill($data);

        $letter->save();

        return redirect()->route('letters.show', $letter->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $letter = Letter::findOrFail($id);

        return view('letters.show', compact('letter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Letter $letter)
    {

        return view('letters.edit', compact('letter'));
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
        $letter = Letter::findOrFail($id);

        //richiamo funzione validation
        $editData = $this->validation($request->all()); //prelevo tutti i dati che sono stati inseriti nel form di edit.blade.php
        $letter->update($editData); //aggiorno i dati nel database
        return redirect()->route('letters.show', $letter->id); //reindirizzo una volta aggiornati i dati nella pagina show dell'elemento modificato    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    //>>>FUNCTIONS<<<

    //qui una funzione che ci permatta di non riscrivere stesso codice e nel quale possiamo inserire array con messaggi di errore per ogni validazione non rispettata
    private function validation($data)
    {
        // la class Validator da usare estende Facade
        $validationResult  = Validator::make(
            $data,
            [
                'name' => 'required|min:5|max:100',
                'lastname' => 'required',
                'address' => 'required',
                'city' => 'required',
                'arrival_letter' => 'required',
                'present' => 'required',
                'content_letter' => 'required',
                'rating' => 'required',
                'delivered' => 'required'

            ],
            [
                'name.required' => 'E\' necessario inserire il proprio nome',
                'name.min' => 'Il nome deve essere di almeno :min caratteri',
                'name.max' => 'Il nome deve essere di al massimo :max caratteri',
                'lastname.required' => 'Il cognome è necessario',
                'address.required' => 'L\'indirizzo è necessario',
                'city.required' => 'La città è necessaria',
                'arrival_letter.required' => 'E\' necessario inserire una data di arrivo',
                'present.required' => 'E\' necessario inserire il regalo',
                'content_letter.required' => 'E\' necessario inserire il testo contenuto nella lettera',
                'rating.required' => 'E\' necessario inserire il punteggio del bambino',
                'delivered.required' => 'E\' necessario segnalare se il regalo è stato spedito'
            ]
        )->validate();
        return $validationResult;
    }
}
