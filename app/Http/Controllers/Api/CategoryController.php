<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;
class CategoryController extends Controller
{
    use ApiResponse; // Use the trait


    public function category() {
        $category = Category::query()
                    ->select(['id','name', 'image_url'])
                    ->where('status', 'active')
                    ->latest()
                    ->take(5)
                    ->get();

        if ($category->isEmpty()) {
            return $this->error([], 'Categorys not found', 404);
        }

        return $this->success($category, 'Categorys retrieved successfully');
    }

    public function categoryAll() {
        $category = Category::query()
                    ->select(['id','name', 'image_url'])
                    ->where('status', 'active')
                    ->latest()
                    ->get();

        if ($category->isEmpty()) {
            return $this->error([], 'Categorys not found', 404);
        }

        return $this->success($category, 'Categorys retrieved successfully');
    }
}
