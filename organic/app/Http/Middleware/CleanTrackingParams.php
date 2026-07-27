<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CleanTrackingParams
{
    /**
     * Handle an incoming request.
     * Remove Facebook and other tracking parameters from URL
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // List of tracking parameters to remove
        $trackingParams = [
            'fbclid',
            'gclid',
            'utm_source',
            'utm_medium',
            'utm_campaign',
            'utm_term',
            'utm_content',
            'ref',
            '_ga',
            '_gid',
        ];

        $hasTrackingParams = false;
        $cleanQuery = [];

        // Check if any tracking parameters exist and build clean query
        foreach ($request->query() as $key => $value) {
            if (in_array($key, $trackingParams)) {
                $hasTrackingParams = true;
                // Skip tracking parameters
            } else {
                // Keep non-tracking parameters
                $cleanQuery[$key] = $value;
            }
        }

        // If tracking parameters were found, redirect to clean URL
        if ($hasTrackingParams) {
            $cleanUrl = $request->url();
            if (!empty($cleanQuery)) {
                $cleanUrl .= '?' . http_build_query($cleanQuery);
            }
            
            // Only redirect if we're on GET request and not an AJAX request
            if ($request->isMethod('GET') && !$request->ajax()) {
                return redirect($cleanUrl, 301); // 301 permanent redirect
            }
        }

        return $next($request);
    }
}

