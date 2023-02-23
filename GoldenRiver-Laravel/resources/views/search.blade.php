
@foreach($product as $prod)
@if(count($product) < 0)
<h1>No Results Found</h1>

@else


<div class="product">
<img src="/images/allProductImages/{{$prod->Product_ID}}.jpg" alt="productImage" height="350px" width="330px">

    <a href="/product/{{ $prod->Product_ID }}">

            <p>
                <div class="productName">
                    <h2>{{ $prod->Product_Name }}</h2> <br>
                </div>
                <div class="productPrice">
                    <h2>£{{ $prod->Product_Price }} </h2> <br>
                </div>
            </p>
</div>

@endif
@endforeach
