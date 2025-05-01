<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\Categories;
use App\Models\products;

class ProdctsController extends Controller
{
    public function Index()
    {
        $categories=DB::table('categories')->get();
       // $products=products::with('categoy')->get(); // elequent
       $product=DB::table('products')
       ->join('categories','products.categories_id','=','categories.id')
       ->select('categories.name as categories_name','products.name as name','products.price','products.stocke','products.categories_id','products.image','products.id','products.descreption')
       ->get();
      
       //dd($product);
        return view('products.index',['categories'=>$categories,'products'=>$product]);
    }


    public function Create(Request $request)
    {
     
        $validated = $request->validate([
            'name' => 'required|string',
            'descreption' => 'nullable|string|max:1000',
            'price' => 'required',
            'stocke' => 'required',
            'categories_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,pdf,gif',
        ]);
       // الحصول على الملف
       $image=$request->file('image');
          // تخزين الملف في ال storage 
       $path= $image->store('images','public');
     
     
        $arr=[
            'name'=>$request->name,
            'descreption'=>$request->descreption,
            'price'=>$request->price,
            'stocke'=>$request->stocke,
            'categories_id'=>$request->categories_id,
            'image'=>Storage::url($path),
           ];


          

           $items=products::Create($arr); // Insert 
           $items->save();
           return redirect()->route('products.index');

    
      
    }


    public function Delete($id)
    {
        $item=products::find($id); // search 

        if($item)
        {
            $item->delete();
        }

        return redirect()->route('products.index');
    }


    public function Edit($id)
    {
        $item=products::find($id); // search 
        $categories=Categories::All();
        return view ('products.Edit',['products'=>$item,'categories'=>$categories]);
    
    }


    public function Update(Request $request)
    {
        
       
        $validated = $request->validate([
            'name' => 'required|string',
            'descreption' => 'nullable|string|max:1000',
            'price' => 'required',
            'stocke' => 'required',
            'categories_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,pdf,gif',
        ]);
      
        $data=products::find($request->id);
          // الحصول على الملف
       $image=$request->file('image');
       // تخزين الملف في ال storage 
       $path= $image->store('images','public');
      
        $data->update([
            'name'=>$request->name,
            'descreption'=>$request->descreption,
            'price'=>$request->price,
            'stocke'=>$request->stocke,
            'categories_id'=>$request->categories_id,
            'image'=>Storage::url($path),

        ]);


          return redirect()->route('products.index');
    }
}
