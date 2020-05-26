@extends('layouts.app')

@section('content')

<div class="container">

@foreach ($getImage   as $image)
<div class="card" style="width: 18rem;">
  <img name="image" class="card-img-top" src="{{ url($image->image) }}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    
    <button id="sub" class="btn btn-success btn-submit">Submit</button>
  </div>
</div>
@endforeach
</div>
@endsection

@section('script')
<script type="text/javascript">
   jQuery(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $("#sub").click(function(e){
      console.log(e)
        e.preventDefault();
   
        var name = $("input[name=name]").val();
   
        $.ajax({
           type:'POST',
           url:"{{ route('grey') }}",
           data:{name:name},
           success:function(data){
             if(data.success){alert(data.success);}else{
               alert(error)
             }
           }
        });
  
    });});
</script>
@endsection