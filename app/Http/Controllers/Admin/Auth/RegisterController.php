<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
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

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    public $redirectTo = 'admin/dashboard';

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return
     *
     */
    public function create(array $data)
    {
        return Admin::create([
            'name'                  => $data['name'],
            'email'                 => $data['email'],
            'profile_photo_path'    => $this->single_upload($data['avatar'], 'profile-photos'),
            'password'              => Hash::make($data['password']),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return
     *
     */
    protected function createSuperAdmin()
    {
        $checkAdmin = Admin::where('is_super', true)->get();
        if (count($checkAdmin) === 0) {
            $admin = Admin::create([
                'name' => 'Super Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('Admin@1122'),
                'is_super' => true,
            ]);
            return redirect()->to('/admin?email=admin@gmail.com&password=Admin@1122');
        }
        return 'OOPS! Super admin already exist.';
    }
}
