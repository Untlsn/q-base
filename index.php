<?php

$sideName = explode('?', $_SERVER['REQUEST_URI'])[0];

$router = [
  '/category' => './views/category.phtml',
  '/popular' => './views/popular.phtml',
  '/new' => './views/new.phtml',
  '/by-me' => './views/by-me.phtml',
  '/search' => './views/search.phtml',
  '/add' => './views/add.phtml',
  '/q' => './views/q.phtml'
];

require @$router[$sideName]?:'./views/main.phtml';