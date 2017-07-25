<?php
/**
 * Created by PhpStorm.
 * User: kaharlykskyi
 * Date: 25.07.17
 * Time: 13:37
 */

namespace App\Http\Controllers\Rental\Api;

use App\Http\Controllers\Controller;
use App\Manager\CarManager;
use App\Services\RentalService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller
{
    private $carManager;

    public function __construct(CarManager $carManager)
    {
        $this->carManager = $carManager;
    }

    public function rent(Request $request): JsonResponse
    {
        $user_id = Auth::user()->id;

        //get car_id from post body request
        $car_id = (int)$request->all()['car_id'];
        $rent = new RentalService($car_id, $user_id);
        if ($rent->rentCar()) {
            return response()->json(['success' => "Car rented successfully!"], 200);
        } else {
            return response()->json(['error' => "You cant rent this car. Already rented or you have another rented car!"], 404);
        }
    }


}