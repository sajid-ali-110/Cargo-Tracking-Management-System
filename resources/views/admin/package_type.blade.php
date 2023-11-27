@extends('layouts.super_admin')

@section('title')
    Package Types
@endsection


@section('content')
    <main>
        <h2 class="ship_details_title">Cargo Shipment Package Types</h2>
        <div class="package_type_table mt-4">
            <table>
                <thead>
                    <tr >
                        <th>ID</th>
                        <th>Package Type</th>
                        <th>Description</th>
                        <th>Weight Limit</th>
                        <th>Price Per Km</th>
                        <th>Urgent Price Per Km</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>


                    @foreach ($all_packages as $package_type)
                        <tr>
                            <td>{{ $package_type->ID }}</td>
                            <td>{{ $package_type->package_type_name }}</td>
                            <td>{{ $package_type->package_description }}</td>
                            <td>{{ $package_type->max_weight }}</td>
                            <td>{{ $package_type->price_per_km }}</td>
                            <td>{{ $package_type->urgent_price_per_km }}</td>
                            <td>
                                <a type="button" class="edit_icon" href="{{ route('edit-package', ['id' => $package_type->ID]) }}">edit</a>
                                <a type="button" class="delete_icon" href="{{ route('delete-package', ['id' => $package_type->ID]) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </main>
@endsection


@section('scripts')
@endsection
