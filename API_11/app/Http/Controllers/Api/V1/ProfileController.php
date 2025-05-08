<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileUserResource;
use App\Http\Resources\UserResource;
use App\Models\ProfileUser;
use App\Models\User;
use App\Services\Profile\ProfileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;

/**
 * This class is ProfileController class with all profile management related functions and variables.
 *
 * @package Meritest_LMS_Profile_Controller
 * @author Pallavi Dighe <pallavi@meritest.in>
 * @acces public
 * @version 1.0
 * @since 1.0
 * @see http://lms.meritest.in/profile
 */
class ProfileController extends Controller
{
    public function __construct(protected ProfileService $profileService)
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        // Here we will find all the data of logged-in user
        $user = Auth::user();
        $profile = ProfileUser::with([
                'user.courses' => function($query) {
                    $query->limit(5);
                    $query->orderBy('created_at', 'desc');
                },
                'user.questions' => function ($query) {
                    $query->limit(5);
                    $query->orderBy('created_at', 'desc');
                },
                'user.subjects' => function ($query) {
                    $query->limit(5);
                    $query->orderBy('created_at', 'desc');
                }])
            ->where('user_id', $user->id)
            ->get();
        $p = $profile[0];
        $p->avatar = $p->avatar ? URL::to($p->avatar) : null;

        return response()->json($p, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $response = [];
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param ProfileUser $profile
     * @return JsonResponse
     */
    public function show(ProfileUser $profile): JsonResponse
    {
        $response = [];
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ProfileUser $profile
     * @return JsonResponse
     * @throws \Exception
     */
    public function update(Request $request, ProfileUser $profile): JsonResponse
    {
        $user = $this->profileService->update($request, auth()->user());

        if (!$user) {
            return response()->json(['message' => 'There are a few errors in the form. Please check again.'], 403);
        }

        return response()->json(['message' => 'ProfileUser updated Successfully', 'data' => $user], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProfileUser $profile
     * @return JsonResponse
     */
    public function destroy(ProfileUser $profile): JsonResponse
    {
        $response = [];
        return response()->json($response, 200);
    }

    /**
     * Save image in local file system and return saved image path
     *
     * @param $image
     * @throws \Exception
     * @author Pallavi Dighe <pallavi@meritest.in>
     */
    private function saveImage($image): string
    {
        // Check if image is valid base64 string
        if (preg_match('/^data:image\/(\w+);base64,/', $image, $type)) {
            // Take out the base64 encoded text without mime type
            $image = substr($image, strpos($image, ',') + 1);
            // Get file extension
            $type = strtolower($type[1]); // jpg, png, gif

            // Check if file is an image
            if (!in_array($type, ['jpg', 'jpeg', 'gif', 'png'])) {
                throw new \Exception('invalid image type');
            }
            $image = str_replace(' ', '+', $image);
            $image = base64_decode($image);

            if ($image === false) {
                throw new \Exception('base64_decode failed');
            }
        } else {
            throw new \Exception('did not match data URI with image data');
        }

        $dir = 'storage/images/';
        $file = Str::random() . '.' . $type;
        $absolutePath = public_path($dir);
        $relativePath = $dir . $file;
        if (!File::exists($absolutePath)) {
            File::makeDirectory($absolutePath, 0755, true);
        }
        file_put_contents($relativePath, $image);

        return $relativePath;
    }
}
