<!DOCTYPE html>
<html lang="en">
   <head>
     @include('home.homecss')
     <style type="text/css">
         .services_img
         {
            height: 350px;
            width:500px;
            padding:20px;
            margin: auto;
         }
     </style>
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
      </div>
      <div class="col-md-12" style="text-align:center">
            <div><img src="postimage/{{$post->image}}" class="services_img"></div>
            <h3><b>{{$post->title}}</b></h3>
            <h4>{{$post->description}}</h4>
            <p>Posted by <b>{{$post->name}}</b></p>
            <div class="btn_main"><a href="{{url('post_details',$post->id)}}">Read More</a></div>
        </div>

      @include('home.footer')    
   </body>
</html>