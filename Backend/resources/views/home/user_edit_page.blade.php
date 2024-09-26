<!DOCTYPE html>
<html lang="en">
   <head>
     <base href="/public">
     @include('home.homecss')
     <style type="text/css">
        .post_title
        {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            color: white;
            padding: 30px;
        }
        .div_center
        {
            text-align: center;
            padding: 30px;
        }
        label
        {
            display: inline-block;
            width: 200px;
        }
        .old_img
        {
          height: 100px;
          width: 150px;
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
        <div class="page-content">
            
            @if(session()->has('message'))
            <div class="alert alert-success"><button class="button" class="close" data-dismiss="alert" area-hiden="true">x</button>{{session()->get('message')}}</div>
            @endif
            
            <h1 class="post_title">Edit Post</h1>
                <form action="{{url('user_update_post',$post->id)}}"method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_center"><label>Post Title</label><input type="text"name="title"value="{{$post->title}}"></div>
                    <div class="div_center"><label>Post Description</label><textarea name="description">{{$post->description}}</textarea></div>
                    <div class="div_center"><label>Old Image</label><img src="/postimage/{{$post->image}}" class="old_img"></div>
                    <div class="div_center"><label>Upload Image</label><input type="file"name="image"></div>
                    <div class="div_center"><input type="submit"value="update" class="btn btn-primary"></div>
                </form>
        </div>
   </body>
</html>