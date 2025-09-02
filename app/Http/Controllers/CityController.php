<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    // List cities
    public function index()
    {
        $cities = City::with('state.country')->latest()->paginate(10); // eager load state & country
        $states = State::all();
        return view('frontend.city.index', compact('cities', 'states'));
    }

    // Store city via AJAX
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'state_id' => 'required|exists:states,id',
            'name' => 'required|unique:cities,name,NULL,id,state_id,' . $request->state_id,
        ]);

        if ($validator->passes()) {
            $city = new City();
            $city->state_id = $request->state_id;
            $city->name = $request->name;
            $city->save();

            session()->flash('success', 'City added successfully');

            return response()->json([
                'status' => true,
                'message' => 'City added successfully'
            ]);
        }

        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);
    }

    // Edit City
    public function edit($id)
    {
        $city = City::findOrFail($id);
        $states = State::all();
        return view('frontend.city.edit', compact('city', 'states'));
    }

    // Update city via AJAX
    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'state_id' => 'required|exists:states,id',
            'name' => 'required|unique:cities,name,' . $id . ',id,state_id,' . $request->state_id,
        ]);

        if ($validator->passes()) {
            $city->state_id = $request->state_id;
            $city->name = $request->name;
            $city->update();

            session()->flash('success', 'City updated successfully');

            return response()->json([
                'status' => true,
                'message' => 'City updated successfully'
            ]);
        }

        return response()->json([
            'status' => false,
            'errors' => $validator->errors()
        ]);
    }

    // Delete city via AJAX
    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        session()->flash('success', 'City deleted successfully');

        return response()->json([
            'status' => true,
            'message' => 'City deleted successfully'
        ]);
    }
}
