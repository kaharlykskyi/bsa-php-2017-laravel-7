<?php
/**
 * Created by PhpStorm.
 * User: kaharlykskyi
 * Date: 25.07.17
 * Time: 2:06
 */

namespace Tests\Feature;

use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Manager\UserManager;
use Laravel\Dusk\Browser;

class RentDuskTest extends DuskTestCase
{
    use DatabaseMigrations;
    private $user;

    public function createUser()
    {
        $this->user = new UserManager();
    }

    public function testCanRentCar()
    {
        $this->createUser();

        $this->browse(function (Browser $browser){
            $browser
                ->loginAs($this->user->findById(2))
                ->visit('/cars/2/rent')
                ->assertSee('Accept rent')
                ->click('.accept-rent')
                ->assertPathIs('/cars')
                ->assertSee('Car rented successfully!');
        });
    }

    public function testCanReturnCar()
    {
        $this->createUser();

        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->user->findById(1))
                ->visit('/cars/1')
                ->assertSee('Return car')
                ->click('.return-button')
                ->assertPathIs('/cars')
                ->assertSee('Car returned successfully!');
        });
    }

    public function testCanNotRentRentedCar()
    {
        $this->createUser();

        $this->browse(function (Browser $browser){
            $browser
                ->loginAs($this->user->findById(2))
                ->visit('/cars/1/rent')
                ->assertSee('Accept rent')
                ->click('.accept-rent')
                ->assertPathIs('/cars')
                ->assertSee('You cant rent this car. Already rented or you have another rented car!');
        });
    }

    public function testCanNotReturnNotHisCar()
    {
        $this->createUser();

        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->user->findById(2))
                ->visit('/cars/1')
                ->assertSee('Return car')
                ->click('.return-button')
                ->assertPathIs('/cars')
                ->assertSee('You cant return this car. You dont rent this car!');
        });
    }
}
