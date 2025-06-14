<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>Sixteen Clothing HTML Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
  <link rel="stylesheet" href="assets/css/owl.css">
</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="preloader">
    <div class="jumper">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- Header -->
  @include('user.header')

  <div style="padding: 100px" align="center">

    <table style="margin-top: 100px">
      <tr style="background-color: tomato">
        <th style="padding: 20px;font-size:20px">Product Name</th>
        <th style="padding: 20px;font-size:20px">Quantity</th>
        <th style="padding: 20px;font-size:20px">Price</th>
        <th style="padding: 20px;font-size:20px">Total</th>
        <th style="padding: 20px;font-size:20px">Action</th>
      </tr>

      <form action="{{url('order')}}" method="POST">
        @csrf

        @php
          $total = 0;
        @endphp

        @foreach ($cart as $carts)
          @php
            $itemTotal = $carts->price * $carts->quantity;
            $total += $itemTotal;
          @endphp

          <tr align="center">
            <td style="padding: 10px">
              <input type="text" name="productname[]" value="{{$carts->product_title}}" hidden>
              {{$carts->product_title}}
            </td>
            <td style="padding: 10px">
              <input type="text" name="quantity[]" value="{{$carts->quantity}}" hidden>
              {{$carts->quantity}}
            </td>
            <td style="padding: 10px">
              <input type="text" name="price[]" value="{{$carts->price}}" hidden>
              ${{$carts->price}}
            </td>
            <td style="padding: 10px">
              ${{$itemTotal}}
            </td>
            <td>
              <a href="{{url('delete_cart',$carts->id)}}" class="btn btn-danger">Delete</a>
            </td>
          </tr>
        @endforeach

        <tr align="center">
          <td colspan="3" style="padding: 20px; font-weight: bold;">Grand Total</td>
          <td style="padding: 10px; font-weight: bold;">${{$total}}</td>
          <td></td>
        </tr>
      </table>

      <button class="btn btn-success">Confirm Order</button>
      <a href="{{url('stripe',$total)}}" class="btn btn-success">Pay using Card</a>
    </form>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.
              - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Additional Scripts -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/owl.js"></script>
  <script src="assets/js/slick.js"></script>
  <script src="assets/js/isotope.js"></script>
  <script src="assets/js/accordions.js"></script>
  <script src="https://kit.fontawesome.com/0179416403.js" crossorigin="anonymous"></script>

  <script language="text/Javascript">
    cleared = [0, 0, 0]; // Ensure this array exists
    function clearField(t) {
      if (!cleared[t.id]) {
        cleared[t.id] = 1;
        t.value = '';
        t.style.color = '#fff';
      }
    }
  </script>

</body>

</html>
