<?php
namespace App\Repositories;

use App\Models\ProfileUser;
use App\Http\Resources\ProfileUserResource;
use App\Repositories\Interfaces\ProfileRepositoryInterface;
// use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;

class ProfileRepository implements ProfileRepositoryInterface
{
    public function all($request)
    {
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

    public function create($request)
    {
        $response = [];
        return response()->json($response, 200);
    }

    public function show($id)
    {
        $response = [];
        return response()->json($response, 200);
    }

    public function update($request, $profile)
    {
        $inputs = $response = [];
        // First of all we need to check which form is submitted.
        // Change Password for Account information form.
        $user = Auth::user();

        if ($request->isChangePassword) {
            $eloquent = User::findOrFail($user->id);
            $inputs = [
                'password' => Hash::make($request->password),
            ];
        } else {
            // Else: User profile information will be updated.
            $inputs = [
                'alt_email' => $request->alt_email,
                'mobile' => $request->mobile,
                'alt_mobile' => $request->alt_mobile,
                'address' => $request->address,
                'alt_address' => $request->alt_address,
                'gender' => $request->gender,
                'qualification' => $request->qualification,
                'designation' => $request->designation,
            ];
            // Check if image was given and save on local file system

            if (isset($request->avatar)) {
                if ($profile->avatar) {
                    $absolutePath = public_path($profile->avatar);
                    File::delete($absolutePath);
                }
                $relativePath  = $this->saveImage($request->avatar);
                $inputs['avatar'] = $relativePath;
            }
            $eloquent = $profile;
            $profile->update($inputs);
        }
        if (!empty($inputs)) {
            if ($eloquent->update($inputs)) {
                $response = [
                    'success' => true,
                    'message' => 'Account information is saved successfully.',
                    'errors' => [],
                    'profile' => $profile,
                ];
            } else {
                $response = [
                    'success' => false,
                    'message' => 'Oops, there seems to have some errors.',
                    'errors' => $this->validated()->errors(),
                    'profile' => $profile,
                ];
            }

        }
        return response()->json($response, 200);
    }

    public function delete($profile)
    {
        $response = [];
        return response()->json($response, 200);
    }
    
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
