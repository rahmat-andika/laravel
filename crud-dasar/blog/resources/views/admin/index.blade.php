@extends('templates/admin')

@section('title')
    index
@endsection

@section('body')
    
    <div class="container">

        <a class="btn btn-primary mt-5" href="{{ url('admin/create') }}">Tambah Data</a>

        <table class="table table-striped mt-2">
            <thead>
                <tr>
                <th scope="col">no</th>
                <th scope="col">TITLE</th>
                <th scope="col">DESKRIPSI</th>
                <th scope="col">GAMBAR</th>
                <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
            @foreach( $data as $d )
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $d->title }}</td>
                    <td>{{ $d->deskripsi }}</td>
                    <td><img src="img/{{ $d->gambar }}" alt="sabun-mandi" width="50px"></td>
                    <td>
                        <a class="btn btn-success btn-sm mr-2" href="#">Edit</a>
                        <a class="btn btn-danger btn-sm mr-2" hrref="#">Delete</a>
                        <a class="btn btn-primary btn-sm mr-2" href="#">Info</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection