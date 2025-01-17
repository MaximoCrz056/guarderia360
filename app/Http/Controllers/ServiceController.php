<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $services = Service::paginate();

        return view('service.index', compact('services'))
            ->with('i', ($request->input('page', 1) - 1) * $services->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $service = new Service();

        return view('service.create', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/photos');
            $data['photo'] = Storage::url($path);
        }

        Service::create($data);

        return Redirect::route('services.index')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $service = Service::find($id);

        return view('service.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $service = Service::find($id);

        return view('service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, Service $service): RedirectResponse
    {
        $service->update($request->validated());

        if ($request->hasFile('photo')) {
            // Eliminar la foto anterior si existe
            if ($service->photo) {
                Storage::delete(str_replace('/storage', 'public', $service->photo));
            }

            $path = $request->file('photo')->store('public/photos');
            $data['photo'] = Storage::url($path);
        }

        $service->update($data);

        return Redirect::route('services.index')
            ->with('success', 'Service updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Service::find($id)->delete();

        return Redirect::route('services.index')
            ->with('success', 'Service deleted successfully');
    }
}
