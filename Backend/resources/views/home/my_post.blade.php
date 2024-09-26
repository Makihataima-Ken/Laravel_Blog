<!DOCTYPE html>
<html lang="en">
   <head>
     @include('home.homecss')
     <style type="text/css">
         .post_img
         {
            height: 350px;
            width:300px;
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
      <div class="container">
            <h1 class="services_taital">My Posts </h1>
            <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration</p>
            <div class="services_section_2">
               <div class="row">
                  @foreach($post as $post)
                  <div class="col-md-12" style="text-align:center">
                     <div><img src="postimage/{{$post->image}}" class="post_img"></div>
                     <h3><b>{{$post->title}}</b></h3>
                     <h4>{{$post->description}}</h4>
                     <p>Posted by <b>{{$post->name}}</b></p>
                     <a href="{{url('delete_post',$post->id)}}"class="btn btn-danger" onclick="return confirm('are you sure that you want to delete this?')">Delete</a>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      @include('home.footer')    
   </body>
</html>