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
    
    

</head>
<body>
	
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mt-5">Patient Detail's</h5>
                        <hr>
                        <form>
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
                                        <input type="number" value="{{$val->doctorId}}" class="form-control" disabled id="inputCity">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Reference</label>
                                    <input type="number" value="{{$val->referId}}" class="form-control" disabled id="inputCity">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputCity">Total</label>
                                    <input type="number" value="{{$val->total}}" class="form-control" disabled id="inputCity">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputCity">Discount</label>
                                    <input type="number" value="{{$val->discount}}" class="form-control" disabled id="inputCity">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputCity">Payable</label>
                                    <input type="number" value="{{$val->payable}}" class="form-control" disabled id="inputCity">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputCity">Pay</label>
                                    <input type="number" value="{{$val->pay}}" class="form-control" disabled id="inputCity">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputCity">Pay</label>
                                <input type="number"  class="form-control" id="inputCity" placeholder="Due collection">
                            </div>
                            <button type="submit" class="btn  btn-primary">Submit</button>
                        @endforeach 
                        </form>
                    </div>
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
                                    <th class="text-right">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($store as $key => $val)
                                <tr>
                                    <td scope="row">{{$key+1}}</td>
                                    <td class="text-left">{{$val->regNum}}</td>
                                    <td class="text-left">{{$val->testId}}</td>
                                    <td class="text-right">{{$val->testprice}}/-</td>
                                </tr>
                                @endforeach  
                                <tr>
                                    <td colspan="2">Total Amount</td>
                                    <td></td>
                                    <td class="text-right" colspan="2"><b>${{$sum}}/-</b></td>
                                </tr>  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>




</body>

</html>
