<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($postId): JsonResponse
    {
        $image = Image::where('post_id', $postId)->get();
        $image->delete();

        return response()->json($image, 200);
    }
}
