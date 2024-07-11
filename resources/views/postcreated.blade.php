<!DOCTYPE html>
<html>
<head>
    <title>New Post Created</title>
</head>
<body>
    <h1>{{ 'A new post has been created' }}: {{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
</body>
</html>
