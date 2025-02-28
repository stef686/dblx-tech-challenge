<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Info;
use App\Models\Weblink;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AdminDashboardController extends Controller
{
    public function __invoke(Request $request): Response
    {
        return Inertia::render('admin/Dashboard', [
            'info' => Info::count(),
            'weblink' => Weblink::count(),
            'download' => Download::count(),
        ]);
    }
}
