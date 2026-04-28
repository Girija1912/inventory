<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('supplier_message'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{session('supplier_message')}}
            </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.postaddproduct') }}" method="POST"
                        style="max-width:500px; margin:auto;" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="product_image"
                            style="margin-bottom:10px;">

                        <input type="text" name="product_name" placeholder="Enter Product Name" required
                            style="width:100%; padding:10px; margin-bottom:10px; border:1px solid #ccc; border-radius:6px;">

                        <input type="number" name="product_quantity" min="1" placeholder="Enter Quantity" required
                            style="width:100%; padding:10px; margin-bottom:10px; border:1px solid #ccc; border-radius:6px;">

                        <input type="number" name="product_price" placeholder="Enter Product Price" required
                            style="width:100%; padding:10px; margin-bottom:10px; border:1px solid #ccc; border-radius:6px;">

                        <!-- Category -->
                        <label>Category</label>
                        <select name="category_id"
                            style="width:100%; padding:10px; margin-bottom:10px; border-radius:6px;">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->category_name }}">
                                {{ $category->category_name }}
                            </option>
                            @endforeach
                        </select>

                        <!-- Supplier -->
                        <label>Supplier</label>
                        <select name="supplier_id"
                            style="width:100%; padding:10px; margin-bottom:10px; border-radius:6px;">
                            <option value="">Select Supplier</option>
                            @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->supplier_name }}">
                                {{ $supplier->supplier_name }}
                            </option>
                            @endforeach
                        </select>

                        <input type="submit" value="Add Product"
                            style="width:100%; padding:10px; background:#28a745; color:white; border:none; border-radius:6px;">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>