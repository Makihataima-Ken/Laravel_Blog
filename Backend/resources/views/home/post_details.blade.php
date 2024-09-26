<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="/public">
     @include('home.homecss')
     <style type="text/css">
         .post_img
         {
            height: 250px;
            width:400px;
            padding:10px;
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
            <div><img src="postimage/{{$post->image}}" class="post_img"></div>
            <h3><b>{{$post->title}}</b></h3>
            <h4>{{$post->description}}</h4>
            <p>Posted by <b>{{$post->name}}</b></p>
      </div>

      @include('home.footer')    
   </body>
</html>