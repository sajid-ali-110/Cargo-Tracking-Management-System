@extends('layouts.super_admin')

@section('title')
    Offices
@endsection


@section('content')
    <main>
        <h1 class="ship_details_title">Our Offices</h1>
        <div class="offices__table">
            <table border="1" class="mt-4">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>BRANCH</th>
                        <th>ZIP CODE</th>
                        <th>PHONE</th>
                        <th>ACTION </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($all_offices as $office)
                        <tr>
                            <td>{{ $office->ID }}</td>
                            <td>{{ $office->office_name }}</td>
                            <td>{{ $office->zip_code }}</td>
                            <td>{{ $office->phone }}</td>
                            <td>
                                <a type="button" class="view_icon" href="{{ route('view-office', ['id' => $office->ID]) }}">View</i></a>
                                <a type="button" class="edit_icon"href="{{ route('edit-office', ['id' => $office->ID]) }}">edit</i></a>
                                <a type="button" class="delete_icon" href="{{ route('delete-office', ['id' => $office->ID]) }}">Delete</a>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>

    </main>
@endsection
