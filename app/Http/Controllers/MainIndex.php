<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelIndex;


class MainIndex extends Controller
{
    public function Index()
    {
        $getData=ModelIndex::get();
        return view('index', ['data' => $getData]);

    }
}
