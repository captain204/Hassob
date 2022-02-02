<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Http\Requests\StoreVendorRequest;
use App\Traits\ApiResponser;

class VendorController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendor =  Vendor::all();
        return $this->success([
            'vendor' => $vendor,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVendorRequest $request)
    {
        try {
            $request->validated();
            $vendor = new Vendor($request->all());
            $vendor->save();
            return response()->json($vendor, 201);
        } catch (\Exception $e) {
            return $this->error([
                'message'=>$e->getMessage(),
                'code'=>400
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $vendor = Vendor::find($id);
            if (null !== $vendor){
                return $this->success([
                    'vendor'=>$vendor
                ]);
            }else{
                return $this->error([
                    'message'=>'Vendor does not exist',
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
    public function update(StoreVendorRequest $request, $id)
    {
        try {
            $vendor = Vendor::find($id);
            if(null !== $vendor){
                $vendor->fill($request->validated());
                $vendor->save();
                return response()->json($vendor, 200);
            }else{
                return $this->error([
                    'message'=>'Vendor does not exist',
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
            $vendor = Vendor::find($id);
            if(null !==$vendor){
                $vendor->delete();
                return response()->json(['message' => 'Vendor removed'], 204);
            }else{
                return $this->error([
                    'message'=>'Vendor does not exist',
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
