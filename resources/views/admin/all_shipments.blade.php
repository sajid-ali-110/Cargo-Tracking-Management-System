@extends('layouts.admin')

@section('title')
    All Shipments
@endsection


@section('content')
    <main>
        <h1 class="ship_details_title">Send Shipments</h1>
        <div class="all_shipment_tables">
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
                                <a type="button" class="edit_icon m-2" href="{{route('edit-shipment', ["id"=>$shipments->ID])}}">edit</i></a>
                                <a type="button" class="delete_icon" href="{{route('delete-shipment', ["id"=>$shipments->ID])}}">Delete</i></a>
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
@endsection


@section('scripts')
@endsection
