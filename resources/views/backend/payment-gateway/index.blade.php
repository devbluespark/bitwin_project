@extends('layouts.backend.app')

@section('content')

<div class="container">

    <h1>Payments with payment gateway</h1><br><br>
 
<div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card p-3">

        
    <table id="example" class="display" style="width:100%" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Payment Date</th>
                <th>User Name</th>
                <th>Pyment Amount</th>
                <th>Bank</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>

            
            <!-- Add Permission View Packages-->
            @can('viewPackage')

            <?php if(isset($payments)) {  ?>

            @foreach ($payments as $payment)
            <tr>
                <td>{{ $payment->id }}</td>
                <td>{{ $payment->created_at }}</td>
                <td>{{ $payment->payemnt_amount }}</td>
                <td>{{ $payment->payemnt_amount }}</td>
                <td>{{ $payment->payemnt_bank }}</td>

                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a class="mr-3 px-3 btn btn-primary" href='{{ route("payments-gateways.show",[ 'payment-gateway' => $payment->id ]) }}' ><i class="fa fa-info mx-2"></i></a>
    
                
                    </div>
                    
                </td>
            </tr>
            @endforeach
         
        <?php } ?> 

        @endcan
            
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Coins</th>
                <th>Active/Deactive</th>
                <th class="text-center">Actions</th>
            </tr>
        </tfoot>
    </table>



</div>
</div>
</div>
</div>
</div>




<script>
    //DataTable Script
    $(document).ready(function() {
            $('#example').DataTable();
        } );


    

</script>


@endsection