@extends('layouts.app')

@section('content')
{{-- ─── Glassmorphism Hero Header ─── --}}
<section class="relative overflow-hidden">
    {{-- Background --}}
    <div class="absolute inset-0">
        <img src="{{ $novel['cover'] }}" alt="" class="w-full h-full object-cover scale-110 blur-3xl opacity-30">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/80 via-slate-900/60 to-slate-50 dark:to-slate-950"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16">
        <div class="flex flex-col md:flex-row gap-8 md:gap-12">
            {{-- Cover --}}
            <div class="shrink-0 flex justify-center md:justify-start">
                <div class="relative group">
                    <div class="absolute -inset-1 bg-primary-500/20 rounded-2xl blur-xl"></div>
                    <img src="{{ $novel['cover'] }}" alt="{{ $novel['title'] }}" class="relative w-52 md:w-60 h-72 md:h-80 object-cover rounded-2xl shadow-2xl">
                </div>
            </div>

            {{-- Info --}}
            <div class="flex-1 text-center md:text-left">
                <div class="flex items-center justify-center md:justify-start gap-2 mb-3">
                    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $novel['status'] === 'Completed' ? 'bg-emerald-500/20 text-emerald-300 border border-emerald-500/30' : 'bg-primary-500/20 text-primary-300 border border-primary-500/30' }}">
                        {{ $novel['status'] }}
                    </span>
                    <span class="text-sm text-slate-400">{{ number_format($novel['views']) }} reads</span>
                </div>

                <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white mb-3">{{ $novel['title'] }}</h1>
                <p class="text-slate-400 mb-4">by <span class="text-primary-300 font-medium">{{ $novel['author'] }}</span></p>

                <div class="flex items-center justify-center md:justify-start gap-4 mb-5">
                    <div class="flex items-center gap-1 text-amber-400">
                        @for($i = 0; $i < 5; $i++)
                            <svg class="w-5 h-5 {{ $i < floor($novel['rating']) ? 'fill-current' : 'fill-slate-600' }}" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        @endfor
                        <span class="text-sm font-semibold ml-1">{{ $novel['rating'] }}</span>
                    </div>
                    <span class="text-slate-500">•</span>
                    <span class="text-sm text-slate-400">{{ $novel['total_chapters'] }} Chapters</span>
                </div>

                <div class="flex items-center justify-center md:justify-start flex-wrap gap-2 mb-6">
                    @foreach($novel['tags'] as $tag)
                    <span class="tag-badge">{{ $tag }}</span>
                    @endforeach
                </div>

                <div class="flex items-center justify-center md:justify-start gap-3">
                    <a href="{{ route('novel.read', [$novel['slug'], 1]) }}" class="btn-primary">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        Start Reading
                    </a>
                    <button class="btn-secondary !bg-white/10 !border-white/20 !text-white hover:!bg-white/20">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
                        Bookmark
                    </button>
                    <button class="p-3 rounded-xl bg-white/10 border border-white/20 text-white hover:bg-white/20 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ─── Tabs: Synopsis / Table of Contents ─── --}}
<section x-data="{ activeTab: 'synopsis' }" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    {{-- Tab Buttons --}}
    <div class="flex gap-1 bg-slate-100 dark:bg-slate-800/50 p-1 rounded-2xl w-fit mb-8">
        <button @click="activeTab = 'synopsis'"
                :class="activeTab === 'synopsis' ? 'bg-white dark:bg-slate-700 shadow-sm text-primary-600 dark:text-primary-400' : 'text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-300'"
                class="px-6 py-2.5 rounded-xl text-sm font-semibold transition-all">
            Synopsis
        </button>
        <button @click="activeTab = 'toc'"
                :class="activeTab === 'toc' ? 'bg-white dark:bg-slate-700 shadow-sm text-primary-600 dark:text-primary-400' : 'text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-300'"
                class="px-6 py-2.5 rounded-xl text-sm font-semibold transition-all">
            Table of Contents
        </button>
    </div>

    {{-- Synopsis Panel --}}
    <div x-show="activeTab === 'synopsis'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
        <div class="max-w-3xl">
            <div class="prose dark:prose-invert prose-slate max-w-none">
                <p class="text-lg leading-relaxed text-slate-700 dark:text-slate-300">{{ $novel['synopsis'] }}</p>
            </div>
            <div class="mt-8 grid grid-cols-2 sm:grid-cols-4 gap-4">
                <div class="bg-white dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700/50 rounded-2xl p-4 text-center">
                    <p class="text-2xl font-bold text-primary-600 dark:text-primary-400">{{ $novel['total_chapters'] }}</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Chapters</p>
                </div>
                <div class="bg-white dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700/50 rounded-2xl p-4 text-center">
                    <p class="text-2xl font-bold text-amber-500">{{ $novel['rating'] }}</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Rating</p>
                </div>
                <div class="bg-white dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700/50 rounded-2xl p-4 text-center">
                    <p class="text-2xl font-bold text-emerald-500">{{ number_format($novel['views'] / 1000) }}K</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Total Views</p>
                </div>
                <div class="bg-white dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700/50 rounded-2xl p-4 text-center">
                    <p class="text-2xl font-bold text-primary-600 dark:text-primary-400">{{ $novel['status'] }}</p>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Status</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Table of Contents Panel --}}
    <div x-show="activeTab === 'toc'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0">
        <div class="max-w-3xl space-y-2">
            @foreach($novel['chapter_list'] as $chapter)
            <div class="flex items-center gap-4 p-4 rounded-xl bg-white dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700/50 {{ !$chapter['is_locked'] ? 'hover:border-primary-300 dark:hover:border-primary-600/50 hover:shadow-md transition-all group' : 'opacity-70' }}">
                <span class="w-10 h-10 flex items-center justify-center rounded-xl {{ !$chapter['is_locked'] ? 'bg-primary-100 dark:bg-primary-900/30 text-primary-600 dark:text-primary-400' : 'bg-slate-100 dark:bg-slate-700 text-slate-400' }} text-sm font-bold shrink-0">
                    {{ $chapter['number'] }}
                </span>
                <div class="flex-1 min-w-0">
                    <h4 class="text-sm font-semibold text-slate-900 dark:text-white truncate {{ !$chapter['is_locked'] ? 'group-hover:text-primary-600 dark:group-hover:text-primary-400' : '' }} transition-colors">
                        {{ $chapter['title'] }}
                    </h4>
                    <div class="flex items-center gap-3 mt-0.5">
                        <span class="text-xs text-slate-400">{{ $chapter['date'] }}</span>
                        <span class="text-xs text-slate-400">{{ number_format($chapter['words']) }} words</span>
                    </div>
                </div>
                @if($chapter['is_locked'])
                <div class="flex items-center gap-1 text-amber-500 shrink-0">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
                    <span class="text-xs font-medium">15 Coins</span>
                </div>
                @else
                <a href="{{ route('novel.read', [$novel['slug'], $chapter['number']]) }}" class="px-4 py-2 rounded-xl text-xs font-semibold bg-primary-100 dark:bg-primary-900/30 text-primary-600 dark:text-primary-400 hover:bg-primary-200 dark:hover:bg-primary-900/50 transition-all shrink-0">
                    Read
                </a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
