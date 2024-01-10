@extends('Layout.app')
@section('title', 'Scan')
@section('content')
<main >
    <div class="form-area">
<div class="main-container">

<div class="uploadwrapper">

  <div class="file-upload"> <div class="hidethisbutton">
    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
  </div>
    <div class="image-upload-wrap">
      <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
      <div class="drag-text">
        <h3>Drag and drop a file or select add Image</h3>
      </div>
    </div>
    <div class="file-upload-content">
      <img class="file-upload-image" src="#" alt="your image" />
      <div class="image-title-wrap">
        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span>
        </button>

        <a href="report" class="file-link">
          <input class="file-input" type="file" name="file" hidden>
          <p>Submit</p>
        </a>
      </div>
    </div>

  </div>
      </div></div></div>
@include('javascript.fileupload')
</main>
@endsection
