<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Country;

class CountryController extends Controller
{
    //List country with state and city
    public function index()
    {
        // eager load states -> cities count for UI convenience
        $countries = Country::with('states.cities')->latest()->paginate(10); // 10 items per page
        return view('frontend.country.index', compact('countries'));
    }

    // Store Country via AJAX
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:countries,name',
            'iso_code' => 'required|unique:countries,iso_code',
        ]);

        if ($validator->passes()) {
            $country = new Country();
            $country->name = $request->name;
            $country->iso_code = $request->iso_code;
            $country->save();

            session()->flash('success', 'Country added successfully');
            return response()->json([
                'status' => true,
                'message' => 'Country added successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }


    // Edit country
    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('frontend.country.edit', compact('country'));
    }

    // Update country via AJAX
    public function update(Request $request, $id)
    {
        $country = Country::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'iso_code' => 'required',
        ]);

        if ($validator->passes()) {
            $country->name = $request->name;
            $country->iso_code = $request->iso_code;
            $country->update();

            session()->flash('success', 'Country updated successfully');
            return response()->json([
                'status' => true,
                'message' => 'Country updated successfully'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }

    // Delete country via AJAX
    public function destroy($id)
    {
        $country = Country::findOrFail($id);

        if (!empty($country)) {
            $country->delete();

            session()->flash('success', 'Country deleted successfully');
            return response()->json([
                'status' => true,
                'message' => 'Country deleted successfully'
            ]);
        }
    }

}
