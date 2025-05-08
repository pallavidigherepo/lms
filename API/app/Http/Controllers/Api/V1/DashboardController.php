<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\DashboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct(protected DashboardService $dashboardService)
    {}
    public function index(Request $request)
    {
        $userId = Auth::user()->id;
        return $this->dashboardService->all($userId);
    }
}
