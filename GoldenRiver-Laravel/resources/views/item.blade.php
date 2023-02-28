
<div class="item-title">
    <h2>{{ $item->Product_Name }}</h2>
</div>
<img src="/images/allProductImages/{{$item->Product_ID}}.jpg" alt="productImage" height="350px" width="330px">


<div>
    <h4>Product Description:</h4>
    <p>{{ $item->Description }} </p>
</div>

<div>
    <h4>Product Category:</h4>
    @if($item->Category_ID == 6 )
    <p>Necklace</p>
    @endif
    @if($item->Category_ID == 5 )
    <p>Earring</p>
    @endif
    @if($item->Category_ID == 7 )
    <p>Bracelet</p>
    @endif
    @if($item->Category_ID == 8 )
    <p>Ring</p>
    @endif
    @if($item->Category_ID == 9 )
    <p>Set</p>
    @endif
</div>
<div>
    <h4>Price:</h4>
    <p>£{{ $item->Product_Price }} </p>
</div>
<div class="item-stock-count" id="item-row">
    @if($item->Amount == 0)
    <h5>Sorry, this Item is out of stock</h5>
    @else
    <h5>In stock</h5>
    @if($item->Amount < 11) <p>only {{ $item->Amount }} available, buy it quick!</p>
    @endif
</div>
<div class="select-quantity">
                    <form action="#" > <!-- make it <form action= "/basket" method = "post"> later -->
                        @csrf
                        <h5>Select Quantity:</h5>
                        <select class="form-control" name="qty" id="quantity-box">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        <br><br>
                        <input type="hidden" name="Product_ID" value="{{$item->Product_ID}}">
                        <button class="submit-btn">Add to basket</button>
                    </form>
                    @endif
                </div>


