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
	
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Account Expenses</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/expenses-setting">Daily Expenses Settings</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <!-- Category Section -->
                <div class="card">
                    <div class="card-header bg-primary text-white">Add Category</div>
                    <div class="card-body">
                        <form action="/add-expenses-category" method="GET" id="categoryForm">
                            <div class="form-group">
                                <label for="categoryName">Category Name</label>
                                <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter category name" required>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                        <hr>
                        <h5>Category List</h5>
                        <ul id="categoryList" class="list-group">
                            @foreach($category as $val)
                            <li class="list-group">{{$val->id}} - {{$val->category}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <!-- Category Section -->
                <div class="card">
                    <div class="card-header bg-warning">Add Sub - Category</div>
                    <div class="card-body">
                        <form action="/add-expenses-sub-category" method="GET" id="subcategoryForm">
                            <div class="form-group">
                                <label for="categorySelect">Select Category</label>
                                <select class="form-control" id="categorySelect" name="cbxCategory" required>
                                    <option selected disabled>---Choose category---</option>
                                    @foreach($category as $val)
                                    <option value="{{$val->id}}">{{$val->category}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="categoryName">Sub Category Name</label>
                                <input type="text" class="form-control" id="categoryName" name="SubcategoryName" placeholder="Enter sub category name" required>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                        <hr>
                        <h5>Category List</h5>
                        <ul id="categoryList" class="list-group">
                            @foreach($subcategory as $val)
                            <li class="list-group">{{$val->id}} - {{$val->category->category}} - {{$val->subcategory}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



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
