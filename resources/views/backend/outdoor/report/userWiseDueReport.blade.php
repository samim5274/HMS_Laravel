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
                            <h5 class="m-b-10">Account Reports Analytics</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/test-sale-report">Account Reports</a></li>
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
                        <h5>User wise due report.</h5>
                    </div>
                    <div class="card-body">
                        <form class="theme-form" action="/search-user-wise-due-report" method="GET">
                            <div class="row">
                                <!-- <div class="col-sm-8">
                                    <div class="form-group">
                                        <label class="floating-label" for="">Select User</label>
                                        <input name="txtUsername" type="text" required class="form-control" placeholder="Enter Username">
                                    </div>
                                </div> -->
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label class="floating-label" for="">Select User</label>
                                        <select class="form-control" name="cbxUsername" id="">
                                            <option value="0" disabled selected>--select user name--</option>
                                            @foreach($users as $val)
                                            <option value="{{$val->id}}">{{$val->name}}</option>
                                            @endforeach
                                        </select>
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
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h5>Total Sales Report</h5>
					</div>                    
					<div class="card-body">
						<ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active text-uppercase" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Today</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">                            
                                <div class="col-sm-12">
                                    <div class="card">                                
                                        <div class="card-body table-border-style">
                                            <div class="text-right">
                                                <a href="#"><button class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16"><path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/><path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"/></svg></button></a>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Patient Name</th>
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
                                                            <td class="text-center">{{$total}}/-</td>
                                                            <td class="text-center">{{$discount}}/-</td>
                                                            <td class="text-center text-danger due"><strong>{{$due}}/-</strong></td>
                                                            <td class="text-center">{{$payable}}/-</td>
                                                            <td class="text-right">{{$pay}}/-</td>
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

</body>

</html>
