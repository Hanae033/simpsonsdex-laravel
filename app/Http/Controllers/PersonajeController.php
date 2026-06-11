<?php
namespace App\Http\Controllers;

use App\Models\Personaje;
use Illuminate\Http\Request;

class PersonajeController extends Controller
{
    public function create()
    {
        return view('personajes.create');
    }

    public function store(Request $request)
    {
        // Si viene de Angular (JSON)
        if ($request->wantsJson() || $request->is('api/*')) {
            $validated = $request->validate([
                'nombre'        => 'required|string|min:3|max:255',
                'tipo'          => 'required|string|max:100',
                'color_de_pelo' => 'required|string|max:100',
            ]);
            return response()->json(Personaje::create($validated), 201);
        }

        // Si viene del formulario Blade (web)
        $validated = $request->validate([
            'nombre'        => 'required|string|min:3|max:255',
            'tipo'          => 'required|string|max:100',
            'color_de_pelo' => 'required|string|max:100',
            'trabajo'       => 'required|string|max:255',
        ]);

        Personaje::create($validated);
        return redirect()->route('personajes.create')
                         ->with('success', '¡Personaje registrado!');
    }

    public function index()
    {
        return response()->json(Personaje::all(), 200);
    }

    public function destroy(int $id)
    {
        Personaje::findOrFail($id)->delete();
        return response()->json(['message' => 'Eliminado.'], 200);
    }

    public function show(int $id)
    {
        return response()->json(Personaje::findOrFail($id), 200);
    }

    public function update(Request $request, int $id)
    {
        $personaje = Personaje::findOrFail($id);
        $personaje->update($request->all());
        return response()->json($personaje, 200);
    }
}