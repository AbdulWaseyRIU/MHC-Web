@extends('Layout.app')
@section('title', 'Scan')

@section('content')

    <div class="form-area">
<div class="scan-container">

<div class="uploadwrapper">
    @if(isset($error))
    <div class="alert alert-danger">
        {{ $error }}
    </div>
@endif
  <div class="file-upload"> <div class="hidethisbutton">
    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
  </div>
    <div class="image-upload-wrap">    <form class="null-form" action="uploadimg" method="post" enctype="multipart/form-data">
        @csrf
      <input class="file-upload-input" type='file' name="File" onchange="readURL(this);" accept="image/*" />
      <div class="drag-text">
        <h3>Drag and drop a file or select add Image</h3>
      </div>
    </div>
    <div class="file-upload-content">
      <img class="file-upload-image" src="#" alt="your image" />
      <div class="image-title-wrap">
        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span>
        </button>
        <button type="submit">submit</button>
    </form>

      </div>
    </div>

  </div>
      </div></div></div>
@include('javascript.fileupload')
<style>
    .scan-container {
    width: 80%;
    padding: 1px;
    margin: auto auto;
}button {
    display: block;
    padding: 15px 30px;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s, transform 0.3s;
    outline: none;
    margin-left: auto;
    margin-right: auto;
    margin-top: 30px;
    background-color: rgba(37, 31, 31, 0.5);
}

button:hover {

    background-color: rgba(37, 31, 31, 0.8);
    color: #ffffff;
    transform: scale(1.05);
}

button:active {
    transform: scale(0.95);
}
</style>
@endsection

