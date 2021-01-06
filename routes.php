<?php

$router->get('users', 'App/Controllers/UserController.php@index');
$router->get('users/update', 'App/Controllers/UserController.php@update');
$router->get('users/edit', 'App/Controllers/UserController.php@edit');
$router->post('users/store', 'App/Controllers/UserController.php');
$router->get('me', 'App/Controllers/ProfileController.php@index');
$router->get('artists', 'App/Controllers/ArtistController.php@index');
$router->get('artists/detail', 'App/Controllers/ArtistController.php@show');

$router->get('', 'App/Controllers/HomeController.php@index');
$router->get('home', 'App/Controllers/HomeController.php');

$router->get('login', 'App/Controllers/LoginController.php@index');
$router->get('logout', 'App/Controllers/LoginController.php@logout');
$router->post('login/auth', 'App/Controllers/LoginController.php@login');

$router->get('contact', 'App/Controllers/ContactController.php@index');

$router->get('register', 'App/Controllers/RegisterController.php@index');
$router->post('register', 'App/Controllers/RegisterController.php@store');