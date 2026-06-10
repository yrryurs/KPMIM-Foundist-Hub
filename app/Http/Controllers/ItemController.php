<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    //Display add item form
    public function index()
    {
        $categories = Category::all(); //Retrieve categories for dropdown
        return view('items', compact('categories'));
    }

    //Store new item in database
    public function store(Request $request)
    {
        $data=$request->validate([
            'itemname'=>'required|string|max:255',
            'description'=>'required|string',
            'category_id'=>'required|exists:categories,id',
            'status'=>'required|in:lost,found',
            'location'=>'required|string|max:255',
            'date'=>'required|date',
            'image'=>'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        //If image is uploaded, store and save
        if ($request->hasFile('image')){
            $data['image']=$request->file('image')->store('image','public');
        }

        Item::create($data);
        //Feedback message from system
        return redirect('/items')->with('success','Item added successfully !');
    }

    //Show edit form for an item
    public function edit($id)
    {
        $item=\App\Models\Item::findOrFail($id); //Find item by ID
        $categories = Category::all();
        return view('update',compact('item','categories'));    
    }

    //Update existing items data
    public function update(Request $request,$id)
    {
        $item=\App\Models\Item::findOrFail($id);
        $request->validate([
            'itemname'=>'required',
            'description'=>'required',
            'category_id'=>'required|exists:categories,id',
            'status'=>'required|in:lost,found',
            'location'=>'required',
            'date'=>'required|date',
            'image'=>'nullable|image|max:2048',
        ]);

        //Update item's field with new values
        $item->itemname=$request->itemname;
        $item->description=$request->description;
        $item->category_id=$request->category_id;  
        $item->status=$request->status;
        $item->location=$request->location;
        $item->date=$request->date;

        //Delete existing image if user click "Delete image"
        if ($request->has('deleteImage')&&$item->image){
            Storage::disk('public')->delete($item->image);
            $item->image=null;
        }

        //If new image is uploaded, delete old image and store new one
        if ($request->hasFile('image')){
            if ($item->image){
                Storage::disk('public')->delete($item->image);
            }
            $path=$request->file('image')->store('image','public');
            $item->image=$path;
        }
        $item->save(); //Save updated item
        return redirect()->route('items.view')->with('success','Item updated successfully.');
    }

    //Soft delete an item
    public function destroy($id)
    {
        $item=\App\Models\Item::findOrFail($id);
        $item->delete();
        return redirect()->route('items.view')->with('success','Item deleted successfully.');
    }

    //Show all soft-deleted items 
    public function trash()
    {
        //Only admin have access
        if (auth()->user()->role!=='admin'){
            abort(403);
        }
        $deletedItems =\App\Models\Item::onlyTrashed()->get();
        return view('trash', compact('deletedItems'));
    }

    //Restore soft-deleted items
    public function restore($id)
    {
        $item=Item::withTrashed()->findOrFail($id);
        $item->restore();
        return redirect()->route('items.view')->with('success','Item restored successfully.');
    }

    //Permanently delete item from database
    public function forceDelete($id)
    {
        $item =\App\Models\Item::withTrashed()->findOrFail($id);
        $item->forceDelete();
        return redirect()->route('trash')->with('success','Item permanently deleted.');
    }

    // Show all items separated by status
    public function show()
    {
        $items=\App\Models\Item::orderBy('date','asc')->get(); //Item sorted by date
        $itemlost=$items->where('status','lost'); //Filter lost items
        $itemfound=$items->where('status','found'); //Filter found items
        return view('view',compact('itemlost','itemfound'));
    }
}
