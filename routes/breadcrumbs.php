<?php
// Home
Breadcrumbs::for('home', function ($trail) {
$trail->push('Home', route('/'));
});

//// Home > About
//Breadcrumbs::for('about', function ($trail) {
//$trail->parent('home');
//$trail->push('About', route('/pages/about'));
//});
//// Home > Gallery
//Breadcrumbs::for('gallery', function ($trail) {
//    $trail->parent('home');
//    $trail->push('Gallery', route('/gallery'));
//});
//// Home > History
//Breadcrumbs::for('history', function ($trail) {
//    $trail->parent('home');
//    $trail->push('History', route('/pages/history'));
//});
//
//// Home > Contact
//Breadcrumbs::for('contact', function ($trail) {
//    $trail->parent('home');
//    $trail->push('Contact', route('/contact'));
//});

//// Home > Новини
//Breadcrumbs::for('news', function ($trail) {
//$trail->parent('home');
//$trail->push('News', route('news'));
//});

//// Home > Новини > Статия
//Breadcrumbs::for('newsPost', function ($trail, $post) {
//$trail->parent('news', $post->category);
//$trail->push($post->title, route('post', $post->id));
//});
//
//// Home > Атракции
//Breadcrumbs::for('attractions', function ($trail) {
//    $trail->parent('home');
//    $trail->push('Attractions', route('/attractions'));
//});
//
//// Home > Атракции > Статия
//Breadcrumbs::for('attractionsPost', function ($trail, $post) {
//    $trail->parent('attractions', $post->category);
//    $trail->push($post->title, route('post', $post->id));
//});

//// Home > Ново
//Breadcrumbs::for('new', function ($trail) {
//    $trail->parent('home');
//    $trail->push('New', route('/new'));
//});
//
//// Home > Ново > Статия
//Breadcrumbs::for('newPost', function ($trail, $post) {
//    $trail->parent('new', $post->category);
//    $trail->push($post->title, route('post', $post->id));
//});
