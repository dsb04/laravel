<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=form, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/photo" method="post" enctype="multipart/form-data">
    @csrf
<input type="file" name="photo">
<button type="submit">Enviar</button>
</form>
</body>
</html>