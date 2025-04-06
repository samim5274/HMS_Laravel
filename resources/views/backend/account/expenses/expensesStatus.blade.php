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
                            <li class="breadcrumb-item"><a href="/expenses-report">Daily Expenses</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="card">
            <div class="card-header bg-warning">Daily Expenses Status</div>
            <div class="card-body">
                <form action="/daily-expenses-status-update" method="GET" enctype="multipart/form-data">
                    @csrf
                    <div class="row">                        
                    <div class="col-md-6">
                            <label for="doctor" class="form-label">Category</label>
                            <select id="category" disabled name="cbxCategory" required class="custom-select" id="doctor">
                                <option selected disabled>--Select Category--</option>
                                @foreach($category as $val)
                                <option value="{{$val->id}}" @if(isset($data) && $data->catId == $val->id) selected @endif>{{$val->category}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="refer" class="form-label">Sub-Category</label>
                            <select id="subcategory" disabled name="cbxSubCategory" class="custom-select" id="refer">
                                <option selected required disabled>--Select Sub-Category--</option>
                                @foreach($subcategory as $val)
                                <option value="{{$val->id}}" @if(isset($data) && $data->subCatId == $val->id) selected @endif>{{$val->subcategory}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <label for="categoryName">Amount</label>
                                <input type="number" disabled class="form-control" value="{{$data->amount}}" name="txtAmount" placeholder="Enter expenses Amount" required>
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <label for="categoryName">Remark's</label>
                                <input type="text" disabled class="form-control" name="txtRemarks" placeholder="Remark's" value="{{$data->remark}}" required>
                            </div>
                        </div>                        
                        <div class="col-md-12 mt-4">
                            <label for="refer1" class="form-label">Status</label>
                            <select id="" name="cbxStatus" class="custom-select" id="refer1">
                                <option selected required disabled>--Select Status--</option>
                                <option value="0">Pendding</option>
                                <option value="1">Processing</option>
                                <option value="2">Approved</option>
                                <option value="3">Reject</option>
                            </select>
                        </div>
                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <input type="submit" class="form-control btn-info" value="Update">
                            </div>
                        </div>
                    </div>
                </form>
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

<script>
        $(document).ready(function(){
            var loader = $('#loader');
            var categoryId = $('#subcategory');
            loader.hide();
            $('#category').change(function(){
                var categoryId = $(this).val();
                // console.log(categoryId);
                if(categoryId == "")
                {
                    $("#subcategory").html("<option value='' disabled selected>--Select Category--</option>");
                }
                else
                {
                    loader.show();
                    $.ajax({
                        url:"/get-sub-category/"+categoryId,
                        type:"GET",
                        success:function(data){
                            var subCategory = data.subCategory;
                            var html = "<option value='' disabled>--Select Sub Category--</option>";
                            for(let i =0;i<subCategory.length;i++){
                                html += `
                                <option value="`+subCategory[i]['id']+`">`+subCategory[i]['subcategory']+`</option>
                                `;
                            }
                            $("#subcategory").html(html);
                            loader.hide();
                        }
                    });
                }

            });
        });
    </script>

</body>

</html>
