<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Products;

class HomeController extends Controller
{
    public function home()
    {
        $data = Products::orderBy('created_at', 'DESC')->paginate(8);
        return view('client.home', ['data' => $data]);
    }
}
