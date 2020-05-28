@extends('layouts.app')

@section('content')

<div class="container">

@foreach ($getImage   as $image)
<div class="card" style="width: 18rem;">
  <img name="image" class="card-img-top img" src="{{ url($image->image) }}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

    <button id="sub" class="btn btn-success btn-submit">Submit</button>
  </div>
</div>
@endforeach
</div>
<script>
$(document).ready(function() {
  $('#sub').click(function(e){
    var images = $('.img').attr('src');

    $.ajax({
  type: "POST",
  url: 'http://images.sajjjd/grey',
  data: {images,
        "_token": "{{ csrf_token() }}",

        },
  success: function (data) {
            //PROBLEM HERE **********
            if(data.success == true ){
               alert('true');
            } else {
               alert('false')
            }},
  dataType: 'json',

});
  })
})

</script>
@endsection


