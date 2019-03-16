@extends('admin.admin')
@section('labeltax')

<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="breadcomb-wp">
      <div class="breadcomb-icon">
        <i class="notika-icon notika-windows"></i>
      </div>
      <div class="breadcomb-ctn">
        <h2>Tax</h2>
        <p>Welcome to MRAP <span class="bread-ntd">Admin</span></p>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
    <div class="breadcomb-report">
      <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
    </div>
  </div>
</div>
@endsection
@section('tax')
<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="data-table-list">
      <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                Working Group Members
              </a>
            </h4>
          </div>
          <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Firm</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php  $no=1; ?>
                    @foreach ($taxs as $t)
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{$t->name}}</td>
                    <td>{{$t->firm}}</td>
                    <td>{{$t->email}}</td>
                  </tr>
                  @endforeach
                </tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                Shared Documents
              </a>
            </h4>
          </div>
          <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Name File</th>
                    <th scope="col">Uploaded by</th>
                    <th scope="col">Download</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php  $no=1; ?>
                    @foreach ($taxs as $t)
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{$t->title}}</td>
                    <td>{{$t->uploaded_by}}</td>
                    <td> download </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                Upload File
              </a>
            </h4>
          </div>
          <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
              <form action="/memberarea/upload" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                  <p class="font-italic-sm">*only admin in Division Tax can upload.</p>
                  <label for="email">Name File:</label>
                  <input type="text" class="form-control" id="title" name="title">
                  @php
                  $cekid = Auth::User()->name;
                  @endphp
                  <input type="hidden" class="form-control" id="id_admin" name="id_admin" value="<?php echo ($cekid); ?>">
                </div>
                <div class="form-group">
                  <label for="email">File:</label>
                  @php
                  $cekdivisi = Auth::User()->division;
                  if($cekdivisi=='Tax'){
                    echo '<input type="file" class="form-control-file" id="tes" name="tes">';
                  }else{
                    echo '<input type="file" class="form-control-file" id="tes" name="tes" disabled>';
                  }
                  @endphp
                </div>
                <div class="form-group">
                  @php
                  $cekdivisi = Auth::User()->division;
                  if($cekdivisi=='Tax'){
                    echo '<button type="submit" class="btn btn-sm btn-primary" id="add">Submit</button>';
                  }else{
                    echo '<button type="submit" class="btn btn-sm btn-primary" id="add" disabled>Submit</button>';
                  }
                  @endphp
                  <button type="reset" class="btn btn-sm btn-danger">Cancel</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>


  </div> <!-- end container -->
</div>
</div>

<style media="screen">
  .panel-heading .accordion-toggle:after {
    /* symbol for "opening" panels */
    font-family: 'Glyphicons Halflings';
    /* essential for enabling glyphicon */
    content: "\e114";
    /* adjust as needed, taken from bootstrap.css */
    float: right;
    /* adjust as needed */
    color: grey;
    /* adjust as needed */

  }

  .panel-heading .accordion-toggle.collapsed:after {
    /* symbol for "collapsed" panels */
    content: "\e080";
    /* adjust as needed, taken from bootstrap.css */
  }
</style>
@endsection
