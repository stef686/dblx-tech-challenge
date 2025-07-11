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
            'items' => Item::oldest()->limit(10)->get(),
            'items' => Item::latest()->limit(10)->get(),
        ]);
    }
}
