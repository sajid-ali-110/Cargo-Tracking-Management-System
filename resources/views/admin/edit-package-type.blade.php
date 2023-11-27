@extends('layouts.super_admin')

@section('title')
    edit Package
@endsection


@section('content')
    <main>
        <h2 class="ship_details_title">Edit {{ $package_type->package_type_name }}</h2>

        {{-- action="{{route('update-package'),$package_type->id}}" --}}
        <div class="add_package_form">

            <form id="add-package-form" method="post" action="{{route('update-package',['id'=>$package_type->ID ])}}">
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                @csrf
                @method('put')

                <label for="package-type">Package Type:</label>
                <input name="package_type_name" value="{{ $package_type->package_type_name }}" type="text" id="package-type"
                    name="package-type" required>

                <label for="description">Description:</label> 
                <textarea name="package_description" id="description" name="description" rows="4" required>{{ $package_type->package_description }}</textarea>

                <label for="weight-limit">Weight Limit:</label>
                <input name="max_weight" type="number" id="weight-limit" value="{{ $package_type->max_weight }}"
                    name="weight-limit" required>

                <label for="weight-limit">Price Per Km:</label>
                <input type="number"step="0.1" id="weight-limit" value="{{ $package_type->price_per_km }}"
                    name="price_per_km" required>

                <label for="weight-limit">Urgent Price Per Km:</label>
                <input type="number" step="0.1" value="{{ $package_type->urgent_price_per_km }}"
                    name="urgent_price_per_km" required>

                <input type="submit" value="Update Package Type">
            </form>

        </div>
    </main>
@endsection


@section('scripts')
@endsection
