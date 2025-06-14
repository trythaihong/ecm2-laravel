
<div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            {{-- <a href="products.html">view all products <i class="fa fa-angle-right"></i></a> --}}
            <form action="{{url('search')}}" class="form-inline" method="get" style="float: right;padding:10px">
              @csrf
              <input type="text" class="form-control" name="search" type="search" placeholder="search product">
              <input type="submit" value="search" class=" btn btn-primary">
            </form>
          </div>
        </div>

        @foreach ($data as $product)
            
        <div class="col-md-4"  style="text-align: center">
          <div class="product-item" style="text-align: center">
            <a href="#"><img style="height:200px;width:100" src="/productimage/{{$product->image}}" alt=""></a>
            <div class="down-content">
              <a href="#"><h4>{{$product->title}}</h4></a>
              <h6>{{$product->price}}$</h6>
              <p>{{$product->des}}</p>
              <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
              </ul>
                <form action="{{url('add_card',$product->id)}}" method="post" align="center">
                  @csrf
                  <input type="number" style="" class="form-control" value="1" min="1" style="width: 100px" name="quantity">
                  <br>
                  <input type="submit" class="btn btn-success" value="add card">
                </form>
            </div>
          </div>
        </div>
        @endforeach
        @if (method_exists($data,'links'))
            
        <div class="d-flex justify-content-center">
          {!!$data->links()!!}
        </div>
        @endif
        
      </div>
    </div>
  </div>
