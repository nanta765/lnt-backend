<?php

namespace App\Http\Controllers;
use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function dashboard() {
        $data_people = people::all();
        dd($data_people);
        return view('dashboard',['data_people' => $data_people]);
    }
}
