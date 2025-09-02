<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;
use Illuminate\Support\Facades\Validator;

class StateController extends Controller
{
    // List all states with country name
    public function index()
    {
        $states = State::with('country')->latest()->paginate(8);
        $countries = Country::all();
        return view('frontend.state.index', compact('states', 'countries'));
    }

    // Store new state via AJAX
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:states,name',
            'country_id' => 'required|exists:countries,id'
        ]);

        if ($validator->passes()) {
            $state = new State();
            $state->name = $request->name;
            $state->country_id = $request->country_id;
            $state->save();

            session()->flash('success', 'State added successfully');

            return response()->json([
                'status' => true,
                'message' => 'State added successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // Edit state
    public function edit($id)
    {
        $state = State::findOrFail($id);
        $countries = Country::all();
        return view('frontend.state.edit', compact('state', 'countries'));
    }

    // Update state via AJAX
    public function update(Request $request, $id)
    {
        $state = State::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:states,name,' . $id,
            'country_id' => 'required|exists:countries,id'
        ]);

        if ($validator->passes()) {
            $state->name = $request->name;
            $state->country_id = $request->country_id;
            $state->update();

            session()->flash('success', 'State Updated successfully');

            return response()->json([
                'status' => true,
                'message' => 'State updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // Delete state via AJAX
    public function destroy($id)
    {
        $state = State::findOrFail($id);
        $state->delete();

        session()->flash('success', 'State deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'State deleted successfully'
        ]);
    }
}
