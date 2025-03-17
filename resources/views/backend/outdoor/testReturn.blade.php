<!DOCTYPE html>
<html lang="en">

<head>
    <title>Flat Able - Premium Admin Template by Phoenixcoded</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    
    <link rel="icon" href="/assets/images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="/assets/css/style.css">
    <style>
        button{
            width: 100%;
        }
    </style>

</head>
<body>

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
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <h5 class="mt-2 text-center display-4">Test Return</h5> -->
                        <h5 class="mt-2">Patient Detail's</h5>
                        <hr>
                        <form method="GET" action="/due-collection-update/{{$testSale[0]->id}}" enctype="multipart/from-data">
                        @foreach($testSale as $key => $val)
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Full Name</label>
                                    <input type="text" class="form-control" disabled id="inputEmail4" value="{{$val->name}}" placeholder="Full Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Phone</label>
                                    <input type="number" class="form-control" disabled id="inputPassword4" value="{{$val->phone}}" placeholder="Phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input type="text" class="form-control" disabled id="inputAddress" value="{{$val->address}}" placeholder="1234 Main St">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label for="inputState">Doctor</label>
                                        <input type="number" value="{{$val->doctorId}}" class="form-control" disabled id="xxxxxxxx">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Reference</label>
                                    <input type="number" value="{{$val->referId}}" class="form-control" disabled id="xxxxxxxx">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="xxxxxxxx">Total</label>
                                    <input type="number" value="{{$val->total}}" class="form-control" disabled id="xxxxxxxx">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="xxxxxxxx">Discount</label>
                                    <input type="number" value="{{$val->discount}}" class="form-control" disabled id="xxxxxxxx">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="xxxxxxxx">Payable</label>
                                    <input type="number" value="{{$val->payable}}" class="form-control" disabled id="xxxxxxxx">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="xxxxxxxx">Pay</label>
                                    <input type="number" value="{{$val->pay}}" class="form-control" disabled id="xxxxxxxx">
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                            <h5 class="mb-3">Dignostic Test Detail's</h5>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Reg. No</th>
                                            <th>Test Name</th>
                                            <th class="text-right">Price</th>
                                            <th class="text-right">Return</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($storeTest as $key => $val)
                                        <tr>
                                            <td scope="row">{{$key+1}}</td>
                                            <td class="text-left">{{$val->regNum}}</td>
                                            <td class="text-left">{{$val->testdetails->testName}}</td>
                                            <td class="text-right">{{$val->testprice}}/-</td>
                                            <!-- <td class="text-right"><a href="{{url('/test-return-status/'.$val->id)}}">{{ $val->status == 0 ? 'Returned' : 'Not Returned' }}</a></td> -->
                                            <td class="text-right">
                                                <a href="{{ url('/test-return-status/'.$val->id) }}" 
                                                class="{{ $val->status == 0 ? 'text-red-500' : 'text-green-500' }}">
                                                    {{ $val->status == 0 ? 'Returned' : 'Not Returned' }}
                                                </a>
                                            </td>

                                        </tr>
                                        @endforeach  
                                        <tr>
                                            <td colspan="2">Total Amount</td>
                                            <td class="text-right" colspan="2"><b>${{$sum}}/-</b></td>
                                            <td></td>
                                        </tr>  
                                    </tbody>
                                </table>
                            </div>
                            <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                        @endforeach 
                        </form>                        
                    </div><a href="/test-sale-return-view"><button class="btn btn-info" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.854 14.854a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V3.5A2.5 2.5 0 0 1 6.5 1h8a.5.5 0 0 1 0 1h-8A1.5 1.5 0 0 0 5 3.5v9.793l3.146-3.147a.5.5 0 0 1 .708.708z"/>
                </svg> Back</button></a>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>

    <script src="/js/testSale.js"></script>


</body>

</html>
