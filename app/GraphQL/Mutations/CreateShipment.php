<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Shipment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

final class CreateShipment
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $random = Str::random(10);

        $code = $args['code'] ?? $random;
        $openable = $args["openable"];
        $description = $args["description"];
        $weight = $args["weight"];
        $user_id = Auth::user()->id;

        $shipment = Shipment::create([
            "code" => $code,
            "openable" => $openable,
            "description" => $description,
            "weight" => $weight,
            "user_id" => $user_id
        ]);

        return $shipment;
    }
}
