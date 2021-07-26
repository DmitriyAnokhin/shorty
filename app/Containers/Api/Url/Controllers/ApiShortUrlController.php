<?php

namespace App\Containers\Api\Url\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Containers\Api\Url\Dto\ApiShortUrlDto;
use App\Containers\Api\Url\Services\ApiShortUrlService;

class ApiShortUrlController extends Controller
{

    protected ApiShortUrlDto $apiShortUrlDto;
    protected ApiShortUrlService $apiShortUrlService;


    public function __construct()
    {
        $this->apiShortUrlDto = new ApiShortUrlDto();
        $this->apiShortUrlService = new ApiShortUrlService();
    }


    public function create(Request $request): JsonResponse
    {
        $this->validate($request, [
            'url' => 'required|string',
        ]);

        $dto = $this->apiShortUrlDto->fillFromRequest($request);

        $shortUrl = $this->apiShortUrlService->create($dto);

        return response()->json($shortUrl->only('short_url'));
    }


    public function read(Request $request, $hash): RedirectResponse
    {
        $dto = $this->apiShortUrlDto->fillFromHash($hash);

        $url = $this->apiShortUrlService->read($dto);

        return redirect($url);
    }

}
