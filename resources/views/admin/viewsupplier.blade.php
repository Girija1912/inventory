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
                    <table style="width:100%; border-collapse:collapse; margin-top:20px; font-family:Arial;">

                        <thead>
                            <tr style="background:#333; color:white;">
                                <th style="padding:10px;">Supplier Id</th>
                                <th style="padding:10px;">Name</th>
                                <th style="padding:10px;">Phone</th>
                                <th style="padding:10px;">Address</th>
                                <th style="padding:10px;">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($suppliers as $supplier)
                            <tr style="text-align:center; background:#f9f9f9;"
                                onmouseover="this.style.background='#eaf4ff'"
                                onmouseout="this.style.background='#f9f9f9'">

                                <td style="padding:10px;">{{ $supplier->id }}</td>
                                <td style="padding:10px;">{{ $supplier->supplier_name }}</td>
                                <td style="padding:10px;">{{ $supplier->supplier_phone }}</td>
                                <td style="padding:10px;">{{ $supplier->supplier_address }}</td>

                                <td style="padding:10px;">
                                    <a href="{{route('admin.updatesupplier',$supplier->id)}}"
                                        style="background:#007bff; color:white; padding:5px 10px; border-radius:5px; text-decoration:none;">
                                        Update
                                    </a>

                                    <a href="{{route('admin.deletesupplier',$supplier->id)}}"
                                        onclick="return confirm('Are you sure?')"
                                        style="background:#dc3545; color:white; padding:5px 10px; border-radius:5px; text-decoration:none;">
                                        Delete
                                    </a>
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