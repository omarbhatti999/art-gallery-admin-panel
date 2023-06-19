<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();

        return view('admin.locations.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.locations.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'country' => 'required',
        ]);
        dd('yes');

        Location::create($request->all());

        return redirect()->action([LocationController::class, 'index'])
            ->with('success', 'Location created successfully.');
    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);

        return view('admin.locations.edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'country' => 'required',
        ]);

        $location = Location::findOrFail($id);
        $location->update($request->all());

        return redirect()->action([LocationController::class, 'index'])
            ->with('success', 'Location updated successfully.');
    }

    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->action([LocationController::class, 'index'])
            ->with('success', 'Location deleted successfully.');
    }
}
