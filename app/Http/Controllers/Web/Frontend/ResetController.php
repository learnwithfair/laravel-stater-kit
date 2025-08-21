<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Artisan;
use App\Traits\ApiResponse;

class ResetController extends Controller
{
    use ApiResponse;

    /**
     * Reset Database and Optimize Clear
     *
     * @return JsonResponse
     */
    public function RunMigrations(): JsonResponse {
        Artisan::call('migrate:fresh --seed');
        Artisan::call('optimize:clear');

        return $this->success([], 'Migrations have been Refreshed, Seeded, and Cache Cleared!', 200);
    }

    /**
     * Run Composer Update
     *
     * @return JsonResponse
     */
    public function composer(): JsonResponse {
        // Execute the composer update command
        $output = [];
        $resultCode = 0;

        $composerCommand = 'cd ' . base_path() . ' && composer update';

        // Run composer update command
        exec($composerCommand, $output, $resultCode);

        if ($resultCode === 0) {
            return $this->success($output, 'Composer update completed successfully', 200);
        } else {
            return $this->error($output, 'Failed to run composer update', 500);
        }
    }

    /**
     * Reset Database and Optimize Clear
     *
     * @return JsonResponse
     */
    public function migrate(): JsonResponse {
        Artisan::call('migrate');
        Artisan::call('optimize:clear');

        return $this->success([], 'Migrations Run and Cache Cleared!', 200);
    }

    /**
     * Create a storage link and clear the cache
     *
     * @return JsonResponse
     */
    public function storage(): JsonResponse {

        $linkPath = public_path('storage');

        if ($linkPath) {
            unlink($linkPath);
        }

        Artisan::call('storage:link');
        Artisan::call('cache:clear');

        // Return a successful response
        return $this->success([], 'Storage Link Successful and Cache Cleared!', 200);
    }

}
