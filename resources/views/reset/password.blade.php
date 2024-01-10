@extends('Layout.app')

@section('content')

  <div class="main-container">


            {!! Form::open(['method'=>'POST', 'action'=> 'App\Http\Controllers\Auth\ResetController@store']) !!}

                @if(Session::has('message'))
                <div>
                  {{ Session::get('message') }}

                </div>
              @endif

              @if(Session::has('error'))
                <div >
                  {{ Session::get('error') }}

                </div>
              @endif

              @if ($errors->any())
                @foreach ($errors->all() as $error)
                  <div >
                    {{ $error }}

                  </div>
                @endforeach
              @endif

            <div class="form-group">
              {!! Form::label('email', '     Enter Your Email:') !!}
              {!! Form::email('email', null, ['class'=>'form-control'])!!}
              <span class="error-message" id="emailError"></span>

            </div>


            <div class="form-group">
                {!! Form::submit('Sent Email', ['class'=>'custom-submit-button']) !!}
            </div>
            {!! Form::close() !!}

          </div>


          <script>


function validateEmail() {
    var emailInput = document.getElementById('email');
    var emailError = document.getElementById('emailError');
    // Updated regex to ensure the email does not start with a dot
    var emailRegex = /^[^\s@.][^\s@]*@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(emailInput.value)) {
        emailError.textContent = 'Enter a valid email address';
        return false; // Return false to indicate validation failure
    } else {
        emailError.textContent = '';
        return true; // Return true to indicate validation success
    }
}



            document.getElementById('email').addEventListener('keyup', validateEmail);

        </script>
@endsection
