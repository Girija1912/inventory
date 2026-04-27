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
                                <th style="padding:12px; border:1px solid #ddd;">Category Name</th>
                                <th style="padding:12px; border:1px solid #ddd;">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($categories as $category)
                            <tr style="text-align:center; background:#f9f9f9;"
                                onmouseover="this.style.background='#eaf4ff'"
                                onmouseout="this.style.background='#f9f9f9'">

                                <td style="padding:10px; border:1px solid #ddd;">
                                    {{ $category->id }}
                                </td>

                                <td style="padding:10px; border:1px solid #ddd;">
                                    {{ $category->Category_name }}
                                </td>

                                <td style="padding:10px; border:1px solid #ddd;">

                                    <a href="{{route('admin.updatecategory',$category->id)}}"
                                        style="background:#007bff; padding:6px 12px; color:white; text-decoration:none; border-radius:5px; margin-right:5px;">
                                        Update
                                    </a>

                                    <a href="{{route('admin.deletecategory',$category->id)}}"
                                        onclick="return confirm('Are you sure?')"
                                        style="background:#dc3545; padding:6px 12px; color:white; text-decoration:none; border-radius:5px;">
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