@extends('master.website-master')

@section('title')
    Contact Us | Company Website
@endsection

@section('website-body')


    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Contact</h2>
                <ol>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>Contact</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <div class="map-section">
        <iframe style="border:0; width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3655.4597204682204!2d90.49738451429437!3d23.62370189952292!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b108e3e9cdd1%3A0xbe8ff3644194556f!2z4Kao4Ka-4Kaw4Ka-4Kav4Ka84Kaj4KaX4Kae4KeN4KacIOCmleCnh-CmqOCnjeCmpuCnjeCmsOCngOCmr-CmvCDgprbgprngp4DgpqYg4Kau4Ka_4Kao4Ka-4Kaw!5e0!3m2!1sbn!2sbd!4v1656997098716!5m2!1sbn!2sbd" frameborder="0" allowfullscreen></iframe>
    </div>

    <section id="contact" class="contact">
        <div class="container">

            <div class="row justify-content-center" data-aos="fade-up">

                <div class="col-lg-10">

                    <div class="info-wrap">
                        <div class="row">
                            <div class="col-lg-4 info">
                                <i class="icofont-google-map"></i>
                                <h4>Location:</h4>
                                <p>{{$contact->location}}</p>
                            </div>

                            <div class="col-lg-4 info mt-4 mt-lg-0">
                                <i class="icofont-envelope"></i>
                                <h4>Email:</h4>
                                <p>{{$contact->email}}</p>
                            </div>

                            <div class="col-lg-4 info mt-4 mt-lg-0">
                                <i class="icofont-phone"></i>
                                <h4>Call:</h4>
                                <p>{{$contact->call}}</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>



            <div class="row mt-5 justify-content-center" data-aos="fade-up">
                @if(Session('message'))
                    <div class="alert alert-dismissible fade show alert-success text-center " role="alert">
                        {{Session::get('message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="col-lg-10">
                    <form action="{{ route('contact.message') }}" method="POST" >
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            @error('subject')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                            @error('message')
                            <span class="text-danger">{{$message}}</span>
                            @enderror

                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success btn-lg ">Send Message</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->


@endsection
