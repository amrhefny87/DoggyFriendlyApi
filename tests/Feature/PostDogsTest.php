<?php

namespace Tests\Feature;

use App\Models\PostDog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostDogsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    public function test_CheckIfPostDogsAreListedInJsonFile()
    {
        PostDog::factory(2)->create();
        $response = $this->get('/api/postdogs');

        $response->assertStatus(200)
                ->assertJsonCount(2);
    }

    public function test_APostDogCanBeCreated ()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/api/postdogs' , [
            "title" => "test title",
            "description"=> "test description",
            "date" => "1991-10-11 11:31:25",
            "name" => "Hannah Haley I",
            "comments"=> "el futuro es para nosotros",
            "image" => "image.png"
        ]);

        $response->assertOk();
        $this->assertCount(1, PostDog::all());

        $this->assertEquals(PostDog::first()->title,'test title');
        $this->assertEquals(PostDog::first()->image,'image.png');

    }

    public function test_CheckIfPostDogCanBeDeleted(){
    
        PostDog::factory(1)->create([
            'id'=> 1
        ]);

        $response = $this->get('/api/postdogs');
        //dd($response);
        $this->assertCount(1, PostDog::all());
        
        $response = $this->delete('/api/postdogs/1');
        //dd($response);
        $this->assertCount(0, PostDog::all());

    }

    public function test_CheckIfPostDogCanBeUpdated(){
        PostDog::factory(1)->create([
            'id'=> 1,
            'title' => 'title 1'
        ]);

        $response = $this->get('/api/postdogs');
        //dd($response);
        $this->assertCount(1, PostDog::all());

        $response = $this->put('/api/postdogs/1', [
            "title" => "test title",
            "description"=> "test description",
            "date" => "1991-10-11 11:31:25",
            "name" => "Hannah Haley I",
            "comments"=> "el futuro es para nosotros",
            "image" => "image.png"
        ]);
        //dd($response);
        
        $this->assertEquals(PostDog::first()->title,'test title');

    }
}
