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
                            <h5 class="m-b-10">Dignostic Test Return</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Dignostic Test Return Details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="">
            <h2 class="text-center">Diagnostic Test Return</h2>
            <form method="GET" action="#" class="form-inline justify-content-center mb-4">
                <input class="form-control mr-sm-2" type="search" name="txtSearch" placeholder="Search by Reg. No" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <div class="card">
                <div class="card-header bg-primary text-white">Test Return Details</div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead class="">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col">Invoice</th>
                                <th scope="col">Patient Name</th>
                                <th scope="col" class="text-center">Date</th>
                                <th scope="col" class="text-center">Total</th>
                                <th class="text-center" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($testSale as $key => $val)
                                <tr>
                                    <th scope="row" class="text-center">{{$key+1}}</th>
                                    <td>{{$val->reg}}</td>
                                    <td>{{$val->name}}</td>
                                    <td class="text-center">{{$val->date}}</td>
                                    <td class="text-center">{{$val->total}}</td>
                                    <td class="text-center">
                                        <a href="{{url('/test-return/'.$val->reg)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                        </svg> Return</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
