@extends('layouts.app')

@section('nav')
    <x-nav></x-nav>
@endsection

@section('content')
<div class="container">
    <div class="jumbotron text-white shadow text-center" style="background-image: url(https://images.unsplash.com/photo-1552152974-19b9caf99137?fit=crop&w=1350&q=80);">
        <h2 class="mb-4">
            Jumbotron with background image
        </h2>
        <p class="mb-4">
            Hey, check this out.
        </p>
    </div>
    <div class="row mt-3">
        <div class="col-8">
            <div class="card">
                <img class="card-img-top" src="https://i.imgur.com/an6MU8X.jpg" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title">Card title</h2>
                    <div class="row mb-0">
                        <h6 class="card-subtitle mb-2 text-muted col">by Nikita</h6>
                        <h6 class="card-subtitle mb-2 text-muted col-md-auto">November 23, 2016</h6>
                    </div>
                    <hr/>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <hr/>
                    <div class="tags">
                        <span class="material-icons">local_offer</span>
                        <a href="#" class="badge badge-light">Travel</a>
                        <a href="#" class="badge badge-light">IT</a>
                        <a href="#" class="badge badge-light">Some</a>
                        <a href="#" class="badge badge-light">Someone tag</a>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <h3>Related posts</h3>
                <div class="card-deck mt-3">
                    <div class="card">
                        <img class="card-img-top" src="https://i.imgur.com/an6MU8X.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <hr/>
                            <div class="row">
                                <div class="tags col-6">
                                    <a href="#" class="badge badge-light">Travel</a>
                                    <a href="#" class="badge badge-light">IT</a>
                                </div>
                                <div class="col-3">
                                    <span class="material-icons">visibility</span>
                                    <small class="text-muted">123</small>
                                </div>
                                <div class="col-3">
                                    <span class="material-icons">comment</span>
                                    <small class="text-muted">123</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="https://i.imgur.com/an6MU8X.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <hr/>
                            <div class="row">
                                <div class="tags col-6">
                                    <a href="#" class="badge badge-light">Travel</a>
                                    <a href="#" class="badge badge-light">IT</a>
                                </div>
                                <div class="col-3">
                                    <span class="material-icons">visibility</span>
                                    <small class="text-muted">123</small>
                                </div>
                                <div class="col-3">
                                    <span class="material-icons">comment</span>
                                    <small class="text-muted">123</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div>
                <h2>Latest posts</h2>
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="row no-gutters">
                            <div class="col-5">
                                <img src="https://i.imgur.com/an6MU8X.jpg" class="rounded-circle" alt="..." height="75">
                            </div>
                            <div class="col-7">
                                <a href="#" class="badge badge-light">Travel</a>
                                <a href="#" class="badge badge-light">IT</a>
                                <h2>Post title</h2>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row no-gutters">
                            <div class="col-5">
                                <img src="https://i.imgur.com/an6MU8X.jpg" class="rounded-circle" alt="..." height="75">
                            </div>
                            <div class="col-7">
                                <a href="#" class="badge badge-light">Travel</a>
                                <a href="#" class="badge badge-light">IT</a>
                                <h2>Post title</h2>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row no-gutters">
                            <div class="col-5">
                                <img src="https://i.imgur.com/an6MU8X.jpg" class="rounded-circle" alt="..." height="75">
                            </div>
                            <div class="col-7">
                                <a href="#" class="badge badge-light">Travel</a>
                                <a href="#" class="badge badge-light">IT</a>
                                <h2>Post title</h2>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row no-gutters">
                            <div class="col-5">
                                <img src="https://i.imgur.com/an6MU8X.jpg" class="rounded-circle" alt="..." height="75">
                            </div>
                            <div class="col-7">
                                <a href="#" class="badge badge-light">Travel</a>
                                <a href="#" class="badge badge-light">IT</a>
                                <h2>Post title</h2>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row no-gutters">
                            <div class="col-5">
                                <img src="https://i.imgur.com/an6MU8X.jpg" class="rounded-circle" alt="..." height="75">
                            </div>
                            <div class="col-7">
                                <a href="#" class="badge badge-light">Travel</a>
                                <a href="#" class="badge badge-light">IT</a>
                                <h2>Post title</h2>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="row no-gutters">
                            <div class="col-5">
                                <img src="https://i.imgur.com/an6MU8X.jpg" class="rounded-circle" alt="..." height="75">
                            </div>
                            <div class="col-7">
                                <a href="#" class="badge badge-light">Travel</a>
                                <a href="#" class="badge badge-light">IT</a>
                                <h2>Post title</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <h2>Popular tags</h2>
                <span class="badge badge-pill badge-primary">Primary</span>
                <span class="badge badge-pill badge-secondary">Secondary</span>
                <span class="badge badge-pill badge-success">Success</span>
                <span class="badge badge-pill badge-danger">Danger</span>
                <span class="badge badge-pill badge-warning">Warning</span>
                <span class="badge badge-pill badge-info">Info</span>
                <span class="badge badge-pill badge-light">Light</span>
                <span class="badge badge-pill badge-dark">Dark</span>
            </div>
        </div>
    </div>
</div>
@endsection
