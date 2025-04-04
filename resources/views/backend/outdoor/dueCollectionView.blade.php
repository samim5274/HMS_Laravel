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
        .paid {
            background-color: #28a745;
            color: #fff;
            padding: 2px 6px;
            border-radius: 5px;
        }
        .due {
            background-color: #ffc107;
            color: #fff;
            padding: 2px 6px;
            border-radius: 5px;
            text-decoration: none;
        }
        .return {
            background-color: #dc3545;
            color: #fff;
            padding: 2px 6px;
            border-radius: 5px;
        }
    </style>
    
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
                            <h5 class="m-b-10">Due Collection</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Due Collection Details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">#</th>
                                    <th class="text-left" scope="col">Patient Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Discount</th>
                                    <th scope="col">Received</th>
                                    <th scope="col">Due</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">                            
                                @foreach($testSale as $key => $val)
                                <tr>
                                    <td scope="row">{{$key+1}}</td>
                                    <td class="text-left">{{$val->name}}</td>
                                    <td>{{$val->total}}/-</td>
                                    <td>{{$val->discount}}/-</td>
                                    <td>{{$val->pay}}/-</td>
                                    <td>{{$val->due}}/-</td>
                                    <td>
                                        @if ($val->duestatus == 0)
                                        <span class="status paid">Paid</span>
                                        @elseif ($val->duestatus == 3)
                                        <span class="status return">return</span>
                                        @else
                                            <a href="{{url('/deu-collection/'.$val->id)}}" class="status due ">Due</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach                                
                            </tbody>
                        </table>
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
