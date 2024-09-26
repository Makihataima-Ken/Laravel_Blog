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
         <!-- banner section start -->
         @include('home.banner')
         <!-- banner section end -->
      </div>
      <!-- header section end -->
      <!-- services section start -->
      @include('home.services')
      <!-- services section end -->
      <!-- about section start -->
      @include('home.about')
      <!-- about section end -->
      <!-- footer section start -->
      @include('home.footer')    
   </body>
</html>