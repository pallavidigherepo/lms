<?php

namespace App\Services\Dashboard;

use App\Repositories\Interfaces\DashboardRepositoryInterface;

class DashboardService
{
    public function __construct(protected DashboardRepositoryInterface $dashboardRepository) { }

    public function all($userId = null)
    {
        return $this->dashboardRepository->all($userId);
    }
}
