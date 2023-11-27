@extends('layouts.admin')

@section('title')
    Add Shipment
@endsection


@section('content')
    <main>
        <h1 class="ship_details_title">add shipments</h1>

        <form id="new-shipment-form" action="{{route('add-new-shipments')}}" method="POST" enctype="multipart/form-data">

            @if (Session::has("message"))
                    <div class="alert alert-success">
                            {{Session::get("message")}}
                    </div>
                @endif
            @csrf


                    
            @if($errors->any())

            <div class="alert alert-danger">
               @foreach ($errors->all() as $error )
                   <li>{{$error}}</li>
               @endforeach
            </div>

            @endif
            
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <label for="shipment-id" class="form-label">Shipment Name:</label>
                    <input name="shipment_name" type="text" id="shipment-name" class="form-input" required>

                    <label for="package-type" class="form-label">Package Type:</label>
                    <select name="package_type" class="form-input" id="package-type" name="packageType">
                        <option value="" selected>select package type</option>
                        @foreach ($pkg_data as $pkg)
                            <option value="{{$pkg->ID}}">{{$pkg->package_type_name}}</option>
                        @endforeach
                        
                    </select>

                    <label for="destination-office-id" class=" form-label">Destination Office:</label>

                    <select name="destination_office_id"  id="destination-office-id" class="form-input" required>
                        <option value="" selected>select package type</option>
                        @foreach ($offices as $office)
                            <option value="{{$office->ID}}">{{$office->office_name}}</option>
                        @endforeach
                        
                    </select>


                    <h6 class="mt-4">Sender Data</h6>
                    <hr>
                    <label for="receiver-id" class="form-label">Sender Name:</label>
                    <input name="sender_name" type="text"  class="form-input" required>
                    
                    <label for="sender_phone-id" class="form-label">Sender Phone:</label>
                    <input name="sender_phone" type="text"  class="form-input" required>

                    <label  class="form-label">Sender Email:</label>
                    <input name="sender_email" type="text"  class="form-input" required>
                    <hr>
                    <label for="is-urgent" class="form-label">Is Urgent:</label>
                    <select id="is-urgent" name="is_urgent" class="form-select" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="col-sm-12 col-md-6">
                  

                    <label for="weight" class="form-label">Weight:</label>
                    <input name="weight" type="number" id="weight" class="form-input" required>
 
                    <h6 class="mt-4">Reciver Data</h6>
                    <hr>
                    <label for="receiver-id" class="form-label">Receiver Phone:</label>
                    <input name="receiver_phone" type="text"  class="form-input" required>

                    <label for="receiver-id" class="form-label">Receiver Name:</label>
                    <input name="receiver_name" type="text"  class="form-input" required>

                    <label  class="form-label">Receiver Email:</label>
                    <input name="receiver_email" type="text"  class="form-input" required>
                    <hr>
                </div>
            </div>


            <div class="form-checkbox-label">
                <label for="has-images" class="form-label">Images</label>
                <input name="images" type="file" id="has-images" class="form-checkbox">
            </div>

            <button type="submit" class="form-submit">Add Shipment</button>
        </form>
    </main>
@endsection


@section('scripts')
@endsection
