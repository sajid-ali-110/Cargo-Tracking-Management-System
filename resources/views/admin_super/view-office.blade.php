@extends('layouts.super_admin')

@section('title')
    View Office
@endsection


@section('content')
    <main>
        <h2 class="ship_details_title">Office Details</h2>
        <div class="arrow_back_office">
            <a type="button" href="{{route('our-offices')}}"><i class="arrow_l fa-solid fa-arrow-left-long"></i></a>
        </div>
        <div class="offices_page_cards">
            {{-- @foreach ($all_offices as $office) --}}
                <div class="view_office_img">
                    
                    @if($all_offices->Profile_picture)
                <img src="{{asset('/offices/'.$all_offices->Profile_picture)}}"  ><br>
                @else
                <img class="office-image" src="https://img.freepik.com/premium-vector/post-office-cargo-truck-vehicle-loaded-parcel-boxes-illustration_101884-1028.jpg?w=2000" alt="Office 1" class="office-image">
                @endif
                </div>
                <div class="office-card">
                        <div class="office-details">
                            <h3 class="office-title"><b>Branch:</b>{{$all_offices->office_name}}</h3>
                            <p class="office-address"><b>address:</b>{{$all_offices->ofice_adress}}</p>
                            <p class="office-contact"><b>Phon:</b>: {{$all_offices->phone}}</p>
                            <p class="office-contact"><b>Email:</b>: {{$all_offices->email}}</p>
                            <p class="office-contact"><b>Zip-code:</b> {{$all_offices->zip_code}}</p>
                            <p class="office-contact"><b>Country:</b>: {{$all_offices->country}}</p>
                            <p class="office-contact"><b>City:</b>: {{$all_offices->city}}</p>
                            <p class="office-contact"><b>Province:</b>: {{$all_offices->province}}</p>
                        </div>
                        <a type="button" href="{{route('edit-office', ["id"=>$all_offices->ID])}}"><i
                            class=" edit_icon fa-solid fa-pen-to-square"></i></a>
                        <a type="button" href="{{route('delete-office', ["id"=>$all_offices->ID])}}"><i
                            class="delete_icon fa-solid fa-eraser"></i></a>
                    {{-- @endforeach --}}
                    
                </div>
         </div>

    </main>
@endsection


@section('scripts')
@endsection
