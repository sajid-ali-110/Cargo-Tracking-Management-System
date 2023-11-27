
@extends('layouts.super_admin')

@section('title')
    Add Office
@endsection

@section('content')
    <main>
        <div class="office-form">

            @if($errors->any())

            @foreach ($errors->all() as $err )
            <div class="alert alert-danger">
                {{ $err }}
            </div>
            @endforeach
            @endif
            
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <h2 class="ship_details_title">Add a New Office</h2>
            <form id="new-office-form" method="post" action="{{ route('post-office') }}" enctype="multipart/form-data">
                @csrf
                <label for="office-name" class="form-label">Office Name:</label>
                <input type="text" name="office_name" @error("office_name")
                    {{$message}}
                @enderror  class="form-input" required>

                <label for="office-address" class="form-label">Address:</label>
                <input type="text" name="ofice_adress" class="form-input" required>
                @error("ofice_adress")
                    {{$message}}
                @enderror

                <label for="office-phone" class="form-label">Phone:</label>
                <input type="number" name="phone" 
                @error("phone")
                    {{$message}}
                @enderror class="form-input" required>

                <label for="office-email" class="form-label">Email:</label>
                <input type="email" name="email"
                @error("email")
                    {{$message}}
                @enderror class="form-input" required>

                <label for="zip_code" class="form-label">Zip Code:</label>
                <input type="text" max="20"
                @error("zip_code")
                    {{$message}}
                @enderror name="zip_code" class="form-input" required>

                <label for="country" class="form-label">Country:</label>
                <select id="country" name="country" class="form-select">
                    <option value="">Select a Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
                <label for="Province" class="form-label">Province:</label>
                <select id="state" name="province" 
                @error("province")
                    {{$message}}
                @enderror class=" form-select">
                    <option value="">Select a State</option>
                </select>
                <label for="City" id="city-dd" class="form-label">City:</label>
                <select id="city" name="city" 
                @error("city")
                    {{$message}}
                @enderror class="form-select">
                    <option value="">Select a City</option>
                </select>

                <br>
                <label for="office-image" class="form-label">Image:</label>
                <input type="file" name="office-image"
                @error("office-image")
                    {{$message}}
                @enderror accept="image/*" class="form-input" required>


                <button type="submit" class="form-submit">Add Office</button>
            </form>
        </div>
    </main>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   
        <script src = "https://code.jquery.com/jquery-3.6.0.min.js" > </script>
    <script>
        $(document).ready(function() {
            $('#country').on('change', function() {
                var countryID = $(this).val();
                if (countryID) {
                    $.ajax({
                        type: 'GET',
                        url: '/states/' + countryID,
                        success: function(data) {
                            $('#state').empty();
                            $.each(data, function(key, value) {
                                $('#state').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#state').empty();
                    $('#city').empty();
                }
            });

            $('#state').on('change', function() {
                var stateID = $(this).val();
                if (stateID) {
                    $.ajax({
                        type: 'GET',
                        url: '/cities/' + stateID,
                        success: function(data) {
                            $('#city').empty();
                            $.each(data, function(key, value) {
                                $('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#city').empty();
                }
            });
        });
    </script>
@endsection