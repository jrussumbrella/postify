<div>
    <h1> Posts </h1>

    <ul>
     @foreach($posts as $post)
        <li>{{ $post->body }}</li>   
     @endforeach
    </ul>
</div>