<?php
/**
 * Created by PhpStorm.
 * User: kaharlykskyi
 * Date: 25.07.17
 * Time: 1:25
 */

namespace App\Http\Controllers\Rental;

use App\Http\Controllers\Controller;
use App\Manager\CarManager;
use App\Services\ReturnService;
use Illuminate\Support\Facades\Auth;

class ReturnController extends Controller
{
    private $carManager;

    public function __construct(CarManager $carManager)
    {
        $this->carManager = $carManager;
    }

    public function returnCar(int $car_id)
    {
        $user_id = Auth::user()->id;
        $car = $this->carManager->findById($car_id);
        $car_id = $car->id;
        $return = new ReturnService($car_id, $user_id);
        if ($return->returnCar()) {
            $msgWarning = false;
            $msgSuccess = 'Car returned successfully!';
        } else {
            $msgSuccess = false;
            $msgWarning = 'You cant return this car. You dont rent this car!';
        }
        return redirect()->route('cars.index')->with([
            'msgSuccess' => $msgSuccess,
            'msgWarning' => $msgWarning
        ]);
    }

}