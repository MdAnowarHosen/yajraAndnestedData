<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
   public function index()
   {
        return view('home');
      //  return $dataTable->render('home');
   }

   public function getUsers()
   {
        return DataTables::of(User::query())
        ->setRowId('id')
        ->setRowAttr([
            'align' => 'center',
        ])
        ->setRowClass(function ($user) {
            return $user->id % 2 == 0 ? 'text-success' : 'text-warning';
        })
        ->editColumn('updated', function(User $user) {
            return $user->created_at->difFforHumans();
        })
        ->addColumn('action', 'comp.action')
        ->make(true);
   }

}
