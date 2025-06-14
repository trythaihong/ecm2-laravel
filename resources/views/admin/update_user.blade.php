
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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
                <form action="{{ url('edit_userid',$data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding: 10px;display:flex">
                        <label for="">Name</label>
                        <input style="color:black" type="text"value="{{$data->name}}" name="name"required>
                    </div>
                    <div style="padding: 10px; display:flex">
                        <label for="">email</label>
                        <input style="color:black" type="text" value="{{$data->email}}" name="email"required>
                    </div>
                    <div style="padding: 10px; display:flex">
                        <label for="">phone</label>
                        <input style="color:black" type="text" value="{{$data->phone}}" name="phone"required>
                    </div>
                    <div style="padding: 10px; display:flex">
                        <label for="">Usertype</label>
                        <input style="color:black" type="text" value="{{$data->usertype}}" name="usertype"required>
                    </div>
                    <div style="padding: 10px; display:flex">
                        <label for="">address</label>
                        <input type="text" style="color:black" value="{{$data->address}}" name="address"required>
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