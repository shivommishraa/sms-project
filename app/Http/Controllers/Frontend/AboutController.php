<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;

class AboutController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('status', 1)
            ->latest()
            ->get();

        return view('frontend.about', compact('testimonials'));
    }
}