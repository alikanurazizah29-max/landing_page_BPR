<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Models\Product;
use App\Models\Article;
use App\Models\Branch;
use App\Models\Testimonial;
use App\Models\HeroBanner;
use App\Models\Faq;
use App\Models\InterestRate;
use App\Models\CompanyProfile;

class Analytics extends Controller
{
    public function index()
    {
        $unreadMessagesCount = ContactMessage::where('status', 'unread')->count();
        $totalMessagesCount  = ContactMessage::count();
        $activeProductsCount = Product::where('is_active', true)->count();
        $activeArticlesCount = Article::where('is_published', true)->count();
        $activeBranchesCount = Branch::where('is_active', true)->count();
        $activeTestimonials  = Testimonial::where('is_active', true)->count();
        $activeHeroBanners   = HeroBanner::where('is_active', true)->count();
        $activeFaqs          = Faq::where('is_active', true)->count();
        $activeRatesCount    = InterestRate::where('is_active', true)->count();
        $companyProfile      = CompanyProfile::first();
        $recentMessages      = ContactMessage::latest()->take(5)->get();
        $recentArticles      = Article::latest()->take(4)->get();

        return view('content.dashboard.dashboards-analytics', compact(
            'unreadMessagesCount',
            'totalMessagesCount',
            'activeProductsCount',
            'activeArticlesCount',
            'activeBranchesCount',
            'activeTestimonials',
            'activeHeroBanners',
            'activeFaqs',
            'activeRatesCount',
            'companyProfile',
            'recentMessages',
            'recentArticles'
        ));
    }
}

