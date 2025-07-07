<?php
namespace App\Repositories;

use App\Http\Requests\UserRequest;
// use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\File;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\UserResource;
use App\Models\ProfileUser;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

// use App\Models\Permission;

class UserRepository implements UserRepositoryInterface
{

    public function all($request)
    {
        $field = $request->input('sort_field') ?? 'id';
        $order = $request->input('sort_order') ?? 'desc';
        $perPage = $request->input('per_page') ?? 10;

        return UserResource::collection(
            User::when(request('search'), function ($query) {
                $query->where('name', 'like', '%' . request('search') . '%');
                $query->orWhere('email', 'like', '%' . request('search') . '%');
                //$query->orWhere('mobile_no', 'like', '%' . request('search') . '%');
            })->orderBy($field, $order)->paginate($perPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function create($request)
    {
        if (!$request->validated()) {
            return response()->json([
                'success' => false,
                'message' => 'Oops, there seems to have some errors.',
                'errors' => $request->errors(), // This line assumes the request holds errors; adjust if needed.
            ], 422);
        }

        $inputs = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make(123456789),
        ];

        $user = User::create($inputs);
        // Handle image upload if exists
        $imagePath = null;
        if ($request->hasFile('avatar')) {
            $imagePath = $request->file('avatar')->store('profile_images', 'public');
        }

        // Create related profile
        $profile = new ProfileUser([
            'alt_email' => $request->alt_email,
            'mobile' => $request->mobile,
            'alt_mobile' => $request->alt_mobile,
            'address' => $request->address,
            'alt_address' => $request->alt_address,
            'gender' => $request->gender,
            'qualification' => $request->qualification,
            'date_of_joining' => $request->date_of_joining,
            'designation' => $request->designation,
            'avatar' => $imagePath,
        ]);
        $user->profile_user()->save($profile);

        $user->assignRole($request->designation);
        $response = [
            'success' => true,
            'message' => 'User created successfully.',
            'user' => $user,
        ];
        return response()->json($response, 200);
    }


    public function edit(User $user)
    {

        $response = [
            'user' => new UserResource(User::findOrFail($user->id)),
            //'userRoles' => $user->getAllRoles()->pluck('id'),
            //'userPermissions' => $user->getAllPermissions()->pluck('id'),
            //'allRoles' => Role::query()->select(['name','id'])->get(),
            //'allPermissions' => Permission::query()->select(['name','id'])->get(),
        ];

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return response()->json(User::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($request, $user)
    {
        if ($request->validated()) {
            $inputs = [
                'name'=> $request->name,
                'email' => $request->email,
            ];
            $user->name = $request->name;
            $user->email = $request->email;

            $profile = ProfileUser::where('user_id', '=', $user->id)->first();

            $user->save($inputs);
            $user->assignRole($request->designation);

            // Handle image upload if exists
            $imagePath = null;
            if ($request->hasFile('avatar')) {
                $imagePath = $request->file('avatar')->store('profile_images', 'public');
            }
            $profile->update([
                'alt_email' => $request->alt_email,
                'mobile' => $request->mobile,
                'alt_mobile' => $request->alt_mobile,
                'address' => $request->address,
                'alt_address' => $request->alt_address,
                'gender' => $request->gender,
                'qualification' => $request->qualification,
                'date_of_joining' => $request->date_of_joining,
                'designation' => $request->designation,
                'avatar' => $imagePath,
            ]);
            $response = [
                'success' => true,
                'message' => 'User updated successfully.',
                'role' => $user,
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Oops, there seems to have some errors.',
                'errors' => $this->validated()->errors(),
            ];
        }
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @return Response
     */
    public function delete($user)
    {
        $response = [
            'success' => false,
            'message' => null,
            'errors' => null,
        ];
        // First of all delete all the answers and then delete question.
        $user->profile_user()->delete();
        if ($user->delete()) {
            $response = [
                'success' => true,
                'message' => 'User deleted successfully.',
            ];
        }
        return response()->json($response);
    }


    public function role_list()
    {
        return response()->json(Role::all()->pluck('name', 'id'), 200);
    }
    public function is_email_exists($email, $id = null)
    {
        if ($id != null) {
            $user = User::where([['email', '=', $email], ['id', '!=', $id]])->get()->toArray();
        } else {
            $user = User::where('email', $email)->get()->toArray();
        }
        $response = [];
        if (!empty($user)) {
            $response = [
                'message' => "This email address already exists."
            ];
        }
        return response()->json($response, 200);
    }
}
