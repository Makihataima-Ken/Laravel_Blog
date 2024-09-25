<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
        .title_deg
        {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            color: white;
            padding: 30px;
        }
        .table_deg
        {
            border: 1px solid white;
            width: 80%;
            margin-left: 70px;
            text-align: center;
        }
        .topth
        {
            background-color: rebeccapurple;
        }

    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <h1 class="title_deg">All Post</h1>
        <table class="table_deg">
            <tr class="topth">
                <th>Title</th>
                <th>Description</th>
                <th>Posted by</th>
                <th>Status</th>
                <th>Usertype</th>
                <th>Image</th>
            </tr>
            @foreach($post as $post)
            <tr>
                <th>{{$post->title}}</th>
                <th>{{$post->description}}</th>
                <th>{{$post->name}}</th>
                <th>{{$post->status}}</th>
                <th>{{$post->usertype}}</th>
                <th>{{$post->image}}</th>
            </tr>
            @endforeach
        </table>
      </div>
      @include('admin.footer')
  </body>
</html>