<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investigation Input Form</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/testDetails.css">
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

  <div class="container">
      <h2>Investigation Input Form</h2>
      <a href="/dashboard"><button class="btn btn-success" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-down" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M4.854 14.854a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V3.5A2.5 2.5 0 0 1 6.5 1h8a.5.5 0 0 1 0 1h-8A1.5 1.5 0 0 0 5 3.5v9.793l3.146-3.147a.5.5 0 0 1 .708.708z"/>
      </svg> Back</button></a><hr>
      <form action="/add-test-details" method="GET" enctype="multipart/form-data">
          @csrf
          <fieldset>
              <legend>Test Information</legend>
              <label for="test_name"> Name</label>
              <input type="text" id="test_name" name="txtTestName" required>

              <label for="category">Category</label>
              <select id="category" name="cbxCategory" required>
                  <option selected disabled>--Select Category--</option>
                  @foreach($categories as $val)
                  <option value="{{$val->id}}">{{$val->catName}}</option>
                  @endforeach
              </select>
              <div class="loader" id="loader"></div>
              <label for="subcategory">Sub-Category</label>
              <select id="subcategory" name="cbxSubCategory" required>
                  <option selected disabled>--Select Sub-Category--</option>
                  <!-- @foreach($subCategories as $val)
                  <option value="{{$val->id}}">{{$val->subCatName}}</option>
                  @endforeach -->
              </select>

              <label for="Specimen">Specimen</label>
              <select id="Specimen" name="cbxSpecimen" required>
                  <option selected disabled>--Select Specimen--</option>
                  @foreach($Specimens as $val)
                  <option value="{{$val->id}}">{{$val->name}}</option>
                  @endforeach
              </select>

              <label for="GroupName">Group Name</label>
              <select id="GroupName" name="cbxGroup" required>
                  <option selected disabled>--Select Group--</option>
                  @foreach($Group as $val)
                  <option value="{{$val->id}}">{{$val->name}}</option>
                  @endforeach
              </select>
              
              <label for="price">Cost</label>
              <input type="number" id="price" name="txtTestPrice" value="650" required>

              <label for="Rprice">Reference Cost</label>
              <input type="number" id="Rprice" name="txtRPrice" value="500" required>

              <label for="room">Test </label>
              <input type="number" id="room" name="txtRoom" value="103" required>

          </fieldset>

          <button type="submit">Submit</button>
      </form><hr>
      <a href="/dashboard"><button class="btn btn-success" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-down" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M4.854 14.854a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V3.5A2.5 2.5 0 0 1 6.5 1h8a.5.5 0 0 1 0 1h-8A1.5 1.5 0 0 0 5 3.5v9.793l3.146-3.147a.5.5 0 0 1 .708.708z"/>
      </svg> Back</button></a>
  </div>

  <section id="show-test-details">
    <div class="container">
      <div class="row">
        <div class="col">
        <table class="table table-bordered">
          <thead class="text-center">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Test Name</th>
              <th scope="col">Category</th>
              <th scope="col">Sub-Category</th>
              <th scope="col">Specimen</th>
              <th scope="col">Group</th>
              <th scope="col">Price</th>
              <th scope="col">R-Price</th>
              <th scope="col">Room</th>
              <th scope="col">Description</th>
              <th scope="col">Status</th>
              <th scope="col"></th>
              </tr>
          </thead>
          <tbody class="text-center">
            @foreach($testDetils as $i => $row)
            <tr>
                <th scope="row" class="text-center">{{++$i}}</th>
                <td>{{$row->testName}}</td>
                <td>{{$row->categoryId}}</td>
                <td>{{$row->subcategoryId}}</td>
                <td>{{$row->specimenId}}</td>
                <td>{{$row->groupId}}</td>
                <td>{{$row->testPrice}}</td>
                <td>{{$row->rprice}}</td>
                <td>{{$row->room}}</td>
                <td>{{$row->testDescription}}</td>
                <td class="cell"><span class="badge badge-{{$row->status == '1' ? 'success' : 'danger'}}">{{$row->status}}</span></td>
                <td class="p-2 text-center"><a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                </svg></a></td>
            </tr>
            @endforeach
          </tbody>
      </table>
        </div>
      </div>
    </div>
  </section>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                            var html = "<option value=''>--Select Sub Category--</option>";
                            for(let i =0;i<subCategory.length;i++){
                                html += `
                                <option value="`+subCategory[i]['id']+`">`+subCategory[i]['subCatName']+`</option>
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
