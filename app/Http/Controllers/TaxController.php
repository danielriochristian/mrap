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
use Alert;


class TaxController extends Controller
{

    public function index()
    {
      // $taxs = DB::table('data_anggota,tb_upload')->where('division_id','=','1')->get();
      $taxs = DB::select('select data_anggota.*,tb_upload.* from data_anggota,tb_upload');
      // $taxs = DB::table('tb_upload')->get();
      // var_dump($taxs);die();
      return view('tax',  ['taxs' => $taxs]);

    }
    public function upload(Request $request)
    {
        if ($request->hasFile('tes')) {
           $namafile = $request->file('tes')->getClientOriginalName();
           // $ext = $request->file('tes')->getClientOriginalExtension();
           $lokasifileskr = '/upload/'.$namafile;
           //cek jika file sudah ada...
           $cekdivisi = Auth::User()->division;
           // var_dump($cekdivisi);die();
           if ($cekdivisi == 'Tax') {
             $destinasi = public_path('/upload');
             $proses = $request->file('tes')->move($destinasi,$namafile);

             $taxs = new Tax;
             $taxs->title = $request->title;
             $taxs->uploaded_by = $request->id_admin;
             $taxs->file = $lokasifileskr;
             $taxs->save();

             return redirect('memberarea/workinggroup/tax')->with('message','data berhasil ditambahkan!!');
           }
           else {
             return Redirect::back()->withErrors(['anda tidak memiliki akses']);
           }
         }
       }
       public function showDocument()
       {
         $docs = DB::table('tb_upload')->get();
         return view('tax',['docs' => $docs]);
       }
}
