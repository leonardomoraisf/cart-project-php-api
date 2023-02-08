<?php

use \App\Http\Response;
use \App\Controller\Api;

// API PUBLIC ROUTE
$router->get('/api/v1/cart/list',[
    'middlewares' => [
        'api',
    ],
    function($request){
        return new Response(200,Api\ApiPublic::getCart($request),'application/json');
    }
]);

// API PUBLIC ROUTE
$router->post('/api/v1/cart/set',[
    'middlewares' => [
        'api',
    ],
    function($request){
        return new Response(200,Api\ApiPublic::setCart($request),'application/json');
    }
]);

// API PUBLIC ROUTE
$router->options('/api/v1/cart/set',[
    'middlewares' => [
        'api',
    ],
    function($request){
        return new Response(200,Api\ApiPublic::setCart($request),'application/json');
    }
]);

// API PUBLIC ROUTE
$router->put('/api/v1/cart/{id}/update',[
    'middlewares' => [
        'api',
    ],
    function($request, $id){
        return new Response(200,Api\ApiPublic::updateCart($request, $id),'application/json');
    }
]);

// API PUBLIC ROUTE
$router->options('/api/v1/cart/{id}/update',[
    'middlewares' => [
        'api',
    ],
    function($request, $id){
        return new Response(200,Api\ApiPublic::updateCart($request, $id),'application/json');
    }
]);

// API PUBLIC ROUTE
$router->delete('/api/v1/cart/{id}/delete',[
    'middlewares' => [
        'api',
    ],
    function($request,$id){
        return new Response(200,Api\ApiPublic::deleteCart($request,$id),'application/json');
    }
]);

// API PUBLIC ROUTE
$router->options('/api/v1/cart/{id}/delete',[
    'middlewares' => [
        'api',
    ],
    function($request,$id){
        return new Response(200,Api\ApiPublic::deleteCart($request,$id),'application/json');
    }
]);

