<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('updated_message'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{session('updated_message')}}
            </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('admin.postupdateproduct',$product->id)}}" method="post"
                        enctype="multipart/form-data"
                        style="max-width:500px; margin:40px auto; padding:20px; border:1px solid #ddd; border-radius:10px; box-shadow:0 0 10px #eee; font-family:Arial;">

                        @csrf

                        <!-- Image -->
                        <label style="font-weight:bold;">Old Image</label>
                        <img src="{{asset('/products/'.$product->product_image)}}" style="width:80px;" alt="">
                        <label style="font-weight:bold;">Upload new Image</label>
                        <input type="file" name="product_image"
                            style="width:100%; padding:8px; margin-bottom:12px; border:1px solid #ccc; border-radius:6px;">

                        <!-- Product Name -->
                        <label style="font-weight:bold;">Product Name</label>
                        <input type="text" name="product_name" value="{{$product->product_name}}"
                            style="width:100%; padding:10px; margin-bottom:12px; border:1px solid #ccc; border-radius:6px;">

                        <textarea name="product_description" value="{{$product->product_description}}"
                            style="width:100%; padding:10px; margin-bottom:12px; border:1px solid #ccc; border-radius:6px; height:100px; resize:none;">{{$product->product_description}}</textarea>
                        <!-- Quantity -->
                        <label style="font-weight:bold;">Quantity</label>
                        <input type="number" name="product_quantity" min="1" value="{{$product->product_quantity}}"
                            style="width:100%; padding:10px; margin-bottom:12px; border:1px solid #ccc; border-radius:6px;">

                        <!-- Price -->
                        <label style="font-weight:bold;">Price</label>
                        <input type="number" name="product_price" value="{{$product->product_price}}"
                            style="width:100%; padding:10px; margin-bottom:12px; border:1px solid #ccc; border-radius:6px;">

                        <!-- Category -->
                        <label style="font-weight:bold;">Category</label>
                        <select name="category_name" required
                            style="width:100%; padding:10px; margin-bottom:12px; border:1px solid #ccc; border-radius:6px; background:white;">
                            <option value="{{ $product->category_name }}"> {{ $product->category_name }}</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->category_name }}">
                                {{ $category->category_name }}
                            </option>
                            @endforeach
                        </select>

                        <!-- Supplier -->
                        <label style="font-weight:bold;">Supplier</label>
                        <select name="supplier_name" required
                            style="width:100%; padding:10px; margin-bottom:15px; border:1px solid #ccc; border-radius:6px; background:white;">
                            <option value="{{ $product->supplier_name }}">{{ $product->supplier_name }}</option>
                            @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->supplier_name }}">
                                {{ $supplier->supplier_name }}
                            </option>
                            @endforeach
                        </select>

                        <!-- Submit -->
                        <input type="submit" value="Update Product"
                            style="width:100%; padding:12px; background:#28a745; color:white; border:none; border-radius:6px; font-weight:bold; cursor:pointer; transition:0.3s;"
                            onmouseover="this.style.background='#218838'"
                            onmouseout="this.style.background='#28a745'">

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>