<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function index()
    {
        return view('user.page.contact');
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
