<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman | @yield('title')</title>
</head>
<body>
    <ul>
        <a href="{{ url('/') }}"><li>Home</li></a>
        <a href="{{ route('post.index') }}"><li>Post</li></a>
        <a href="{{ url('/blog') }}"><li>Blog</li></a>
    </ul>
    <h1>@yield('judul')</h1>
    
    @yield('body')
    
</body>
</html>