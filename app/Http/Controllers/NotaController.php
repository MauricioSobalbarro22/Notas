<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Nota;
use Illuminate\Validation\Rule;


class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $notas = $user->notas()->paginate(3);

        return view('notas.index', compact('user', 'notas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notas.formulario');//
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
      $request->validate([
        'titulo' => 'required|regex:/[A-Za-z áéíóúñ]+$/i',
        'contenido'=>'required',


      ]);  //
        $nuevaNota = new Nota();
        $nuevaNota->user_id = Auth::user()->id;
        $nuevaNota->titulo = $request->input('titulo');
        $nuevaNota->contenido = $request->input('contenido');
        $nuevaNota->categoria = $request->input('categoria');
        $nuevaNota->color = $request->input('color');
        $nuevaNota->etiqueta = $request->input('etiqueta');
        $nuevaNota->created_at = now();

        if($nuevaNota->save()) {
            // significa que se guardo
            return redirect()->route('notas.index')->with('mensaje', 'Nota guardada exitosamente.');
        } else {
            return redirect()->route('notas.index')->with('mensaje', 'Error. La nota no se guardó.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nota = Nota::findOrfail($id);
        return view('notas.formulario')->with('nota', $nota);  //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nota = Nota::findOrfail($id);
        $request->validate([
            'user_id',
            'titulo' => 'required|string',
            'contenido'=>'required',
            'categoria',
            'color',
            'etiqueta',
            'created_at',

        ]);  //

        $nota->user_id = Auth::user()->id;
        $nota->titulo = $request->input('titulo');
        $nota->contenido = $request->input('contenido');
        $nota->categoria = $request->input('categoria');
        $nota->color = $request->input('color');
        $nota->etiqueta = $request->input('etiqueta');
        $nota->created_at = now();

        if($nota->save()) {
            // significa que se guardo
            return redirect()->route('notas.index')->with('mensaje', 'Nota editada exitosamente.');
        } else {
            return redirect()->route('notas.index')->with('mensaje', 'Error. La nota no se editó.');
        } //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        {if(Nota::destroy($id) > 0){return redirect()->route('notas.index')->with('mensaje', 'Nota borrado exitosamente');
        } else{return redirect()->route('notas.index')->with('mensaje', 'La nota no pudo ser eliminado');}
        } //
    }
}
