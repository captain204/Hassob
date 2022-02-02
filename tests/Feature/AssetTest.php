<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Asset;
use Laravel\Sanctum\Sanctum;

class AssetTest extends TestCase
{
    
    /**
     * Asset collection test.
     * 
     * @method GET
     * @route /api/asset
     * 
     * Test returns 200 status code
     */
    public function testAssetCollection()
    {
        Sanctum::actingAs(
            User::factory()->create()
        );
        
        $response = $this->get('api/asset');
        $response->assertStatus(200);
    }

    /**
     * Asset resource test.
     * 
     * @method GET
     * @route /api/asset/{$id}
     * 
     * Test returns 200 status code
     */
    public function testAssetResource()
    {
        Sanctum::actingAs(
            User::factory()->create()
        );
        $asset = Asset::factory()->create();
        $response = $this->get('api/asset',['id'=>$asset->id]);
        $response->assertStatus(200);
    }

    /**
     * Post Asset resource test.
     * 
     * @method Post
     * @route /api/asset
     * 
     * Test returns 201 status code
     */
    public function testPostAssetResource()
    {
        Sanctum::actingAs(
            User::factory()->create()
        );
        
        $data = [
            "serial_number"=>"SN-61640102306",
            "description"=>"Asset description",
            "fixed_movable"=>"Fixed",
            "picture_path"=>"https:\/\/via.placeholder.com\/640x480.png\/00cc11?text=animals+nihil",
            "purchase_date"=>"1999-04-08",
            "start_use_date"=>"2011-10-10",
            "purchase_price"=>8377473,
            "warranty_expiry_date"=>"2022-08-02",
            "degredation_in_years"=>9,
            "current_value"=>1,
            "location"=>"London"
        ];
        $response = $this->postJson('api/asset',$data);
        $response->assertStatus(201);        
    }

    /**
     * Update Asset resource test.
     * 
     * @method Post
     * @route /api/asset
     * 
     * Test returns 200 status code
     */
    public function testUpdateAssetResource()
    {
        Sanctum::actingAs(
            User::factory()->create()
        );

        $asset = Asset::factory()->create();
        
        $data = [
            "serial_number"=>"SN-63640105606",
            "description"=>"I just updated this.",
            "fixed_movable"=>"Movable",
            "picture_path"=>"https:\/\/via.placeholder.com\/640x480.png\/00cc11?text=animals+nihil",
            "purchase_date"=>"1999-04-08",
            "start_use_date"=>"2011-10-10",
            "purchase_price"=>8377473,
            "warranty_expiry_date"=>"2022-08-02",
            "degredation_in_years"=>8,
            "current_value"=>1,
            "location"=>"Bauchi"
        ];
        $response = $this->putJson('api/asset/'.$asset->id,$data);
        $response->assertStatus(200);        
    }

    /**
     * Delete Asset resource test.
     * 
     * @method Delete
     * @route /api/asset/{$asset}
     * 
     * Test returns 204 status code
     */
    public function testDeleteAssetResource()
    {
        Sanctum::actingAs(
            User::factory()->create()
        );
        $asset = Asset::factory()->create();
        $response = $this->deleteJson('api/asset/'.$asset->id);
        $response->assertStatus(204);        
    }
}
