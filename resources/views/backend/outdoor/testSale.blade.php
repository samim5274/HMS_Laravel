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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	

<div class="pcoded-main-container">
<div id="input-section">
    <div class="container">

        <h2 class="text-center display-4">Digonestic Test Salte Details</h2><hr>
        <a href="/dashboard"><button class="btn btn-success" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-down" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M4.854 14.854a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V3.5A2.5 2.5 0 0 1 6.5 1h8a.5.5 0 0 1 0 1h-8A1.5 1.5 0 0 0 5 3.5v9.793l3.146-3.147a.5.5 0 0 1 .708.708z"/>
      </svg> Back</button></a>
        <div class="row ">
            <div class="col-md-6">
                <div class="bg-light mt-3 overflow-auto" >
                    <table class="table table-bordered bg-transparent text-dark">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Test Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($testDetils as $key => $val)
                            <tr>
                                <td scope="row">{{$val->id}}</td>
                                <td class="text-left">{{$val->testName}}</td>
                                <td class="text-right">{{$val->testPrice}}/-</td>
                                <td><a href="{{url('/add-item/'.$val->id)}}"><i class="fa fa-plus-circle" style="font-size:20px;color:green"></i></a></td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="2">Total Amount</td>
                                <td colspan="2">${{$testsum}}/-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-light mt-3 overflow-auto" >
                    <table class="table table-bordered bg-transparent text-dark">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Reg. No</th>
                                <th scope="col">Test Name</th>
                                <th scope="col">Amount</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">                            
                            @foreach($store as $key => $val)
                            <tr>
                                <td scope="row">{{$key+1}}</td>
                                <td class="text-left">{{$val->regNum}}</td>
                                <td class="text-left">{{$val->testdetails->testName}}</td>
                                <td class="text-right">{{$val->testprice}}/-</td>
                                <td><a href="{{url('/remove-item/'.$val->id)}}"><i class="fa fa-remove" style="font-size:20px;color:red"></a></td>
                            </tr>
                            @endforeach  
                            <tr>
                                <td colspan="2">Total Amount</td>
                                <td colspan="2">${{$sum}}/-</td>
                            </tr>             
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-12 ">                
                <form method="GET" action="/add-test-sale" enctype="multipart/from-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" placeholder="Name" value="Shamim Hossain" name="txtName" id="name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" id="dob" value="2001-12-31" name="dtpDob" class="form-control">
                        </div>                        
                    </div>
                    <div class="row mt-4">                        
                        <div class="col-md-6">
                            <label for="gender">Gender</label><br>
                            <input type="radio" id="Male" name="slcGender" checked value="Male">
                            <label for="Male">Male</label>&emsp;&emsp;
                            <input type="radio" id="Female" name="slcGender" value="Female">
                            <label for="Female">Female</label>&emsp;&emsp;
                            <input type="radio" id="Other" name="slcGender"  value="Other">
                            <label for="Other">Other</label>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <div class="input-group">
                                <span class="input-group-text">+880</span>
                                <input type="number" class="form-control" placeholder="Phone" value="1762164746" name="txtPhone" id="phone">
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="address" class="form-label">Address</label>
                        <input type="tezt" class="form-control" placeholder="Address" value="Kaliakair, Gazipur, Dhaka, Bangladesh" name="txtAddress" id="address">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="doctor" class="form-label">Doctors</label>
                            <select name="cbxDoctor" required class="custom-select" id="doctor">
                                <option selected disabled>--Select Doctor--</option>
                                @foreach($doctor as $key => $val)
                                <option value="{{$val->id}}">{{$val->doctName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="refer" class="form-label">Reference</label>
                            <select name="cbxRefer"  class="custom-select" id="refer">
                                <option selected required disabled>--Select Reference--</option>
                                @foreach($refer as $key => $val)
                                <option value="{{$val->id}}">{{$val->refName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col bg-color my-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class=" my-2 ">
                                    <label for="" class="form-label display-4 text-success">Actual: {{$sum}}/-</label>
                                    <input type="number" class="form-control" hidden disabled id="num1" name="txtTotal" value="{{$sum}}">
                                </div>
                                <div class=" my-2 ">
                                    <p id="result" name="reminderAmount" class="display-4 text-info">Amount: 00/-</p>
                                </div>
                            </div>
                            <div class="col-md-6">                                
                                <div class=" my-2 ">
                                    <label for="" class="form-label">Discount</label>
                                    <input placeholder="Discount" type="number" onkeyup="sumNumbers()" id="num3"  name="txtDiscount" required value="0" class="form-control">
                                </div>
                                <div class=" my-2 ">
                                    <label for="" class="form-label">Received</label>
                                    <input placeholder="Received Amount" required type="number" onkeyup="sumNumbers()" id="num2" name="txtReceived" class="form-control">
                                </div>
                            </div>                              
                        </div>
                    </div>
                    <button class="btn btn-success btn-block mx-3" id="btnSave" disabled>Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
</div>

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
