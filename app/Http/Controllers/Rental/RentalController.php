<?php
/**
 * Created by PhpStorm.
 * User: kaharlykskyi
 * Date: 25.07.17
 * Time: 0:08
 */

namespace App\Http\Controllers\Rental;

use App\Http\Controllers\Controller;
use App\Manager\CarManager;
use App\Services\RentalService;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    private $carManager;

    public function __construct(CarManager $carManager)
    {
        $this->carManager = $carManager;
    }

    /**
     * Return rent view to user, for example /cars/1/rent
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(int $id)
    {
        $user = Auth::user();
        $car = $this->carManager->findById($id);
        return view('rental.show', ['user' => $user, 'car' => $car]);
    }

    /**
     * Renting car
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(int $id)
    {
        $user_id = Auth::user()->id;
        $car = $this->carManager->findById($id);
        $car_id = $car->id;
        $rent = new RentalService($car_id, $user_id);
        if ($rent->rentCar()) {
            $msgWarning = false;
            $msgSuccess = 'Car rented successfully!';
        } else {
            $msgSuccess = false;
            $msgWarning = 'You cant rent this car. Already rented or you have another rented car!';
        }

        return redirect()->route('cars.index')->with([
                'msgSuccess' => $msgSuccess,
                'msgWarning' => $msgWarning
            ]);
    }
}