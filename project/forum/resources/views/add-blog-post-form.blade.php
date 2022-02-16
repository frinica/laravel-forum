<!DOCTYPE html>
<html>

<head>
  <title>Laravel 8 Form Example Tutorial</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-4">
    @if(session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
    @endif
    <div class="card">
      <div class="card-header text-center font-weight-bold">
        Laravel 8 - Add Blog Post Form Example
      </div>
      <div class="card-body">
        <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-form')}}">
          @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" id="title" name="title" class="form-control" required="">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Content</label>
            <textarea name="content" class="form-control" required=""></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
    @foreach ($posts as $post)

    <div class="card my-4">
      <div class="card-header text-center font-weight-bold bg-info">
        {{ $post->title }}
      </div>
      <div class="card-body">
        {{ $post->content }}
      </div>
      <hr>
      <div class="card-body">
        <h3>Comment on this</h3>
        <form method="post" action="{{url('comments-form')}}">
          @csrf
          <input hidden name="post_id" value={{ $post->id }}>
          <div class="form-group">
            <label>Name</label>
            <input type="text" id="title" name="name" class="form-control" required="">
          </div>
          <div class="form-group">
            <label>Comment</label>
            <textarea name="comment" class="form-control" required=""></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      @foreach ($post->find($post->id)->comments as $comment)
      <div class="card-header text-center">
        {{ $comment->name }}
      </div>
      <div class="card-body">
        {{ $comment->comment }}
      </div>
      @endforeach
    </div>
    @endforeach
  </div>
</body>

</html>