<?php
use Cake\Routing\Router;

Router::plugin('Developers', ['path' => '/'],function ($routes) {
    $routes->prefix('api', function ($routes) {

        $routes->extensions(['json']);
        $routes->fallbacks('DashedRoute');
    });


});
