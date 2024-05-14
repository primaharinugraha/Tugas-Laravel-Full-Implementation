<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'gender' => 'required|in:male,female',
            'age' => 'required|integer|min:1',
            'birth' => 'required|date',
            'address' => 'required',
            'role' => 'required|in:user,superadmin', // Validate the role input
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'age' => $request->age,
            'birth' => $request->birth,
            'address' => $request->address,
        ]);

        if ($user) {
            $user->assignRole($request->role);
            
            Auth::login($user); 

            // Redirect to the product page
            return redirect()->route('getproduk')->with('success', 'User created successfully');
        } else {
            return redirect()->route('register')
                ->with('error', 'Failed to create user');
        }
    }

    public function login()
    {
        return view('login');
    }

    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            // Redirect to the product page
            return redirect()->route('getproduk');
        } else {
            return redirect()->route('login')
                ->with('error', 'Login failed, email or password is incorrect');
        }
    }

    public function manajemenuser() {
        $user = Auth::user();
        $users = User::all();
        return view('manajemenUser', compact('users'));
        
    }

    public function tambahuser() {
        return view('tambahuser');
    }
// tambah user
    public function Newuser(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'gender' => 'required|in:male,female',
            'age' => 'required|integer|min:1',
            'birth' => 'required|date',
            'address' => 'required',
            'role' => 'required|in:user,superadmin',
        ]);

        if ($validator->fails()) {
            return redirect()->route('tambahuser')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'age' => $request->age,
            'birth' => $request->birth,
            'address' => $request->address,
        ]);

        if ($user) {
            $user->assignRole($request->role);
            
            Auth::login($user); // Automatically log in the user

            // Redirect to the product page
            return redirect()->route('manajemenuser')->with('success', 'User created successfully');
        } else {
            return redirect()->route('tambahuser')
                ->with('error', 'Failed to create user');
        }
    }

    public function editUser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('manajemenuser')->with('error', 'User not found');
        }
        return view('updateuser', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('manajemenuser')->with('error', 'User not found');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8',
            'gender' => 'required|in:male,female',
            'age' => 'required|integer|min:1',
            'birth' => 'required|date',
            'address' => 'required',
            'role' => 'required|in:user,superadmin',
        ]);

        if ($validator->fails()) {
            return redirect()->route('edit_user', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->birth = $request->birth;
        $user->address = $request->address;
        $user->save();

        // Assuming the role assignment logic is handled elsewhere or modify as needed
        $user->syncRoles([$request->role]);

        return redirect()->route('manajemenuser')->with('success', 'User updated successfully');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
    
        if (!$user) {
            return redirect()->route('manajemenuser')->with('error', 'Pengguna tidak ditemukan');
        }
    
        if (Auth::id() == $id) {
            return redirect()->route('manajemenuser')->with('error', 'You Cannot Delete Yourself');
        }
    
        $user->delete();
        return redirect()->route('manajemenuser')->with('success', 'Pengguna berhasil dihapus');
    }
    


    
   

    public function manajemenproduk() {
        $user = Auth::user();
        $data = Product::all();
        return view('manajemenproduk')->with('products', $data);
    }
// tambah produk
    public function tambahproduk() {
        return view('handle_request');
    }

    public function newproduk(Request $request) {

        $messages = [
            'image.required' => 'Kolom gambar produk wajib diisi.',
            'nama.required' => 'Kolom nama produk wajib diisi.',
            'berat.required' => 'Kolom berat produk wajib diisi.',
            'harga.required' => 'Kolom harga produk wajib diisi.',
            'stok.required' => 'Kolom stok produk wajib diisi.',
            'kondisi.required' => 'Kolom kondisi produk wajib diisi.',
            'kondisi.not_in' => 'Pilih kondisi barang yang valid.',
            'deskripsi.required' => 'Kolom deskripsi produk wajib diisi.',
        ];
       
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpg,png|max:2048', 
            'nama' => 'required',
            'berat' => 'required|numeric',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'kondisi' => 'required|not_in:0',
            'deskripsi' => 'required|max:2000 ',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('tambahproduk')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/storage/images/'.$imageName);
        }
    
        Product::create([
            'image' => 'storage/storage/images/'. $imageName,
            'name' => $request->nama,
            'weight' => $request->berat,
            'price' => $request->harga,
            'condition' => $request->kondisi,
            'stock' => $request->stok,
            'description' => $request->deskripsi,
            
        ]);

        return redirect()->route('manajemenproduk');
       
    }

    public function produk() {
        $user = Auth::user();
        $data = Product::all();
        return view('produk')->with('products', $data);
    }

    public function editproduk($id) {
        $produk = Product::find($id);
        return view('updateproduk', compact('produk'));
    }

    public function updateproduk(Request $request, $id) {
        $produk = Product::find($id);
    }

    public function deleteproduk($id) {
        $produk = Product::find($id);
        $produk->delete();
        return redirect()->route('manajemenproduk');
    }



    

    public function dashboard()
    {
        $user = Auth::user();

        return view('dashboard', compact('user'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    // public function loginGoogle()
    // {
    //     return Socialite::driver('google')->redirect();
    // }

    // public function loginGoogleCallback()
    // {
    //     $user = Socialite::driver('google')->user();

    //     $existingUser = User::where('email', $user->email)->first();

    //     if ($existingUser) {
    //         Auth::login($existingUser);
    //     } else {
    //         $newUser = new User();
    //         $newUser->google_id = $user->id;
    //         $newUser->name = $user->name;
    //         $newUser->email = $user->email;
    //         $newUser->password = Hash::make(Str::random(15));
    //         $newUser->gender = 'male';
    //         $newUser->age = 25;
    //         $newUser->birth = '1996-05-13';
    //         $newUser->address = 'Jakarta Selatan';
    //         $newUser->save();

    //         // assign role
    //         $newUser->assignRole('user');

    //         Auth::login($newUser);
    //     }

    //     return redirect()->route('dashboard');
    // }
}