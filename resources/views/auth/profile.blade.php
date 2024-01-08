@extends('Layout.app')

@section('content')

  <div class="container">
    @if(Session::has('message'))
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ Session::get('message') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endforeach
    @endif

    @if(Session::has('error'))
      <div class="alert alert-danger alert-dismissible fade show">
        {{ Session::get('error') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>
    @endif


    <div class="grid-container">

        <!-- First row, first column -->
        <div class="grid-item"> <h4>Profile Information</h4>
            <span class="text-justify mb-3">Update your account's profile information and email address.<br><br> When You change your email, you need to verify your email else the account will be blocked</span></div>

        <!-- First row, second column -->
        <div class="grid-item">
            <div>
             {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['App\Http\Controllers\Auth\ProfileController@update',$user->uid]]) !!}
            {!! Form::open() !!}


              {!! Form::label('displayName', 'Name ',['class'=>'col-12 text-left pl-0']) !!}
              {!! Form::text('displayName', null, ['class'=>' col-md-8 form-control'])!!}

              {!! Form::label('email', 'Email ',['class'=>'pt-3 col-12 text-left pl-0']) !!}
              {!! Form::email('email', null, ['class'=>'col-md-8 form-control'])!!}
              {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
            </div>
            </div>

        <!-- Second row, first column -->
        <div class="grid-item">        <h4>Update Password</h4>
            <span>Ensure your account is using a long, random password to stay secure.</span></div>

        <!-- Second row, second column -->
        <div class="grid-item">
             {!! Form::label('new_password', 'New Password:',['class'=>'col-12 text-left pl-0']) !!}
            {!! Form::password('new_password', ['class'=>'col-md-8 form-control'])!!}
            {!! Form::label('new_confirm_password', 'Confirm Password:',['class'=>'col-12 text-left pl-0']) !!}
            {!! Form::password('new_confirm_password', ['class'=>'col-md-8 form-control'])!!}
            {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
      </div>
  </div>

@endsection
<style>
    /* Define the grid container */
    .grid-container {
      display: grid;
      grid-template-columns: 1fr 1fr; /* Two columns of equal width */
      grid-template-rows: 1fr 1fr; /* Two rows of equal height */
      gap: 10px; /* Gap between grid items */
    }

    /* Style the grid items */
    .grid-item {
      padding: 20px;
      border: 1px solid #ccc;
      text-align: center;
    }
  </style>
