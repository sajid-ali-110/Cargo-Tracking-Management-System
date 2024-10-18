<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <title>Cargo Ts</title>
</head>

<body>

    <div class="container-fluid p-0  fix_ed">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark  nav-bar g-0 p-0  ">
            <!-- Container wrapper -->
            <div class="container-fluid ">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar brand -->
                    <a class="navbar-brand mt-2 mt-lg-0" href="{{ route('cargoTS') }}">
                        <img src="https://i.ibb.co/j5dJq2y/logo.png" />
                    </a>
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link" href="#">Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Testimonials</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Our Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">FAQ's</a>
                        </li>

                    </ul>
                    <!-- Left links -->
                </div>
                <!-- Collapsible wrapper -->

                <!-- Right elements -->
                <div class="d-flex mx-3">
                    <!-- Icon -->
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="#">About US</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact US</a>
                    </li>
                </div>
                <!-- Right elements -->
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </div>

    <div class="container-fluid hero-sec sea_rch text-light ">
        <style>
            input[type='number']::after {
                display: none;
            }
        </style>
        <div class="col-lg-6 col-sm-8 ">
            <h1 class="py-2" style="text-align: center; padding: 10px;  "><b>Track Your Shipment</b></h1>
            <h3 class="text-center padding: 0px 10px">Find and Track Your Shipping Containers effeciently in real time.
            </h3>
            <form method="get" action="{{ route('cargoTS') }}" class="input-group search_bar mt-5">

                <input name="tracking_id" type="search" class="form-control" placeholder="Enter Your Tracking Number"
                    aria-label="Search" aria-describedby="search-addon"
                    style="width: 250px; padding: 20px 10px; font-size: 18px; " />


                <button type="submit" class="btn track_btn all_button ">Track Shipment</button>
            </form>
        </div>
    </div>


    @if ($shipmnent != null)
        <div class="muhuk">
            <div id="track_div" class="container ">
                <div class="tracking_details">
                    <h1 class="beeero">Tracking Details</h1>
                    <div class="container py-5">
                        <div class="row">

                            <div class="col-md-12 col-lg-12">
                                <div id="tracking-pre"></div>
                                <div id="tracking">
                                    <div class="tracking-list">


                                        <div class="tracking-item">
                                            <div class="tracking-icon status-intransit">
                                                <svg class="svg-inline--far fa-circle fa-w-16" aria-hidden="true"
                                                    data-prefix="fas" data-icon="circle" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="tracking-date">
                            
                                                <i class="fa-solid fa-house-chimney-window"></i>
                                                </div>
                                                    <div class="tracking-content">
                                                        <span>Origin Office</span>
                                                         {{$shipmnent->get_origin_office->office_name}} | ( <i>{{$shipmnent->get_origin_office->city}}</i> ) 
                                                     </div>
                                        </div>



                                        @php
                                            $trackings= $shipmnent->tracking;
                                        @endphp

                                        @foreach ($trackings as $tracking )
                                            
                                     @php
                                         if($shipmnent->get_origin_office->ID == $tracking->office->ID){
                                            continue;
                                         }
                                     @endphp

                                        <div class="tracking-item">
                                            <div class="tracking-icon status-intransit">
                                                <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true"
                                                    data-prefix="fas" data-icon="circle" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="tracking-date">
                                                <i class="fa-solid fa-truck"></i>
                                            </div>
                                            <div class="tracking-content">
                                               <span>Received at Office</span>
                                                {{$tracking->office->office_name}} | ( <i>{{$tracking->office->city}}</i> )
                                                <span>{{$tracking->created_at->diffForHumans()}}</span>
                                            </div>
                                        </div>

                                        @endforeach

                                        <div class="@if($shipmnent->status == 'delivered' )tracking-item @else tracking-item-pending @endif ">
                                            <div class="tracking-icon status-intransit">
                                                <svg class="svg-inline--far fa-circle fa-w-16" aria-hidden="true"
                                                    data-prefix="fas" data-icon="circle" role="img"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                    data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="tracking-date">
                            
                                                <i class="fa-solid fa-house-chimney-window"></i>
                                                </div>
                                                    <div class="tracking-content">
                                                        <span>Destination Office</span>
                                                         {{$shipmnent->get_destination_office->office_name}} | ( <i>{{$shipmnent->get_destination_office->city}}</i> ) 
                                                     </div>
                                        </div>


                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h1 class="beeero">Shipment Details</h1>
                    <div class="col-md-6">
                        <table class="track_ship_details">
                            <tr>
                                <td><strong>Shipment Name:</strong></td>
                                <td><span id="detail-name">{{ $shipmnent->shipment_name }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Package Type:</strong></td>
                                <td><span id="detail-type">{{ $shipmnent->get_package_type->package_type_name }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Weight:</strong></td>
                                <td><span>{{ $shipmnent->weight }}kg</span></td>
                            </tr>
                            <tr>
                                <td><strong>Sender Name:</strong></td>
                                <td><span>{{ $shipmnent->sender->name }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Sender Phone:</strong></td>
                                <td><span>{{ $shipmnent->weight }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Receiver Name:</strong></td>
                                <td><span>{{ $shipmnent->receiver->name }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Receiver Phone:</strong></td>
                                <td><span>{{ $shipmnent->weight }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Origin Office:</strong></td>
                                <td><span>{{ $shipmnent->get_origin_office->ofice_adress }}</span></td>
                            </tr>
                            <tr>
                                <td><strong>Destination Office:</strong></td>
                                <td><span>{{ $shipmnent->get_destination_office->ofice_adress }}</span></td>
                            </tr>
                            <tr>
                                <td><strong> Is Urgent:</strong></td>
                                <td><span>{{ $shipmnent->isUrgent }}</span></td>
                            </tr>

                            <tr>
                                <td><strong>Status:</strong></td>
                                <td><span id="detail-status"> {{ $shipmnent->status }} </span></td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <div class="office_cardo">
                            <pre class="mama_g">Origin Offic               Destination Office</pre>
                            <p class="mama_g"></p>
                            <div class="track_shipment_office">

                                <div class="track_shipment_office_details">
                                    <p class="office-title"><b>Branch:</b> {{ $shipmnent->get_origin_office->office_name}}</h4>
                                    <p class="office-address"><b>address:</b> {{ $shipmnent->get_origin_office->ofice_adress}}</p>
                                    <p class="office-contact"><b>Phone</b> {{ $shipmnent->get_origin_office->phone}}</p>
                                    <p class="office-contact"><b>Email:</b> {{ $shipmnent->get_origin_office->email}}</p>
                                    <p class="office-contact"><b>Zip-code:</b> {{ $shipmnent->get_origin_office->zip_code}}</p>
                                    <p class="office-contact"><b>Country:</b> {{ $shipmnent->get_origin_office->country}}</p>
                                    <p class="office-contact"><b>State:</b> {{ $shipmnent->get_origin_office->province}}</p>
                                    <p class="office-contact"><b>City:</b> {{ $shipmnent->get_origin_office->city}}</p>
                                </div>

                                <div class="track_shipment_office_details">

                                    <p class="office-title"><b>Branch:</b> {{ $shipmnent->get_destination_office->office_name }}</h4>
                                    <p class="office-address"><b>address:</b> {{ $shipmnent->get_destination_office->ofice_adress }}</p>
                                    <p class="office-contact"><b>Phone:</b> {{ $shipmnent->get_destination_office->phone }}</p>
                                    <p class="office-contact"><b>Email:</b> {{ $shipmnent->get_destination_office->email }}</p>
                                    <p class="office-contact"><b>Zip-code:</b> {{ $shipmnent->get_destination_office->zip_code }}</p>
                                    <p class="office-contact"><b>Country:</b> {{ $shipmnent->get_destination_office->country }}</p>
                                    <p class="office-contact"><b>State:</b> {{ $shipmnent->get_destination_office->province }}</p>
                                    <p class="office-contact"><b>City:</b> {{ $shipmnent->get_destination_office->city }}</p>
                                </div>
                            </div>
                        </div>



                    </div>

                </div>
            </div>
        </div>
    @endif

    <div style="background-color: aliceblue;">
        <div class="container py-5 mb-5 ">
            <h1 class="rec_hed rec_hed1 py-2 " style="text-align: center;  color: #1e2761; font-weight: bold;"><span
                    style="font-size: 19px; color: orangered;">Our </span> <br>
                Offices</h1>
            <div class="row">
                @foreach ($all_offices as $office)
                    <div class="col-md-3  why_us card">
                        <div class=" my-2">
                            <a href="{{ route('single-office', ['id' => $office->ID]) }}">
                                <img style="object-fit: cover;" src="{{asset('/offices/'.$office->Profile_picture)}}"
                                    alt="{{ $office->name }}" class=" pb-2">

                                <h4 class="text-dark font-weight-bold">{{ $office->office_name }}</h4>
                            </a>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12 col-sm-12 mt-2 pt-5  ">
                    <h2 class="py-1 office_sarch" style="color: #1e2761;">You Can Look Up Our Offices By Searching
                        Below</h2>
                    <p style="line-height: 2.5;" class="office_sarch">Welcome to our cargo tracking system. Explore
                        our global network of
                        offices to find the one nearest to you. Discover locations, contact information, and more</p>
                    <div class=" activities">
                        <form action="{{ route('search-offices') }}">
                            <div class="input-group rounded se_rch mt-3">
                                <input name="search" type="search" class="form-control rounded " placeholder="Search Offices"
                                    aria-label="Search" aria-describedby="search-addon" />
                            </div>
                            <button type="submit" class="muko_btnbtn all_button mt-3">Search Here</button>
                        </form>
                        {{-- <div style="text-align: center; align-items: center;">
                            <button type="button" class="btn all_button mt-3">Search Here</button>
                        </div> --}}
                    </div>
                </div>

            </div>
        </div>
    </div>




    <div class="container-fluid py-5 mb-5 all_activities">
        <h1 class="rec_hed rec_hed1 py-2 " style="text-align: center;  color: #1e2761; font-weight: bold;"><span
                style="font-size: 19px; color: orangered;">WHY </span> <br>
            CHOOSE US</h1>
        <div class="row">
            <div class="col-lg-6 col-sm-12 ps-lg-5  ">
                <div class=" activities">
                    <h1 class="mt-5 py-2 rec_hed py-2  ">We Make Things Easy & High Profitable</h1>
                    <p class="my-5  act_para "> Improve the quality of the cargo delivery service. <br> Increasing
                        efficiency of supply chain become more important <br> in the changing market. Delay of business
                        processes <br> causes a critical influence on your business activity and <br> leads decrease in
                        customer satisfaction.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 mt-5 why_us   ">
                <img src="../assets/img/dominik-luckmann-SInhLTQouEk-unsplash.jpg" alt=""
                    class="img-fluid pb-2">
                <img src="../assets/img/maksym-kaharlytskyi-kDVaFjoQf4M-unsplash.jpg" alt=""
                    class="img-fluid">

            </div>
            <div class="col-lg-3 col-sm-3 mt-5 why_us ">
                <img src="../assets/img/maksym-kaharlytskyi-kDVaFjoQf4M-unsplash.jpg" alt=""
                    class="img-fluid  pb-2">
                <img src="../assets/img/dominik-luckmann-SInhLTQouEk-unsplash.jpg" alt="" class="img-fluid">


            </div>
        </div>
    </div>
    <div class="all_team" style="background-color: aliceblue;">
        <div class="container mb-5">
            <h1 class="mb-5 card_head py-2" style="text-align: center; color: #1e2761; font-weight: bold;">
                <span style="font-size: 18px; color: orangered; "> TEAM MEMBERS</span> <br> Meet With Our Leaders
            </h1>
            <div class="row">
                <div class="col-lg-3 col-sm-12">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="../assets/img/1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title py-2" style="color: orangered; font-weight: bold;">Saqlain Abbas
                            </h5>
                            <p class="card-text">Chief Executive Officer (CEO)</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="../assets/img/2.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title py-2" style="color: orangered; font-weight: bold;">Sajid Ali</h5>
                            <p class="card-text">Administrative Assistant</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="../assets/img/3.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title py-2" style="color: orangered; font-weight: bold;">Aliyan Faisal
                            </h5>
                            <p class="card-text">Logistics Coordinator</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12">
                    <div class="card">
                        <img class="card-img-top img-fluid" src="../assets/img/4.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title py-2" style="color: orangered; font-weight: bold;">Zohaib Hassan
                            </h5>
                            <p class="card-text">Operations Manager</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="all_tstimonial">
        <div class="container mb-5">
            <section>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-10 col-xl-8 text-center">
                        <h1 class="mb-5 py-1"> <span style="color: orangered; font-size: 19px;">OUR TRUST</span> <br>
                            <b>Feedback From Our Clients</b>
                        </h1>

                    </div>
                </div>

                <div class="row text-center mt-5">
                    <div class="col-md-4 mb-5 mb-md-0">
                        <div class="d-flex justify-content-center mb-4">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(1).webp"
                                class="rounded-circle shadow-1-strong" width="150" height="150" />
                        </div>
                        <h5 class="mb-3 py-1">Maria Smantha</h5>
                        <div class="rating">
                            <span class="star" onclick="rate(1)">&#9733;</span>
                            <span class="star" onclick="rate(2)">&#9733;</span>
                            <span class="star" onclick="rate(3)">&#9733;</span>
                            <span class="star" onclick="rate(4)">&#9733;</span>
                            <span class="star" onclick="rate(5)">&#9733;</span>
                        </div>
                        <p class="px-xl-3">
                            <i class="fas fa-quote-left pe-2"></i>"Whenever I need help, they're there, and they're
                            nice. That's what makes this system great!"<i class="fas fa-quote-right ps-2"></i>
                        </p>

                    </div>
                    <div class="col-md-4 mb-5 mb-md-0">
                        <div class="d-flex justify-content-center mb-4">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(2).webp"
                                class="rounded-circle shadow-1-strong" width="150" height="150" />
                        </div>
                        <h5 class="mb-3 py-1">Lisa Cudrow</h5>
                        <div class="rating">
                            <span class="star" onclick="rate(1)">&#9733;</span>
                            <span class="star" onclick="rate(2)">&#9733;</span>
                            <span class="star" onclick="rate(3)">&#9733;</span>
                            <span class="star" onclick="rate(4)">&#9733;</span>
                            <span class="star" onclick="rate(5)">&#9733;</span>
                        </div>
                        <p class="px-xl-3">
                            <i class="fas fa-quote-left pe-2"></i>This cargo tracking system is super simple to use,
                            and it always tells me where my stuff is. It's like a GPS for my shipments, and I love it!<i
                                class="fas fa-quote-right ps-2"></i>
                        </p>

                    </div>
                    <div class="col-md-4 mb-0">
                        <div class="d-flex justify-content-center mb-4">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(9).webp"
                                class="rounded-circle shadow-1-strong" width="150" height="150" />
                        </div>
                        <h5 class="mb-3 py-1">John Smith</h5>
                        <div class="rating">
                            <span class="star" onclick="rate(1)">&#9733;</span>
                            <span class="star" onclick="rate(2)">&#9733;</span>
                            <span class="star" onclick="rate(3)">&#9733;</span>
                            <span class="star" onclick="rate(4)">&#9733;</span>
                            <span class="star" onclick="rate(5)">&#9733;</span>
                        </div>
                        <p class="px-xl-3">
                            <i class="fas fa-quote-left pe-2"></i>"This system makes my job easier. I get things done
                            faster and without any hiccups. It's a must-try!"<i class="fas fa-quote-right ps-2"></i>
                        </p>

                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="container-fluid p-lg-5  all_working mb-5 " style="background-color: aliceblue;">
        <h1 class="mb-5 mt-1 work_head py-2" style="text-align: center;  color: #1e2761; font-weight: bold;"> <span
                style="font-size: 19px; color: orangered;">OUR SERVICES</span> <br>
            Anvoy Best Services</h1>
        <div class="row ">
            <div class="col-lg-4 col-sm-12">
                <div class="card">
                    <img class="card-img-top img-fluid" src="../assets/img/dominik-luckmann-SInhLTQouEk-unsplash.jpg"
                        alt="Card image cap">
                    <div class="card-footer">
                        <p style="font-size: 19px;" class="my-3">Efficient Logistics Management</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="card">
                    <img class="card-img-top img-fluid" src="../assets/img/diego-fernandez-6Vg8N8u61aI-unsplash.jpg"
                        alt="Card image cap">
                    <div class="card-footer">
                        <p style="font-size: 19px;" class="my-3">Secure Data Handling</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="card">
                    <img class="card-img-top img-fluid" src="../assets/img/fredrick-f-U9_pRASawlc-unsplash.jpg"
                        alt="Card image cap">
                    <div class="card-footer">
                        <p style="font-size: 19px;" class="my-3">Streamlined Booking Process</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="all_faq">
        <div class="container-fluid my-5">
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <img src="../assets/img/maksym-kaharlytskyi-kDVaFjoQf4M-unsplash.jpg" class="img-fluid"
                        alt="">
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div class="faq_all">
                        <h1 class="py-2 my-5 faq_head" style="font-weight: bold; line-height: 55px;"> <span
                                class="mb-5" style="color: orangered; font-size: 22px;">WE ARE READY TO HELP
                                YOU</span> <br>
                            Frequently Asked Questions</h1>

                        <div class="accordians">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                            aria-expanded="false" aria-controls="flush-collapseOne">
                                            <b class="py-1">What type of services we provide?</b>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">"We provide a comprehensive Cargo Tracking and
                                            Management System (CTMS) that offers real-time tracking, secure data
                                            management, and efficient logistics solutions for various types of cargo."
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                            aria-expanded="false" aria-controls="flush-collapseTwo">
                                            <b class="py-1">How to book your shipment?</b>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">"To book a shipment, log in to your account on our
                                            website, enter shipment details, including pick-up and delivery locations,
                                            cargo type, and preferred services. Confirm and schedule the shipment, and
                                            our system will guide you through the process, ensuring a smooth booking
                                            experience."</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                            aria-expanded="false" aria-controls="flush-collapseThree">
                                            <b class="py-1">Are there any subscription or usage fees for the
                                                CTMS?</b>
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">"Our Cargo Tracking and Management System (CTMS)
                                            may have associated subscription or usage fees, depending on the services
                                            and features you require. Please contact our customer support for detailed
                                            pricing information and to discuss a plan that suits your specific needs."
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact_all" style="background-color: aliceblue;">
        <div class="container  my-5 py-5"
            style="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; background-color: #fff;">
            <h1 class="mb-5 py-2" style="text-align: center;  color: #1e2761; font-weight: bold;">
                <span style="font-size: 18px; color: orangered;">Get in Touch</span> <br> Contact Us
            </h1>
            <div class="row justify-content-center">
                <div class="col-lg-9">

                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="your-name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="your-name" name="your-name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="your-surname" class="form-label">Your Surname</label>
                                <input type="text" class="form-control" id="your-surname" name="your-surname"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="your-email" class="form-label">Your Email</label>
                                <input type="email" class="form-control" id="your-email" name="your-email"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="your-subject" class="form-label">Your Subject</label>
                                <input type="text" class="form-control" id="your-subject" name="your-subject">
                            </div>
                            <div class="col-12">
                                <label for="your-message" class="form-label">Your Message</label>
                                <textarea class="form-control" id="your-message" name="your-message" rows="5" required></textarea>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn all_button">Contact Us</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid p-0">
        <!-- Footer -->
        <footer class=" text-center text-white" style="background-color: #1e2761;">
            <!-- Grid container -->
            <div class="container p-4">
                <!-- Section: Social media -->
                <section class="mb-4">
                    <!-- Facebook -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                            class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                            class="fab fa-twitter"></i></a>

                    <!-- Google -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                            class="fab fa-google"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                            class="fab fa-instagram"></i></a>

                    <!-- Linkedin -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                            class="fab fa-linkedin-in"></i></a>

                    <!-- Github -->
                    <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i
                            class="fab fa-github"></i></a>
                </section>
                <!-- Section: Social media -->

            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2023 Copyright:
                <a class="text-white" href="">Cargo TrackingSystem.com </a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>

    <a href="#track_div" id="track_a"></a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


    @if ($shipmnent != null)
        <script>
            $(document).ready(function() {
                // Select the target element by its ID
                var intx = setInterval(() => {
                    var $targetElement = $('#track_div');

                    // Check if the target element exists on the page
                    if ($targetElement.length) {
                        // Use the scrollTop function to scroll to the element
                        $('html, body').scrollTop($targetElement.offset().top);

                        clearInterval(intx)

                    }
                }, 1200);
            });
        </script>
    @endif
</body>

</html>
