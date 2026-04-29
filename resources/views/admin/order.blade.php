<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div style="padding:20px; font-family:Arial;">

        <!-- ================= ORDER TABLE ================= -->
        <h2>Order List</h2>

        @php $grandTotal = 0; @endphp

        <table style="width:100%; border-collapse:collapse; margin-top:20px;">

            <thead>
                <tr style="background:#333; color:white;">
                    <th>Id</th>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($orders as $order)

                @php
                $price = optional($order->product)->product_price ?? 0;
                $qty = $order->product_quantity ?? 1;
                $total = $price * $qty;
                $grandTotal += $total;
                @endphp

                <tr style="text-align:center; background:#f9f9f9;">
                    <td>{{ $order->id }}</td>

                    <td>{{ optional($order->product)->product_name }}</td>

                    <!-- Quantity (Live update) -->
                    <td>
                        <form action="{{route('admin.updatequantity',$order->id)}}" method="post">
                            @csrf
                            <input type="number" name="product_quantity" value="{{ $qty }}"
                                style="width:60px;">
                            <input style="border: 1px solid black; padding:10px; background-color:#007bff;color:white;" type="submit" name="submit" value="update">
                        </form>
                    </td>

                    <td>₹{{ $price }}</td>

                    <td class="total" style="color:green; font-weight:bold;">
                        ₹{{ $total }}
                    </td>




                    <td colspan="5" style="text-align:center; ">
                        <a href="{{route('admin.removeorder',$order->id)}}" style="color:white; background-color:#007bff; padding:10px">Remove</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

        <!-- ================= TOTAL ================= -->
        <div style="display:flex; justify-content:space-between; margin-top:20px;">
            <h4>Total Balance:</h4>
            <h4 id="grandTotal" style="color:green;">₹{{ $grandTotal }}</h4>
        </div>

        <!-- ================= PRINT ================= -->
        <button onclick="window.print()"
            style="margin-top:10px; padding:8px 16px; background:#007bff; color:white; border:none; border-radius:6px;">
            Print Order
        </button>

    </div>


    <!-- ================= PRODUCT GRID ================= -->
    <div style="padding:20px;">
        <h2>Add Product</h2>

        <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(160px,1fr)); gap:15px;">

            @foreach($products as $product)
            <div style="
            border:1px solid #ddd;
            border-radius:12px;
            padding:10px;
            text-align:center;
            box-shadow:0 2px 8px rgba(0,0,0,0.08);
            cursor:pointer;
        ">

                <!-- FIX: Use FORM instead of <a> -->
                <form action="{{ route('admin.postorder', $product->id) }}" method="POST">
                    @csrf

                    <button type="submit" style="border:none; background:none; width:100%;">

                        <img src="{{ asset('products/'.$product->product_image) }}"
                            style="width:100%; height:120px; object-fit:cover; border-radius:10px;">

                        <h5>{{ $product->product_name }}</h5>

                        <p style="color:green;">
                            ₹{{ number_format($product->product_price, 2) }}
                        </p>

                    </button>
                </form>

            </div>
            @endforeach

        </div>
    </div>

</x-app-layout>