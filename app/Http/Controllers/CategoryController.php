<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function searchcat()
    {
        $categories = \Input::get('categories');

        $vacancies = \Vacancy::whereIn('id', $categories)->get();

        return \View::make('vacancies.empty')->with('vacancies', $vacancies); 
    }
}
