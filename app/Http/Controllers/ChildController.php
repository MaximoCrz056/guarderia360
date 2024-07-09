<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ChildRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $children = Child::paginate();

        return view('child.index', compact('children'))
            ->with('i', ($request->input('page', 1) - 1) * $children->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $child = new Child();

        return view('child.create', compact('child'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChildRequest $request): RedirectResponse
    {
        Child::create($request->validated());

        return Redirect::route('children.index')
            ->with('success', 'Child created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $child = Child::find($id);

        return view('child.show', compact('child'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $child = Child::find($id);

        return view('child.edit', compact('child'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChildRequest $request, Child $child): RedirectResponse
    {
        $child->update($request->validated());

        return Redirect::route('children.index')
            ->with('success', 'Child updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Child::find($id)->delete();

        return Redirect::route('children.index')
            ->with('success', 'Child deleted successfully');
    }
}
