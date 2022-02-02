<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetAssighment;
use App\Http\Requests\StoreAssighmentRequest;
use App\Traits\ApiResponser;
use App\Models\User;

class AssetAssighmentController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assetAssigment =  AssetAssighment::all();
        return $this->success([
            'assighment' => $assetAssigment,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssighmentRequest $request)
    {
        try {
            $request->validated();
            $assetAssigment = new AssetAssighment($request->all());
            $assetAssigment->save();
            return response()->json($assetAssigment, 201);
        } catch (\Exception $e) {
            return $this->error([
                'message'=>$e->getMessage(),
                'code'=>400
            ]);
        }
    }

    
    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $assetAssigment = AssetAssighment::find($id);
            if (null !== $assetAssigment) {
                return $this->success([
                    'assetAssigment'=>$assetAssigment
                ]);
            } else {
                return $this->error([
                    'message'=>'Cannot find Assigment',
                    'code'=>404
                ]);
            }
        } catch (\Exception $e) {
            return $this->error([
                'message'=>$e->getMessage(),
                'code'=>400
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAssighmentRequest $request, $id)
    {
        try {
            $assetAssigment = AssetAssighment::find($id);
            if (null !== $assetAssigment) {
                $assetAssigment->fill($request->validated());
                $assetAssigment->save();
                return response()->json($assetAssigment, 200);
            } else {
                return $this->error([
                        'message'=>'Cannot find asset assighment details',
                        'code'=>404
                    ]);
            }
        } catch (\Exception $e) {
            return $this->error([
                'message'=>$e->getMessage(),
                'code'=>400
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $assetAssigment = AssetAssighment::find($id);
            if (null !==$assetAssigment) {
                $assetAssigment->delete();
                return response()->json(['message' => 'Asset Assighment removed'], 204);
            } else {
                return $this->error([
                    'message'=>'Cannot find asset assighment details',
                    'code'=>404
                ]);
            }
        } catch (\Exception $e) {
            return $this->error([
                'message'=>$e->getMessage(),
                'code'=>400
            ]);
        }
    }
}
