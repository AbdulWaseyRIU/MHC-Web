@extends('Layout.app')
@section('title', 'Contact-us')
@section('content')
<main >

    <div class="contact-container">
     <div class="contact-form">
       <div class="first-container">
        <div class="info-container">
          <div>
            <h3>Address</h3>
            <p>Riphah I-14 Islamabad   </p>
          </div>
          <div>
            <h3>Lets Talk</h3>
            <p>051-851485</p>
          </div>
          <div>
            <h3>General Support</h3>
            <p>admin@riphah.com</p>
          </div>
        </div>
       </div>
       <div class="second-container">
         <h2>Send Us A Message</h2>
         <form action="/contactform" method="post">
            @csrf
            <div class="form-group">
                <label for="first-name-input">Tell us your name*</label>
                <input id="first-name-input" type="text" name="first_name" placeholder="First name" required="">
                <input id="last-name-input" type="text" name="last_name" placeholder="Last name" required="">
            </div>
            <div class="form-group">
                <label for="email-input">Enter your email</label>
                <input id="email-input" type="text" name="email" placeholder="Eg. example@gmail.com" required="">
            </div>
            <div class="form-group">
                <label for="phone-input">Enter phone number</label>
                <input id="phone-input" type="text" name="phone_number" placeholder="Eg. 0314-5149097" required="">
            </div>
            <div class="form-group">
                <label for="message-textarea">Message</label>
                <textarea class="textarea" id="message-textarea" name="message" placeholder="Write us a message"></textarea>
            </div>
            <button type="submit" class="btn">Send message</button>
        </form>
       </div>
     </div>
</div>
</main>

@endsection
