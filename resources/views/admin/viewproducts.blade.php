<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table style="width:100%; border-collapse:collapse; font-family:Arial; margin-top:20px;">

                        <thead>
                            <tr style="background:#333; color:white;">
                                <th style="padding:12px; border:1px solid #ddd;">Id</th>
                                <th style="padding:12px; border:1px solid #ddd;">Product Name</th>
                                <th style="padding:12px; border:1px solid #ddd;">Product Description</th>
                                <th style="padding:12px; border:1px solid #ddd;">Product Quantity</th>
                                <th style="padding:12px; border:1px solid #ddd;">Product Price</th>
                                <th style="padding:12px; border:1px solid #ddd;">Category Name</th>
                                <th style="padding:12px; border:1px solid #ddd;">Supplier Name</th>
                                <th style="padding:12px; border:1px solid #ddd;">Product Image</th>
                                <th style="padding:12px; border:1px solid #ddd;">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($products as $product)
                            <tr style="text-align:center; background:#f9f9f9;"
                                onmouseover="this.style.background='#eaf4ff'"
                                onmouseout="this.style.background='#f9f9f9'">

                                <td style="padding:10px; border:1px solid #ddd;">
                                    {{ $product->id }}
                                </td>

                                <td style="padding:10px; border:1px solid #ddd;">
                                    {{ $product->product_name }}
                                </td>
                                <td style="padding:10px; border:1px solid #ddd;">
                                    {{ $product->product_description }}
                                </td>
                                <td style="padding:10px; border:1px solid #ddd;">
                                    {{ $product->product_quantity }}
                                </td>
                                <td style="padding:10px; border:1px solid #ddd;">
                                    {{ $product->product_price }}
                                </td>
                                <td style="padding:10px; border:1px solid #ddd;">
                                    {{ $product->category_name }}
                                </td>
                                <td style="padding:10px; border:1px solid #ddd;">
                                    {{ $product->supplier_name }}
                                </td>
                                <td style="padding:10px; border:1px solid #ddd;">
                                    <img src="{{asset('/products/'.$product->product_image)}}" style="width:80px;" alt="">
                                    {{ $product->product_image }}
                                </td>

                                <td style="padding:10px; border:1px solid #ddd;">
                                    <div style="display:flex; gap:10px; justify-content:center; flex-wrap:wrap;">
                                        <a href="{{route('admin.updateproduct',$product->id)}}"
                                            style="background:#007bff; padding:6px 12px; color:white; text-decoration:none; border-radius:5px; margin-right:5px;">
                                            Update
                                        </a>

                                        <a href="{{route('admin.deleteproduct',$product->id)}}"
                                            onclick="return confirm('Are you sure?')"
                                            style="background:#dc3545; padding:6px 12px; color:white; text-decoration:none; border-radius:5px; ">
                                            Delete
                                        </a>
                                    </div>

                                </td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>