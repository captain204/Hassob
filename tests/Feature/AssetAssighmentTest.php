<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Asset;
use App\Models\AssetAssighment;
use Laravel\Sanctum\Sanctum;


class AssetAssighmentTest extends TestCase
{
   /**
     * Asset Assighment collection test.
     * 
     * @method GET
     * @route /api/assighment
     * 
     * Test returns 200 status code
     */
    public function testAssetAssighmentCollection()
    {
        Sanctum::actingAs(
            User::factory()->create()
        );
        
        $response = $this->get('api/assighment');
        $response->assertStatus(200);
    }

    /**
     * Asset Assighment resource test.
     * 
     * @method GET
     * @route /api/assighment/{$id}
     * 
     * Test returns 200 status code
     */
    public function testAssetAssighmentResource()
    {
        Sanctum::actingAs(
            User::factory()->create()
        );
        $assighment = AssetAssighment::factory()->create();
        $response = $this->get('api/assighment',['id'=>$assighment->id]);
        $response->assertStatus(200);
    }

    /**
     * Post Asset Assighment resource test.
     * 
     * @method Post
     * @route /api/assighment
     * 
     * Test returns 201 status code
     */
    public function testPostAssetAssighmentResource()
    {
        Sanctum::actingAs(
            User::factory()->create()
        );
        
        $data = [
            "asset_id"=>21,
            "assighment_date"=>"2006-06-11",
            "status"=>"Merritt Turcotte",
            "is_due"=>"2000-09-16",
            "due_date"=>"2013-11-23",
            "user_id"=>2,
            "assigned_by"=>"Percival Stanton"
        ];
        $response = $this->postJson('api/assighment',$data);
        $response->assertStatus(201);        
    }

    /**
     * Update Assighment resource test.
     * 
     * @method Post
     * @route /api/assighment
     * 
     * Test returns 200 status code
     */
    public function testUpdateAssetAssighmentResource()
    {
        Sanctum::actingAs(
            User::factory()->create()
        );

        $assighment = AssetAssighment::factory()->create();
        
        $data = [
            "asset_id"=>21,
            "assighment_date"=>"2006-06-11",
            "status"=>"Merritt Turcotte",
            "is_due"=>"2000-09-16",
            "due_date"=>"2013-11-23",
            "user_id"=>2,
            "assigned_by"=>"Percival Stanton"
        ];
        $response = $this->putJson('api/assighment/'.$assighment->id,$data);
        $response->assertStatus(200);        
    }

    /**
     * Delete Asset Assighment resource test.
     * 
     * @method Delete
     * @route /api/assighment/{$assighment}
     * 
     * Test returns 204 status code
     */
    public function testDeleteAssetAssighmentResource()
    {
        Sanctum::actingAs(
            User::factory()->create()
        );
        $assighment = AssetAssighment::factory()->create();
        $response = $this->deleteJson('api/assighment/'.$assighment->id);
        $response->assertStatus(204);        
    } 
}
