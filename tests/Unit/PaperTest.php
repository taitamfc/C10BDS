<?php

namespace Tests\Unit;

use App\Models\Paper;
use Faker\Factory as Faker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Log;

class PaperTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_paper(){
        $this->faker = Faker::create();
        $paper = new Paper();
        $paper->name = $this->faker->name;
        $paper->status ='sent';
        try {
            $paper->save();
            $this->assertTrue(true);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            $this->assertTrue(false);
        }
    }
}
