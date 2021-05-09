<x-guest-layout>
    <div class="min-h-screen">
    <div class="parallax-donate donate-header">
        <p>Blog</p>
    </div>
    <div class="mt-6 mb-6 content flex  flex-col">
        @foreach ($posts as $post)
            @if($post->published == 1)
            <div class="border border-black mb-2 p-5" style="max-width: 900px">
                <h1 class="text-2xl">{{$post->title}}</h1>
                <p>{{$post->user_id}}</p>
                <p class="text-gray-300">{{$post->created_at}}</p>
                <a class="hover:underline" href="{{route('public_posts_show', $post->id)}}">View</a>
            </div>
            @endif
        @endforeach
    </div>
    </div>
</x-guest-layout>
