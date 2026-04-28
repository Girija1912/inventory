<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addCategory()
    {
        return view('admin.addcategory');
    }

    public function postaddcategory(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();
        return redirect()->back()->with('category_message', 'category add successfully');
    }

    public function viewcategory()
    {
        $categories = Category::all();
        return view('admin.viewcategory', compact('categories'));
    }

    public function updatecategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.updatecategory', compact('category'));
    }

    public function postupdatecategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->category_name = $request->category_name;
        $category->save();
        return redirect()->back()->with('updatecategory_message', 'Updated successfully');
    }

    public function deletecategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back();
    }

    public function addsupplier()
    {
        return view('admin.addsupplier');
    }

    public function postaddsupplier(Request $request)
    {
        $supplier = new Supplier();
        $supplier->supplier_name = $request->supplier_name;
        $supplier->supplier_phone = $request->supplier_phone;
        $supplier->supplier_address = $request->supplier_address;
        $supplier->save();
        return redirect()->back()->with('supplier_message', 'supplier added successfully');
    }

    public function viewSupplier()
    {
        $suppliers = Supplier::all();
        return view('admin.viewsupplier', compact('suppliers'));
    }
    public function deletesupplier($id)
    {
        $suppliers = Supplier::findOrFail($id);
        $suppliers->delete();
        return redirect()->back();
    }

    public function updatesupplier($id)
    {
        $suppliers = Supplier::findOrFail($id);
        return view('admin.updatesupplier', compact('suppliers'));
    }

    public function postupdatesupplier(Request $request, $id)
    {
        $suppliers = Supplier::findOrFail($id);
        $suppliers->supplier_name = $request->supplier_name;
        $suppliers->supplier_phone = $request->supplier_phone;
        $suppliers->supplier_address = $request->supplier_address;
        $suppliers->save();
        return redirect()->back()->with('update_message', 'Data updated successfully');
    }

    public function addproducts()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('admin.addproducts', compact('categories', 'suppliers'));
    }

    public function postaddproduct(Request $request)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;
        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id;
        $product->save();

        return redirect()->back()->with('success', 'Product added successfully');
    }
}
