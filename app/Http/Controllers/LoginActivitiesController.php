<?php

namespace App\Http\Controllers;

use App\DataTables\LoginActivitiesDataTable;

class LoginActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LoginActivitiesDataTable $dataTable)
    {
        return $dataTable->render('login-activities.index');
    }
}
