<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;

    /**
     * clearstatcache
     *  Define the URL to redirect users after registration.
     *
     * @var string
     */
    protected function redirectTo()
    {
        return route('admin.dishes.index');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make(
            $data,
            [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'name' => ['required', 'string', 'max:40'],
                'address' => ['required', 'string', 'min:5', 'max:200'],
                'piva' => ['required', 'string', 'numeric', 'digits:11', 'unique:restaurants'],
                'logo' => ['nullable', 'image', 'max:2048'],
                'types' => ['required', 'array', 'max:2', 'exists:types,id'],
            ],
            [
                'name.required' => 'Please, insert a name for your restaurant.',
                'address.required' => 'Please, insert an address for your restaurant.',
                'piva.required' => 'Please, insert correctly your P.Iva.',
                'piva.size' => 'Your P.Iva must be 11 characters long.',
                'logo.image' => 'Your Logo must be an image file.',
                'logo.max' => 'Your logo can\'t exceed 2MB of space.',
                'email.required' => 'Please, insert your email.',
                'email.email' => 'Please, insert a valid email address',
                'email.unique' => 'This email address is already taken.',
                'password.required' => 'Please insert your password.',
                'password.min' => 'Your Password must be at least 8 characters long.',
                'password.confirmed' => 'The passwords must correspond.',
                'types.*.exists' => 'Please insert a valid restaurant type.',

            ]
        );
    }

    /**
     * Create a new user instance and associate restaurants to it after a valid registration.
     *
     * @param  array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {

        // Save the logo file if provided, or set to null if absent
        $data['logo'] = isset($data['logo'])
            ? Storage::disk('public')->put('img/logos/', $data['logo'])
            : null;

        //Create a new user
        $user = User::create(
            [
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]
        );

        // Create the associated restaurant(s) for the user
        $restaurant = $user->restaurants()->create(
            [
                'name' => $data['name'],
                'address' => $data['address'],
                'piva' => $data['piva'],
                'logo' => $data['logo'],
                'user_id' => $user->id,

            ]
        );

        // Associate types with the restaurant
        if (isset($data['types'])) {
            $restaurant->types()->sync($data['types']);
        }

        return $user;
    }

    /**
     * Show the registration form with types.
     */
    public function showRegistrationForm()
    {
        $types = Type::all();

        return view('auth.register', compact('types'));
    }
}
