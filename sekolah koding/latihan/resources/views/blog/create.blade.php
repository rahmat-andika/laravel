<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Create</title>
</head>
<body>
    <h1>Halaman Create</h1>
    <br>
    <form action="{{url('post')}}" method='post'>
        @csrf
        <label for="title">title</label>
        <br>
        <input type="text" id="title" name="title">

        <br>
        <label for="body">body</label>
        <br>
        <textarea name="body" id="body" cols="30" rows="10"></textarea>
        <br>
        <button type="submit">simpan</button>
    </form>
</body>
</html>