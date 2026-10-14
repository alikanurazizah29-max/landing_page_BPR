<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Models\Branch;

class UserContactController extends Controller
{
    public function index()
    {
        $branches = Branch::where('is_active', true)->get();
        return view('user.page.contact', compact('branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'phone'            => 'required|string|max:20',
            'product_interest' => 'nullable|string',
            'message'          => 'required|string',
        ]);

        ContactMessage::create([
            'name'             => $request->name,
            'email'            => $request->email,
            'phone'            => $request->phone,
            'product_interest' => $request->product_interest,
            'message'          => $request->message,
            'status'           => 'unread',
        ]);

        return back()->with('success', 'Pesan Anda telah berhasil dikirim. Petugas kami akan segera menghubungi Anda.');
    }
}