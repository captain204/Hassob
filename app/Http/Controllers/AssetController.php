<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset;
use App\Http\Requests\StoreAssetRequest;
use App\Traits\ApiResponser;
use PhpParser\Node\Stmt\TryCatch;

class AssetController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asset =  Asset::all();
        return $this->success([
            'asset' => $asset,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssetRequest $request)
    {
        try {
            $request->validated();
            $asset = new Asset($request->all());
            $asset->save();
            return $this->success([
                'asset'=>$asset,
            ]);

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
            $asset = Asset::find($id);
            if (null !== $asset){
                return $this->success([
                    'asset'=>$asset
                ]);
            }else{
                return $this->error([
                    'message'=>'Cannot find asset',
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
    public function update(StoreAssetRequest $request, $id)
    {
        try {
            $asset = Asset::find($id);
            if(null !== $asset){
                $asset->fill($request->validated());
                $asset->save();
                return $this->success([
                    'asset'=>$asset
                ]);
            }else{
                return $this->error([
                    'message'=>'Cannot find asset',
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
            $asset = Asset::find($id);
            if(null !==$asset){
                $asset->delete();
                return $this->success([
                    'code'=>204
                ]);
            }else{
                return $this->error([
                    'message'=>'Cannot find asset',
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
