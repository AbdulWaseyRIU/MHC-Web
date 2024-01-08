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
         <form action="/contact" method="post">
            @csrf
           <div class="form-group">
             <label for="name-input">Tell us your name*</label>
             <input id="name-input" type="text" placeholder="First name" required="">
             <input type="text" placeholder="Last name" required="">
           </div>
           <div class="form-group">
             <label for="email-input">Enter your email</label>
             <input id="email-input" type="text" placeholder="Eg. example@gmail.com" required="">
           </div>
           <div class="form-group">
             <label for="phone-input">Enter phone number</label>
             <input id="phone-input" type="text" placeholder="Eg. 0314-5149097" required="">
           </div>
           <div class="form-group">
             <label for="message-textarea">Message</label>
             <input class="textarea" id="message-textarea" placeholder="Write us a message"></input>
           </div>
         <a class="btn">Send message</a>
         </form>
       </div>
     </div>
</div>
</main>

@endsection
