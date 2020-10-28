<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\IndexRequest;
use App\Models\Rating;
use App\Http\Resources\RatingCollection as index;

class RatingController extends Controller
{
    public function store(PostRequest $request) {
        Rating::Create([
            'email' => $request['email'],
            'rating' => $request['rating']
        ]);

        return response()->json(['created'], 201);
    }

    public function index(IndexRequest $request) {
        index::withoutWrapping();
        if (!empty($request['filter'])) {
            $result = Rating::whereRating($request['filter'])->get();
        } else {
            $result = Rating::all()->sortByDesc('rating');
        }
        return response()->json(new index($result), 200);
    }
}
