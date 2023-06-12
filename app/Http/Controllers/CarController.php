<?php

namespace App\Http\Controllers;


use App\Models\Car;
use Illuminate\Http\Request;


class CarController extends Controller
{
    public function list(Request $request)
    {
        $type_car = $request->input('type', null);
        $param_car = $request->input('param', null);
        $type_comp = $request->input('type_comp', null);
        $param_comp = $request->input('param_comp', null);
        $search_marka = $request->input('search_marka', null);
        $search_color = $request->input('search_color', null);
        $search_prise = $request->input('prise', null);
        $search_prise_min = $request->input('prise_min', null);
        $search_prise_max = $request->input('prise_max', null);
        $search_year = $request->input('year', null);
        $search_comp = $request->input('search_comp', null);

        $model_cars = new Car();
        switch ($type_car) {
            case 1:
                $cars = $model_cars->getAllCar();
                break;
            case 2:
                $cars = $model_cars->getCarByName($param_car);
                break;
            case 3:
                $cars = $model_cars->getCarByModel($param_car);
                break;
            case 4:
                $cars = $model_cars->getCarByCost($param_car);
                break;
            case 5:
                $cars = $model_cars->getCarByYears($param_car);
                break;
            case 6:
                $cars = $model_cars->getCarByColor($param_car);
                break;
            default:
                $cars = $model_cars->getAllCar();
                break;
        };

        $model_company = new Car();
        switch ($type_comp) {
            case 1:
                $comp = $model_company->getAllComp();
                break;
            case 2:
                $comp = $model_company->getCompByName($param_comp);
                break;
            case 3:
                $comp = $model_company->getCompByYear($param_comp);
                break;
            case 4:
                $comp = $model_company->getCompByCost($param_comp);
                break;

            default:
                $comp = $model_company->getAllComp();
                break;
        }
        $color = $model_cars->getAllCOlor();
        $name_company = $model_company->getAllCompanyName();
        $CarSearch = $model_cars->getCarBySearch($search_marka, $search_color, $search_prise_min, $search_prise_max, $search_year, $search_comp);
        return view(
            'app.car.list',
            [
                'cars' => $cars,
                'comp' => $comp,
                'color' => $color,
                'name_company' => $name_company,
                'CarSearch' => $CarSearch,
                'search_types_car' => Car::$search_types_car,
                'type_selected_car' => $type_car,
                'param_car' => $param_car,
                'search_types_comp' => Car::$search_types_comp,
                'type_selected_comp' => $type_comp,
                'param_comp' => $param_comp,
                'search_marka' => $search_marka,
                'search_color' => $search_color,
                'search_prise' => $search_prise,
                'search_prise_min' => $search_prise_min,
                'search_prise_max' => $search_prise_max,
                'search_year' => $search_year,
                'search_comp' => $search_comp

            ]
        );
    }

    public function company($id)
    {

        $model_company = new Car();
        $comp = $model_company->getCompByID($id);
        $cars = $model_company->getCompByID($id);

        return view(
            'app.car.compani',
            [
                'cars' => $cars,
                'comp' => $comp,
            ]

        );
    }
}
