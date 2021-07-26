<?php

namespace App\Containers\Url\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Components\Url\ShortUrlComponent;
use App\Containers\Url\Dto\ShortUrlDto;
use App\Http\Controllers\Controller;
use App\Repositories\Url\ShortUrlRepository;

class ShortUrlController extends Controller
{

    protected ShortUrlDto $shortUrlDto;
    protected ShortUrlComponent $shortUrlComponent;
    protected ShortUrlRepository $shortUrlRepository;


    public function __construct()
    {
        $this->shortUrlDto = new ShortUrlDto();
        $this->shortUrlComponent = new ShortUrlComponent();
        $this->shortUrlRepository = new ShortUrlRepository();
    }


    public function create(Request $request): JsonResponse
    {
        $this->validate($request, [
            'url' => 'required|string',
        ]);

        $dto = $this->shortUrlDto->fillFromRequest($request);

        $short = $this->shortUrlRepository->readByUrl($dto->url);

        if (!$short) {

            $dto->hash = $this->shortUrlComponent->getHash();

            $short = $this->shortUrlRepository->create($dto);
        }

        return response()->json($short->only('short_url'));
    }


    public function read(Request $request, $hash): RedirectResponse
    {
        $dto = $this->shortUrlDto->dto();

        $dto->hash = $hash;

        $short = $this->shortUrlRepository->readByHash($dto->hash);

        if ($short) {

            return redirect($short->url);
        }

        return redirect($this->shortUrlRepository->getBaseUrl());
    }

}
