
<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style type="text/css">
    label{
        display: inline-block;
        width: 200px
    }
    input{
        color: black
    }
</style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper" style="margin-top: 100px;margin-right:400px;width:100%">

            <div align="center" class="container">
                <h1 style="color:white">Add Product</h1>
                @if (session()->has('message'))
                <div class="alert alert-success">

                    {{session()->get('message')}}
                    <button type="button" class="close" data-dismiss="alert">X</button>
                </div>
                @endif
                <form action="{{ url('upload_product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding: 10px;display:flex">
                        <label for="">Product title</label>
                        <input style="color:black" type="text" name="title" placeholder="input product title" required>
                    </div>
                    <div style="padding: 10px; display:flex">
                        <label for="">Price</label>
                        <input style="color:black" type="number" name="price" placeholder="input product price" required>
                    </div>
                    <div style="padding: 10px; display:flex">
                        <label for="">Description</label>
                        <input style="color:black" type="text" name="des" placeholder="input product description" required>
                    </div>
                    <div style="padding: 10px; display:flex">
                        <label for="">Quantity</label>
                        <input type="text" style="color:black" name="quantity" placeholder="input product quantity" required>
                    </div>
                    <div style="padding: 10px;text-align:center">
                        <input type="file" name="file" required>
                    </div>
                    <div style="padding: 10px; text-align:center">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
                
            </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>