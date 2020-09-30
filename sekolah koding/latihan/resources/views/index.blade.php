@extends('layout/app')

@section('title')
    Post
@endsection

@section('judul')
    Halaman Post !!
@endsection

@section('body')
    @if( count($posts) > 0 )
        <ul>
            @foreach( $posts as $post )
                <!-- <a href="{{ route('post.show', $post['id']) }}"><li>{{ $post['title'] }}</li></a> -->
                <a href="post/{{ $post['id'] }}"><li>{{ $post['title'] }}</li></a>
            @endforeach
        </ul>
    @else
        <p>Tidak Ada Hasil</p>
    @endif
@endsection
    
