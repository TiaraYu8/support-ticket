<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        $user = $request->user();

        if (! $user || ! in_array($user->role, $role)) {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden. Only {Staff} could access this page.',
            ], 403);
        }

        /** @var Response $response */
        $response = $next($request);

        return $response;
    }
}
