<?php
/**
 * Created by PhpStorm.
 * User: kaharlykskyi
 * Date: 24.07.17
 * Time: 22:56
 */

namespace App\Services;

use App\Entity\Rental;
use App\Manager\{CarManager, UserManager};

class ReturnService
{
    private $car_id;
    private $user_id;
    private $returned_from;

    public function __construct($car_id, $user_id, $returned_from = 'Kyiv, 12b')
    {
        $this->car_id = $car_id;
        $this->user_id = $user_id;
        $this->returned_from = $returned_from;
    }

    public function returnCar()
    {
        $user_id = $this->user_id;
        $car_id = $this->car_id;
        $userManager = new UserManager();
        $carManager = new CarManager();

        if ($userManager->userExists($user_id) && $carManager->carExists($car_id)) {
            if ($this->carRentedByUser() == $user_id) {
                $this->updateRentCar();
            }
        }
    }

    /**
     * Return user_id who rented a car with car_id
     *
     * @return mixed
     */
    private function carRentedByUser()
    {
        return Rental::where('car_id', $this->car_id)->value('user_id');
    }

    /**
     * Updating `returned_at` if car is successfully returned
     */
    private function updateRentCar()
    {
        Rental::where('car_id', $this->car_id)->update(['returned_at' => date("Y-m-d H:i:s")]);
    }

}