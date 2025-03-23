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
    
</head>
<body class="">
	
	<!-- [ navigation menu ] start -->
    @include('layouts.menu')
	<!-- [ navigation menu ] end -->


<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Account Reports Analytics</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/test-sale-report">Account Reports</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Total Dignosis Test Sale</h5>
                    <hr>
                    <button class="btn btn-primary  m-t-5" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Total Sales</button>
                </div>
                <div class="collapse" id="collapseExample">
                    <div class="card-body">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body table-border-style">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th class="text-center">Total</th>
                                                    <th class="text-center">Discount</th>
                                                    <th class="text-center">Due</th>
                                                    <th class="text-center">Payable</th>
                                                    <th class="text-right">Received</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($testSale as $key => $val)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$val->name}}</td>
                                                    <td class="text-center">{{$val->total}}/-</td>
                                                    <td class="text-center">{{$val->discount}}/-</td>
                                                    <td class="text-center">{{$val->due}}/-</td>
                                                    <td class="text-center">{{$val->payable}}/-</td>
                                                    <td class="text-right">{{$val->pay}}/-</td>
                                                </tr>   
                                                @endforeach   
                                                <tr>
                                                    <td colspan="2"><strong>Total: </strong></td>
                                                    <td class="text-center"><strong>{{$sum3}}/-</td>
                                                    <td class="text-center"><strong>{{$sum4}}/-</strong></td>
                                                    <td class="text-center"><strong>{{$sum4}}/-</strong></td>
                                                    <td class="text-center"><strong>{{$sum2}}/-</strong></td>
                                                    <td class="text-right"><strong>{{$sum}}/-</strong></td>
                                                </tr>                                          
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
