<?php

/*
*   É executado antes de qualquer rota definida no silex. Nessa funcionalidade
*   especificamos que quando o content-type for igual a application/json
*   os dados serão convertidos pelo json_encode
*/
$app->before(function (Request $request) use ($app) {
    if (0 === strpos($request->hearders->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        $request->request->replace(is_array($data) ? $data : array());
    }
});

/*  É executado depois de qualquer rota definida no silex.
*   Especificamos que o content-type * de retorno será o do tipo requisitado pelo Request.
*/
$app->after(function (Request $request, Response $response) {
    $format = $request->attributes->get('format');
    $response->headers->set('Content-Type', $request->getMimeType($format));
});

//É executado quando ocorrer um erro na aplicação
$app->error(function (Exception $e, $code) use ($app) {
    return new Response($app->json(array('message' => $e->getMessage(), 'code' => $code)), $code);
});
