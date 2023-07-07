<?php

namespace App\Http\Controllers\Plans;

use App\Http\Controllers\Controller;
use App\Http\Resources\Plans\PlanResource;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function __invoke()
    {
        $plans = Plan::all();

        // API resource
        return PlanResource::collection($plans);
    }
}
