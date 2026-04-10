<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @switch($role)
    @case("admin")
    <p>You are an administrator.</p>
    @break

    @case("penulis")
    <p>You are a writter</p>
    @break

    @case("pembaca")
    <p>You are reading</p>
    @break
    
    @default
    <p>You are a reguler user</p>
    @endswitch    
</body>
</html>