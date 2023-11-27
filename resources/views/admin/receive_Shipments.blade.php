@extends('layouts.admin')

@section('title')
    All Shipments
@endsection


@section('content')
    <main>
        <h1 class="ship_details_title">Receiving Shipments</h1>
        <div class="all_shipment_tables">

            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif


            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Shipment Name</th>
                        <th> Shipment Code</th>
                        <th>Package Type</th>
                        <th>Weight</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                    @endphp
                    @foreach ($all_shipments as $shipments )
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$shipments->shipment_name}}</td>
                        <td>{{$shipments->shipment_code}}</td>

                            <td>{{$shipments->get_package_type->package_type_name}}</td>
                            <td>{{$shipments->weight}}</td>
                            <td style="text-transform: capitalize">{{$shipments->status}}</td>
                            <td class="button-cell">
                                <a type="button" class="view_icon" href="{{ route('view-shipment', ['id' => $shipments->ID]) }}">View</a> 
 
                                    <!-- Button trigger modal -->

                                @php
                                  $receiver= $shipments->receiver;
                                  $shipments->receiver_name= $receiver->name;
                                  $shipments->receiver_phone= $receiver->phone;
                                @endphp

                                @if( $shipments->status!="delivered" )
                                <button  data-json="{{$shipments->toJson()}}" type="button" class="btn btn-primary btn-sm showInModal" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                  Confirm Delivery
                                </button>

                                @endif
                               
                            </td>
                        </tr>
                        @php
                        $i++;
                    @endphp
                    @endforeach
                    <!-- Add more rows for additional shipments as needed -->
                </tbody>
            </table>
        </div>
       
    </main>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <table>
            <thead>
                <tr>
                    <th>Shipment Name</th>
                    <th id="shipment_name">Shipment Name</th>
                </tr>

                <tr>
                    <th>Shipment Code</th>
                    <th id="shipment_code">Shipment Name</th>
                </tr>

                <tr>
                    <th>Receiver Name</th>
                    <th id="receiver_name">Shipment Name</th>
                </tr>

                <tr>
                    <th>Receiver Name</th>
                    <th id="receiver_phone">Shipment Name</th>
                </tr>


            </thead>
        </table>
 
      </div>
      <div class="modal-footer">
        <form action="{{route('shipments.deliver')}}" method="post">
        @csrf
        <input type="" id="ID" name="shipment_id" hidden> 
            <button type="submit" class="btn btn-primary">Confirm Delivery</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    
    $(".showInModal").click(function(){

        let json= $(this).data("json")
        
        for(let data in json){
            console.log("#exampleModal #"+data)

            if(data=="ID"){
                $("#exampleModal #"+data).val( json[data] )
            }
            else{
                 $("#exampleModal #"+data).html( json[data] )
            }
           
        }
    })
</script>
@endsection
