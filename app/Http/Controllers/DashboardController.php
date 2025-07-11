<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function __invoke(Request $request): Response
    {
        return Inertia::render('Dashboard', [
            'context' => 'latest',
            'items' => Item::latest()->limit(10)->get(),
        ]);
    }

    public function search(Request $request): Response
    {
        $search = $request->input('search', '');

        return Inertia::render('Dashboard', [
            'context' => 'search',
            'items' => Item::where('name', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->with('content')
                ->limit(10)
                ->get(),
        ]);
    }
}
