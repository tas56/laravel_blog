<x-guest-layout>
    <div class="min-h-screen">

    <div class="parallax-volunteer donate-header">
        <p>Pages</p>
    </div>
    <div class="mt-6 mb-6 content">
        <ul>
        @foreach ($pages as $page)
            @if($page->published == 1)
                    <li><a class="text-blue-400 hover:underline mb-5" href="{{route('public_pages_show', $page->id)}}">{{$page->title}}</a></li>
            @endif
        @endforeach
        </ul>
    </div>
    </div>
</x-guest-layout>
