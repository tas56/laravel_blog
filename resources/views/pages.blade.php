<x-guest-layout>

    <div class="parallax-donate donate-header">
        <p>Pages</p>
    </div>
    <div class="mt-6 mb-6 content">
        @foreach ($pages as $page)
            @if($page->published == 1)
                <div class="border border-black mb-2 p-5" style="max-width: 500px">
                    <h1 class="text-2xl">{{$page->title}}</h1>
                    <p>{{$page->user_id}}</p>
                    <a class="hover:underline" href="{{route('public_pages_show', $page->id)}}">View</a>
                </div>
            @endif
        @endforeach
    </div>
</x-guest-layout>
