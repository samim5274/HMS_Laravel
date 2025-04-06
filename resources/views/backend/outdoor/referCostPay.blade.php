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

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Reference by - {{$refers->refName}} & Patient - {{$testSale[0]->name}}</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/refer-cost-view">Reference List</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/refer-cost-find/'.$refers->id)}}">Patient list</a></li>
                            <li class="breadcrumb-item"><a href="#">Refer Cost Payment</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <h5 class="mb-3">Dignostic Test Detail's </h5>
                            <div class="table-responsive">
                                <table class="table table-hover ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>test name</th>
                                            <th class="text-center">refer. Cost</th>
                                            <th class="text-right">price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($store as $key => $val)
                                        <tr>
                                            <td scope="row">{{$key+1}}</td>
                                            <td class="text-left">{{$val->testdetails->testName}}</td>
                                            <td class="text-center">${{$val->testdetails->rprice}}/-</td>
                                            <td class="text-right">${{$val->testdetails->testPrice}}/-</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2">Total:</td>
                                            <td class="text-center">${{$referCostSum}}/-</td>
                                            <td class="text-right">${{$sum}}/-</td>
                                        </tr>
                                    </tbody>                      
                                </table>
                                <form action="{{url('/refer-cost-pay/'.$store[0]->regNum)}}" method="GET" class="form-inline">
                                    @csrf
                                    <input style="width:100%" type="text" class="form-control" name="txtPaid" value="{{$referCostSum}}" placeholder="Paid Amount" required hidden>
                                        <input style="width:100%" type="text" class="form-control" name="txtRemark" value="N/A" placeholder="Remark's" required hidden>
                                    <button class="btn btn-success">Pay Bill</button>
                                </form>
                            </div>                     
                        </div>                     
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>


    <!-- Required Js -->
    <script src="/assets/js/vendor-all.min.js"></script>
    <script src="/assets/js/plugins/bootstrap.min.js"></script>
    <script src="/assets/js/pcoded.min.js"></script>

<!-- Apex Chart -->
<script src="/assets/js/plugins/apexcharts.min.js"></script>


<!-- custom-chart js -->
<script src="/assets/js/pages/dashboard-main.js"></script>
</body>

</html>
