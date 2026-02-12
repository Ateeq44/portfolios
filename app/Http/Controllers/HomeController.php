<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use App\Models\PortfolioCategory;

class HomeController extends Controller
{
	public function index()
	{
		return view('home');
	}

}
