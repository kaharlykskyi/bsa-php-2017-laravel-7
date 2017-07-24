<?php

use App\Manager\{CarManager, UserManager};
use Tests\TestCase;
use App\Services\RentalService;

class RentalServiceTest extends TestCase
{
    private $testData = [
        'car_id' => 3,
        'user_id' => 3,
        'price' => 1000,
        'rented_from' => 'Donetsk, 14b',
    ];

    public function testShouldSaveRent()
    {
        $userManager = new UserManager();
        $carManager = new CarManager();
        $rent = new RentalService($this->testData['car_id'],
            $this->testData['user_id'],
            $this->testData['rented_from'],
            $userManager,
            $carManager);

        $rent->rentCar();

        $this->assertDatabaseHas('rentals', [
            'car_id' => $this->testData['car_id'],
            'user_id' => $this->testData['user_id'],
            'price' => $this->testData['price'],
            'rented_from' => $this->testData['rented_from']
        ]);
    }
}
