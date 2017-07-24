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

    public function testShouldReturnCar()
    {
        $return = new ReturnService($this->correctTestData['car_id'], $this->correctTestData['user_id'], $this->correctTestData['returned_to']);
        $return->returnCar();
    }
}
