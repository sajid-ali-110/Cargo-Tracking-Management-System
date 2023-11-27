@extends('layouts.super_admin')

@section('title')
    edit Office
@endsection

@section('content')
    <main>
        <div class="office-form">
            @if (Session::has("message"))
            <div class="alert alert-success">
                    {{Session::get("message")}}
            </div>
        @endif
            <h2 class="ship_details_title">Add a New Office</h2>
            <form id="new-office-form" method="post" action="{{route('update-office',['id'=>$office->ID ])}}" enctype="multipart/form-data">
                @csrf
                <label for="office-name" class="form-label">Office Name:</label>
                <input type="text" name="office_name" value="{{$office->office_name}}" class="form-input" required>

                <label for="office-address" class="form-label">Address:</label>
                <input type="text" name="ofice_adress" class="form-input" value="{{$office->ofice_adress}}" required>

                <label for="office-phone" class="form-label">Phone:</label>
                <input type="tel" name="phone" class="form-input" value="{{$office->phone}}" required>

                <label for="office-email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-input" value="{{$office->email}}"  required>

                <label for="zip_code" class="form-label">Zip Code:</label>
                <input type="text" max="20" name="zip_code" value="{{$office->zip_code}}" class="form-input" required>

                <div>
                    <label for="country" class="form-label">Country:</label>
                    <select name="country" name="">
                        <option value="gilgit">Gilgit</option>
                    </select>

                    <label for="Province" class="form-label">Province:</label>
                    <select name="province" name="">
                        <option value="gilgit">Gilgit</option>
                    </select>

                </div>

                <div>
                    <label for="City" class="form-label">City:</label>
                    <select name="city" name="">
                        <option value="gilgit">Gilgit</option>
                    </select>

                </div>

                <br>
                <label for="office-image" class="form-label">Image:</label>
                <input type="file" name="office-image" accept="image/*" class="form-input" required>


                <button type="submit" class="form-submit">Update Office</button>
            </form>
        </div>
    </main>
@endsection
