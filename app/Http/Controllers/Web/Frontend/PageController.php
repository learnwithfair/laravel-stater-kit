<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DynamicPage;
use App\Models\Faq;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function privacyAndPolicy() {
        $dynamicPage = DynamicPage::query()
                        ->where('status','active')
                        ->where('id', 1)
                        ->firstOrFail();
        return view('frontend.layouts.pages.singleDynamicPage', compact('dynamicPage'));
    }
}
