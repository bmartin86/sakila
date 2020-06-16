<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ActorTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testListaGlumacaNaslov()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/actors')
                    ->assertSee('Lista glumaca');
        });
    }
}
