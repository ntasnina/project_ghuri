<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        /*$this->visit('/')
             ->see('Laravel 5');*/
        //$this->call('GET','search_accommodation');
        $response = $this->action('GET', 'AuthenticationController@login');

        $view = $response->original;

        $this->assertEquals('authentication.login', $view['name']);
    }
}
