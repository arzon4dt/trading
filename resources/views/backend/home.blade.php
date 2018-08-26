@extends('layouts.backend')


 <!-- Main content -->
 @section('content')
 <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ __('Admin') }}</h3>

                <p>User CRUD</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
            <a href="{{ route('register') }}" class="small-box-footer">Enter <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
            <div class="inner">
                <h3>{{ __('Data') }}</h3>

                <p>Import Data</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Enter <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
            <div class="inner">
                <h3>{{ __('Trend') }}</h3>

                <p>Add Trend Line</p>
            </div>
            <div class="icon">
                <i class="ion ion-arrow-graph-up-right"></i>
            </div>
            <a href="#" class="small-box-footer">Enter <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
            <div class="inner">
                <h3>{{ __('Settings') }}</h3>

                <p>Settings</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-settings"></i>
            </div>
            <a href="#" class="small-box-footer">Enter <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
  @endsection
