<?php
/**
 * Created by PhpStorm.
 * User: kaharlykskyi
 * Date: 24.07.17
 * Time: 17:59
 */

namespace App\Services;

use App\Entity\Rental;
use App\Manager\{CarManager, UserManager};

class RentalService
{
    private $car_id;
    private $user_id;
    private $rented_from;

    public function __construct($car_id, $user_id, $rented_from = 'Kyiv, 12b')
    {
        $this->car_id = $car_id;
        $this->user_id = $user_id;
        $this->rented_from = $rented_from;
    }

    /**
     * Rent car if car, user exists and car not rented/user already have rent car
     */
    public function rentCar()
    {
        $user_id = $this->user_id;
        $car_id = $this->car_id;
        $userManager = new UserManager();
        $carManager = new CarManager();

        if ($userManager->userExists($user_id) && $carManager->carExists($car_id)) {
            if ((!$this->CarIsRented()) && (!$this->UserHaveRentedCar())) {
                if ($this->createNewRent()) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    /**
     * Check if car is in rent and not returned.
     * Return true if car is rented, otherwise false
     *
     * @return bool
     */
    private function CarIsRented(): bool
    {
        $rented = Rental::where('car_id', $this->car_id)->whereNull('returned_at')->first();
        if ($rented == null) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Check if user have already rented car and not return it.
     * Return true if have, otherwise false
     *
     * @return bool
     */
    private function UserHaveRentedCar()
    {
        $rented = Rental::where('user_id', $this->user_id)->whereNull('returned_at')->first();
        if ($rented == null) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Create new rent
     */
    private function createNewRent()
    {
        $rent = new Rental();
        $rent->car_id = $this->car_id;
        $rent->user_id = $this->user_id;
        $rent->rented_from = $this->rented_from;
        $rent->rented_at = date("Y-m-d H:i:s");
        if ($rent->save()) {
            return true;
        } else {
            return false;
        }
    }
}