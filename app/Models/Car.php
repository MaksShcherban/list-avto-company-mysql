<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Car extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Car';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'idCar';


    public static $search_types_car = array(
        1 => 'Отримати всі машини',
        2 => 'Пошук за маркою',
        3 => 'Пошук за моделю',
        4 => 'Пошук за ціною',
        5 => 'Пошук за ріком',
        6 => 'Пошук за кольором'
    );
    public static $search_types_comp = array(
        1 => 'Стандарт',
        2 => 'Пошук за компанією',
        3 => 'Пошук за ріком',
        4 => 'Пошук за ціною',

    );

    public function getAllCar()
    {
        $query = DB::table('Car')->join('Company', 'Car.compani_id', '=', 'Company.comp_id')->select(
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
        return $query;
    }
    public function getAllComp()
    {
        $query = DB::table('Company')->select(
            'Company.comp_id as idComp',
            'Company.name as compani',
            'Company.foundation_year as compani_year',
            'Company.capitalizachion as capital',

        )->get();
        return $query;
    }
    public function getCarByName($marka)
    {
        if (!$marka) {
            $query = DB::table('Car')->join('Company', 'Car.compani_id', '=', 'Company.comp_id')->select(
                'Car.idCar as idCar',
                'Car.marka as marka',
                'Car.model as model',
                'Car.year as year',
                'Car.color as color',
                'Car.cost as cost',
                'Company.name as compani',
                'Company.foundation_year as compani_year',

            )->orderBy('Car.marka')->get();
            return $query;
        } else {
            $query = DB::table('Car')->join('Company', 'Car.compani_id', '=', 'Company.comp_id')->select(
                'Car.idCar as idCar',
                'Car.marka as marka',
                'Car.model as model',
                'Car.year as year',
                'Car.color as color',
                'Car.cost as cost',
                'Company.name as compani',
                'Company.foundation_year as compani_year',

            )->where('Car.marka', '=', $marka)->orderBy('Car.marka')->get();
            return $query;
        }
    }
    public function getCompByName($name)
    {
        if (!$name) {
            $query = DB::table('Company')->select(
                'Company.comp_id as idComp',
                'Company.name as compani',
                'Company.foundation_year as compani_year',
                'Company.capitalizachion as capital',

            )->orderBy('Company.name')->get();
            return $query;
        } else {
            $query = DB::table('Company')->select(
                'Company.comp_id as idComp',
                'Company.name as compani',
                'Company.foundation_year as compani_year',
                'Company.capitalizachion as capital',

            )->where('Company.name', '=', $name)->orderBy('Company.name')->get();
            return $query;
        }
    }
    public function getCompByYear($year)
    {
        if (!$year) {
            $query = DB::table('Company')->select(
                'Company.comp_id as idComp',
                'Company.name as compani',
                'Company.foundation_year as compani_year',
                'Company.capitalizachion as capital',

            )->orderByDesc('Company.foundation_year')->get();
            return $query;
        } else {
            $query = DB::table('Company')->select(
                'Company.comp_id as idComp',
                'Company.name as compani',
                'Company.foundation_year as compani_year',
                'Company.capitalizachion as capital',

            )->where('Company.foundation_year', '=', $year)->orderByDesc('Company.foundation_year')->get();
            return $query;
        }
    }
    public function getCompByCost($cost)
    {
        if (!$cost) {
            $query = DB::table('Company')->select(
                'Company.comp_id as idComp',
                'Company.name as compani',
                'Company.foundation_year as compani_year',
                'Company.capitalizachion as capital',

            )->orderByDesc('Company.capitalizachion')->get();
            return $query;
        } else {
            $query = DB::table('Company')->select(
                'Company.comp_id as idComp',
                'Company.name as compani',
                'Company.foundation_year as compani_year',
                'Company.capitalizachion as capital',

            )->where('Company.capitalizachion', '=', $cost)->orderByDesc('Company.capitalizachion')->get();
            return $query;
        }
    }
    public function getCarByModel($model)
    {
        if (!$model) {
            $query = DB::table('Car')->join('Company', 'Car.compani_id', '=', 'Company.comp_id')->select(
                'Car.idCar as idCar',
                'Car.marka as marka',
                'Car.model as model',
                'Car.year as year',
                'Car.color as color',
                'Car.cost as cost',
                'Company.name as compani',
                'Company.foundation_year as compani_year',

            )->orderBy('Car.model')->get();
            return $query;
        } else {
            $query = DB::table('Car')->join('Company', 'Car.compani_id', '=', 'Company.comp_id')->select(
                'Car.idCar as idCar',
                'Car.marka as marka',
                'Car.model as model',
                'Car.year as year',
                'Car.color as color',
                'Car.cost as cost',
                'Company.name as compani',
                'Company.foundation_year as compani_year',

            )->where('Car.model', '=', $model)->orderBy('Car.model')->get();
            return $query;
        }
    }
    public function getCarByCost($cost)
    {
        if (!$cost) {
            $query = DB::table('Car')->join('Company', 'Car.compani_id', '=', 'Company.comp_id')->select(
                'Car.idCar as idCar',
                'Car.marka as marka',
                'Car.model as model',
                'Car.year as year',
                'Car.color as color',
                'Car.cost as cost',
                'Company.name as compani',
                'Company.foundation_year as compani_year',

            )->orderBy('Car.cost')->get();
            return $query;
        } else {
            $query = DB::table('Car')->join('Company', 'Car.compani_id', '=', 'Company.comp_id')->select(
                'Car.idCar as idCar',
                'Car.marka as marka',
                'Car.model as model',
                'Car.year as year',
                'Car.color as color',
                'Car.cost as cost',
                'Company.name as compani',
                'Company.foundation_year as compani_year',

            )->where('Car.cost', '=', $cost)->orderBy('Car.cost')->get();
            return $query;
        }
    }
    public function getCarByYears($year)
    {
        if (!$year) {
            $query = DB::table('Car')->join('Company', 'Car.compani_id', '=', 'Company.comp_id')->select(
                'Car.idCar as idCar',
                'Car.marka as marka',
                'Car.model as model',
                'Car.year as year',
                'Car.color as color',
                'Car.cost as cost',
                'Company.name as compani',
                'Company.foundation_year as compani_year',

            )->orderBy('Car.year')->get();
            return $query;
        } else {
            $query = DB::table('Car')->join('Company', 'Car.compani_id', '=', 'Company.comp_id')->select(
                'Car.idCar as idCar',
                'Car.marka as marka',
                'Car.model as model',
                'Car.year as year',
                'Car.color as color',
                'Car.cost as cost',
                'Company.name as compani',
                'Company.foundation_year as compani_year',

            )->where('Car.year', '=', $year)->orderBy('Car.year')->get();
            return $query;
        }
    }
    public function getCarByColor($color)
    {
        if (!$color) {
            $query = DB::table('Car')->join('Company', 'Car.compani_id', '=', 'Company.comp_id')->select(
                'Car.idCar as idCar',
                'Car.marka as marka',
                'Car.model as model',
                'Car.year as year',
                'Car.color as color',
                'Car.cost as cost',
                'Company.name as compani',
                'Company.foundation_year as compani_year',

            )->orderBy('Car.color')->get();
            return $query;
        } else {
            $query = DB::table('Car')->join('Company', 'Car.compani_id', '=', 'Company.comp_id')->select(
                'Car.idCar as idCar',
                'Car.marka as marka',
                'Car.model as model',
                'Car.year as year',
                'Car.color as color',
                'Car.cost as cost',
                'Company.name as compani',
                'Company.foundation_year as compani_year',

            )->where('Car.color', '=', $color)->orderBy('Car.color')->get();
            return $query;
        }
    }
    public function getCompByID($id)
    {
        $query = DB::table('Car')->join('Company', 'Car.compani_id', '=', 'Company.comp_id')->select(
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
        )->where('Company.comp_id', '=', $id)->get();
        return $query;
    }
    public function getAllColor()
    {
        $result = DB::table(function ($query) {
            $query->select('color')
                ->from('Car')
                ->selectRaw('ROW_NUMBER() OVER (PARTITION BY color ORDER BY color) AS row_num');
        }, 'subquery')
            ->where('row_num', '=', 1)
            ->get(['color']);
        return $result;
    }
    public function getAllCompanyName()
    {
        $result = DB::table('Company')->select('Company.name as compani')->get();
        return $result;
    }
    public function getCarBySearch($marka, $color, $prise_min, $prise_max, $year, $comp)
    {
        $query = DB::table('Car')
            ->join('Company', 'Car.compani_id', '=', 'Company.comp_id')
            ->select(
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
            )
            ->where(function ($query) use ($marka, $color, $prise_min, $prise_max, $year, $comp) {
                if (!empty($marka)) {
                    $query->where('Car.marka', '=', $marka);
                }
                if (!empty($color)) {
                    $query->where('Car.color', '=', $color);
                }
                if (!empty($prise_min)) {
                    $query->where('Car.cost', '>=', $prise_min);
                }
                if (!empty($prise_max)) {
                    $query->where('Car.cost', '<=', $prise_max);
                }
                if (!empty($year)) {
                    $query->where('Car.year', '=', $year);
                }
                if (!empty($comp)) {
                    $query->where('Company.name', '=', $comp);
                }
            })

            ->get();

        return $query;
    }
}
