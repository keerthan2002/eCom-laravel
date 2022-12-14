@extends('master')

@section("content")
<div class="custom-product">
  @if(!$products->isEmpty())
    <div class="col-md-9" style="background-color:#e0ebeb;">
      <div class="trending-wrapper">
        <h2>Welcome to your cart 
        <a class="btn btn-success" href="ordernow">Proceed to checkout</a></h2>
        @foreach($products as $item)
          <div class="row p-2 bg-white border rounded mt-2" style="background-color:#ffffff;margin:10px;padding:20px;">
            <div class="col-md-3 mt-1">
              <img class="img-fluid img-responsive rounded product-image" style="height: 110px;width: 90px;" src="{{$item->gallery}}">
            </div>
            <div class="col-md-6 mt-1">
              <h4>{{$item->name}}</h4>
                <div class="d-flex flex-row">
                  <span>Quantity :</span>
                  <span name="quantity_field">{{$item->quantity}}</span>
                </div>
                <?php $statm = $statp='pointer-events: clickable;';
                      if($item->quantity<=1)
                        $statm = 'pointer-events: none;';
                      if($item->quantity>=5)
                        $statp = 'pointer-events: none;';
                  ?>
                  <a href="/decrementQuantity/{{$item->cart_id}}" class="btn btn-info" style="{{$statm}}">
                    <span class="glyphicon glyphicon-minus"></span>
                  </a>
                  <a href="/incrementQuantity/{{$item->cart_id}}" class="btn btn-info" style="{{$statp}}">
                    <span class="glyphicon glyphicon-plus"></span>
                  </a>
            </div>
            <div class="align-items-center align-content-center col-md-3 border-left mt-1">
            <div class="d-flex flex-row align-items-center">
                    <h4 class="mr-1"><i class="fa fa-inr"></i>{{$item->current_price*$item->quantity}}</h4>
                    <h6 class="mr-1"><i class="fa fa-inr"></i>{{$item->current_price}}/item</h6>
                  </div>
                  <div class="d-flex flex-column mt-4">
                    <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning" >Remove from Cart</a>
                  </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @else
    <div class="container-fluid bg-1 text-center" style="background-color:rgba(65, 202, 255, 0.2)">
      <div style="margin:50px">
        <h1 style="margin:25px">There's nothing in the cart !!</h1>
          <a class="btn btn-success" href="/">Explore products</a>
        </div>
      </div>
  @endif
</div>
@endsection
    