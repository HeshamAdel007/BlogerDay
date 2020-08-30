@extends('layouts.app')

@section('title', 'Contact-Us')


@section('content')
<!-- ##### Contact Area Start ##### -->
<section class="contact-area mb-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-7 col-lg-8">
                <!-- Section Heading -->
                <div class="section-heading style-2">
                    <h4>Contact</h4>
                    <div class="line"></div>
                </div>
                <!-- Contact Form Area -->
                <div class="contact-form-area mt-50">
                    <form method="post" action="{{ route('contact.store') }}">
                        {{csrf_field()}}
                        {{method_field('post')}}
                        <div class="form-group">
                            <label for="name">Name*</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <label for="email">Email*</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="form-group">
                            <label for="message">Message*</label>
                            <textarea name="message" class="form-control" id="message" name="message" cols="30" rows="10"></textarea>
                        </div>
                        @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <button class="btn vizew-btn mt-30" type="submit">Send Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Contact Area End ##### -->
@endsection
