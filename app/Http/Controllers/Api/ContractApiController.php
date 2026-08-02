<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BrandCase;
use App\Models\Faq;
use App\Models\Testimonial;
use Illuminate\Http\JsonResponse;

class ContractApiController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'testimonials' => Testimonial::active()
                ->get(['id', 'quote', 'text', 'author_name', 'author_role', 'image']),
            'cases' => BrandCase::active()
                ->get(['id', 'brand_name', 'client_name', 'client_role', 'description', 'result', 'image']),
            'faqs' => Faq::active('contract')->get(['id', 'question', 'answer']),
        ]);
    }
}
