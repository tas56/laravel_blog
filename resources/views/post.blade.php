<x-guest-layout>
    <div class="min-h-screen" style="margin-top: 200px">
        <div class="content" style="max-width: 700px; line-height: 50px">
            <h1 class="font-bold text-3xl">{{$post->title}}</h1>
            <p class="text-gray-300">Created at: {{$post->created_at}}</p>
            <p class="text-gray-300">Last updated at: {{$post->updated_at}}</p>
            <p>{{$post->body}}</p>
        </div>
    </div>
</x-guest-layout>
