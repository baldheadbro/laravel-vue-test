<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceType;
use DB;

class serviceController extends Controller
{

    // Create new record
    public function create(Request $request)
    {
        try {

            if(!strlen(trim($request->name))) {
                return response()->json(['status' => 'error', 'message' => 'Empty \'name\' parameter'], 500);
            }

            if(!ServiceType::find($request->type)) {
                return response()->json(['status' => 'error', 'message' => 'Incorrect \'type\' parameter'], 500);
            }

            $isactive = $request->isactive == 0 ? 0 : 1;

            $newService = Service::create([
                'name'          => $request->name,
                'description'   => $request->description,
                'type'          => $request->type,
                'isactive'      => $isactive
            ]);
        } catch (\Illuminate\Database\QueryException $ex) {
            return response()->json(['status' => 'error', 'message' => 'Internal server error. Something went wrong saving your data'], 500);
        }
        
        return response()->json(['status' => 'OK', 'message' => 'Item has been added'], 200);
    }


    // Read record
    public function read(Request $request) {
        try {
            $serviceItem = Service::select('services.name', 'description', 'type', 'isactive', 'service_types.name as serviceTypeName')
            -> leftJoin('service_types', 'service_types.id', "=", 'services.type' )
            -> where('services.id', $request->id)
            -> get();

        } catch (\Illuminate\Database\QueryException $ex) {
            return response()->json(['status' => 'error', 'message' => 'Internal server error. Something went wrong saving your data'], 500);
        }

        // Check - is there any data?
        if (count($serviceItem) == 0) {
            return response()->json(['status' => 'error', 'message' => 'Incorrect input id parameter'], 500);
        }

        return $serviceItem[0];
    }


    // Update record
    public function update(Request $request) {

        try {

            if(!isset($request->id)) {
                return response()->json(['status' => 'error', 'message' => 'No \'id\' parameter'], 500);
            }

            if(!strlen(trim($request->name))) {
                return response()->json(['status' => 'error', 'message' => 'Empty \'name\' parameter'], 500);
            }

            if(!ServiceType::find($request->type)) {
                return response()->json(['status' => 'error', 'message' => 'Incorrect \'type\' parameter'], 500);
            }

            $isactive = $request->isactive == 0 ? 0 : 1;

            Service::where('id', $request->id)
            -> update([
                'name'          => $request->name,
                'description'   => $request->description,
                'type'          => $request->type,
                'isactive'      => $isactive
            ]);

        } catch (\Illuminate\Database\QueryException $ex) {
            return response()->json(['status' => 'error', 'message' => 'Internal server error. Something went wrong saving your data'], 500);
        }

        return response()->json(['status' => 'OK', 'message' => 'Item id:' . $request->id . ' has been updated'], 200);

    }


    // Delete record
    public function delete(Request $request) {

        try {

            $result = Service::destroy($request->id);

        } catch (\Illuminate\Database\QueryException $ex) {
            return response()->json(['status' => 'error', 'message' => 'Internal server error. Something went wrong saving your data'], 500);
        }

        if(!$result) {
            return response()->json(['status' => 'OK', 'message' => 'Do nothing. The item is already removed'], 200);
        }

        return response()->json(['status' => 'OK', 'message' => 'Item id:' . $request->id . ' has been removed'], 200);
    }


    // Get all records, no pagination
    public function index() {

        $result = Service::select('services.name', 'services.id', 'description', 'type', 'isactive', 'service_types.name as serviceTypeName')
            -> leftJoin('service_types', 'service_types.id', "=", 'services.type' )
            -> orderBy('services.created_at', 'desc')
            -> get();

            //sleep(1); // Just emulate network delay

        return $result;
    }

    // Get a list of service type
    public function listServiceType() {

        return ServiceType::all(); // Just shortest record in the universe

    }
    
}
