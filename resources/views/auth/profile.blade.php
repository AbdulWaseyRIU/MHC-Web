@extends('Layout.app')

@section('content')
<div class="form-area">
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
      <div class="grid-item">
        <h4>Profile Information</h4>
        <span class="text-justify mb-3">Update your account's profile information and email address.<br><br> When You change your email, you need to verify your email else the account will be blocked</span>
      </div>

      <!-- First row, second column -->
      <div class="grid-item">
        <div>
          {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['App\Http\Controllers\Auth\ProfileController@update',$user->uid], 'id' => 'profileForm']) !!}
          {!! Form::label('displayName', 'Name ',['class'=>'col-12 text-left pl-0']) !!}
          {!! Form::text('displayName', null, ['class'=>' col-md-8 form-control', 'id' => 'displayName', 'onkeyup' => 'validateName("displayName", "displayNameError")']) !!}

          <span class="error-message" id="displayNameError"></span>

          {!! Form::label('email', 'Email ',['class'=>'pt-3 col-12 text-left pl-0']) !!}
          {!! Form::email('email', null, ['class'=>'col-md-8 form-control', 'id' => 'email', 'onkeyup' => 'validateEmail("email", "emailError")']) !!}
          <span class="error-message" id="emailError"></span>

          <div class="flex items-center justify-end mt-4">
            <button type="button" class="login-button" onclick="validateProfileForm()">
                {{ __('Submit') }}
            </button>
          </div>
        </div>
      </div>

      <!-- Second row, first column -->
      <div class="grid-item">
        <h4>Update Password</h4>
        <span>Ensure your account is using a long, random password to stay secure.</span>
      </div>

      <!-- Second row, second column -->
      <div class="grid-item">
        {!! Form::label('current_password', 'Current Password:',['class'=>'col-12 text-left pl-0']) !!}
        {!! Form::password('current_password', ['class'=>'col-md-8 form-control', 'id' => 'currentPassword', 'onkeyup' => 'validatePassword("currentPassword", "currentPasswordError")']) !!}
        <span class="error-message" id="currentPasswordError"></span>

        {!! Form::label('new_password', 'New Password:',['class'=>'col-12 text-left pl-0']) !!}
        {!! Form::password('new_password', ['class'=>'col-md-8 form-control', 'id' => 'newPassword', 'onkeyup' => 'validatePassword("newPassword", "newPasswordError")']) !!}
        <span class="error-message" id="newPasswordError"></span>

        {!! Form::label('new_confirm_password', 'Confirm Password:',['class'=>'col-12 text-left pl-0']) !!}
        {!! Form::password('new_confirm_password', ['class'=>'col-md-8 form-control', 'id' => 'confirmPassword', 'onkeyup' => 'validateConfirmPassword("newPassword", "confirmPassword", "confirmPasswordError")']) !!}
        <span class="error-message" id="confirmPasswordError"></span>

        <div class="flex items-center justify-end mt-4">
          <button type="button" class="login-button" onclick="validatePasswordForm()">
              {{ __('Submit') }}
          </button>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@include('javascript.profile-validation')
@endsection
