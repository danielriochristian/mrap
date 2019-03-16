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
      $taxs = DB::table('tb_upload')->get();
      return view('tax',  ['taxs' => $taxs]);

    }
    public function upload(Request $request)
    {
        if ($request->hasFile('tes')) {
           $namafile = $request->file('tes')->getClientOriginalName();
           // $ext = $request->file('tes')->getClientOriginalExtension();
           $lokasifileskr = '/upload/'.$namafile;
           //cek jika file sudah ada...

             $destinasi = public_path('/upload');
             $proses = $request->file('tes')->move($destinasi,$namafile);

             $taxs = new Tax;
             $taxs->title = $request->title;
             $taxs->file = $lokasifileskr;
             $taxs->save();
             // var_dump($taxs); die();


             return redirect('memberarea/workinggroup/tax')->with('message','data berhasil ditambahkan!!');

         }
       }
       public function showDocument()
       {
         $docs = DB::table('tb_upload')->get();
         return view('tax',['docs' => $docs]);
       }
}
