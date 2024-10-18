<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cargo TS/offices</title>
</head>

<body>
    <main>

        <div class="container-fluid p-0  fix_ed">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark  nav-bar   ">
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
                        <a class="navbar-brand mt-2 mt-lg-0" href="#">
                            <h4>Cargo TS</h4>
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

  

    <div class="offices_page_cards">
        <div class="view_office_img">
            <img src="{{asset('/offices/'.$office->Profile_picture)}}"
                alt="Office 1" class="office-image">
        </div>
            
        <div class="office-card">
                <h2>Seat</h2>
                <div class="office-details">
                    <h3 class="office-title"><b>Branch:</b> {{$office->office_name}}</h3>
                    <p class="office-address"><b>Address:</b> {{ $office->office_address }}</p>
                    <p class="office-contact"><b>Phone:</b> {{ $office->phone }}</p>
                    <p class="office-contact"><b>Email:</b> {{ $office->email }}</p>
                    <p class="office-contact"><b>Zip-code:</b> {{ $office->zip_code }}</p>
                    <p class="office-contact"><b>Country:</b> {{ $office->country }}</p>
                    <p class="office-contact"><b>City:</b> {{ $office->city }}</p>
                    <p class="office-contact"><b>Province:</b> {{ $office->province }}</p>
                </div>
        </div>

    </div> 
 
    </main>
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

                <!-- Section: Form -->
                <section class="">
                    <form action="">
                        <!--Grid row-->
                        <div class="row d-flex justify-content-center">
                            <!--Grid column-->
                            <div class="col-auto">
                                <p class="pt-2">
                                    <strong>Sign up for Website</strong>
                                </p>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-5 col-12">
                                <!-- Email input -->
                                <div class="form-outline form-white ">
                                    <input type="email" id="form5Example21" class="form-control" />
                                    <label class="form-label my-2" for="form5Example21">Email address</label>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-auto">
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-outline-light mb-4">
                                    Subscribe
                                </button>
                            </div>
                            <!--Grid column-->
                        </div>
                        <!--Grid row-->
                    </form>
                </section>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
