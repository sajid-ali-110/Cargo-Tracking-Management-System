@extends('layouts.super_admin')

@section('title')
    All Shipments
@endsection


@section('content')
    <main>
        <h1 class="ship_details_title">All Shipments</h1>
        <div class="all_shipment_tables">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Shipment Name</th>
                        <th>Package Type</th>
                        <th>Weight</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($all_shipments as $shipments)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $shipments->shipment_name }}</td>
                            <td>{{ $shipments->get_package_type->package_type_name }}</td>
                            <td>{{ $shipments->weight }}</td>
                            <td style="text-transform: capitalize">{{ $shipments->status }}</td>
                            <td class="button-cell">

                                {{-- <a type="button" class="action_icons" href="{{ route('edit-shipment', 
                                ['id' => $shipments->ID]) }}"><i
                                        class="fa-solid fa-eye"></i></a> --}}
                                <a type="button" href="{{ route('view-shipment', ['id' => $shipments->ID]) }}"><i
                                    class="eye_icon fa-solid fa-eye"></i></a>
                                <a type="button" href="{{ route('edit-shipment', ['id' => $shipments->ID]) }}"><i
                                        class=" edit_icon fa-solid fa-pen-to-square"></i></a>
                                <a type="button" href="{{ route('delete-shipment', ['id' => $shipments->ID]) }}"><i
                                        class="delete_icon fa-solid fa-eraser"></i></a>
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

        <!-- Full details modal -->
        <div class="modal" id="shipment-modal">
            <div class="modal-content">
                <h3>Shipment Details</h3>
                <table>
                    <div class="shipment_img">
                        <img src="https://media.istockphoto.com/id/1308840409/photo/scanning-parcel-barcode-before-shipment.jpg?s=612x612&w=0&k=20&c=R7h1XCbjdXKXhngzsg0CYfzAZ3k_7yguHR8t9LNYwY8="
                            alt="">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRcLtjGiEupT6xbyn7_6jss2nxr1QsYEa2XuDw95vXhVFnZm_LRPnkyCeaMciWY28yBofE&usqp=CAU"
                            alt="">
                    </div>
                    <tr>
                        <td><strong>ID:</strong></td>
                        <td><span id="detail-id"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Shipment Name:</strong></td>
                        <td><span id="detail-name"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Weight:</strong></td>
                        <td><span>2kg</span></td>
                    </tr>
                    <tr>
                        <td><strong>Sender ID:</strong></td>
                        <td><span>1212</span></td>
                    </tr>
                    <tr>
                        <td><strong>Receiver ID:</strong></td>
                        <td><span>1412</span></td>
                    </tr>
                    <tr>
                        <td><strong>Origin Office ID:</strong></td>
                        <td><span>4343</span></td>
                    </tr>
                    <tr>
                        <td><strong>Destination Office ID:</strong></td>
                        <td><span>4343</span></td>
                    </tr>
                    <tr>
                        <td><strong> Is Urgent:</strong></td>
                        <td><span>yes</span></td>
                    </tr>
                    <tr>
                        <td><strong>Package Type:</strong></td>
                        <td><span id="detail-type"></span></td>
                    </tr>
                    <tr>
                        <td><strong>Status:</strong></td>
                        <td><span id="detail-status"></span></td>
                    </tr>
                    <!-- Add more rows for additional shipment details as needed -->
                </table>
                <button class="close-button" id="close-button">Close</button>
            </div>
        </div>

    </main>
@endsection


@section('scripts')
@endsection
