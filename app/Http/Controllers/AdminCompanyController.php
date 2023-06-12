<?php

namespace App\Http\Controllers;

use App\Models\AdminCompany;
use App\Models\Car;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = DB::table('Company')->select(
            'Company.comp_id as idComp',
            'Company.name as compani',
            'Company.foundation_year as compani_year',
            'Company.capitalizachion as capital',

        )->get();
        return view('admin.company.list', ['company' => $company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = DB::table('Company')->select(
            'Company.comp_id as idComp',
            'Company.name as compani',
            'Company.foundation_year as compani_year',
            'Company.capitalizachion as capital',

        )->get();
        return view('admin.company.add', ['company' => $company]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('company');
        $foundation_year = $request->input('foundation_year');
        $capitalizachion = $request->input('capital');

        $company = new Company();
        $company->name = $name;
        $company->foundation_year = $foundation_year;
        $company->capitalizachion = $capitalizachion;


        $company->save();

        return Redirect::to('/admin/company');
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
        $edit_comp = Company::where('comp_id', $id)->first();
        return view('admin.company.edit', [
            'edit_comp' => $edit_comp,
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
        $company = Company::where('comp_id', $id)->first();

        $name = $request->input('company');
        $foundation_year = $request->input('compani_year');
        $capitalizachion = $request->input('capital');


        $company->name = $name;
        $company->foundation_year = $foundation_year;
        $company->capitalizachion = $capitalizachion;


        $company->save();

        return Redirect::to('/admin/company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::destroy($id);
        return Redirect::to('/admin/company');
    }
}
