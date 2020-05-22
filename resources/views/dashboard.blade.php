@extends('layouts.app')

@section('content')
<div class="container">
<form  action="/routing" method="post" enctype="multipart/form-data" >
@csrf
<div class="row">
<div class="col-md-6 mb-3">
<h3> Listing Type </h3>
<select name="value" class="custom-select custom-select-lg mb-3">
  <option selected>Open this select menu</option>
  <option value="active">Active</option>
  <option value="pending">Pending</option>
  <option value="sold">Sold</option>
</select>
</div>
<div class="col-md-6 mb-3">
<h3> Media Type </h3>
<select name="media" class="custom-select custom-select-lg mb-3">
  <option selected>Open this select menu</option>
  <option media="printing">Printing</option>
  <option media="social">Social Media</option>
  <option media="web">Web</option>
</select>
</div>
</div>
<h3> Chose Images</h3>
  <div class="custom-file my-2">
  <input name="image" type="file" class="custom-file-input" id="customFile">
  <label class="custom-file-label" for="customFile">Choose file</label>
</div>
<button class="btn btn-primary" value="Upload" type="submit">Submit form</button>
</form>
</div>
@endsection
