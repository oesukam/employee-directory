<?php

namespace App\Http\Controllers;

use App\Employee;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
class SearchController extends Controller
{
    public function index() {

        $keyword = Input::get('keyword');

        return view('employees.index')
            ->with('employees', Employee::where('name', 'LIKE', '%'.$keyword.'%')->get())
            ->with('keyword', $keyword);
    }
}
