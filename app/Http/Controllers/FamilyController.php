<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use App\Models\Children;
use App\Http\Requests\FamilyRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tutors = Tutor::paginate();
        $childrens = Children::paginate();

        return view('family.index', compact('tutors', 'childrens'))
            ->with('i', ($request->input('page', 1) - 1) * $tutors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tutor = new Tutor();
        $children = new Children();

        return view('family.create', compact('tutor', 'children'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FamilyRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // Guardar la foto en public/storage
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->storeAs('public/photos', $request->file('photo')->getClientOriginalName());
            $photoUrl = Storage::url($path);
        }

        // Crear tutor
        $tutor = Tutor::create([
            'name' => $validated['name'],
            'middlename' => $validated['middlename'],
            'lastname' => $validated['lastname'],
            'phone' => $validated['phone'],
            'photo' => $photoUrl ?? null, // Asignar la URL del archivo guardado
        ]);

        // Crear niño asociado al tutor
        Children::create([
            'tutor_id' => $tutor->id,
            'name' => $validated['name'],
            'middlename' => $validated['middlename'],
            'lastname' => $validated['lastname'],
            'birthdate' => $validated['birthdate'],
            'photo' => $photoUrl ?? null, // Asignar la URL del archivo guardado
            'gender' => $validated['gender'],
            'height' => $validated['height'],
            'weight' => $validated['weight'],
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()->route('family.index')
            ->with('success', 'Registro creado exitosamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tutor = Tutor::findOrFail($id);
        $children = Children::where('tutor_id', $id)->paginate();

        return view('family.show', compact('tutor', 'children'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // En tu controlador

    public function edit($id)
    {
        $tutor = Tutor::findOrFail($id);
        $children = Children::where('tutor_id', $id)->get();

        return view('family.edit', compact('tutor', 'children'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(FamilyRequest $request, $id): RedirectResponse
    {
        $validated = $request->validated();

        // Actualizar tutor
        $tutor = Tutor::findOrFail($id);
        $tutor->update([
            'name' => $validated['name'],
            'middlename' => $validated['middlename'],
            'lastname' => $validated['lastname'],
            'phone' => $validated['phone'],
            'photo' => $validated['photo'] ?? $tutor->photo,
        ]);

        // Procesar hijos existentes
        foreach ($validated['children'] as $childData) {
            // Si el niño tiene ID, actualiza; si no, crea uno nuevo
            if (isset($childData['id'])) {
                $child = Children::findOrFail($childData['id']);
                $child->update([
                    'name' => $childData['name'],
                    'middlename' => $childData['middlename'],
                    'lastname' => $childData['lastname'],
                    'birthdate' => $childData['birthdate'],
                    'photo' => $childData['photo'] ?? $child->photo,
                    'gender' => $childData['gender'],
                    'height' => $childData['height'],
                    'weight' => $childData['weight'],
                    'description' => $childData['description'] ?? $child->description,
                ]);
            } else {
                // Crear nuevo niño asociado al tutor
                Children::create([
                    'tutor_id' => $tutor->id,
                    'name' => $childData['name'],
                    'middlename' => $childData['middlename'],
                    'lastname' => $childData['lastname'],
                    'birthdate' => $childData['birthdate'],
                    'photo' => $childData['photo'] ?? null,
                    'gender' => $childData['gender'],
                    'height' => $childData['height'],
                    'weight' => $childData['weight'],
                    'description' => $childData['description'] ?? null,
                ]);
            }
        }

        return redirect()->route('family.index')
            ->with('success', 'Información actualizada exitosamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $tutor = Tutor::findOrFail($id);
        $tutor->delete();

        $children = Children::where('tutor_id', $id)->delete();

        return redirect()->route('family.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }
}
