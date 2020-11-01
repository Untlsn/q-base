<?php

$sideName = explode('?', $_SERVER['REQUEST_URI'])[0];

$router = [
  '/' => './src/views/main.phtml',
  '/category' => './src/views/category.phtml',
  '/popular' => './src/views/popular.phtml',
  '/new' => './src/views/new.phtml',
  '/by-me' => './src/views/by-me.phtml'
];

require $router[$sideName];