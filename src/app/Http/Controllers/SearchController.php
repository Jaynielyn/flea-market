<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Like;
use App\Models\User;

class SearchController extends Controller
{
    public function show(Request $request)
    {
        $keyword = $request->input('keyword');
        $items = Item::query();

        if ($keyword) {
            $items = $items->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('description', 'LIKE', "%{$keyword}%")
                ->orWhere('category', 'LIKE', "%{$keyword}%")
                ->orWhere('condition', 'LIKE', "%{$keyword}%");
            })->get();
        } else {
            $items = collect();
        }

        return view('search_result', ['items' => $items]);
    }
}
