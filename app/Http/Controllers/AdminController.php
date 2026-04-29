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

        $product = new Product();
        $image = $request->product_image;
        if ($image) {
            $imagename = time() . "." . $image->getClientOriginalExtension();

            $product->product_image = $imagename;
        }
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;
        $product->category_name = $request->category_name;
        $product->supplier_name = $request->supplier_name;
        $product->save();
        if ($image && $product->save()) {
            $request->product_image->move("products", $imagename);
        }

        return redirect()->back()->with('success', 'Product added successfully');
    }

    public function viewproducts()
    {
        $products = Product::all();
        return view('admin.viewproducts', compact('products'));
    }

    public function deleteproduct($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();
        return redirect()->back();
    }

    public function updateproduct($id)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        $product = Product::findOrFail($id);
        return view('admin.updateproduct', compact('product', 'categories', 'suppliers'));
    }

    public function postupdateproduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);




        if ($request->hasFile('product_image')) {

            // delete old image
            if ($product->product_image && file_exists(public_path('products/' . $product->product_image))) {
                unlink(public_path('products/' . $product->product_image));
            }

            // upload new image
            $image = $request->file('product_image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('products'), $imagename);

            $product->product_image = $imagename;
        }


        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;
        $product->category_name = $request->category_name;
        $product->supplier_name = $request->supplier_name;


        $product->save();

        return redirect()->back()->with('updated_message', 'Product updated successfully');
    }
}
