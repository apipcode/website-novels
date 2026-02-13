@extends('layouts.app')

@section('content')
{{-- ─── Hero Carousel ─── --}}
<section x-data="{
    current: 0,
    novels: {{ Js::from($featured) }},
    timer: null,
    progress: 0,
    duration: 6000,
    init() {
        this.startTimer();
    },
    startTimer() {
        clearInterval(this.timer);
        this.progress = 0;
        this.timer = setInterval(() => {
            this.progress += 100 / (this.duration / 50);
            if (this.progress >= 100) {
                this.goTo((this.current + 1) % this.novels.length);
            }
        }, 50);
    },
    goTo(index) {
        this.current = index;
        this.progress = 0;
    },
    next() { this.goTo((this.current + 1) % this.novels.length); },
    prev() { this.goTo((this.current - 1 + this.novels.length) % this.novels.length); },
}" class="relative overflow-hidden bg-slate-950 min-h-[560px] flex items-center">

    {{-- Background Images (crossfade) --}}
    <template x-for="(novel, index) in novels" :key="index">
        <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out"
             :class="current === index ? 'opacity-100' : 'opacity-0'">
            <img :src="novel.cover" class="w-full h-full object-cover opacity-15 blur-2xl scale-110" :alt="novel.title">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/80 to-slate-950/40"></div>
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-transparent to-slate-950/60"></div>
        </div>
    </template>

    {{-- Content Slides --}}
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 w-full">
        <template x-for="(novel, index) in novels" :key="'hero-'+index">
            <div class="transition-all duration-700 ease-in-out absolute inset-0 flex items-center px-4 sm:px-6 lg:px-8"
                 :class="current === index
                    ? 'opacity-100 translate-x-0'
                    : (index > current || (current === novels.length - 1 && index === 0))
                        ? 'opacity-0 translate-x-12'
                        : 'opacity-0 -translate-x-12'"
                 :style="current === index ? 'position:relative' : 'position:absolute; pointer-events:none'">
                <div class="flex flex-col md:flex-row items-center gap-8 md:gap-12 max-w-7xl mx-auto w-full">
                    {{-- Cover --}}
                    <div class="shrink-0">
                        <div class="relative">
                            <div class="absolute -inset-1 bg-primary-500/20 rounded-2xl blur-xl"></div>
                            <img :src="novel.cover" :alt="novel.title" class="relative w-48 md:w-56 h-72 md:h-80 object-cover rounded-2xl shadow-2xl shadow-black/40">
                        </div>
                    </div>
                    {{-- Info --}}
                    <div class="flex-1 text-center md:text-left max-w-xl">
                        <div class="flex items-center justify-center md:justify-start gap-3 mb-3">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-primary-500/15 text-primary-400 border border-primary-500/25" x-text="novel.status"></span>
                            <span class="text-sm text-slate-500">
                                <span x-text="(novel.views / 1000000).toFixed(1)"></span>M reads
                            </span>
                        </div>
                        <h1 class="text-3xl md:text-5xl font-extrabold text-white mb-3 text-balance leading-tight" x-text="novel.title"></h1>
                        <p class="text-slate-500 mb-2">by <span class="text-slate-300 font-medium" x-text="novel.author"></span></p>
                        <p class="text-slate-400 text-sm md:text-base leading-relaxed mb-6 line-clamp-3" x-text="novel.synopsis"></p>
                        <div class="flex items-center justify-center md:justify-start gap-2 mb-6">
                            <template x-for="tag in novel.tags" :key="tag">
                                <span class="px-2.5 py-1 rounded-lg text-xs font-medium bg-slate-800 text-slate-300 border border-slate-700" x-text="tag"></span>
                            </template>
                        </div>
                        <div class="flex items-center justify-center md:justify-start gap-3">
                            <a :href="'/novel/' + novel.slug" class="btn-primary">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                Start Reading
                            </a>
                            <button class="btn-secondary !bg-white/5 !border-slate-700 !text-slate-300 hover:!bg-white/10">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
                                Bookmark
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>

    {{-- Carousel Controls --}}
    <button @click="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 p-2.5 rounded-full bg-white/5 text-white/70 hover:bg-white/10 hover:text-white border border-white/10 backdrop-blur-sm transition-all z-10">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
    </button>
    <button @click="next()" class="absolute right-4 top-1/2 -translate-y-1/2 p-2.5 rounded-full bg-white/5 text-white/70 hover:bg-white/10 hover:text-white border border-white/10 backdrop-blur-sm transition-all z-10">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </button>

    {{-- Progress Dots --}}
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-3 z-10">
        <template x-for="(novel, index) in novels" :key="'dot-'+index">
            <button @click="goTo(index)" class="relative h-1 rounded-full overflow-hidden transition-all duration-300"
                    :class="current === index ? 'w-10 bg-slate-700' : 'w-6 bg-slate-800 hover:bg-slate-700'">
                <div x-show="current === index"
                     class="absolute inset-y-0 left-0 bg-primary-500 rounded-full transition-all"
                     :style="'width: ' + progress + '%'"></div>
            </button>
        </template>
    </div>
</section>

{{-- ─── Rankings + New Releases ─── --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        {{-- Rankings Sidebar --}}
        <div class="lg:col-span-1">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-amber-500/10 rounded-xl flex items-center justify-center border border-amber-500/20">
                    <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                </div>
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white">Top Rankings</h2>
            </div>
            <div class="space-y-2">
                @foreach($rankings as $item)
                <a href="{{ route('novel.show', $item['slug']) }}" class="flex items-center gap-3 p-3 rounded-xl bg-white dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700/50 hover:border-primary-400 dark:hover:border-primary-600/50 hover:shadow-md transition-all group">
                    <span class="w-7 h-7 flex items-center justify-center rounded-lg text-xs font-bold shrink-0
                        @if($item['rank'] === 1) bg-amber-500/15 text-amber-600 dark:text-amber-400
                        @elseif($item['rank'] === 2) bg-slate-200 dark:bg-slate-700 text-slate-600 dark:text-slate-300
                        @elseif($item['rank'] === 3) bg-amber-700/15 text-amber-700 dark:text-amber-500
                        @else bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400
                        @endif">
                        {{ $item['rank'] }}
                    </span>
                    <img src="{{ $item['cover'] }}" alt="{{ $item['title'] }}" class="w-10 h-14 rounded-lg object-cover shrink-0">
                    <div class="min-w-0 flex-1">
                        <h4 class="text-sm font-semibold text-slate-900 dark:text-white truncate group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">{{ $item['title'] }}</h4>
                        <p class="text-xs text-slate-500 dark:text-slate-400">{{ $item['author'] }}</p>
                        <div class="flex items-center gap-2 mt-0.5">
                            <span class="text-xs text-amber-500 flex items-center gap-0.5">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                {{ $item['rating'] }}
                            </span>
                            <span class="text-xs text-slate-400">{{ number_format($item['views']) }} views</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>

        {{-- New Releases Grid --}}
        <div class="lg:col-span-2">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-10 h-10 bg-primary-500/10 rounded-xl flex items-center justify-center border border-primary-500/20">
                    <svg class="w-5 h-5 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                </div>
                <h2 class="text-2xl font-bold text-slate-900 dark:text-white">New Releases</h2>
            </div>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                @foreach($newReleases as $novel)
                <a href="{{ route('novel.show', $novel['slug']) }}" class="novel-card group">
                    <div class="relative aspect-[3/4] overflow-hidden">
                        <img src="{{ $novel['cover'] }}" alt="{{ $novel['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-4">
                            <div class="flex items-center gap-1 mb-1.5">
                                @foreach($novel['tags'] as $tag)
                                <span class="px-2 py-0.5 rounded-md text-[10px] font-semibold bg-white/10 text-white/80 backdrop-blur-sm">{{ $tag }}</span>
                                @endforeach
                            </div>
                            <h3 class="font-bold text-white text-sm leading-snug mb-0.5">{{ $novel['title'] }}</h3>
                            <p class="text-xs text-slate-300">{{ $novel['author'] }}</p>
                            <div class="flex items-center gap-2 mt-1.5">
                                <span class="text-xs text-amber-400 flex items-center gap-0.5">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                    {{ $novel['rating'] }}
                                </span>
                                <span class="text-xs text-slate-400">{{ $novel['chapters'] }} ch.</span>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ─── CTA Section ─── --}}
<section class="bg-slate-900 dark:bg-slate-800/50 border-y border-slate-800 dark:border-slate-700">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
        <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Ready to Start Your Adventure?</h2>
        <p class="text-lg text-slate-400 mb-8">Join millions of readers and discover stories that captivate your imagination.</p>
        <div class="flex items-center justify-center gap-4">
            <a href="{{ route('browse') }}" class="btn-primary text-base px-8 py-3.5">
                Explore Now
            </a>
            <a href="{{ route('studio') }}" class="btn-secondary !bg-transparent !border-slate-600 !text-slate-300 hover:!bg-slate-800 text-base px-8 py-3.5">
                Start Writing
            </a>
        </div>
    </div>
</section>
@endsection
