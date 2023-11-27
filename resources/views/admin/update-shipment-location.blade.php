@extends('layouts.super_admin')

@section('title')
    Update Location
@endsection


@section('content')
    <main>
        <h2 class="ship_details_title">Update Shipment Location</h2>
 
        <div class="add_package_form">

            <form id="add-package-form"   action="{{route('update-location')}}">
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
           

                <label for="package-type">Shipment Tracking ID:</label>
                <input name="shipment_id" type="number" id="shipment_id"
                    name="shipment_id" required> 

                <input type="submit" value="Search Shipment">
            </form>


            @if ($shipmnent != null)
            <div class="muhuk container px-md-5 mt-5">
                <div id="track_div" class="container ">
                    
                    <div class="row">
                        <h1 class="beeero">Shipment Details</h1>
                        <div class="col-md-6">
                            <table class="track_ship_details">
                                <tr>
                                    <td><strong>Shipment Name:</strong></td>
                                    <td><span id="detail-name">{{ $shipmnent->shipment_name }}</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Package Type:</strong></td>
                                    <td><span id="detail-type">{{ $shipmnent->get_package_type->package_type_name }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Weight:</strong></td>
                                    <td><span>{{ $shipmnent->weight }}kg</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Sender Name:</strong></td>
                                    <td><span>{{ $shipmnent->sender->name }}</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Sender Phone:</strong></td>
                                    <td><span>{{ $shipmnent->weight }}</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Receiver Name:</strong></td>
                                    <td><span>{{ $shipmnent->receiver->name }}</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Receiver Phone:</strong></td>
                                    <td><span>{{ $shipmnent->weight }}</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Origin Office:</strong></td>
                                    <td><span>{{ $shipmnent->get_origin_office->ofice_adress }}</span></td>
                                </tr>
                                <tr>
                                    <td><strong>Destination Office:</strong></td>
                                    <td><span>{{ $shipmnent->get_destination_office->ofice_adress }}</span></td>
                                </tr>
                                <tr>
                                    <td><strong> Is Urgent:</strong></td>
                                    <td><span>{{ $shipmnent->isUrgent }}</span></td>
                                </tr>
    
                                <tr>
                                    <td><strong>Status:</strong></td>
                                    <td><span id="detail-status"> {{ $shipmnent->status }} </span></td>
                                </tr>
                            </table>
                        </div>
    
                        <div class="col-md-6">
                            <div class="tracking_details">
                                <h1 class="beeero">Tracking Details</h1>
                                <table class="track_ship_details">

                                    @php
                                        $office= session()->get("AuthUser");
 
                                    @endphp

                                    @if($shipmnent->hasCrossedOffice($office->ID) ==0 )
                                    <tr>
                                        <td><strong>Confirm Shipment:</strong>
                                            <p>Confirm that shipment is received</p>
                                        </td>
                                        <td>
                                            <form action="{{route('confirm-location')}}" method="post">
                                                @csrf
                                                <input type="text" hidden name="shipment_code" value="{{isset($_GET['shipment_id']) ? $_GET['shipment_id'] : ""}}">

                                                <button class="btn btn-primary" type="submit">Confirm</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td class="alert alert-info">Shipment Already Confirmed</td>
                                    </tr>
                                    @endif


                                    <tr>
                                        <td><strong>Shipment Name:</strong></td>
                                        <td><span id="detail-name">mobile</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Package Type:</strong></td>
                                        <td><span id="detail-type">normal</span></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Weight:</strong></td>
                                        <td><span>12 kg</span></td>
                                    </tr>
                                </table>
                            </div>
    
                        </div>
    
                    </div>
                </div>
            </div>
        @endif
    

        </div>
    </main>
@endsection


@section('scripts')
@endsection
