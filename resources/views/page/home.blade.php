
@section('home')
<div id="home">
  <!-- container -->
  <div class="container">
    <!-- home wrap -->
    <div class="home-wrap">
      <!-- home slick -->
      <div id="home-slick">
        <!-- banner -->
        @foreach($slide as $value)
        <div class="banner banner-1">
          <img src="public/images/slides/{{$value->image}}" alt="">
          <div class="banner-caption text-center">
          </div>
        </div>
        @endforeach
        <!-- /banner -->

      </div>
      <!-- /home slick -->
    </div>
    <!-- /home wrap -->
  </div>
  <!-- /container -->
</div>
@endsection
