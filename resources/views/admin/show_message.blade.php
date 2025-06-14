
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
         
                <table>
           
                    <tr style="height:30px;background-color: tomato" align="center">
                        <th style="padding: 10px">Name</th>
                        <th style="padding: 10px">email</th>
                        <th style="padding: 10px">phone</th>
                        <th style="padding: 10px">message</th>
                        <th style="padding: 10px">delete</th>
                       
                    </tr>
                    
                    <tr style="" align="center">
                      @foreach ($data as $data)
                        <td style="padding: 10px">{{$data->name}}</td>
                        <td style="padding: 10px">{{$data->email}}</td>
                        <td style="padding: 10px">{{$data->phone}}</td>
                        <td style="padding: 10px">{{$data->message}}$</td>
                        <td><a href="{{url('delete_message',$data->id)}}" onclick="return confirm('are you sure')" class="btn btn-danger">remove</a></td>
                        
                        @endforeach
                    </tr>
                </table>
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