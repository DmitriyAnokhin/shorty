<?php

namespace App\Containers\Api\Url\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Containers\Api\Url\Dto\ShortUrlDto;
use App\Containers\Api\Url\Services\ShortUrlService;

class ShortUrlController extends Controller
{

    protected ShortUrlDto $shortUrlDto;
    protected ShortUrlService $shortUrlService;


    public function __construct()
    {
        $this->shortUrlDto = new ShortUrlDto();
        $this->shortUrlService = new ShortUrlService();
    }


    public function create(Request $request): JsonResponse
    {
        $this->validate($request, [
            'url' => 'required|string',
        ]);

        $dto = $this->shortUrlDto->fillFromRequest($request);

        $shortUrl = $this->shortUrlService->create($dto);

        return response()->json($shortUrl->only('short_url'));
    }


    public function read(Request $request, $hash): RedirectResponse
    {
        $dto = $this->shortUrlDto->fillFromHash($hash);

        $url = $this->shortUrlService->read($dto);

        return redirect($url);
    }

}
