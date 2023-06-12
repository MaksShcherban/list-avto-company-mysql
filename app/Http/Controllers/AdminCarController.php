<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = DB::table('Car')->join('Company', 'Car.compani_id', '=', 'Company.comp_id')->select(
            'Car.idCar as idCar',
            'Car.marka as marka',
            'Car.model as model',
            'Car.year as year',
            'Car.color as color',
            'Car.cost as cost',
            'Company.comp_id as idComp',
            'Company.name as compani',
            'Company.foundation_year as compani_year',
            'Company.capitalizachion as capital',

        )->get();
        return view('admin.car.list', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.car.add', ['search_types_car' => Car::$search_types_car]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marka = $request->input('marka');
        $model = $request->input('model');
        $year = $request->input('year');
        $color = $request->input('color');
        $cost = $request->input('cost');
        $compani_id = $request->input('compani');

        $car = new Car();
        $car->marka = $marka;
        $car->model = $model;
        $car->color = $color;
        $car->year = $year;
        $car->cost = $cost;
        $car->compani_id = $compani_id;

        $car->save();

        return Redirect::to('/admin/car');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Car::where('idCar', $id)->first();
        return view('admin.car.edit', [
            'edit' => $edit,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $car = Car::where('idCar', $id)->first();

        $marka = $request->input('marka');
        $model = $request->input('model');
        $year = $request->input('year');
        $color = $request->input('color');
        $cost = $request->input('cost');
        $compani_id = $request->input('compani_id');

        $car->marka = $marka;
        $car->model = $model;
        $car->color = $color;
        $car->year = $year;
        $car->cost = $cost;
        $car->compani_id = $compani_id;

        $car->save();

        return Redirect::to('/admin/car');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Car::destroy($id);
        return Redirect::to('/admin/car');
    }
}
