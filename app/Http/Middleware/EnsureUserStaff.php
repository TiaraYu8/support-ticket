<?php

namespace App\Http\Middleware;

use App\Enums\RolesEnum;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserStaff
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user || $user->role !== RolesEnum::SUPPORT_AGENT->value) {
            return response()->json([
                'success' => false,
                'message' => 'Forbidden. Only Staff could access this page.',
            ], 403);
        }

        /** @var Response $response */
        $response = $next($request);

        return $response;
    }
}
