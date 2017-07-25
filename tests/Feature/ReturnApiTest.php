<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 25.07.17
 * Time: 16:13
 */

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Manager\UserManager;

class ReturnApiTest extends TestCase
{
    use DatabaseMigrations;

    private $user;

    public function createUser()
    {
        $this->user = new UserManager();
    }

    public function testShouldNotSeeApiWithoutAuth()
    {
        $response = $this->call('POST', '/cars/api/return', ['car_id' => 1]);

        //expect redirect to /login
        $this->assertEquals(302, $response->status());
    }

    public function testShouldGetSuccessCode()
    {
        $this->createUser();
        $this->actingAs($this->user->findById(1));

        $response = $this->call('POST', '/cars/api/return', ['car_id' => 1]);

        $this->assertEquals(200, $response->status());
    }

    public function testShouldSuccessfullyReturnCar()
    {
        $this->createUser();

        $this->actingAs($this->user->findById(1))
            ->post('/cars/api/return', ['car_id' => 1])
            ->assertJson([
                'success' => 'Car returned successfully!'
            ]);
    }

    public function testShouldGetErrorCode()
    {
        $this->createUser();
        $this->actingAs($this->user->findById(2));

        $response = $this->call('POST', '/cars/api/return', ['car_id' => 1]);

        $this->assertEquals(404, $response->status());
    }

    public function testShouldNotSuccessfullyRentCar()
    {
        $this->createUser();

        $this->actingAs($this->user->findById(2))
            ->post('/cars/api/return', ['car_id' => 1])
            ->assertJson([
                'error' => 'You cant return this car. You dont rent this car!'
            ]);
    }
}

