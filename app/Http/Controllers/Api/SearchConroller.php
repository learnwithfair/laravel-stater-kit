<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Product;
use App\Models\Style;
use App\Models\Theme;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SearchConroller extends Controller
{
    use ApiResponse;

    /**
         * Search for Ads.
         *
         * @param  \Illuminate\Http\Request  $request  The HTTP request with the search query.
         * @return \Illuminate\Http\JsonResponse  JSON response with products or error.
    */

    public function searchAd(Request $request) {

        $user = auth()->user();
        $currentUserId = $user->id;

        $validator = Validator::make($request->all(), [
            'search' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->error([], $validator->errors()->first(), 422);
        }

        $search = $request->input('search');

        // Fetch ads based on the search term
        $data = Ad::query()
            ->with(['category'])
            ->where('title', 'like', '%' . $search . '%')
            ->latest() // Order by the latest created
            ->get();

        // Check if the data is empty
        if ($data->isEmpty()) {
            return $this->error([], 'Ad not found', 404);
        }

        // Map the data to include bookmark flag
        $ads = $data->map(function ($ad) use ($currentUserId) {
            $ad->is_bookmarked = $ad->bookmarkBy->contains($currentUserId); // Add bookmark flag
            unset($ad->bookmarkBy); // Optionally unset the bookmarkBy collection if you don't need it
            return $ad;
        });

        // Prepare the response
        return $this->success($ads, 'Ads fetched successfully', 200);

    }
}
