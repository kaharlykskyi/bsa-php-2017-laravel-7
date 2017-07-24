<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 24.07.17
 * Time: 23:18
 */


use Tests\TestCase;
use App\Services\ReturnService;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class ReturnServiceTest extends TestCase
{
    use DatabaseMigrations;

    private $correctTestData = [
        'car_id' => 1,
        'user_id' => 1,
        'returned_to' => 'Kyiv, 12b',
    ];

    private $nonExistentCarTestData = [
        'car_id' => 3,
        'user_id' => 1,
        'returned_to' =>'Kyiv, 12b',
    ];

    private $nonExistentUserTestData = [
        'car_id' => 1,
        'user_id' => 3,
        'returned_to' =>'Kyiv, 12b',
    ];

    public function testShouldReturnCar()
    {
        $return = new ReturnService($this->correctTestData['car_id'], $this->correctTestData['user_id'], $this->correctTestData['returned_to']);
        $return->returnCar();

        $this->assertDatabaseMissing('rentals', [
            'car_id' => $this->correctTestData['car_id'],
            'user_id' => $this->correctTestData['user_id'],
            'returned_to' => null,
            'returned_at' => null,
        ]);
    }

    public function testCanNotReturnNonExistentCar()
    {
        $return = new ReturnService($this->nonExistentCarTestData['car_id'], $this->nonExistentCarTestData['user_id'], $this->nonExistentCarTestData['returned_to']);
        $return->returnCar();

        $this->assertDatabaseMissing('rentals', [
            'car_id' => $this->nonExistentCarTestData['car_id'],
            'user_id' => $this->nonExistentCarTestData['user_id'],
        ]);
    }

    public function testCanNotReturnCarFromNonExistentUser()
    {
        $return = new ReturnService($this->nonExistentUserTestData['car_id'], $this->nonExistentUserTestData['user_id'], $this->nonExistentUserTestData['returned_to']);
        $return->returnCar();

        $this->assertDatabaseMissing('rentals', [
            'car_id' => $this->nonExistentUserTestData['car_id'],
            'user_id' => $this->nonExistentUserTestData['user_id'],
        ]);
    }
}
