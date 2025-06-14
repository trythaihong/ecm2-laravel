
<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
    th{
        padding: 10px
    }
    td{
        padding: 10px
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
        <div class="container-fluid page-body-wrapper" style="margin-top: 100px;margin-right:200px;width:100%">

            <div align="center" class="container">
                <table>
                    <tr style="background-color: tomato" align="center"> 
                        <th>Customer name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Product_title</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($order as $orders)
                    <tr align="center">
                        <td>{{ $orders->name }}</td>
                        <td>{{ $orders->phone }}</td>
                        <td>{{ $orders->address }}</td>
                        <td>{{ $orders->product_name }}</td>
                        <td>{{ $orders->price }}</td>
                        <td>{{ $orders->quantity }}</td>
                        <td style="color:yellow">{{ $orders->status }}</td>
                        <td><a href="{{url('update_status',$orders->id)}}" class="btn btn-success">Delivered</a></td>
                        <td><a href="{{ url('delete', $orders->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
                
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