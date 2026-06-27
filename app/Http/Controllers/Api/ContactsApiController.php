<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\JsonResponse;

class ContactsApiController extends Controller
{
    public function index(): JsonResponse
    {
        $team = TeamMember::orderBy('sort_order')->get();

        return response()->json(compact('team'));
    }
}
