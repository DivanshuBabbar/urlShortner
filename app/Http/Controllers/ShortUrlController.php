<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortUrl;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    //  Create short URL
    public function store(Request $request)
    {
        
        $request->validate([
            'original_url' => 'required|url'
        ]);

        $shortCode = $this->generateUniqueCode();

        $shortUrl = ShortUrl::create([
            'original_url' => $request->original_url,
            'short_code' => $shortCode
        ]);

        return response()->json([
            'message' => 'Short URL created',
            'data' => $shortUrl,
            'short_url' => url($shortCode)
        ]);
    }

    //  Redirect to original URL
    public function redirect($code)
    {
        $shortUrl = ShortUrl::where('short_code', $code)->firstOrFail();

        // increment click count
        $shortUrl->increment('click_count');

        return redirect($shortUrl->original_url);
    }

    //  List all URLs
    public function index()
    {
        $urls = ShortUrl::latest()->paginate(10);

        return response()->json($urls);
    }

    //  Get stats
    public function stats($code)
    {
        $shortUrl = ShortUrl::where('short_code', $code)->firstOrFail();

        return response()->json([
            'original_url' => $shortUrl->original_url,
            'short_code' => $shortUrl->short_code,
            'click_count' => $shortUrl->click_count,
            'created_at' => $shortUrl->created_at
        ]);
    }

    //  Generate unique short code
    private function generateUniqueCode()
    {
        do {
            $code = Str::random(6);
        } while (ShortUrl::where('short_code', $code)->exists());

        return $code;
    }
}
