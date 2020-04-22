<div>
    <h2>Latest posts</h2>
    <div class="list-group list-group-flush">
        @foreach($latestPosts as $post)
            <div class="list-group-item">
                <div class="row no-gutters">
                    <div class="col-5">
                        <img src="/storage/{{$post->image_path}}" class="rounded-circle" alt="..." height="75">
                    </div>
                    <div class="col-7">
                        <a href="#" class="badge badge-light">Travel</a>
                        <a href="#" class="badge badge-light">IT</a>
                        <h2  style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">{{ $post->title }}</h2>
                        <p class="text-muted">by {{ $post->user->name }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
