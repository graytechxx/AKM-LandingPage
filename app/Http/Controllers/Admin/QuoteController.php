<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class QuoteController extends Controller
{
    /**
     * Display a listing of quote requests
     */
    public function index(Request $request): View
    {
        $query = QuoteRequest::query();

        // Status filter
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Search filter
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $quotes = $query->latest()->paginate(10);
        $statuses = QuoteRequest::STATUSES;

        $counts = [
            'all' => QuoteRequest::count(),
            'pending' => QuoteRequest::where('status', 'pending')->count(),
            'in_review' => QuoteRequest::where('status', 'in_review')->count(),
            'quoted' => QuoteRequest::where('status', 'quoted')->count(),
            'accepted' => QuoteRequest::where('status', 'accepted')->count(),
        ];

        return view('admin.quotes.index', compact('quotes', 'statuses', 'counts'));
    }

    /**
     * Display the specified quote request
     */
    public function show($id): View
    {
        $quote = QuoteRequest::findOrFail($id);
        $statuses = QuoteRequest::STATUSES;
        $projectTypes = QuoteRequest::PROJECT_TYPES;
        $budgetRanges = QuoteRequest::BUDGET_RANGES;
        $timelines = QuoteRequest::TIMELINES;

        return view('admin.quotes.show', compact('quote', 'statuses', 'projectTypes', 'budgetRanges', 'timelines'));
    }

    /**
     * Update the status of a quote request
     */
    public function updateStatus(Request $request, $id): RedirectResponse
    {
        $quote = QuoteRequest::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:' . implode(',', array_keys(QuoteRequest::STATUSES)),
            'admin_notes' => 'nullable|string',
        ]);

        $quote->update($validated);

        return redirect()
            ->back()
            ->with('success', 'Quote status updated successfully.');
    }

    /**
     * Send a quote to the client
     */
    public function sendQuote(Request $request, $id): RedirectResponse
    {
        $quote = QuoteRequest::findOrFail($id);

        $validated = $request->validate([
            'quoted_price' => 'required|numeric|min:0',
            'admin_notes' => 'nullable|string',
        ]);

        $validated['status'] = 'quoted';

        $quote->update($validated);

        // TODO: Send email notification to client

        return redirect()
            ->back()
            ->with('success', 'Quote sent successfully.');
    }

    /**
     * Export quote requests to CSV
     */
    public function export(): StreamedResponse
    {
        $quotes = QuoteRequest::latest()->get();

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="quote-requests-' . date('Y-m-d') . '.csv"',
        ];

        $callback = function () use ($quotes) {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['ID', 'Name', 'Email', 'Phone', 'Project Type', 'Location', 'Budget', 'Timeline', 'Status', 'Date']);
            foreach ($quotes as $q) {
                fputcsv($file, [
                    $q->id,
                    $q->name,
                    $q->email,
                    $q->phone,
                    $q->project_type_label,
                    $q->location,
                    $q->budget_range_label,
                    $q->timeline_label,
                    $q->status_label,
                    $q->created_at->format('Y-m-d H:i'),
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Remove the specified quote request
     */
    public function destroy($id): RedirectResponse
    {
        $quote = QuoteRequest::findOrFail($id);
        $quote->delete();

        return redirect()
            ->route('admin.quotes.index')
            ->with('success', 'Quote request deleted successfully.');
    }
}
