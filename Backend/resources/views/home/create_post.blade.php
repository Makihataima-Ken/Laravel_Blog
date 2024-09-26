<!DOCTYPE html>
<html lang="en">
   <head>
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
     </style>
   </head>
   <body>
      @include('sweetalert::alert')
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')

         <h1 class="post_title">Add Post</h1>
         <div>
            <form action="{{url('user_post')}}"method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_center"><label>Post Title</label><input type="text"name="title"></div>
                <div class="div_center"><label>Post Description</label><textarea name="description"></textarea></div>
                <div class="div_center"><label>Upload Image</label><input type="file"name="image"></div>
                <div class="div_center"><input type="submit"name="submit" class="btn btn-outline secondary"></div>
            </form>
        </div>
      </div>


      @include('home.footer')    
   </body>
</html>