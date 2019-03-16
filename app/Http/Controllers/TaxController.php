<?php

namespace App\Http\Controllers;
use App\Admin;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;
use Illuminate\Http\Request;
use Auth;
use DB;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Role;
use App\Tax;


class TaxController extends Controller
{

    public function index()
    {
      $taxs = DB::table('data_anggota')->where('division_id','=','1')->get();
      // var_dump($taxs);die();
      return view('tax',  ['taxs' => $taxs]);

      // $taxs = Tax::all();
      //   return view('tax', ['taxs' => $taxs]);

    //   $manage = Tax::all();
    // return view('partial.tax', compact('manage'));
    }
}
