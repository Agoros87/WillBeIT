<footer class="border-t border-zinc-200 dark:border-zinc-800 mt-20 bg-white dark:bg-zinc-900">
    <div class="max-w-7xl mx-auto px-4 md:px-12 py-8 grid grid-cols-1 md:grid-cols-3 gap-10 text-sm text-gray-600 dark:text-gray-400">
        {{-- Logo + Description --}}
        <div>
            <h4 class="header-3 text-xl mb-2">WilBeIT</h4>
            <p class="mb-4">
                {{ __('Connecting WillBeIT Erasmus institutions across Europe. Join a vibrant network of students and educators sharing unforgettable moments.') }}
            </p>
            <p class="text-xs">
                {{ __('Built with ❤️ for international education.') }}
            </p>
        </div>
        {{-- Quick Links --}}
        <div>
            <h5 class="header-3 text-xl mb-2">{{ __('Quick Links') }}</h5>
            <ul class="space-y-1 [&_a]:flex [&_a]:gap-2">
                <li><a href="{{ route('home') }}" class="hover:underline"><x-svg.home-icon class="w-5"/>{{ __('Home') }}</a></li>
                <li><a href="{{ route('posts.index') }}" class="hover:underline"><x-svg.post-icon class="w-5"/>{{ __('Posts') }}</a></li>
                <li><a href="{{ route('podcasts.index') }}" class="hover:underline"><x-svg.podcast-icon class="w-5"/>{{ __('Podcasts') }}</a></li>
                <li><a href="{{ route('video.index') }}" class="hover:underline"><x-svg.video-icon class="w-5"/>{{ __('Videos') }}</a></li>
            </ul>
        </div>
        {{-- Social or Contact --}}
        <div>
            <h5 class="header-3 text-xl mb-2">{{ __('Stay Connected') }}</h5>
            <ul class="space-y-1">
                <li><a href="#" class="hover:underline flex gap-2 items-center"><x-svg.instagram class="w-8"/>Instagram</a></li>
                <li><a href="#" class="hover:underline flex gap-2 items-center"><x-svg.twitter class="w-8"/>Twitter / X</a></li>
                <li><a href="#" class="hover:underline flex gap-2 items-center"><x-svg.whatshapp class="w-8"/> 968 968 968</a></li>
            </ul>
        </div>
    </div>
    <div class="text-center text-xs text-gray-500 dark:text-gray-600 py-6 border-t border-zinc-100 dark:border-zinc-700">
        © {{ date('Y') }} WilBeIt. {{ __('All rights reserved.') }}
    </div>
</footer>