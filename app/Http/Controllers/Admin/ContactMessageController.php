<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function index(Request $request)
    {
        try {
            $contact_messages = ContactMessage::all();
            return view('admin.contact-messages.index', compact('contact_messages'));
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memuat data Pesan Masuk', 'message' => $e->getMessage()], 500);
        }
    }

    public function create()
    {
        return view('admin.contact-messages.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'nullable|string|max:255',
                'message' => 'required|string',
                'is_read' => 'nullable'
            ]);
            
            
            $validated['is_read'] = $request->has('is_read') ? 1 : 0;
            
            ContactMessage::create($validated);
            return response()->json([
                'success' => true, 
                'message' => 'Pesan Masuk berhasil ditambahkan.',
                'redirect' => route('admin.contact-messages.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menambahkan Pesan Masuk', 'message' => $e->getMessage()], 500);
        }
    }

    public function edit(ContactMessage $contactMessage)
    {
        return view('admin.contact-messages.edit', compact('contactMessage'));
    }

    public function update(Request $request, ContactMessage $contactMessage)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'nullable|string|max:255',
                'message' => 'required|string',
                'is_read' => 'nullable'
            ]);
            
            
            $validated['is_read'] = $request->has('is_read') ? 1 : 0;
            
            $contactMessage->update($validated);
            return response()->json([
                'success' => true, 
                'message' => 'Pesan Masuk berhasil diperbarui.',
                'redirect' => route('admin.contact-messages.index')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Validasi gagal', 
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memperbarui Pesan Masuk', 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy(ContactMessage $contactMessage)
    {
        try {
            $contactMessage->delete();
            return response()->json([
                'success' => true, 
                'message' => 'Pesan Masuk berhasil dihapus.'
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal menghapus Pesan Masuk', 'message' => $e->getMessage()], 500);
        }
    }
}
