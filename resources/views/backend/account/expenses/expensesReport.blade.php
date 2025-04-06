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
        .Approve {
            background-color: #28a745;
            color: #fff;
            padding: 2px 6px;
            border-radius: 5px;
        }
        .Pendding {
            background-color: #ffc107;
            color:rgb(0, 0, 97);
            padding: 2px 6px;
            border-radius: 5px;
            text-decoration: none;
        }
        .Processing {
            background-color:rgb(45, 0, 248);
            color: #fff;
            padding: 2px 6px;
            border-radius: 5px;
        }
        .Reject {
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
                            <h5 class="m-b-10">Daily Expenses Analytics</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/expenses-report">Expenses Reports</a></li>
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
                    <div class="card-header">
                        <h5>Search Your Data specific date wise report.</h5>
                    </div>
                    <div class="card-body">
                        <form class="theme-form" action="/search-date-wise-report" method="GET">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="floating-label" for="Email">Start Date</label>
                                        <input name="dtpStartDate" type="date" id="currentDate" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="floating-label" for="Text">End</label>
                                        <input name="dtpEndDate" type="date" id="beforeDate" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="floating-label" for="">Search</label>
                                        <button type="submit" class=" form-control btn-info">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
			<!-- [ tabs ] start -->
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h5>Total Sales Report: {{ now()->format('d M-Y'); }}</h5>
					</div>
					<div class="card-body">
						<ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Today</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-uppercase" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Last 7 day's</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-uppercase" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Last 30 day's</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">                            
                                <div class="col-sm-12">
                                    <div class="card">                                
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                            <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Date</th>
                                                            <th class="text-center">Category</th>
                                                            <th class="text-center">Sub-Category</th>
                                                            <th class="text-center">Amount</th>
                                                            <th class="text-right">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($expenses as $key => $val)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$val->date}}</td>
                                                            <td class="text-center">{{$val->category->category}}</td>
                                                            <td class="text-center">{{$val->subcategory->subcategory}}</td>
                                                            <td class="text-center">{{$val->amount}}</td>
                                                            <td class="text-right">
                                                                @if ($val->status == 0)
                                                                <a href="{{url('/expenses-status-view/'.$val->id)}}" class="status Pendding ">Pendding</a>
                                                                @elseif ($val->status == 1)
                                                                <a href="{{url('/expenses-status-view/'.$val->id)}}" class="status Processing ">Processing</a>
                                                                @elseif ($val->status == 2)
                                                                <span class="status Approve">Approve</span>
                                                                @else
                                                                    <a href="{{url('/expenses-status-view/'.$val->id)}}" class="status Reject ">Reject</a>
                                                                @endif
                                                            </td>
                                                        </tr>   
                                                        @endforeach 
                                                        <tr>
                                                            <td class="text-center">Total: ${{$today}}/-</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</div>
							<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="col-sm-12">
                                    <div class="card">                                
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Date</th>
                                                            <th class="text-center">Category</th>
                                                            <th class="text-center">Sub-Category</th>
                                                            <th class="text-center">Amount</th>
                                                            <th class="text-right">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($last7Days as $key => $val)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$val->date}}</td>
                                                            <td class="text-center">{{$val->category->category}}</td>
                                                            <td class="text-center">{{$val->subcategory->subcategory}}</td>
                                                            <td class="text-center">{{$val->amount}}</td>
                                                            <td class="text-right">
                                                                @if ($val->status == 0)
                                                                <a href="#" class="status Pendding ">Pendding</a>
                                                                @elseif ($val->status == 1)
                                                                <a href="#" class="status Processing ">Processing</a>
                                                                @elseif ($val->status == 2)
                                                                <span class="status Approve">Approve</span>
                                                                @else
                                                                    <a href="#" class="status Reject ">Reject</a>
                                                                @endif
                                                            </td>
                                                        </tr>   
                                                        @endforeach   
                                                        <tr>
                                                            <td class="text-center">Total: ${{$today7}}/-</td>
                                                        </tr>                     
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
							</div>
							<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="col-sm-12">
                                    <div class="card">                                
                                        <div class="card-body table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Date</th>
                                                            <th class="text-center">Category</th>
                                                            <th class="text-center">Sub-Category</th>
                                                            <th class="text-center">Amount</th>
                                                            <th class="text-right">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($last30Days as $key => $val)
                                                        <tr>
                                                            <td>{{$key+1}}</td>
                                                            <td>{{$val->date}}</td>
                                                            <td class="text-center">{{$val->category->category}}</td>
                                                            <td class="text-center">{{$val->subcategory->subcategory}}</td>
                                                            <td class="text-center">{{$val->amount}}</td>
                                                            <td class="text-right">
                                                                @if ($val->status == 0)
                                                                <a href="#" class="status Pendding ">Pendding</a>
                                                                @elseif ($val->status == 1)
                                                                <a href="#" class="status Processing ">Processing</a>
                                                                @elseif ($val->status == 2)
                                                                <span class="status Approve">Approve</span>
                                                                @else
                                                                    <a href="#" class="status Reject ">Reject</a>
                                                                @endif
                                                            </td>
                                                        </tr>   
                                                        @endforeach  
                                                        <tr>
                                                            <td class="text-center">Total: ${{$today30}}/-</td>
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
<script src="/js/main.js"></script>
</body>

</html>
