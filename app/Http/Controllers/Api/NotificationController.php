<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;

class NotificationController extends Controller
{
    use ApiResponse; // Use the trait

    public function index() {
        $notification = Notification::query()
                    ->with(['user:id,name,email,avatar'])
                    ->where('notifiable_id', auth()->user()->id)
                    ->latest()
                    ->get();

        if ($notification->isEmpty()) {
            return $this->error([], 'Notifications not found', 404);
        }

        return $this->success($notification, 'Notifications retrieved successfully');
    }
}
