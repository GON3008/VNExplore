<?php

namespace App\Http\Controllers\Admin;

use App\Models\City;
use App\Models\Country;
use App\Models\District;
use App\Models\Ward;
use DataTables;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $locations = Country::with(['cities.districts.wards'])->get();

            return datatables()->of($locations)
                ->addColumn('cities', function ($location) {
                    return $location->cities->pluck('name')->implode(', ');
                })
                ->addColumn('districts', function ($location) {
                    return $location->cities->flatMap(function ($city) {
                        return $city->districts->pluck('name');
                    })->implode(', ');
                })
                ->addColumn('wards', function ($location) {
                    return $location->cities->flatMap(function ($city) {
                        return $city->districts->flatMap(function ($district) {
                            return $district->wards->pluck('name');
                        });
                    })->implode(', ');
                })
                ->addColumn('action', function ($location) {
                    return '<button type="button" name="edit" id="' . $location->id . '" class="edit btn btn-primary btn-sm">
                                <i class="uil-edit"></i>
                            </button>
                            &nbsp;&nbsp;
                            <button type="button" name="delete" id="' . $location->id . '" class="delete btn btn-danger btn-sm">
                                <i class="uil-trash-alt"></i>
                            </button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.locations.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'country_name' => 'required',
            'city_name' => 'required',
            'district_name' => 'required',
            'ward_name' => 'required',
        ]);

        $country = Country::updateOrCreate(['id' => $request->location_id], [
            'name' => $request->country_name,
        ]);

        $city = City::updateOrCreate([
            'name' => $request->city_name,
            'country_id' => $country->id,
        ]);

        $district = District::updateOrCreate([
            'name' => $request->district_name,
            'city_id' => $city->id,
        ]);

        Ward::updateOrCreate([
            'name' => $request->ward_name,
            'district_id' => $district->id,
        ]);

        return response()->json(['success' => 'Location saved successfully.']);
    }
}
