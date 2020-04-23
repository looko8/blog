<div>
    <h2>Latest posts</h2>
    <ul class="list-group">
        @foreach($latestPosts as $post)
            <li class="list-group-item">
                <a href="{{route('users.sections.articles.show', ['user' => $post->user_id, 'section' => $post->section_id, 'article' => $post->id])}}"><h4 style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">{{ $post->title }}</h4></a>
                <p class="text-muted">by {{ $post->user->name }}</p>
            </li>
        @endforeach
    </ul>
</div>
