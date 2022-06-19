
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<title>@yield('page_title', 'Default title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <style>
        .ui-autocomplete-loading {
            background: white url("images/ui-anim_basic_16x16.gif") right center no-repeat;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
</head>
<body>
<div class="row">
        <div class="col">
            <a href="{{ url('news/create') }}" class="btn btn-primary">Create</a>
        </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th scope="col">Description</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($news as $news)
    <tr>
      <td >{{ $news->id}}</td>
      <td ><img src="{{asset("storage/$news->image")}}" alt="..." class="img-thumbnail"></td>
      <td><a href="{{ url('show', $news->id) }}">{{ $news->title }}</a></td>
      <td>{{ $news->category->title}}</td>
      <td>{{ $news->description}}</td>
      <td>{{ $news->image}}</td>
      <td><a href="{{ route('news.edit', $news->id) }}">edit</a>
      <form action="{{ route('news.delete', $news->id) }}" method="post">
        @csrf
        @method("delete")
        <button class="btn btn-danger" type="submit">Delete</button>
      </form>
      </td>
    </tr>   
    @endforeach

    
  </tbody>
</table>
</body>
</html>
