<?php

$sideName = explode('?', $_SERVER['REQUEST_URI'])[0];

$router = [
  '/category' => './src/views/category.phtml',
  '/popular' => './src/views/popular.phtml',
  '/new' => './src/views/new.phtml',
  '/by-me' => './src/views/by-me.phtml',
  '/search' => './src/views/search.phtml'
];

require @$router[$sideName]?:'./src/views/main.phtml';