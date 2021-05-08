<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">

    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            <button wire:click="create()" class="bg-gray-500 hover:bg-black text-white font-bold py-2 px-4 rounded my-3">Create New Page</button>
            @if($isOpen)
                @include('livewire.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 w-20">No.</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pages as $page)
                    <tr>
                        <td class="border px-4 py-2">{{ $page->id }}</td>
                        <td class="border px-4 py-2">{{ $page->title }}</td>
                        <td class="border px-4 py-2 flex justify-around">

                            <button wire:click="view({{ $page->id }})" class="bg-gray-500 hover:bg-black text-white font-bold py-2 px-4 rounded">View Page</button>
                            @if($isOpenShow)
                                @include('livewire.show')
                            @endif
                            <button wire:click="edit({{ $page->id }})" class="bg-gray-500 hover:bg-black text-white font-bold py-2 px-4 rounded">Edit</button>
                            @if(!$published)
                                <button wire:click="unpublish({{ $page->id }})" class="bg-yellow-300 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">unpublish</button>
                            @else
                                <button wire:click="publish({{ $page->id }})" class="bg-yellow-300 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Publish</button>
                            @endif
                            <button wire:click="delete({{ $page->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

