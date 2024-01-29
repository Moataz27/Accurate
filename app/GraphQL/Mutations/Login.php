<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

final class Login
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $email = $args['email'];
        $password = $args['password'];

        if (!$token = auth()->attempt(["email" => $email, "password" => $password])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            "user" => auth()->user(),
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
