<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Media;
use App\Models\Products;
use App\Models\ProductVariations;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class ProductsController extends Controller
{
    //
    public function index(){
        $products = Products::with('category','variations','media')->get();
        // echo '<pre>';
        // print_r($products);
        // die();
        return view('admin.products.index',compact('products'));
    }

    public function addProducts(){
        $categories = Categories::all();
        return view('admin.products.addProducts',compact('categories'));
    }
    public function save(Request $request){
        
        $request->validate([
            'name' => 'required|unique:products',
            'slug' => 'required|unique:products',
            'category_id' => 'required',
            'description' => 'required',
            'direction' => 'required',
            'ingredients' => 'required',
            'lab_results' => 'required',
            'images' => 'required',
            'featured_img' => 'required',
            'strength' => 'array',
            'qty' => 'array',
            'price' => 'array',
            'strength.*' => 'required_with:qty.*,price.*|numeric',
            'qty.*' => 'required_with:strength.*,price.*|numeric',
            'price.*' => 'required_with:strength.*,qty.*|numeric',
        ]);
        // try {
            $product = new Products;

            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->category_id = $request->category_id;
            $product->description = $request->description;
            $product->direction = $request->direction;
            $product->ingredients = $request->ingredients;
            $product->lab_results = $request->lab_results;
        

            if ($request->hasFile('featured_img')) {
                $featuredImage = $request->file('featured_img');
                $extension = $featuredImage->getClientOriginalExtension();
                $featuredImageName = 'product_' . rand(0, 1000) . time() . '.' . $extension;
                $featuredImage->move(public_path('productIMG'), $featuredImageName);
                $product->featured_img = $featuredImageName;
            }
            $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );

            // Create product //////////////////////////////////
            $productstripe = $stripe->products->create([
                'name' => $request->name,
                'description' => $request->description,
            ]);
            $product->stripe_product_id = $productstripe->id;

            $product->save();

            $imageNames = $this->uploadImages($request,$product->id);


            for ($i = 0; $i < count($request->strength); $i++) {
                $productVariations = new ProductVariations;
                $productVariations->strength = $request->strength[$i];
                $productVariations->price = $request->price[$i];
                $productVariations->qty = $request->qty[$i];
                $productVariations->product_id = $product->id;
                $productVariations->save();
            }
            
            return redirect()->back()->with('success','Product has been uploaded.');
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error', 'An error occurred while adding the product.');
        // }
    }



    public function editProduct(Request $request,$slug){
        if($slug){
            $categories = Categories::all();
            $product = Products::with('media','variations')->where('slug',$slug)->first();
            // echo '<pre>';
            // print_r($product);
            // die();
                if($product){
                    return view('admin.products.updateProduct',compact('product','categories',));
                }
        }
    }

    public function updateProc(Request $request){
         
        $request->validate([
            'name' => 'required|unique:products,name,' . $request->id,
            'slug' => 'required|unique:products,slug,' . $request->id,
            'category_id' => 'required',
            'description' => 'required',
            'direction' => 'required',
            'ingredients' => 'required',
            'lab_results' => 'required',
            'strength' => 'required|array|min:1',
            'qty' => 'required|array|min:1',
            'price' => 'required|array|min:1',
        ]);

        $product = Products::find($request->id);
        if($product){
            $product->name = $request->name;
            $product->slug = $request->slug;
            $product->category_id = $request->category_id;
            $product->description = $request->description;
            $product->direction = $request->direction;
            $product->ingredients = $request->ingredients;
            $product->lab_results = $request->lab_results;

            if ($request->hasFile('featured_img')) {
                $featuredImage = $request->file('featured_img');
                $extension = $featuredImage->getClientOriginalExtension();
                $featuredImageName = 'product_' . rand(0, 1000) . time() . '.' . $extension;
                $featuredImage->move(public_path('productIMG'), $featuredImageName);
                $product->featured_img = $featuredImageName;
            }

        $existingImg = [];
        $oldImg = Media::where('product_id', $request->id)->pluck('id')->toArray();
        $existingImg = $request->existing_images;
        if (!is_null($existingImg)) {
            $removedImages = array_merge(array_diff($oldImg, $existingImg), array_diff($existingImg, $oldImg));
        } else {
            $removedImages = $oldImg;
        }
        if (!is_null($removedImages)) {
            foreach ($removedImages as $remove) {
                $deleteImg = Media::where('id', $remove)->first();
                
                if ($deleteImg) {
                    $image_path = public_path('productIMG/' . $deleteImg->img_name);
                    
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                        $deleteImg->delete();
                    }
                }
            }
        }
        }

        if($request->hasFile('images')) {
            $imageNames = $this->uploadImages($request,$product->id);
        }
      
        ProductVariations::where('product_id',$request->id)->delete();

        for ($i = 0; $i < count($request->strength); $i++) {
            $productVariations = new ProductVariations;
            $productVariations->strength = $request->strength[$i];
            $productVariations->price = $request->price[$i];
            $productVariations->qty = $request->qty[$i];
            $productVariations->product_id = $product->id;
            $productVariations->save();
        }
        $product->save();
        return redirect('admin-dashboard/product-edit/' . $request->slug)->with('success', 'Product updated successfully.');

    }



    public function removeProducts(Request $request, $slug){
        if ($slug) {
            $product = Products::where('slug', $slug)->first();
            if ($product) {
                ProductVariations::where('product_id', $product->id)->delete();
    
                $media = Media::where('product_id', $product->id)->get();
    
                $media->each(function ($mediaItem) {
                    $image_path = public_path('productIMG/' . $mediaItem->img_name);
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                    $mediaItem->delete();
                });
                $stripe = new \Stripe\StripeClient( env('STRIPE_SECRET_KEY') );

                $stripe->products->delete( $product->stripe_product_id, [] );
            
                $product->delete();
            } else {
                return redirect()->back()->with('error', 'Invalid Request.');
            }
            return redirect()->back()->with('success', 'Product has been removed');
        }
    }
    public function homestatus(Request $request){
        $products = Products::where('status',1)->get();
        foreach($products as $p){
          $pro =  Products::find($p->id);
          $pro->home_page_status = 0;
          $pro->update();
        }
        $product = Products::find($request->id);
        $product->home_page_status = 1;
        $product->update();
        return response()->json(['success'=>'Successfully updated']);
    }
    

    protected function uploadImages(Request $request,$id)
    {

    
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $extension = $file->getClientOriginalExtension();
                $name = 'product_' . rand(0, 1000) . '_' . time() . '.' . $extension;
                $file->move(public_path('productIMG'), $name);
    
                $media = new Media;
                $media->img_name = $name;
                $media->img_url = url('productIMG/' . $name);
                $media->product_id = $id;
                $media->save();
            }
        }
    
        return true;
    }
}
