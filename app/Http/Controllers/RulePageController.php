<?php

namespace App\Http\Controllers;

use App\Models\RulePage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RulePageController extends Controller
{
    public function getAll(): JsonResponse
    {
        $pages = RulePage::all();
        return response()->json($pages);
    }

    public function getBySlug(string $slug): JsonResponse
    {
        $page = RulePage::where('slug', $slug)->first();
        if (!$page) {
            return response()->json(['error' => 'Not found'], 404);
        }
        return response()->json($page);
    }

    public function save(Request $request): JsonResponse
    {
        $data = $request->validate([
            'slug' => 'required|string',
            'title' => 'required|string',
            'content' => 'nullable|string',
            'seo_title' => 'nullable|string',
            'seo_description' => 'nullable|string',
        ]);

        $page = RulePage::updateOrCreate(
            ['slug' => $data['slug']],
            $data
        );

        return response()->json($page);
    }
}
