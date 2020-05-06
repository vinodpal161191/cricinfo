<?php

namespace App\Http\Controllers;

use Config;
use Illuminate\Http\Request;
use League\Glide\ServerFactory;
use Storage;
use Swagger\Annotations as SWG;

class ImageFactoryController extends Controller
{

    public function show($path, Request $request)
    {
        $disk = $request->get('disk', Config::get('filesystems.default'));
        $filesystem = Storage::disk($disk);
        $server = ServerFactory::create([
            'source' => $filesystem->getDriver(),
            'cache' => $filesystem->getDriver(),
            'cache_path_prefix' => '.cache'
        ]);
        $server->outputImage($path, $request->all());
    }
}