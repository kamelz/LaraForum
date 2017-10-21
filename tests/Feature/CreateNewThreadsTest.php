<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateNewThreadsTest extends TestCase
{   
    use DatabaseMigrations;
    /** @test */
    public function an_authenticated_user_can_create_new_fourm_threads(){
          
          $this->be(factory('App\User')->create());
          
          $thread = factory('App\Thread')->make();

          $this->post('threads',$thread->toArray());
          $this->get($thread->path())
                ->assertSee($thread->title);



    }

    /** @test */
    public function guest_cannot_create_threads(){
       
          $this->expectException('Illuminate\Auth\AuthenticationException');
        
          $thread = factory('App\Thread')->make();

          $this->post('threads',$thread->toArray());
     
          

    }
}