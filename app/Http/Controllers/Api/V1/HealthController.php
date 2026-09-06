<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Responses\ApiResponse;

final class HealthController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        
        return ApiResponse::success(
            data: [
                'application' => config('app.name'),
                'status' => 'healthy',
                'environment' => app()->environment(),
                'timestamp' => now()->toISOString(),
            ],
            message: 'Invoice API is running'
        );
        // return ApiResponse::error(
        //     message: 'Service is temporarily unavailable',
        //     errors: [
        //         'database' => [
        //             'Database connection failed',
        //         ],
        //     ],
        //     status: 503
        // );
    }
}
