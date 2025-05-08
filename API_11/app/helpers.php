<?php

use App\Models\Inquiry;
use App\Models\Student;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

if (!function_exists('generate_student_roll_number')) {
    function generate_student_roll_number():string
    {
        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();
        $students = Student::select('standard_id')->where('created_at', '>' , $startOfYear)->where('created_at', '<', $endOfYear)->groupBy('standard_id')->orderBy('name', 'asc')->get();
        $count = count($students) + 1;
        return Carbon::now()->toDateString() . '-' . $students[0]->standard_id . '-' . $count;
    }
}

if (!function_exists('save_image')) {

    function save_image($image, string $model):string
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

        $dir = 'storage/images/'.$model.'/';
        $file = Str::random() . '.' . $type;
        $request = new Request();
        if ($request->server('HTTP_PROJECT')) {
            $absolutePath = $request->server('HTTP_PROJECT').'/';
        } else {
            $absolutePath = public_path($dir);
        }

        $relativePath = $dir . $file;
        if (!File::exists($absolutePath)) {
            File::makeDirectory($absolutePath, 0755, true);
        }
        file_put_contents($relativePath, $image);

        return $relativePath;
    }
 

}

if (!function_exists('save_documents')) {

    function save_documents($image, string $model, string $studentName):string
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

        $dir = 'storage/images/'.$model.'/'.$studentName.'/';
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

if (!function_exists('generate_unique_code')) {
    function generate_unique_code():string
    {
        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();
        $students = Student::where('created_at', '>' , $startOfYear)->where('created_at', '<', $endOfYear)->orderBy('name', 'asc')->get();
        $count = count($students) + 1;
        return Carbon::now()->toDateString() . '-' . $count;
    }
}

/**
 * Write code on Method
 *
 * @return response()
 */
if (!function_exists('generate_unique_code_inquiry')) {
    function generate_unique_code_inquiry() :string
    {
        do {
            $code = random_int(100000, 999999);
        } while (Inquiry::where("unique_code", $code)->first());

        return $code;
    }
}
