<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use App\Models\Product;
use App\Models\Benefit;
use App\Models\Faq;
use App\Models\Testimonial;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landing.index', [
            'profile' => CompanyProfile::first(),
            'products' => Product::all(),
            'benefits' => Benefit::all(),
            'faqs' => Faq::all(),
            'testimonials' => Testimonial::all(),
        ]);
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'product_interest' => 'nullable',
            'message' => 'nullable',
        ]);

        ContactMessage::create($request->all());

        return back()->with('success', 'Pesan berhasil dikirim.');
    }
}