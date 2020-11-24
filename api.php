<?php

function getQJson(string $id) {
  return json_decode(
    @file_get_contents(
      "./q-json/$id.json"
    ), true
  );
}

function t404() {
  http_response_code(404);
  die();
}

function bootstrap() {
  $uri = explode(
    '?', $_SERVER['REQUEST_URI']
  )[0];
  
  $uriPart = explode('/', $uri);
  
  if($uriPart[2] == 'q' && count($uriPart) > 3) {
    $json = getQJson($uriPart[3])?: t404();
    $result = [
      "questions" => []
    ];
    if(count($uriPart) == 4)
      return json_encode($json);
    
    $parts = explode('&', $uriPart[4]);
    if($index = array_search('resultImg', $parts)) {
      $result['resultImg'] = $json['resultImg'];
      unset($parts[$index]);
    }
    foreach($json['questions'] as $quest) {
      $questions = [];
      foreach($parts as $part)
        $questions[$part] = $quest[$part];
      $result['questions'][] = $questions;
    }
    return json_encode($result); 
  }
  else
    t404();
}

echo bootstrap();