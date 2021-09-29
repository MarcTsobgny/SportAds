<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        $cats=Category::all();

        return view('cats',[
            "cats" => $cats
        ]);
    }
}
