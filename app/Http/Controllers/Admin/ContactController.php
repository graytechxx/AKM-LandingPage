<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    /**
     * Display a listing of contact messages
     */
    public function index(Request $request): View
    {
        $query = ContactMessage::query();

        // Filter by read status
        if ($request->has('filter')) {
            if ($request->filter === 'unread') {
                $query->where('is_read', false);
            } elseif ($request->filter === 'read') {
                $query->where('is_read', true);
            }
        }

        // Search filter
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('subject', 'like', "%{$search}%");
            });
        }

        $messages = $query->latest()->paginate(10);
        $unreadCount = ContactMessage::unread()->count();

        return view('admin.contacts.index', compact('messages', 'unreadCount'));
    }

    /**
     * Display the specified contact message
     */
    public function show($id): View
    {
        $message = ContactMessage::findOrFail($id);

        // Auto-mark as read when viewing
        if (!$message->is_read) {
            $message->markAsRead();
        }

        return view('admin.contacts.show', compact('message'));
    }

    /**
     * Mark a message as read
     */
    public function markAsRead($id): RedirectResponse
    {
        $message = ContactMessage::findOrFail($id);
        $message->markAsRead();

        return redirect()
            ->back()
            ->with('success', 'Message marked as read.');
    }

    /**
     * Remove the specified contact message
     */
    public function destroy($id): RedirectResponse
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return redirect()
            ->route('admin.contacts.index')
            ->with('success', 'Message deleted successfully.');
    }
}
