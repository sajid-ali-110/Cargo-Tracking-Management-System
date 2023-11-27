@extends('layouts.super_admin')

@section('title')
    SuperAdminDashboard
@endsection


@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Offices</div>
                    <h2 style="padding: 0px 10px;">{{$totalOffices}}</h2>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route('our-offices')}}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Total shipments</div>
                    <h2 style="padding: 0px 10px;">{{$totalShipments}}</h2>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('get-shipments') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Total income</div>
                    <h2 style="padding: 0px 10px;">300000 Pkr</h2>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <!-- <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                </div> -->
            <div class="card-body">

                <h1 class="latest_ship">latest Shipments</h1>
                <table>
                    <thead>
                        <tr>
                            <th> Shipment Name</th>
                            <th> Shipment Code</th>
                            <th>Sender</th>
                            <th>Receiver</th>
                            <th>Origin</th>
                            <th>Destination</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($get_shipments as $shipments)
                        
                        <tr>
                            <td>{{$shipments->shipment_name}}</td>
                            <td>{{$shipments->shipment_code}}</td>
                            <td>{{$shipments->sender->name}}</td>
                            <td>{{$shipments->receiver->name}}</td>
                            <td>{{$shipments->get_origin_office->ofice_adress}}</td>
                            <td>{{$shipments->get_destination_office->ofice_adress}}</td>
                            
                        </tr>
                    @endforeach
                        <!-- Add more rows for other shipments -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
@endsection
