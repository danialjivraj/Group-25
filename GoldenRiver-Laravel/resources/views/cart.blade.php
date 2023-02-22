@extends('partials.nav')

@section('title')
<title>GoldenRiver | Cart</title>
@endsection('title')

@section('css')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection


@section('body')

<div class="container">
<h1>Shopping Cart</h1><br></br>

    <div class="row">
        <div class="col-md-9">
            
            <div class="ibox">
                <div class="ibox-title">
                    <!--retrieve database info fot no. of items in cart-->
                    <span class="pull-right">(<strong>...</strong>) items</span>
                    <h5>Items in your cart</h5>
                </div>

                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table shoping-cart-table">
                            <tbody>
                            <tr>
                                <td width="90">
                                    <div class="cart-product-imitation">
                                    </div>
                                </td>
                                <td class="desc">
                                    <h3>
                                    <a href="#" class="text-navy">Item 1</a>
                                    </h3>
                                    <dl class="small m-b-none">
                                        <dt>Product Description</dt>
                                        <!--retrieve database info for product description-->
                                        <dd>include description.</dd>
                                    </dl>

                                    <div class="m-t-sm">
                                        <!-- allow item deletion -->
                                        <a href="#" class="text-muted"><i class="fa fa-trash"></i> Remove item</a>
                                    </div>
                                </td>

                                <td>
                                    <!--retrieve database info for product description-->
                                    £0.00
                                </td>
                                <td width="65">
                                    <div class="px-3 my-3 text-center">
                                        <div class="cart-item-label">Quantity</div>
                                        <div class="count-input">
                                            <select class="form-control">
                                            <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td><h4>£0.00</h4></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table shoping-cart-table">
                            <tbody>
                            <tr>
                                <td width="90">
                                    <div class="cart-product-imitation">
                                    </div>
                                </td>
                                <td class="desc">
                                    <h3>
                                    <a href="#" class="text-navy">Item 2</a>
                                    </h3>
                                    <dl class="small m-b-none">
                                        <dt>Product Description</dt>
                                        <!--retrieve database info for product description-->
                                        <dd>include description.</dd>
                                    </dl>

                                    <div class="m-t-sm">
                                        <!-- allow item deletion -->
                                        <a href="#" class="text-muted"><i class="fa fa-trash"></i> Remove item</a>
                                    </div>
                                </td>

                                <td>
                                    <!--retrieve database info for product description-->
                                    £0.00
                                </td>
                                <td width="65">
                                    <div class="px-3 my-3 text-center">
                                        <div class="cart-item-label">Quantity</div>
                                        <div class="count-input">
                                            <select class="form-control">
                                            <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td><h4>£0.00</h4></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table shoping-cart-table">
                            <tbody>
                            <tr>
                                <td width="90">
                                    <div class="cart-product-imitation">
                                    </div>
                                </td>
                                <td class="desc">
                                    <h3>
                                    <a href="#" class="text-navy">Item 3</a>
                                    </h3>
                                    <dl class="small m-b-none">
                                        <dt>Product Description</dt>
                                        <!--retrieve database info for product description-->
                                        <dd>include description.</dd>
                                    </dl>

                                    <div class="m-t-sm">
                                        <!-- allow item deletion -->
                                        <a href="#" class="text-muted"><i class="fa fa-trash"></i> Remove item</a>
                                    </div>
                                </td>

                                <td>
                                    <!--retrieve database info for product description-->
                                    £0.00
                                </td>
                                <td width="65">
                                    <div class="px-3 my-3 text-center">
                                        <div class="cart-item-label">Quantity</div>
                                        <div class="count-input">
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td><h4>£0.00</h4></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="ibox-content">
                    <button class="btn btn-white"><i class="fa fa-arrow-left"></i> Continue shopping</button>

                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Cart Summary</h5>
                </div>
                <div class="ibox-content">
                    <span>Total</span>
                    <h2 class="font-bold">£0.00</h2>

                    <hr>
                    <span class="text-muted small">*Currently shipping in the UK only.</span><br></br>
                    <div class="m-t-sm">
                        <div class="btn-group">
                            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Checkout</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ibox">
                <div class="ibox-title"><h5>Support</h5></div>
                <div class="ibox-content text-center">
                    <h3><i class="fa fa-phone"></i> +44 1234 5678</h3>
                    <span class="small">Please <a href="contact.blade.php">contact us</a> if you have any concerns or queries.</span>
                </div>
            </div>

            
        </div>
    </div>

</div>

@endsection