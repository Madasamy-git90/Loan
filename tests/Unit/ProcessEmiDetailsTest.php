<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\EmiDetail;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProcessEmiDetailsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that EMI details are processed successfully.
     */
    public function test_emi_details_processing_successfully()
    {
        // Arrange: Seed test data
        $emiDetails = EmiDetail::factory()->count(5)->create();

        // Act: Call the EMI processing endpoint or method
        $response = $this->post('/process-emi', [
            'client_id' => $emiDetails->first()->client_id,
        ]);

        // Assert: Verify processing results
        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'success',
            'message' => 'EMI details processed successfully.',
        ]);

        // Verify database changes or side effects
        $this->assertDatabaseHas('emi_details', [
            'client_id' => $emiDetails->first()->client_id,
            'processed' => true,
        ]);
    }

    /**
     * Test that EMI processing handles empty data gracefully.
     */
    public function test_emi_details_processing_handles_empty_data()
    {
        // Act: Call the EMI processing endpoint with no data
        $response = $this->post('/process-emi', []);

        // Assert: Check for validation errors or appropriate status
        $response->assertStatus(422);
        $response->assertJsonStructure([
            'errors' => [
                'client_id',
            ],
        ]);
    }

    /**
     * Test that invalid client ID results in an error.
     */
    public function test_emi_details_processing_with_invalid_client_id()
    {
        // Act: Call the EMI processing endpoint with an invalid client ID
        $response = $this->post('/process-emi', [
            'client_id' => 9999, // Non-existent client ID
        ]);

        // Assert: Verify error response
        $response->assertStatus(404);
        $response->assertJson([
            'status' => 'error',
            'message' => 'Client ID not found.',
        ]);
    }
}
