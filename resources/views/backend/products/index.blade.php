@extends('layouts.backend.app')

@section('content')


<div class="col-12">

    <h1>Products</h1><br><br>

    @can('addProduct')
    <a href="{{ route('products.create') }}"><button class="btn btn-success px-4 mb-3"> <i class="fa fa-plus"></i> </button></a>
    @endcan




        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card p-3">
                      <table id="example" class="display"  class="table">
                          <thead>
                              <tr>
                                  <th >ID</th>
                                  <th>Name</th>
                                  <th>Product(Rs.)</th>
                                  <th>Min Bid</th>
                                  <th>Max Bid</th>
                                  <th>Product Level</th>
                                  {{-- <th>Status</th> --}}
                                  <th >Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($products as $product)
                              <tr>
                                  <td>{{ $product->id }}</td>
                                  <td>{{ $product->product_name }}</td>
                                  <td>{{ $product->product_price }}</td>
                                  <td>{{ $product->product_bid_min_value }}</td>
                                  <td>{{ $product->product_bid_max_value }}</td>
                                  <td>{{ $product->product_level }}</td>
                                  {{-- @if ($product['product_active'==1])
                                  <td>Active</td>
                                  @else
                                  <td>Inactive</td>
                                  @endif --}}
                                  <td>
                                    <a class="mr-3" href='{{ route("products.show",[ 'product' => $product->id ]) }}' > <button class="btn btn-primary"> <i class="fa fa-info mx-2"></i></button></a>

                                    @can('editProduct')
                                    <a class="mr-3" href='{{ route("products.edit",[ 'product' => $product->id ]) }}' > <button class="btn btn-warning"> <i class="fa fa-pencil mx-2"></i></button></a>
                                    @endcan

                                    @can('deleteProduct')
                                    <button type="button" onclick="sweet_delete({{ $product->id }})" class="btn btn-danger" > <i class="fa fa-trash mx-2"></i></button>
                                    @endcan


                                    @can('changeActiveProduct')
                                    @if ($product['product_active'] == 1)
                                    {{-- <button type="button" onclick="unpublish_product({{ $product->id }})" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalunpublish"> <i class="fa fa-check"></i></button>                 --}}
                                    <button type="button" onclick="sweet_alert_unpublish({{ $product->id }})" class="btn btn-primary" > <i class="fa fa-check-square-o mx-2"></i>Published</button>
                                    @else
                                    {{-- <button type="button" onclick="publish_product({{ $product->id }})" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalpublish"> <i class="fa fa-check"></i></button>                 --}}
                                    <button type="button" onclick="sweet_alert_publish({{ $product->id }})" class="btn btn-danger" > <i class="fa fa-times  mx-2"></i>unpublished</button>
                                    @endif
                                    @endcan


                                  </th>
                              </tr>
                              @endforeach
                          </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(isset($product)) {  ?>

  <!-- Modal to delete -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete product(<b><span id="delete_product_name"></span></b>)</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you Sure...?
          </div>
          <form action="productdelete" method="POST" id="delete_form">
              {{csrf_field()}}
          <input  type="hidden" name="id"  id="hidden_delete">

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Delete</button>
          </div>
      </form>
        </div>
      </div>
    </div>

     <!-- Modal to publish -->
  <div class="modal fade" id="exampleModalpublish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Publish product(<b><span id="publish_product_name"></span></b>)</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you Sure...?
          </div>
          <form action="productpublish" method="POST" id="publish_form">
              {{csrf_field()}}
          <input  type="hidden" name="id" id="hidden_publish" >

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Publish</button>
          </div>
      </form>
        </div>
      </div>
    </div>

    <!-- Modal to unpublish -->
  <div class="modal fade" id="exampleModalunpublish" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Unublish product(<b><span id="publish_product_name"></span></b>)</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you Sure...?
        </div>
        <form action="productunpublish" method="POST" id="unpublish_form">
            {{csrf_field()}}
        <input  type="hidden" name="id" id="hidden_unpublish" >

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Unublish</button>
        </div>
    </form>
      </div>


  <?php } ?>

<script>
    //DataTable Script
    $(document).ready(function() {
            $('#example').DataTable();
        });


     //publish button scirpt
     function sweet_alert_publish(id){
      Swal.fire({
            title: 'Do you want to publish ?',
            // text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            })
            .then((result) => {
              if (result.value) {
                return publish_product(id)
              }
            })
     }



      function sweet_alert_unpublish(id){
        Swal.fire({
            title: 'Do you want to unpublish ?',
            // text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            })
            .then((result) => {
              if (result.value) {
                return unpublish_product(id)
              }
            })
     }
     function sweet_delete(id){
      Swal.fire({
            title: 'Do you want to delete ?',
            // text: "You won't be able to revert this!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            })
            .then((result) => {
              if (result.value) {
                return delete_product(id)
         }
      })
    }


     function publish_product(id) {

        document.querySelector('#hidden_publish').value = id;
        document.querySelector('#publish_form').submit()
    }
    //publish button scirpt
    function unpublish_product(id) {
       document.querySelector('#hidden_unpublish').value = id;
       document.querySelector('#unpublish_form').submit()
   }
    //Delete button scirpt
    function delete_product(id) {
      document.querySelector('#hidden_delete').value = id;
      document.querySelector('#delete_form').submit()
    }


</script>


@endsection
