@extends('layouts.admin')

@section('title')
    All Shipments
@endsection


@section('content')
    <main>
        <h2 class="ship_details_title">Shipment Details</h2>
        <div class="arrow_back">
            <a type="button" href="{{ route('get-shipments') }}"><i class="arrow_l fa-solid fa-arrow-left-long"></i></a>
        </div>
        <div class="full_ship_details">

            <table class="ship_details">
                <tr>
                    <td><strong>Shipment Name:</strong></td>
                    <td><span id="detail-name">{{$get_shipments->shipment_name}}</span></td>
                </tr>
                <tr>
                    <td><strong>Shipment Code:</strong></td>
                    <td><span id="detail-name">{{$get_shipments->shipment_code}}</span></td>
                </tr>
                <tr>
                    <td><strong>Package Type:</strong></td>
                    <td><span id="detail-type">{{$get_shipments->get_package_type->package_type_name}}</span></td>
                </tr>
                <tr>
                    <td><strong>Weight:</strong></td>
                    <td><span>{{$get_shipments->weight}} kg</span></td>
                </tr>
                <tr>
                    <td><strong>Sender Name:</strong></td>
                    <td><span>{{$get_shipments->sender->name}}</span></td>
                </tr>
                <tr>
                    <td><strong>Sender Phone:</strong></td>
                    <td><span>{{$get_shipments->sender->phone}}</span></td>
                </tr>
                <tr>
                    <td><strong>Receiver Name:</strong></td>
                    <td><span>{{$get_shipments->receiver->name}}</span></td>
                </tr>
                <tr>
                    <td><strong>Receiver Phone:</strong></td>
                    <td><span>{{$get_shipments->receiver->phone}}</span></td>
                </tr>
                <tr>
                    <td><strong>Origin Office:</strong></td>
                    <td><span>{{$get_shipments->get_origin_office->ofice_adress}}</span></td>
                </tr>
                <tr>
                    <td><strong>Destination Office:</strong></td>
                    <td><span>{{$get_shipments->get_destination_office->ofice_adress}}</span></td>
                </tr>
                <tr>
                    <td><strong> Is Urgent:</strong></td>
                    <td><span>{{($get_shipments->isUrgent==0) ? "No" : "yes" }}</span></td>
                </tr>
                
                <tr>
                    <td><strong>Status:</strong></td>
                    <td><span id="detail-status" class="alert alert-primary py-1 px-3">{{$get_shipments->status}}</span></td>
                </tr>
            </table>
            <div class="shipment_img">
                <img src="https://media.istockphoto.com/id/1308840409/photo/scanning-parcel-barcode-before-shipment.jpg?s=612x612&w=0&k=20&c=R7h1XCbjdXKXhngzsg0CYfzAZ3k_7yguHR8t9LNYwY8="
                    alt="">
            </div>
        </div>
    </main>
@endsection


@section('scripts')
@endsection
