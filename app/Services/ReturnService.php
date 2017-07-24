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
    private $returned_to;

    public function __construct($car_id, $user_id, $returned_to = 'Kyiv, 12b')
    {
        $this->car_id = $car_id;
        $this->user_id = $user_id;
        $this->returned_to = $returned_to;
    }

    public function returnCar()
    {
        $user_id = $this->user_id;
        $car_id = $this->car_id;
        $userManager = new UserManager();
        $carManager = new CarManager();

        if ($userManager->userExists($user_id) && $carManager->carExists($car_id)) {
            if ($this->carRentedByUser() == $user_id) {
                return $this->updateRentCar();
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
        return Rental::where('car_id', $this->car_id)->whereNull('returned_at')->value('user_id');
    }

    /**
     * Updating `returned_at` if car is successfully returned
     */
    private function updateRentCar()
    {
        if (Rental::where('car_id', $this->car_id)->update([
            'returned_at' => date("Y-m-d H:i:s"),
            'returned_to' => $this->returned_to
        ])) {
            return true;
        }
        return false;
    }

}