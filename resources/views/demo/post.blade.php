<!doctype html>
<html>
<body>
<h1>{{ $post->title }}</h1>
<p>{{ $post->body }}</p>
<hr>
<h3>Comments ({{ $post->comments->count() }})</h3>
<ul>
@foreach($post->comments as $comment)
 <li>
 {{ $comment->comment_text }}
 @if($comment->user)
 — <small>{{ $comment->user->name }}</small>
 @endif
 </li>
@endforeach
</ul>
</body>
</html>