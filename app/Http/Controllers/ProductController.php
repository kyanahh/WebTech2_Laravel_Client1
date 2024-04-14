<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{

    public function landing()
    {
        return view('products.landing');
    }

    public function loginpage()
    {
        return view('products.loginpage');
    }

    public function createaccount()
    {
        return view('products.createaccount');
    }

    public function home()
    {
        return view('products.home');
    }

    public function createuser(Request $request)
    {
        // Validate data
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Create a new user
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        // Log in the newly created user
        auth()->login($user);

        return redirect()->route('tables')->withSuccess('Account created successfully');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('tables');
        } else {
            return back()->withErrors([
                'email' => 'Invalid credentials',
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('landing');
    }

    public function index()
    {
        $user = auth()->user();
        $products = $user->products()->paginate(5);
        return view('products.index', ['products' => $products]);

    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // validate data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ]);

        // upload image
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('products'), $imageName);

        // create a new product and associate it with the user's ID
        $product = new Product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->user_id = auth()->user()->id;
        $product->save();

        return back()->withSuccess('Product successfully created');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // Validate data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif|max:10000',
        ]);

        // Fetch the product from the database
        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            // Upload image
            $imagePath = public_path('products');
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move($imagePath, $imageName);
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        return redirect()->route('dogshow', ['product' => $product])->withSuccess('Product successfully updated');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('tables')->withSuccess('Product successfully deleted');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
        
}
        
