<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
   public function index()
   {
   // $users = User::paginate(10);
    $users = User::all();
        return view('home', compact('users'));
   }

   public function getUsers()
   {
        return DataTables::of(User::query())->make(true);
   }
}
