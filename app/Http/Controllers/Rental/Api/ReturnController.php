<?php
/**
 * Created by PhpStorm.
 * User: kaharlykskyi
 * Date: 25.07.17
 * Time: 16:07
 */

namespace App\Http\Controllers\Rental\Api;

use App\Http\Controllers\Controller;
use App\Manager\CarManager;
use App\Services\ReturnService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReturnController extends Controller
{
    private $carManager;

    public function __construct(CarManager $carManager)
    {
        $this->carManager = $carManager;
    }

    /**
     * Return json response with success or error data for action return car
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function returnCar(Request $request): JsonResponse
    {
        $user_id = Auth::user()->id;

        //get car_id from post body request
        $car_id = (int)$request->all()['car_id'];
        $return = new ReturnService($car_id, $user_id);
        if ($return->returnCar()) {
            return response()->json(['success' => "Car returned successfully!"], 200);
        } else {
            return response()->json(['error' => "You cant return this car. You dont rent this car!"], 404);
        }
    }
}