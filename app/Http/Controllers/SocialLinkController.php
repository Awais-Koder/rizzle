<?php

namespace App\Http\Controllers;

use App\Http\Resources\SocialLinkCollection;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function index(Request $request): SocialLinkCollection
    {
        $socialLinks = SocialLink::all();

        return new SocialLinkCollection($socialLinks);
    }
}
