
<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
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
       
        <div class="container-fluid page-body-wrapper" style="margin-top: 100px;margin-right:400px">
         
                <center style="margin-left: 250px">
                    <table>
                        <tr style="height:30px;background-color: tomato" align="center">
                            <th style="padding: 10px">Name</th>
                            <th style="padding: 10px">email</th>
                            <th style="padding: 10px">phone</th>
                            <th style="padding: 10px">address</th>
                            <th style="padding: 10px">usertype</th>
                            <th style="padding: 10px">delete</th>
                            <th style="padding: 10px">Edit</th>
                    
                        </tr>
                    
                        @foreach ($data as $data)
                        <tr style="" align="center">
                            <td style="padding: 10px">{{$data->name}}</td>
                            <td style="padding: 10px">{{$data->email}}</td>
                            <td style="padding: 10px">{{$data->phone}}</td>
                            <td style="padding: 10px">{{$data->address}}</td>
                            <td style="padding: 10px">{{$data->usertype}}</td>
                            <td><a href="{{url('delete_user',$data->id)}}" onclick="return confirm('are you sure')" class="btn btn-danger">remove</a></td>
                            <td><a href="{{url('update_user',$data->id)}}"  class="btn btn-success">edit</a></td>
                    
                        </tr>
                        @endforeach
                    </table>
                </center>
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