<?php

namespace App\Http\Controllers;

use App\Http\Resources\ImageResource;
use App\Models\Upload;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;

class MediaController extends Controller
{
    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function upload(Request $request): JsonResponse
    {
        $media = null;

        if ($request->hasFile('image')) {
            $media = (Upload::create())->addMediaFromRequest('image')
                ->toMediaCollection('uploads');
        }

        return response()->json($media ? new ImageResource($media) : null);
    }
    /**
     * @param Media $media
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Media $media)
    {
        $media->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
}
