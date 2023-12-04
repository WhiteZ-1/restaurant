@extends('layout')
@section('content')
    <div class="contact">
        <h1>Contact Us</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi fuga minus fugit, ducimus commodi perspiciatis quaerat voluptatum officia laboriosam voluptas earum animi beatae itaque reprehenderit quam doloremque ea nihil. Ea commodi odio provident voluptate!</p>
        <form class="contact-fields" action="/contact" method="post">
            @csrf
            <input type="text" name="name" placeholder="Name">
            <input type="email" name="email" placeholder="Email">
            <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your message"></textarea>
            <input class="submit" type="submit" value="Send Message">
        </form>
    </div>
@endsection