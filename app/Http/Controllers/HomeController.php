<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Response;
use Auth;
use DB;
use App\User;
use App\Role;

class HomeController extends Controller
{
  public function getRoleAdmin() {
  $rolesyangberhak = DB::table('roles')->where('id','=','1')->get()->first()->namaRule;
  return $rolesyangberhak;
}
public function __construct()
{
  $this->middleware('auth');
  $this->middleware('rule:'.$this->getRoleAdmin().',nothingelse');
}

public function index()
{
    return view('home');
}
}
