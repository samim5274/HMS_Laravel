<!DOCTYPE html>
<html lang="en">

<head>
    <title>Flat Able - Premium Admin Template by Phoenixcoded</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <style>
        button{
            width: 100%;
        }
    </style>
    
</head>
<body class="">
	
	<!-- [ navigation menu ] start -->
    @include('layouts.menu')
	<!-- [ navigation menu ] end -->


    <section id="account-section">
  <div class="">
    <div class="row">
        <div class="col text-center">
            @if(Session::has('error'))
            <div class="alert alert-danger">{{Session::get('error')}}</div>
            @endif
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
        </div>
    </div>
  </div>
</section>
	
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Investigation Report</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/investigation-report-view">Investigation Report</a></li>
                            <li class="breadcrumb-item"><a href="#">Investigation Report Status</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mt-5">Patient Detail's</h5>
                        <hr>
                        @foreach($testSale as $key => $val)
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Full Name</label>
                                    <input type="text" class="form-control" disabled id="inputEmail4" value="{{$val->name}}" placeholder="Full Name">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Phone</label>
                                    <input type="number" class="form-control" disabled id="inputPassword4" value="{{$val->phone}}" placeholder="Phone">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputPassword4">Date of Birth - <strong>{{$year}} years, {{$month}} month, {{$day}} days</strong></label>
                                    <input type="date" class="form-control" disabled id="inputPassword4" value="{{$val->dob}}" placeholder="Phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input type="text" class="form-control" disabled id="inputAddress" value="{{$val->address}}" placeholder="1234 Main St">
                            </div>
                        @endforeach                
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Test Details</h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Reg. No</th>
                                        <th>Test Name</th>
                                        <th class="text-right">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($testDetails as $key => $val)
                                    <tr>
                                        <td scope="row">{{$key+1}}</td>
                                        <td class="text-left">{{$val->regNum}}</td>
                                        <td class="text-left">{{$val->testdetails->testName}}</td>
                                        <!-- <td class="text-right">
                                            <select name="reportStatus" class="custom-select">
                                                <option disabled {{ $val->reportStatus === 0 ? 'selected' : '' }}>--Select Report Status--</option>
                                                <option value="2" {{ $val->reportStatus == 2 ? 'selected' : '' }}>Sample Collecting</option>
                                                <option value="1" {{ $val->reportStatus == 1 ? 'selected' : '' }}>Pending</option>
                                                <option value="3" {{ $val->reportStatus == 3 ? 'selected' : '' }}>Done</option>
                                                <option value="4" {{ $val->reportStatus == 4 ? 'selected' : '' }}>Delivered</option>
                                            </select>
                                        </td> -->
                                        <td class="text-right">
                                            <select name="reportStatus" class="custom-select">
                                                <option value="" selected disabled>--Select Report Status--</option>
                                                <option value="" selected >Sample Collecting</option>
                                                <option value="" selected >Pending</option>
                                                <option value="" selected >Done</option>
                                                <option value="" selected disabled>Delivered</option>
                                            </select>
                                        </td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</section>



    <!-- Required Js -->
    <script src="/assets/js/vendor-all.min.js"></script>
    <script src="/assets/js/plugins/bootstrap.min.js"></script>
    <script src="/assets/js/pcoded.min.js"></script>

<!-- Apex Chart -->
<script src="/assets/js/plugins/apexcharts.min.js"></script>


<!-- custom-chart js -->
<script src="/assets/js/pages/dashboard-main.js"></script>

<script src="/js/testSale.js"></script>
</body>

</html>
