@extends('layouts.frontend.app')
@section('content')

  <!-- Start main div -->
  <div id="main">
    <a class="btn" id="sideNavToggleBtn" onclick="navToggle()"><i class="fa fa-bars"></i></a>

    <!-- Start main div content -->
    <div class="content">

        <div class="row m-0">
            <h3 class="mt-4 page-title">Bid Items</h3>
            <nav aria-label="Page navigation example" class="mt-4 w-75 pagination-nav">
                <ul class="pagination justify-content-end">
                    <li class="page-item mr-2 disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i
                                class="fa fa-angle-double-left"></i></a>
                    </li>
                    <li class="page-item mr-2"><a class="page-link currunt-page-link" href="#">1</a></li>
                    <li class="page-item mr-2"><a class="page-link" href="#">2</a></li>
                    <li class="page-item mr-2"><a class="page-link" href="#">3</a></li>
                    <li class="page-item mr-2">
                        <a class="page-link" href="#"><i class="fa fa-angle-double-right"></i></a>
                    </li>
                </ul>
            </nav>
            <nav aria-label="Page navigation calander" class="mt-4 ml-4 nav-right calander-nav">
                <ul class="pagination justify-content-end">
                    <li class="page-item mr-2"><a class="page-link" href="#">
                            <i class="fa fa-calendar"></i>
                        </a></li>
                </ul>
            </nav>
        </div>

        <div class="row m-0 pl-5 pr-5 pb-5 justify-content-center bid-items-col">

            <!-- Sample Card -->
            @foreach($products as $product)
            <div class="col-md-2 col-sm-4 mt-3 card p-3 bid-item-card">
                <div class="bid-item-card-img-container">
                    @if ($product['product'] != "noimage.jpg") 
                    <img class="card-img-top bid-item-card-img" src="/storage/images/{{$product->product_img_1}}" alt="Image" >
                    @else
                    <img src="{{asset('assets/frontend/assets/img/noimage.jpg')}}" class="card-img-top bid-item-card-img" alt="Image">
                    @endif
                </div>
                <div class="card-body bid-item-card-body pt-1 text-center w-100">
                    <h6 class="card-title mt-2">{{$product->product_name}}</h6>
                    <p class="card-text bid-item-card-text">
                        Max Bid <a class="bid-item-card-val">{{$product->product_bid_max_value}}</a><br>
                        Min Bid <a class="bid-item-card-val">{{$product->product_bid_min_value}}</a>
                    </p>
                </div>
                <div class="card-footer mt-3 bid-item-card-footer">
                    <button class="btn btn-outline-primary btn-block">BID</button>
                </div>
            </div>
            @endforeach
            <!-- Sample Card -->


        </div>

    </div>
    <!-- End main div content -->
 <!-- Start - Footer -->
 <footer class="p-5 dashboard-footer">
    <div class="row m-0">
        <div class="col p-0">
            <hr>
            <p class="dashboard-footer-p">Designed & Developed By <a href="#">Bluespark</a> 2020</p>
        </div>
    </div>
</footer>
<!-- End - Footer -->

</div>
<!-- End main div -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
</script>

<!-- Side Nav JS -->
<script src="{{asset('assets/frontend/assets/js/side-nav.js')}}"></script>

@endsection