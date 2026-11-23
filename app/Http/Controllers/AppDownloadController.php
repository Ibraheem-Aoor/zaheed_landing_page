<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppDownloadController extends Controller
{
    private const DEFAULT_PLAY_STORE = 'https://play.google.com/store/apps/details?id=com.bestcoders.zaheed';
    private const DEFAULT_APP_STORE = 'https://apps.apple.com/us/app/zaheed-%D8%B2%D9%87%D9%8A%D8%AF/id6449094027';

    /**
     * Sends phones straight to the right store; everything else (desktop,
     * unknown devices) gets a page with both store badges and a QR code.
     */
    public function __invoke(Request $request)
    {
        $playStoreLink = get_setting('play_store_link') ?: self::DEFAULT_PLAY_STORE;
        $appStoreLink = get_setting('app_store_link') ?: self::DEFAULT_APP_STORE;

        $userAgent = (string) $request->userAgent();

        if (preg_match('/iPhone|iPad|iPod/i', $userAgent)) {
            return redirect()->away($appStoreLink)->header('Vary', 'User-Agent');
        }

        if (stripos($userAgent, 'Android') !== false) {
            return redirect()->away($playStoreLink)->header('Vary', 'User-Agent');
        }

        // iPadOS 13+ reports itself as desktop Safari (Macintosh), so the page
        // finishes that detection client-side via touch support.
        return response()
            ->view('download', compact('playStoreLink', 'appStoreLink'))
            ->header('Vary', 'User-Agent');
    }
}
