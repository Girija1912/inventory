<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('category_message'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{session('category_message')}}
            </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('admin.postaddcategory')}}" method="post">
                        @csrf
                        <input type="text" name="category_name" placeholder="Enter Category Name" required />
                        <input style="background-color: blue;padding:10px;border:1px solid black; border-radius:10px; color:white;" type="submit" name="submit" value="Add Category" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>