@props(['homeRoute' => false])
<div class="*:min-w-max [&_span,svg]:text-sky-600 dark:[&_span,svg]:text-sky-400 [&_span]:font-semibold">
    <flux:navlist.group :heading="auth()->user()->name" class="grid">
        @if($homeRoute)
            <a href="{{ route('home') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800">
                <x-svg.home-icon class="w-6"/>
                <span>{{ __('Inicio') }}</span></a>
        @else
            @php $role = auth()->user()->roles?->first()?->name.'.' @endphp
            <a href="{{ route($role.'dashboard') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800">
                <x-svg.computer-icon class="w-6"/>
                <span>{{ __('Dashboard') }}</span></a>
        @endif
    </flux:navlist.group>
    <flux:spacer/>
    {{--  Superadmin sidebar --}}

    @role('superadmin')
    <flux:navlist.group class="grid [&_a]:text-sm [&_a]:text-gray-600 dark:[&_a]:text-gray-300" x-data="{ open: false }">
        <div @click="open = !open" class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" :class="open ? 'bg-gray-100 dark:bg-gray-800 font-semibold' : ''">
            <x-svg.academic-cap-icon class="w-6"/>
            <span class="flex justify-between w-full">{{ __('Centers') }}<x-svg.chevron-down-icon class="w-4 transition" x-bind:class="{ 'rotate-180': open }"/></span>
        </div>
        <div x-show="open" x-collapse class="border-l border-l-sky-500 ml-6">
            <a href="{{ route('centers.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                <x-svg.eye-icon class="w-5"/>
                {{ __('View Centers') }}</a>
            <a href="{{ route('centers.create') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                <x-svg.plus-icon class="w-5"/>
                {{ __('Create Center') }}</a>
        </div>
        <flux:navlist.group class="grid" x-data="{ openPosts: false }">
            <div @click="openPosts = !openPosts" class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" :class="openPosts ? 'bg-gray-100 dark:bg-gray-800 font-semibold' : ''">
                <x-svg.post-icon class="w-6"/>
                <span class="flex justify-between w-full">{{ __('Posts') }}<x-svg.chevron-down-icon class="w-4 transition" x-bind:class="{ 'rotate-180': openPosts }"/></span>
            </div>
            <div x-show="openPosts" x-collapse class="border-l border-l-sky-500 ml-6">
                <a href="{{ route('posts.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.eye-icon class="w-5"/>
                    {{ __('View Posts') }}</a>
                <a href="{{ route('posts.create') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.plus-icon class="w-5"/>
                    {{ __('Create post') }}</a>
            </div>
        </flux:navlist.group>
        <flux:navlist.group class="grid" x-data="{ openPodcast: false }">
            <div @click="openPodcast = !openPodcast" class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" :class="openPodcast ? 'bg-gray-100 dark:bg-gray-800 font-semibold' : ''">
                <x-svg.podcast-icon class="w-6"/>
                <span class="flex justify-between w-full">{{ __('Podcast') }}<x-svg.chevron-down-icon class="w-4 transition" x-bind:class="{ 'rotate-180': openPodcast }"/></span>
            </div>
            <div x-show="openPodcast" x-collapse class="border-l border-l-sky-500 ml-6">
                <a href="{{ route('podcasts.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.eye-icon class="w-5"/>
                    {{ __('View Podcasts') }}</a>
                <a href="{{ route('podcasts.create') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.plus-icon class="w-5"/>
                    {{ __('Create podcasts') }}</a>
            </div>
        </flux:navlist.group>
        <flux:navlist.group class="grid" x-data="{ openVideos: false }">
            <div @click="openVideos = !openVideos" class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" :class="openVideos ? 'bg-gray-100 dark:bg-gray-800 font-semibold' : ''">
                <x-svg.video-icon class="w-6"/>
                <span class="flex justify-between w-full">{{ __('Videos') }}<x-svg.chevron-down-icon class="w-4 transition" x-bind:class="{ 'rotate-180': openVideos }"/></span>
            </div>
            <div x-show="openVideos" x-collapse class="border-l border-l-sky-500 ml-6">
                <a href="{{ route('video.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.eye-icon class="w-5"/>
                    {{ __('View videos') }}</a>
                <a href="{{ route('video.create') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.plus-icon class="w-5"/>
                    {{ __('Create videos') }}</a>
            </div>
        </flux:navlist.group>
        <flux:navlist.group class="grid" x-data="{ openTags: false }">
            <div @click="openTags = !openTags" class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" :class="openTags ? 'bg-gray-100 dark:bg-gray-800 font-semibold' : ''">
                <x-svg.tags-icon class="w-6"/>
                <span class="flex justify-between w-full">{{ __('Tags') }}<x-svg.chevron-down-icon class="w-4 transition" x-bind:class="{ 'rotate-180': openTags }"/></span>
            </div>
            <div x-show="openTags" x-collapse class="border-l border-l-sky-500 ml-6">
                <a href="{{ route('tags.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.eye-icon class="w-5"/>
                    {{ __('View tags') }}</a>
                <a href="{{ route('tags.create') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.plus-icon class="w-5"/>
                    {{ __('Create tags') }}</a>
            </div>
        </flux:navlist.group>
        <flux:navlist.group class="grid" x-data="{ openUsers: false }">
            <div @click="openUsers = !openUsers" class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" :class="openUsers ? 'bg-gray-100 dark:bg-gray-800 font-semibold' : ''">
                <x-svg.users-icon class="w-6"/>
                <span class="flex justify-between w-full">{{ __('Users') }}<x-svg.chevron-down-icon class="w-4 transition" x-bind:class="{ 'rotate-180': openUsers }"/></span>
            </div>
            <div x-show="openUsers" x-collapse class="border-l border-l-sky-500 ml-6">
                <a href="{{ route('users.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.eye-icon class="w-5"/>
                    {{ __('View users') }}</a>
                <a href="{{ route('users.create') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.plus-icon class="w-5"/>
                    {{ __('Create users') }}</a>
            </div>
        </flux:navlist.group>
    </flux:navlist.group>
    @endrole

    {{--Student sidebar--}}

    @role('student')
    <flux:navlist.group class="grid [&_a]:text-sm [&_a]:text-gray-600 dark:[&_a]:text-gray-300" x-data="{ openPosts: false, openPodcasts: false, openVideos: false }">
        {{-- Posts --}}
        <flux:navlist.group class="grid">
            <div @click="openPosts = !openPosts" class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" :class="openPosts ? 'bg-gray-100 dark:bg-gray-800 font-semibold' : ''">
                <x-svg.post-icon class="w-6"/>
                <span class="flex justify-between w-full">{{ __('Posts') }}<x-svg.chevron-down-icon class="w-4 transition" x-bind:class="{ 'rotate-180': openPosts }"/></span>
            </div>
            <div x-show="openPosts" x-collapse class="border-l border-l-sky-500 ml-6">
                <a href="{{ route('student.my-posts') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.eye-icon class="w-5"/>
                    {{ __('Ver mis Posts') }}</a>
                <a href="{{ route('posts.create') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.plus-icon class="w-5"/>
                    {{ __('Crear Post') }}</a>
            </div>
        </flux:navlist.group>
        {{-- Podcasts --}}
        <flux:navlist.group class="grid">
            <div @click="openPodcasts = !openPodcasts" class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" :class="openPodcasts ? 'bg-gray-100 dark:bg-gray-800 font-semibold' : ''">
                <x-svg.podcast-icon class="w-6"/>
                <span class="flex justify-between w-full">{{ __('Podcasts') }}<x-svg.chevron-down-icon class="w-4 transition" x-bind:class="{ 'rotate-180': openPodcasts }"/></span>
            </div>
            <div x-show="openPodcasts" x-collapse class="border-l border-l-sky-500 ml-6">
                <a href="{{ route('student.my-podcasts') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.eye-icon class="w-5"/>
                    {{ __('Ver mis Podcasts') }}</a>
                <a href="{{ route('podcasts.create') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.plus-icon class="w-5"/>
                    {{ __('Crear Podcast') }}</a>
            </div>
        </flux:navlist.group>
        {{-- Videos --}}
        <flux:navlist.group class="grid">
            <div @click="openVideos = !openVideos" class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" :class="openVideos ? 'bg-gray-100 dark:bg-gray-800 font-semibold' : ''">
                <x-svg.video-icon class="w-6"/>
                <span class="flex justify-between w-full">{{ __('Videos') }}<x-svg.chevron-down-icon class="w-4 transition" x-bind:class="{ 'rotate-180': openVideos }"/></span>
            </div>
            <div x-show="openVideos" x-collapse class="border-l border-l-sky-500 ml-6">
                <a href="{{ route('student.my-videos') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.eye-icon class="w-5"/>
                    {{ __('Ver mis Videos') }}</a>
                <a href="{{ route('video.create') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.plus-icon class="w-5"/>
                    {{ __('Crear Video') }}</a>
            </div>
        </flux:navlist.group>
        {{-- Favoritos (solo ver) --}}
        <a href="{{ route('student.favorites') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
            <x-svg.heart-icon class="w-6"/>
            {{ __('Mis Favoritos') }}
        </a>
        {{-- Comentarios (solo ver) --}}
        <a href="{{ route('student.comments') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
            <x-svg.comments-icon class="w-6"/>
            {{ __('Mis Comentarios') }}
        </a>
    </flux:navlist.group>
    @endrole

    @role('admin')
    <flux:navlist.group class="grid [&_a]:text-sm [&_a]:text-gray-600 dark:[&_a]:text-gray-300" x-data="{ open: false }">
        <flux:navlist.group :heading="auth()->user()->name" class="grid">
            <div @click="open = !open" class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" :class="open ? 'bg-gray-100 dark:bg-gray-800 font-semibold' : ''">
                <x-svg.academic-cap-icon class="w-6"/>
                <span class="flex justify-between w-full">{{ __('Centers') }}<x-svg.chevron-down-icon class="w-4 transition" x-bind:class="{ 'rotate-180': open }"/></span>
            </div>
            <div x-show="open" x-collapse class="border-l border-l-sky-500 ml-6">
                <a href="{{ route('centers.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.eye-icon class="w-5"/>
                    {{ __('View Centers') }}</a>
                <a href="{{ route('centers.create') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.plus-icon class="w-5"/>
                    {{ __('Create Center') }}</a>
            </div>
        </flux:navlist.group>
        <flux:navlist.group class="grid" x-data="{ openPosts: false }">
            <div @click="openPosts = !openPosts" class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" :class="openPosts ? 'bg-gray-100 dark:bg-gray-800 font-semibold' : ''">
                <x-svg.post-icon class="w-6"/>
                <span class="flex justify-between w-full">{{ __('Posts') }}<x-svg.chevron-down-icon class="w-4 transition" x-bind:class="{ 'rotate-180': openPosts }"/></span>
            </div>
            <div x-show="openPosts" x-collapse class="border-l border-l-sky-500 ml-6">
                <a href="{{ route('posts.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.eye-icon class="w-5"/>
                    {{ __('View Posts') }}</a>
                <a href="{{ route('posts.create') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.plus-icon class="w-5"/>
                    {{ __('Create post') }}</a>
            </div>
        </flux:navlist.group>
        <flux:navlist.group class="grid" x-data="{ openPodcast: false }">
            <div @click="openPodcast = !openPodcast" class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" :class="openPodcast ? 'bg-gray-100 dark:bg-gray-800 font-semibold' : ''">
                <x-svg.podcast-icon class="w-6"/>
                <span class="flex justify-between w-full">{{ __('Podcast') }}<x-svg.chevron-down-icon class="w-4 transition" x-bind:class="{ 'rotate-180': openPodcast }"/></span>
            </div>
            <div x-show="openPodcast" x-collapse class="border-l border-l-sky-500 ml-6">
                <a href="{{ route('podcasts.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.eye-icon class="w-5"/>
                    {{ __('View Podcasts') }}</a>
                <a href="{{ route('podcasts.create') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.plus-icon class="w-5"/>
                    {{ __('Create podcasts') }}</a>
            </div>
        </flux:navlist.group>
        <flux:navlist.group class="grid" x-data="{ openVideos: false }">
            <div @click="openVideos = !openVideos" class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" :class="openVideos ? 'bg-gray-100 dark:bg-gray-800 font-semibold' : ''">
                <x-svg.video-icon class="w-6"/>
                <span class="flex justify-between w-full">{{ __('Videos') }}<x-svg.chevron-down-icon class="w-4 transition" x-bind:class="{ 'rotate-180': openVideos }"/></span>
            </div>
            <div x-show="openVideos" x-collapse class="border-l border-l-sky-500 ml-6">
                <a href="{{ route('video.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.eye-icon class="w-5"/>
                    {{ __('View videos') }}</a>
                <a href="{{ route('video.create') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.plus-icon class="w-5"/>
                    {{ __('Create videos') }}</a>
            </div>
        </flux:navlist.group>
        <flux:navlist.group class="grid" x-data="{ openTags: false }">
            <div @click="openTags = !openTags" class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" :class="openTags ? 'bg-gray-100 dark:bg-gray-800 font-semibold' : ''">
                <x-svg.tags-icon class="w-6"/>
                <span class="flex justify-between w-full">{{ __('Tags') }}<x-svg.chevron-down-icon class="w-4 transition" x-bind:class="{ 'rotate-180': openTags }"/></span>
            </div>
            <div x-show="openTags" x-collapse class="border-l border-l-sky-500 ml-6">
                <a href="{{ route('tags.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.eye-icon class="w-5"/>
                    {{ __('View tags') }}</a>
                <a href="{{ route('tags.create') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.plus-icon class="w-5"/>
                    {{ __('Create tags') }}</a>
            </div>
        </flux:navlist.group>
        <flux:navlist.group class="grid" x-data="{ openUsers: false }">
            <div @click="openUsers = !openUsers" class="cursor-pointer flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" :class="openUsers ? 'bg-gray-100 dark:bg-gray-800 font-semibold' : ''">
                <x-svg.users-icon class="w-6"/>
                <span class="flex justify-between w-full">{{ __('Users') }}<x-svg.chevron-down-icon class="w-4 transition" x-bind:class="{ 'rotate-180': openUsers }"/></span>
            </div>
            <div x-show="openUsers" x-collapse class="border-l border-l-sky-500 ml-6">
                <a href="{{ route('users.index') }}" class="flex items-center gap-2 px-3 py-2 rounded-md transition hover:bg-gray-100 dark:hover:bg-gray-800" wire:navigate>
                    <x-svg.eye-icon class="w-5"/>
                    {{ __('View users') }}</a>
            </div>
        </flux:navlist.group>
    </flux:navlist.group>
    @endrole
</div>
