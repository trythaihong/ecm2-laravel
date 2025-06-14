
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
        <div class="container-fluid page-body-wrapper" style="margin-top: 100px;margin-right:400px;width:100%">

            <div align="center" class="container">
                @if (session()->has('message'))
                <div class="alert alert-success">

                    {{session()->get('message')}}
                    <button type="button" class="close" data-dismiss="alert">X</button>
                </div>
                @endif
                <table>
                    <tr style="background-color: tomato" align="center">
                        <th style="padding: 10px">Title</th>
                        <th style="padding: 10px">Des</th>
                        <th style="padding: 10px">Quantity</th>
                        <th style="padding: 10px">Price</th>
                        <th style="padding: 10px">Image</th>
                        <th style="padding: 10px">Update</th>
                        <th style="padding: 10px">Delete</th>
                    </tr>
                    @foreach ($data as $product)
                        
                    <tr style="" align="center">
                        <td style="padding: 10px">{{$product->title}}</td>
                        <td style="padding: 10px">{{$product->des}}</td>
                        <td style="padding: 10px">{{$product->quantity}}</td>
                        <td style="padding: 10px">{{$product->price}}$</td>
                        <td><img style="width:100;height:100;padding: 10px" src="/productimage/{{$product->image}}" alt=""></td>
                        <td><a href="{{url('update_product',$product->id)}}" class="btn btn-success">edit</a></td>
                        <td><a onclick="return confirm('You want delete?')" href="{{url('delete_product',$product->id)}}" class="btn btn-danger">delete</a></td>
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