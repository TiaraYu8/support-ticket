<?php

namespace App\Contracts;

use Illuminate\Routing\Router;

/**
 * Route Mapper
 *
 * Object-based representation of a route registration mapper.
 */
interface RouteMapper
{
    /**
     * Map the routes.
     */
    public function map(Router $router): void;
}
