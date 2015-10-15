<?php

use Silex\Application;
use Silex\Provider\UrlGeneratorServiceProvider;

//Cria um aplicação Silex
$app = new Application();

//Registra o provedor de geração de URls
$app->register(new UrlGeneratorServiceProvider());

//Registra o provedor de gerenciador de sessão
$app->register(new Silex\Provider\SessionServiceProvider());

//Registra o provedor de serialização de dados
$app->register(new \Silex\Provider\SerializerServiceProvider());

return $app;
