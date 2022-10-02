<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLaboratoryRequest;
use App\Http\Requests\UpdateLaboratoryRequest;
use App\Models\Admin\Laboratory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $labs = Laboratory::all();
        return response()->json([
            'type' => 'success',
            'data' => $labs
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreLaboratoryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'registration' => 'required',
            'address' => 'required',
            'admin_name' => 'required',
            'contact' => 'required',
            'logo' => 'required',
            'module' => 'required',
            'email' => 'required',
            'cnic' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'type' => 'validation',
                'data' => $validator->errors()
            ], 403);
        } else {
            $lab = Laboratory::create([
                'created_by' => 1,
                'name' => $request->name,
                'registration' => $request->registration,
                'address' => $request->address,
                'admin_name' => $request->admin_name,
                'contact' => $request->contact,
                'email' => $request->email,
            ]);

            if ($request->has('logo') && $request->logo !== '') {
                $imageName = time().'.'.$request->logo->extension();
                $request->logo->move(public_path('images/labs/'.$lab->id.'/logo'), $imageName);
                $lab->logo = '/images/labs/'.$lab->id.'/logo/'.$imageName;
            }
            if ($request->has('module') && $request->module !== '') {
                $imageName = time().'.'.$request->module->extension();
                $request->module->move(public_path('images/labs/'.$lab->id.'/module'), $imageName);
                $lab->module = '/images/labs/'.$lab->id.'/module/'.$imageName;
            }
            if ($request->has('cnic') && $request->cnic !== '') {
                $imageName = time().'.'.$request->cnic->extension();
                $request->cnic->move(public_path('images/labs/'.$lab->id.'/cnic'), $imageName);
                $lab->cnic = '/images/labs/'.$lab->id.'/cnic/'.$imageName;
            }
            $lab->save();
            return response()->json([
                'type' => 'success',
                'data' => $lab,
                'message' => 'Laboratory Created Successfully'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Admin\Laboratory $laboratory
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratory $laboratory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Admin\Laboratory $laboratory
     * @return \Illuminate\Http\Response
     */
    public function edit(Laboratory $laboratory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateLaboratoryRequest $request
     * @param \App\Models\Admin\Laboratory $laboratory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLaboratoryRequest $request, Laboratory $laboratory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Admin\Laboratory $laboratory
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        Laboratory::whereId($id)->delete();
        $labs = Laboratory::all();
        return response()->json([
            'type' => 'success',
            'message' => 'Record Deleted Successfully',
            'data' => $labs
        ], 200);
    }
}
