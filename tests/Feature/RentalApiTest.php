<?php
/**
 * Created by PhpStorm.
 * User: kaharlykskyi
 * Date: 25.07.17
 * Time: 14:19
 */

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Manager\UserManager;

class RentalApiTest extends TestCase
{
    use DatabaseMigrations;
    private $user;

    public function createUser()
    {
        $this->user = new UserManager();
    }

    public function testShouldNotSeeApiWithoutAuth()
    {
        $response = $this->call('POST', '/cars/api/rent', ['car_id' => 1]);

        //expect redirect to /login
        $this->assertEquals(302, $response->status());
    }

    public function testShouldGetSuccessCode()
    {
        $this->createUser();
        $this->actingAs($this->user->findById(2));

        $response = $this->call('POST', '/cars/api/rent', ['car_id' => 2]);

        $this->assertEquals(200, $response->status());
    }

    public function testShouldSuccessfullyRentCar()
    {
        $this->createUser();

        $this->actingAs($this->user->findById(2))
             ->post('/cars/api/rent', ['car_id' => 2])
             ->assertJson([
                'success' => 'Car rented successfully!'
            ]);
    }

    public function testShouldGetErrorCode()
    {
        $this->createUser();
        $this->actingAs($this->user->findById(1));

        $response = $this->call('POST', '/cars/api/rent', ['car_id' => 2]);

        $this->assertEquals(404, $response->status());
    }

    public function testShouldNotSuccessfullyRentCar()
    {
        $this->createUser();

        $this->actingAs($this->user->findById(1))
            ->post('/cars/api/rent', ['car_id' => 2])
            ->assertJson([
                'error' => 'You cant rent this car. Already rented or you have another rented car!'
            ]);
    }
}
