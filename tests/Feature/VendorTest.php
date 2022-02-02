<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Vendor;
use Laravel\Sanctum\Sanctum;

class VendorTest extends TestCase
{
    
    /**
     * Vendor collection test.
     *
     * @method GET
     * @route /api/vendor
     *
     * Test returns 200 status code
     */
    public function testVendorCollection()
    {
        Sanctum::actingAs(
            User::factory()->create()
        );
        
        $response = $this->get('api/vendor');
        $response->assertStatus(200);
    }

    /**
     * Asset resource test.
     *
     * @method GET
     * @route /api/vendor/{$id}
     *
     * Test returns 200 status code
     */
    public function testVendorResource()
    {
        Sanctum::actingAs(
            User::factory()->create()
        );
        $vendor = Vendor::factory()->create();
        $response = $this->get('api/vendor', ['id'=>$vendor->id]);
        $response->assertStatus(200);
    }

    /**
     * Post Vendor resource test.
     *
     * @method Post
     * @route /api/vendor
     *
     * Test returns 201 status code
     */
    public function testPostAssetResource()
    {
        Sanctum::actingAs(
            User::factory()->create()
        );
        
        $data = [
            "name"=>"Uber",
            "category"=>"Technology"
        ];
        $response = $this->postJson('api/vendor', $data);
        $response->assertStatus(201);
    }

    /**
     * Update Vendor resource test.
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

        $vendor = Vendor::factory()->create();
        
        $data = [
            "name"=>"Uber",
            "category"=>"Technology"
        ];
        $response = $this->putJson('api/vendor/'.$vendor->id, $data);
        $response->assertStatus(200);
    }

    /**
     * Delete Vendor resource test.
     *
     * @method Delete
     * @route /api/vendor/{$vendor}
     *
     * Test returns 204 status code
     */
    public function testDeleteAssetResource()
    {
        Sanctum::actingAs(
            User::factory()->create()
        );
        $vendor = Vendor::factory()->create();
        $response = $this->deleteJson('api/vendor/'.$vendor->id);
        $response->assertStatus(204);
    }
}
