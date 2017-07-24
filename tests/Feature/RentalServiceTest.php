<?php

use Tests\TestCase;
use App\Services\RentalService;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RentalServiceTest extends TestCase
{
    use DatabaseMigrations;

    private $correctTestData = [
        'car_id' => 2,
        'user_id' => 2,
        'price' => 1000,
    ];

    private $userHaveRentTestData = [
        'car_id' => 1,
        'user_id' => 1,
        'price' => 1000,
    ];

    private $carIsRentedTestData = [
        'car_id' => 1,
        'user_id' => 1,
        'price' => 1000,
    ];

    public function testShouldRentWithCorrectData()
    {
        $rent = new RentalService($this->correctTestData['car_id'], $this->correctTestData['user_id']);
        $rent->rentCar();

        $this->assertDatabaseHas('rentals', [
            'car_id' => $this->correctTestData['car_id'],
            'user_id' => $this->correctTestData['user_id'],
            'price' => $this->correctTestData['price']
        ]);
    }

    public function testShouldNotRentWhenUserHaveRent()
    {
        $rent = new RentalService($this->userHaveRentTestData['car_id'], $this->userHaveRentTestData['user_id']);
        $rent->rentCar();

        $this->assertDatabaseMissing('rentals', [
            'car_id' => $this->userHaveRentTestData['car_id'],
            'user_id' => $this->userHaveRentTestData['user_id'],
            'price' => $this->userHaveRentTestData['price']
        ]);
    }

    public function testShouldNotRentWhenCarIsRented()
    {
        $rent = new RentalService($this->carIsRentedTestData['car_id'], $this->carIsRentedTestData['user_id']);
        $rent->rentCar();

        $this->assertDatabaseMissing('rentals', [
            'car_id' => $this->carIsRentedTestData['car_id'],
            'user_id' => $this->carIsRentedTestData['user_id'],
            'price' => $this->carIsRentedTestData['price']
        ]);
    }

    public function testShouldNotRentToNonExistingUser()
    {
        $rent = new RentalService(1, 3);
        $rent->rentCar();

        $this->assertDatabaseMissing('rentals', [
            'car_id' => 1,
            'user_id' => 3
        ]);
    }

    public function testShouldNotRentToNonExistingCar()
    {
        $rent = new RentalService(3, 1);
        $rent->rentCar();

        $this->assertDatabaseMissing('rentals', [
            'car_id' => 3,
            'user_id' => 1
        ]);
    }
}
