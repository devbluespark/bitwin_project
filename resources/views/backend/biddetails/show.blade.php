@extends('layouts.backend.app')

@section('content')

<div class="container col-12">

<h1>Details of {{$bid_user->user_fname}}</h1><br><br>
 
<div class="row justify-content-center">
      <div class="col-md-12">
          <div class="card p-3">
        <h2 class="text-center text-warning">Bid Details</h2>
    <table id="example" class="display" style="width:100%" class="table">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Bid Value</th>    
            </tr>
        </thead>
        <tbody>
            @foreach ($bid_records as $bid_record)
            <tr>
                 <td>{{ $bid_record->product_id }}</td>
                <td>{{ $bid_record->bid_value }}</td>            
            </tr>
            @endforeach         
        </tbody>      
    </table>
</div>

<div class="card p-3">
    <h2 class="text-center text-info">Win Details</h2>   
    <table id="example2" class="display" style="width:100%" class="table">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Bid Value</th>   
            </tr>
        </thead>
        <tbody>
            @foreach ($win_details as $win_detail)
            <tr>
                 <td>{{ $win_detail->product_id }}</td>
                <td>{{ $win_detail->bid_value }}</td>           
            </tr>
            @endforeach             
        </tbody>
       
    </table>

</div>
<div class="card p-3">
    <h2 class="text-center text-info">Package Details</h2>   
    <table id="example3" class="display" style="width:100%" class="table">
        <thead>
            <tr>
                <th>Package Name</th>
                <th>Package Rolls</th>
                <th>package price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($packages as $package)
            <tr>
                <td>{{ $package->package_name }}</td>
                <td>{{ $package->package_rolls }}</td>
                <td>{{ $package->package_price }}</td>             
            </tr>
            @endforeach          
        </tbody>      
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
            $('#example2').DataTable();
            $('#example3').DataTable();
        } );

</script>


@endsection