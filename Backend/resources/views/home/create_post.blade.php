<!DOCTYPE html>
<html lang="en">
   <head>
     @include('home.homecss')
     <style type="text/css">
         .services_img
         {
            height: 350px;
            width:300px;
            padding:10px;
         }
     </style>
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         @include('home.header')
      </div>
      <div>
            <form action="{{url('add_post')}}"method="POST" enctype="multipart/form-data">
                @csrf
                <div class="div_center"><label>Post Title</label><input type="text"name="title"></div>
                <div class="div_center"><label>Post Description</label><textarea name="description"></textarea></div>
                <div class="div_center"><label>Upload Image</label><input type="file"name="image"></div>
                <div class="div_center"><input type="submit"name="submit" class="btn btn-primary"></div>
            </form>
        </div>

      @include('home.footer')    
   </body>
</html>