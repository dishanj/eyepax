<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SalesUsersRequest;
use App\Http\Requests\SalesUsersEditRequest;
use App\Models\SalesUsers;
use App\Helpers\APIResponseMessage;

class SalesUserController extends Controller
{
    //Get all sales users
    public function index()
    {
        $data = SalesUsers::all();
        return view('/home',compact('data'));
    }

    //view add page 
    public function add()
    {
        return view('/add');
    }

    //Create sales users
    public function store(SalesUsersRequest $request)
    {
        
        $data = SalesUsers::create($request->all());
        if ($data) {
            return response()->json($data, 200);
        } else {
            return response()->json([APIResponseMessage::ERROR_STATUS], 422);
        }
    }

    //get a sales user
    public function show($id)
    {
        $data = SalesUsers::find($id);
        if ($data) {
            return response()->json($data, 200);
        } else {
            return response()->json([APIResponseMessage::ERROR_STATUS], 404);
        }
    }

    //view edit sales user
    public function edit($id)
    {
        $data = SalesUsers::find($id);
        return view('/edit',compact('data'));
    }

    //update sales users
    public function update(SalesUsersEditRequest $request, SalesUsers $salesUsers)
    {
        $data = $salesUsers->save();
        if($data){
            return response()->json([APIResponseMessage::SUCCESS_STATUS], 200);
        } else{
            return response()->json([APIResponseMessage::ERROR_STATUS], 404);
        }
    }

    //Deleted sales users
    public function destroy($id)
    {
        $data = SalesUsers::destroy($id);
        if($data){
            return response()->json([APIResponseMessage::SUCCESS_STATUS], 200);
        } else{
            return response()->json([APIResponseMessage::ERROR_STATUS], 404);
        }
    }
}
