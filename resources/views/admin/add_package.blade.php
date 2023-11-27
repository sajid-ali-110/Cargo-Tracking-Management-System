@extends('layouts.super_admin')

@section('title')
    Add Package
@endsection


@section('content')
    <main>
        <h2 class="ship_details_title">Add New Package Type</h2>

        
        <div class="add_package_form">
            
            <form id="add-package-form" method="post" action="{{route('add-new-package')}}">

                @if (Session::has("message"))
                    <div class="alert alert-success">
                            {{Session::get("message")}}
                    </div>
                @endif
                
                @csrf
                <label for="package-type">Package Type:</label>
                <input name="package_type_name" type="text" id="package-type" name="package-type" required>

                <label for="description">Description:</label>
                <textarea name="package_description" id="description" name="description" rows="4" required></textarea>

                <label for="weight-limit">Weight Limit:</label>
                <input name="max_weight" type="number" id="weight-limit" name="weight-limit" required>

                <label for="weight-limit">Price Per Km:</label>
                <input type="number"step="0.1" id="weight-limit" name="price_per_km" required>

                <label for="weight-limit">Urgent Price Per Km:</label>
                <input type="number" step="0.1" id="weight-limit" name="urgent_price_per_km" required>

                <input type="submit" value="Add Package Type">
            </form>

        </div>
    </main>
@endsection


@section('scripts')
@endsection
