<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pageTitle = 'Product List';
        confirmDelete();
        $products = Product::all();
        return view('home', [
            'pageTitle' => $pageTitle,
            'products' => $products
        ]);
    }

    public function create()
    {
        $pageTitle = 'Create Product';
        $categories = Category::all();
        return view('products.create', compact('pageTitle', 'categories'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'Attribute must be filled.',
            'numeric' => 'Fill attribute with numbers only.'
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file = $request->file('photo');
        if ($file != null) {
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();
            $file->store('public/files');
        }

        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category;
        if ($file != null) {
            $product->original_filename = $originalFilename;
            $product->encrypted_filename = $encryptedFilename;
        }
        $product->save();
        Alert::success('Added Successfully', 'Product Added Successfully.');
        return redirect()->route('products.index');
    }

    public function show(string $id)
    {
        $pageTitle = 'Product Detail';
        $product = Product::find($id);
        return view('products.show', compact('pageTitle', 'product'));
    }

    public function edit(string $id)
    {
        $pageTitle = 'Edit product';
        $categories = Category::all();
        $product = Product::find($id);
        return view('products.edit', compact(
            'pageTitle',
            'categories',
            'product'
        ));
    }

    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => 'Attribute must be filled.',
            'numeric' => 'Fill attribute with numbers only.'
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ], $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category;

        if ($request->has('delete_photo') && $product->encrypted_filename) {
            if (Storage::exists('public/files/' . $product->encrypted_filename)) {
                Storage::delete('public/files/' . $product->encrypted_filename);
            }
            $product->original_filename = null;
            $product->encrypted_filename = null;
        } elseif ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $file = $request->file('photo');
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();
            if ($product->encrypted_filename && Storage::exists('public/files/' . $product->encrypted_filename)) {
                Storage::delete('public/files/' . $product->encrypted_filename);
            }
            $file->store('public/files');
            $product->original_filename = $originalFilename;
            $product->encrypted_filename = $encryptedFilename;
        }
        $product->save();
        Alert::success('Changed Successfully', 'Product Data Changed Successfully.');
        return redirect()->route('home');
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);
        if ($product->encrypted_filename && Storage::exists('public/files/' . $product->encrypted_filename)) {
            Storage::delete('public/files/' . $product->encrypted_filename);
        }
        $product->delete();
        Alert::success('Deleted Successfully', 'Product Deleted Successfully.');
        return redirect()->route('home');
    }

    public function downloadFile($productId)
    {
        $product = Product::find($productId);
        if ($product && $product->encrypted_filename) {
            $encryptedFilename = 'public/files/' . $product->encrypted_filename;
            $extension = pathinfo($product->original_filename, PATHINFO_EXTENSION);
            $validExtensions = ['jpg', 'jpeg', 'png'];
            if (in_array($extension, $validExtensions) && Storage::exists($encryptedFilename)) {
                $downloadFilename = Str::slug($product->name) . '.' . $extension;
                return Storage::download($encryptedFilename, $downloadFilename);
            }
        }
        return redirect()->back()->with('error', 'File not found.');
    }

    public function getData(Request $request)
    {
        $products = Product::with('category');
        if ($request->ajax()) {
            return datatables()->of($products)
                ->addIndexColumn()
                ->addColumn('actions', function ($product) {
                    return view('products.actions', compact('product'));
                })
                ->toJson();
        }
    }

    public function exportExcel()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
}
