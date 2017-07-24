<?php
/**
 * Created by PhpStorm.
 * User: kaharlykskyi
 * Date: 25.07.17
 * Time: 1:59
 */

namespace Tests\Feature;


use App\Manager\UserManager;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;

class AuthenticationControlTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testUnauthorizedDontSeeRentPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/cars/1/rent')->assertPathIs('/login');
            $browser->visit('/cars/2/rent')->assertPathIs('/login');
        });
    }

    public function testAuthorizedSeeRentPage()
    {
        $user = new UserManager();
        $this->browse(function (Browser$browser) use ($user) {
            $browser
                ->loginAs($user->findById(1))
                ->visit('/cars/1/rent')->assertPathIs('/cars/1/rent');
            $browser->visit('/cars/2/rent')->assertPathIs('/cars/2/rent');
        });
    }
}
