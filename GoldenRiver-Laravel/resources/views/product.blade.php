

<!-- search box -->
<div>
<form type="get" action="{{ url('/search') }}">
    @csrf
<label for="search">Search:</label>
  <input type="text" name= "search" id="search" name="search" >
  <input type="submit" value="Submit">
</form>
</div>
<!-- search box -->

@foreach($products as $prod)
<div class="product">
    <a href="/product/{{ $prod->Product_ID }}">
        <img src="{{ $prod->imageLocation }} " alt="productImage" height="350px" width="330px">
            <p>
                <div class="productName">
                    <h2>{{ $prod->Product_Name }}</h2> <br>
                </div>
                <div class="productPrice">
                    <h2>£{{ $prod->Product_Price }} </h2> <br>
                </div>
            </p>
</div>
@endforeach
