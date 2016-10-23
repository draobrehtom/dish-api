<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Dish;
use SoapBox\Formatter\Formatter;

class DishesController extends Controller
{
    public function __construct()
    {
        $this->middleware('token:admin', ['except' => ['index']]);
    }

    function create(Request $request, Dish $dish) {
        $dish->fill($request->only($dish->getFillable()))->save();
        return $this->index();
    }

    function index($type = '') {
        $dishes = Dish::all();
        $formatter = Formatter::make($dishes, Formatter::JSON);
        switch ($type) {
            case "xml":
                $xml = $formatter->toXml();
                $format = "text/xml";
                break;
            default:
                $xml = $formatter->toArray();
                $format = "text/json";
                break;
        }

        return response($xml, 200)
            ->header('Content-Type', $format);
    }

    function update(Request $request, Dish $dish) {
        $dish->fill($request->all())->update();
        return $dish;
    }

    function delete(Dish $dish) {
        $dish->delete();
        return "ok";
    }

}
