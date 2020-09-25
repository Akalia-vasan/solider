<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as iImage;
class ProductController extends Controller
{
    protected $filePath = 'resources';
    public function __construct()
    {
        $this->storageDriver = env('IMAGE_STORAGE', 'local');
    }
    public function index()
    {
        $productData = Product::orderBy('id', 'DESC')->paginate(10);
        return view('admin.product.index', compact('productData'));
    }


    public function create()
    {

        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|min:4|max:100',
            'discount' => 'nullable|integer|max:100',
            'image' => 'image|dimensions:max_width=200,max_height=200',
            'basic_price' => 'required'
        ];
        $request->validate($rules);
        if( !is_null( $request->input('id') ) ){
            $product     = Product::find($request->id);
            $msg         = ' Updated';
            if($request->file('image'))
            {
                $fileName = $product->getAttribute('id') . '.' . $product->getAttribute('extension');
                unlink(public_path('resources/'.$fileName));
            }

        }else{
            $product     = new Product;
            $msg         = ' Created';
        }

        $product->title = $request->title;
        $product->discount = $request->discount;
        $product->description = $request->description;
        $product->basic_price = $request->basic_price;
        $product->save();

        $file =  $request->file('image');
        if($file){

            $product->resource = $file->getClientOriginalName();
            $product->extension = $file->getClientOriginalExtension();
            $product->save();
            $endFileName = $product->getAttribute('id') . '.' . $file->getClientOriginalExtension();

            try {
                $file->move($this->filePath, $endFileName);
            } catch (\Exception $e) {
                $product->delete();
            }
        }

        return $request->ajax() ?   ['msg' => 'Created'] :  redirect()->route('product.index')->with('msg','Product '. $msg);
    }


    public function edit(Product $product)
    {
        return view('admin.product.create', compact('product'));
    }

    public function delete(Product $product)
    {
        $product->delete();

        return 1;
    }

    public function status(Product $product)
    {
        return view('admin.product.disable', compact('product'));
    }

    public function disable(Request $request, Product $product)
    {
        $product->active = $request->active;
        $product->save();

        return redirect()->route('product.index')->with('msg','Updated');;
    }


}
