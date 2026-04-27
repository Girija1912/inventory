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
                    <form action="{{ route('admin.postaddsupplier') }}" method="POST" style="max-width:400px; margin:auto;">
                        @csrf

                        <input type="text" name="supplier_name" placeholder="Enter Supplier Name" required
                            style="width:100%; padding:10px; margin-bottom:10px; border-radius:6px; border:1px solid #ccc;">

                        <input type="text" name="supplier_phone" placeholder="Enter Contact Number" required
                            style="width:100%; padding:10px; margin-bottom:10px; border-radius:6px; border:1px solid #ccc;">

                        <textarea name="supplier_address" placeholder="Enter Address"
                            style="width:100%; padding:10px; margin-bottom:10px; border-radius:6px; border:1px solid #ccc;"></textarea>

                        <input type="submit" value="Add Supplier"
                            style="width:100%; padding:10px; background:#28a745; color:white; border:none; border-radius:6px; cursor:pointer;">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>