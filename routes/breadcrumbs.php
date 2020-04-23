<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('blogs', function ($trail) {
    $trail->push('Blogs', route('welcome'));
});

Breadcrumbs::for('by', function ($trail, $user) {
    $trail->parent('blogs');
    $trail->push($user->name, route('users.sections.articles.all', ['user' => $user->id]));
});

Breadcrumbs::for('section', function ($trail, $user, $section) {
    $trail->parent('by', $user);
    $trail->push($section->title, route('users.sections.articles.index', ['user' => $user->id, 'section' => $section->id]));
});

Breadcrumbs::for('article', function ($trail, $user, $section, $article) {
    $trail->parent('section', $user, $section);
    $trail->push($article->title, route('users.sections.articles.show', ['user' => $user->id, 'section' => $section->id, 'article' => $article->id]));
});
