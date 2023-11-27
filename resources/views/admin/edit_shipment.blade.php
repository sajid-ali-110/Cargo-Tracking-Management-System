@extends('layouts.admin')

@section('title')
    edit Shipment
@endsection


@section('content')
    <main>
        <h1 class="ship_details_title">Edit shipments</h1>
        <form autocomplete="off" id="new-shipment-form" action="{{route('update-shipment',['id'=>$all_shipments->ID ])}}" method="POST" enctype="multipart/form-data">

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
                    <input name="shipment_name" value="{{$all_shipments->shipment_name}}" type="text" id="shipment-name" class="form-input" required>

                    <label for="package-type" class="form-label">Package Type:</label>
                    <select required name="package_type" value="{{$all_shipments->package_type}}" class="form-input" id="package-type" name="packageType">
                        <option value="">select package type</option>
                        @foreach ($pkg_data as $pkg)
                            <option  @selected($all_shipments->package_type== $pkg->ID ) value="{{$pkg->ID}}">{{$pkg->package_type_name}}</option>
                        @endforeach
                        
                    </select>

                    <label for="destination-office-id" class="form-label">Destination Office:</label> 
                    <select name="destination_office_id"  id="destination-office-id" class="form-input" required>
                        <option value="">select package type</option>
                        @foreach ($pkg_data as $pkg)
                            <option  @selected($all_shipments->package_type== $pkg->ID ) value="{{$pkg->ID}}">{{$pkg->package_type_name}}</option>
                        @endforeach
                        
                    </select>


                    <h6 class="mt-4">Sender Data</h6>
                    <hr>
                    <label for="receiver-id" class="form-label">Sender Name:</label>
                    <input name="sender_name" value="{{$all_shipments->sender_name}}" type="text"  class="form-input" required>

                    <label  class="form-label">Sender Email:</label>
                    <input name="sender_email" value="{{$all_shipments->sender_email}}" type="text"  class="form-input" required>
                    <hr>
                    <label for="is-urgent" class="form-label">Is Urgent:</label>
                    <select id="is-urgent" value="{{$all_shipments->is_urgent}}" name="is_urgent" class="form-select" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="col-sm-12 col-md-6">
                  

                    <label for="weight" class="form-label">Weight:</label>
                    <input name="weight" type="number" value="{{$all_shipments->weight}}" id="weight" class="form-input" required>

                    {{-- <label for="sender-id" class="d-none form-label">Sender ID:</label>
                    <input name="sender_id" type="hidden" id="sender-id" class="form-input" required> --}}

                    {{-- <label for="origin-office-id" class="form-label d-none">Origin Office ID:</label>
                    <input name="receiver_id" type="hidden" id="origin-office-id" class="form-input" required> --}}

                    <h6 class="mt-4">Reciver Data</h6>
                    <hr>
                    <label for="receiver-id" class="form-label">Receiver Name:</label>
                    <input name="receiver_name" value="{{$all_shipments->receiver_name}}" type="text"  class="form-input" required>

                    <label  class="form-label">Receiver Email:</label>
                    <input name="receiver_email" value="{{$all_shipments->receiver_email}}" type="text"  class="form-input" required>
                    <hr>
                </div>
            </div>


            <div class="form-checkbox-label">
                <label for="has-images" class="form-label">Images</label>
                <input name="images" type="file" value="{{$all_shipments->images}}" id="has-images" class="form-checkbox">
            </div>

            <button type="submit" class="form-submit">update Shipment</button>
        </form>
    </main>
@endsection


@section('scripts')
@endsection
