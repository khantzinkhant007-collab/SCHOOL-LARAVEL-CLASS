<x-app-layout>
    <div name="contents" class="mx-10 pt-10 pb-6">
        @auth
            <form action="{{ route('kadai12_1.store') }}" method="POST" enctype="multipart/form-data" class="w-full">
                @csrf

                <textarea name="comment" rows="2"
                    class="w-full rounded-md border border-slate-400 bg-white text-lg focus:border-slate-500 focus:ring-0">{{ old('comment') }}</textarea>
                @error('comment')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <input type="file" name="image" accept="image/*" class="mt-2 block">
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <div class="mt-3 flex justify-end">
                    <button type="submit" class="rounded-md bg-teal-300 px-5 py-3 text-base text-black hover:bg-teal-400">
                        送信
                    </button>
                </div>
            </form>
        @else
            <div class="text-slate-700">
                <p>投稿するにはログインしてください。</p>
                <div class="mt-3 flex gap-4">
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-sm text-gray-700 underline">Register</a>
                    @endif
                </div>
            </div>
        @endauth

        <div class="mt-10">
            @forelse ($posts as $post)
                <ul class="flex w-full border-b border-slate-300 py-2">
                    <li class="w-[151px] shrink-0">
                        <div class="flex h-[94px] w-[151px] items-center justify-center overflow-hidden text-xl text-slate-300">
                            @if ($post->img_path)
                                <img src="{{ asset('storage/snspost_images/' . $post->img_path) }}" alt="投稿画像"
                                    class="h-full w-full object-cover">
                            @else
                                No Image
                            @endif
                        </div>
                    </li>
                    <li class="min-w-0 flex-1 pl-2">
                        <div class="flex flex-wrap items-baseline gap-x-3">
                            <span class="text-sm text-pink-400">{{ $post->user?->name ?? 'Unknown User' }}</span>
                            <time class="text-sm text-slate-400">{{ $post->created_at?->format('Y-m-d H:i:s') }}</time>
                        </div>
                        <p class="mt-1 whitespace-pre-wrap break-words text-lg leading-relaxed text-black">{{ $post->comment }}</p>
                    </li>
                </ul>
            @empty
                <div class="flex w-full border-b border-slate-300 py-2">
                    <div class="flex h-[94px] w-[151px] items-center justify-center text-xl text-slate-300">
                        No Image
                    </div>
                    <div class="pl-2 text-lg text-black">
                        まだ投稿はありません。
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-app-layout>
