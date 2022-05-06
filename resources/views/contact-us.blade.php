@extends('layouts.app')
@section('content')
<div class="about-sec">
        <div class="overlay"></div>
        <div class="text-center text-sec">
            <h1 class="text-center main-heading text-white py-4">Contact Us</h1>
            <hr>
            <p class="text-white">
                Reach out for of any questions you have, or if you simply want to share your amazing idea to make this platform even better.
            </p>
        </div>
    </div>

    <div class="chat-with-us mt-5">
        <div class="container">
            <h1 class="main-heading light-green-color">Your online presence on your terms..</h1>
            <p>
                Your online presence on your terms, not ours. We’re here to help you move forward with your digital
                journey – whether it’s your freelancer business, online store, or simply a personal blog.
            </p>

            <div class="row">
                <div class="col-12 col-md-6 pt-5">
                    <div class="d-flex">
                        <div class="pe-3">
                            <img src="./images/Email.png" class="img-fluid" alt="">
                        </div>
                        <div>
                            <h5>Email</h5>
                            <a href="#">info@example.com</a>
                        </div>
                    </div>
                    <br><br>
                    <div class="d-flex">
                        <div class="pe-3">
                            <img src="./images/Customer-Service.png" class="img-fluid" alt="">
                        </div>
                        <div>
                            <h5>WhatsApp</h5>
                            <a href="#">+0 000 000 0000</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <img src="./images/contact.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="contact-form py-5">
        <div class="container">
            <div class="text-center">
                <h1 class="main-heading pt-4">Drop Us Mail</h1>
                <p>Let us know how we can help you.</p>
            </div>
            <div class="col-sm-12 col-md-10-off-set-1 col-lg-8 offset-lg-2">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                 @endif
                <form action="{{url('message_send')}}" method="POST" class="p-4" id="contactForm" data-toggle="validator">
                    @csrf    
        
                    <div class="mb-3">
                        <label for="name" class="form-label">Name<span class="text-danger">*</span> </label>
                        <input type="text" class="form-control" placeholder="Entyer your name" aria-describedby="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="emailAddress" class="form-label">Email Address<span
                                class="text-danger">*</span></label>
                        <input type="email" class="form-control" placeholder="Enter your e-mial" name="email" aria-describedby="emailAddress" required>
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone Number</label>
                        <input type="number" placeholder="Enter your phone number" name="phone" class="form-control" aria-describedby="phoneNumber" >
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Your Comments</label>
                        <textarea class="form-control" name="message" id="" cols="30" rows="6"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success px-5">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection    