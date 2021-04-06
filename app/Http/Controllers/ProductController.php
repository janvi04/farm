<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    //

    public function products()
    {

        $products=Product::get();

        return view('admin.products')->with('products',$products);
    }

    public function saveproduct(Request $request)
    {
        $this->validate($request,['product_name'=>'required',
                                'product_price'=>'required',
                                'product_image'=>'image|nullable|max:1999']);


            if($request->input('product_category'))
            {

        if($request->hasFile('product_image'))
        {
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();

            $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            $extension=$request->file('product_image')->getClientOriginalExtension();

            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            $path=$request->file('product_image')->storeAs('public/product_images',$fileNameToStore);
        }
        else{
            $fileNameToStore = 'noImage.jpg';

        }

        $product =new Product();

        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price'); 
        $product->product_category = $request->input('product_category');  
        $product->product_image = $fileNameToStore;
       
            $product->status=1;
      
        
       $product->save();

       return redirect('/addproduct')->with('status','The '.$product->product_name. ' product has been saved successfully');
    }

    else{
        return redirect('/addproduct')->with('status1','Do select the category please'); 
    }
}

  public function addproduct()
  {
       $categories= Category::All()->pluck('category_name','category_name');
      return view('admin.addproduct')->with('categories',$categories);
  }
    
 
  public function editproduct($id)
  {
    $categories= Category::All()->pluck('category_name','category_name');
    $product=Product::find($id);
    return view('admin.editproduct')->with('product',$product)->with('categories',$categories);; 

  }

  public function updateproduct(Request $request)
  {

    $this->validate($request,['product_name'=>'required',
                                'product_price'=>'required',
                                'product_image'=>'image|nullable|max:1999']);


    $product=Product::find($request->input('id'));


    $product->product_name = $request->input('product_name');
    $product->product_price = $request->input('product_price'); 
    $product->product_category = $request->input('product_category');  
  
    
        $product->status=1;

        if($request->hasFile('product_image'))
        {
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();

            $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);

            $extension=$request->file('product_image')->getClientOriginalExtension();

            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            $path=$request->file('product_image')->storeAs('public/product_images',$fileNameToStore);

            // $old_image=Product::find($request->input('id')); 

            if($product->product_image != 'noimage.jpg')
            {
                Storage::delete('public/product_images/'.$product->product_image);
            }
            $product->product_image = $fileNameToStore;
        }
     
        $product->update();
        return redirect('/products')->with('status','The '.$product->product_name. ' product has been updated successfully');

  }


  public function delete_product($id)
  {
      $product = Product::find($id);
      
      if($product->product_image != 'noimage.jpg')
      {
          Storage::delete('public/product_images/'.$product->product_image);
      }
      $product->delete();

      return redirect('/products')->with('status','The '.$product->product_name. ' product has been deleted successfully');
  }

  public function activate_product($id)
  {
      $product = Product::find($id);

      $product->status = 1;
      $product->update();

      return redirect('/products')->with('status','The '.$product->product_name. ' product status has been activated successfully');

  }
  public function unactivate_product($id)
  {
      $product = Product::find($id);

      $product->status = 0;
      $product->update();

      return redirect('/products')->with('status','The '.$product->product_name. ' product status has been unactivated successfully');

  }

 
}
