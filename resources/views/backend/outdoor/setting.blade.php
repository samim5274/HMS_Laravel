<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    
<section id="account-section">
  <div class="">
    <div class="row">
        <div class="col text-center">
          @if(session()->has('success'))
            <div class="alert alert-success">
              {{ session()->get('success') }}
            </div>
          @endif
        </div>
    </div>
  </div>
</section>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Settings Page</h2>
        <a href="/dashboard"><button class="btn btn-success" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-down" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M4.854 14.854a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V3.5A2.5 2.5 0 0 1 6.5 1h8a.5.5 0 0 1 0 1h-8A1.5 1.5 0 0 0 5 3.5v9.793l3.146-3.147a.5.5 0 0 1 .708.708z"/>
      </svg> Back</button></a>
        <!-- Category Section -->
        <div class="card">
            <div class="card-header bg-primary text-white">Add Category</div>
            <div class="card-body">
                <form id="categoryForm">
                    <div class="form-group">
                        <label for="categoryName">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" placeholder="Enter category name" required>
                    </div>
                    <button type="submit" class="btn btn-success">Add Category</button>
                </form>
                <hr>
                <h5>Category List</h5>
                <ul id="categoryList" class="list-group">
                    @foreach($categories as $val)
                    <li class="list-group">{{$val->catName}}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Subcategory Section -->
        <div class="card">
            <div class="card-header bg-info text-white">Add Subcategory</div>
            <div class="card-body">
                <form id="subcategoryForm" action="/add-sub-category" method="GET">
                    <div class="form-group">
                        <label for="categorySelect">Select Category</label>
                        <select class="form-control" id="categorySelect" name="cbxCategory" required>
                            <option selected disabled>---Choose category---</option>
                            @foreach($categories as $val)
                            <option value="{{$val->id}}">{{$val->catName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategoryName">Subcategory Name</label>
                        <input type="text" name="txtsubcategoryName" class="form-control" id="subcategoryName" placeholder="Enter subcategory name" required>
                    </div>
                    <button type="submit" class="btn btn-success">Add Subcategory</button>
                </form>
                <hr>
                <h5>Subcategory List</h5>
                <ul id="subcategoryList" class="list-group">
                    @foreach($subCategories as $val)
                    <li class="list-group">{{$val->catId}} {{$val->subCatName}}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Specimen Section -->
        <div class="card">
            <div class="card-header bg-info text-white">Add Specimen</div>
            <div class="card-body">
                <form id="Specimen" action="/add-specimen" method="GET">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="Specimen">Specimen Name</label>
                            <input type="text" class="form-control" id="Specimen" name="txtSpecimen" placeholder="Enter Specimen name" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Add Specimen</button>
                </form>
                <hr>
                <h5>Specimen List</h5>
                <ul id="Specimen" class="list-group">
                    @foreach($Specimens as $val)
                    <li class="list-group">{{$val->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Group Section -->
        <div class="card">
            <div class="card-header bg-info text-white">Add Group</div>
            <div class="card-body">
                <form id="Group" action="/add-group" method="GET">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="Group">Group Name</label>
                            <input type="text" class="form-control" id="Group" name="txtGroup" placeholder="Enter Group name" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Add Group</button>
                </form>
                <hr>
                <h5>Group List</h5>
                <ul id="Group" class="list-group">
                    @foreach($Group as $val)
                    <li class="list-group">{{$val->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Doctor Section -->
        <div class="card">
            <div class="card-header bg-info text-white">Add Doctor</div>
            <div class="card-body">
                <form id="Group" action="/add-doctor" method="GET">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="Group">Doctor Name</label>
                            <input type="text" class="form-control" id="Group" name="txtDoctor" placeholder="Enter doctor name" required>
                        </div>
                        <div class="form-group">
                            <label for="Designation">Doctor Designation</label>
                            <input type="text" class="form-control" id="Designation" value="MBBS, FCPS, ABS" name="txtDesignation" placeholder="Enter Designation name" required>
                        </div>
                        <div class="form-group">
                            <label for="Phone">Doctor Phone</label>
                            <input type="number" class="form-control" id="Phone" value="1762164746" name="txtPhone" placeholder="Enter Phone +880" required>
                        </div>
                        <div class="form-group">
                            <label for="Fee">Doctor Fee</label>
                            <input type="number" class="form-control" id="Fee" value="500" name="txtFee" placeholder="Enter Fee" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Add Dcotor</button>
                </form>
                <hr>
                <h5>Reference List</h5>
                <ul id="Group" class="list-group">
                    @foreach($doctor as $val)
                    <li class="list-group">{{$val->doctName}} - {{$val->doctDesignation}} - ${{$val->doctFee}}/-</li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Reference Section -->
        <div class="card">
            <div class="card-header bg-info text-white">Add Reference</div>
            <div class="card-body">
                <form id="Group" action="/add-reference" method="GET">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="Group">Reference Name</label>
                            <input type="text" class="form-control" id="Group" name="txtReference" placeholder="Enter Reference name" required>
                        </div>
                        <div class="form-group">
                            <label for="Address">Reference Address</label>
                            <input type="text" class="form-control" id="Address" value="Gazipur, Dhaka" name="txtAddress" placeholder="Enter Address name" required>
                        </div>
                        <div class="form-group">
                            <label for="Phone">Reference Phone</label>
                            <input type="number" class="form-control" id="Phone" value="1762164746" name="txtPhone" placeholder="Enter Phone +880" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Add Reference</button>
                </form>
                <hr>
                <h5>Reference List</h5>
                <ul id="Group" class="list-group">
                    @foreach($refer as $val)
                    <li class="list-group">{{$val->refName}} - {{$val->refAddress}} - {{$val->refPhone}} </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>