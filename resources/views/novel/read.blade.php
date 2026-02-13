@extends('layouts.app')

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('readerSettings', () => ({
        fontSize: 18,
        lineHeight: 1.8,
        theme: 'light',
        fontFamily: 'serif',
        showSettings: false,
        themes: {
            light: { bg: '#ffffff', text: '#1e293b', name: 'White' },
            sepia: { bg: '#f5f0e8', text: '#5c4b37', name: 'Sepia' },
            night: { bg: '#1a1a2e', text: '#d1d5db', name: 'Night' },
        },
        fonts: [
            { value: 'serif', label: 'Serif', family: 'Merriweather, Georgia, serif' },
            { value: 'sans', label: 'Sans', family: 'Inter, system-ui, sans-serif' },
            { value: 'mono', label: 'Mono', family: '"JetBrains Mono", monospace' },
        ],
        get currentFont() {
            const found = this.fonts.find(f => f.value === this.fontFamily);
            return found ? found.family : 'serif';
        },
        get currentTheme() {
            return this.themes[this.theme];
        }
    }));
});
</script>
@endpush

@section('content')
<div x-data="readerSettings" class="min-h-screen flex flex-col">

    {{-- ─── Sticky Top Bar ─── --}}
    <div class="sticky top-0 z-40 bg-white/90 dark:bg-slate-900/90 backdrop-blur-xl border-b border-slate-200 dark:border-slate-800 shadow-sm">
        <div class="max-w-4xl mx-auto px-4 py-3 flex items-center justify-between">
            {{-- Back & Title --}}
            <div class="flex items-center gap-3 min-w-0 flex-1">
                <a href="{{ route('novel.show', $novel['slug']) }}" class="p-2 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-all shrink-0" title="Back to novel">
                    <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </a>
                <div class="min-w-0">
                    <p class="text-xs text-slate-400 truncate">{{ $novel['title'] }}</p>
                    <p class="text-sm font-semibold text-slate-900 dark:text-white truncate">{{ $chapter['title'] }}</p>
                </div>
            </div>

            {{-- Navigation & Settings --}}
            <div class="flex items-center gap-2 shrink-0">
                @if($prev_chapter)
                <a href="{{ route('novel.read', [$novel['slug'], $prev_chapter]) }}" class="p-2 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-all" title="Previous chapter">
                    <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </a>
                @endif
                @if($next_chapter)
                <a href="{{ route('novel.read', [$novel['slug'], $next_chapter]) }}" class="p-2 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-all" title="Next chapter">
                    <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
                @endif
                <div class="w-px h-6 bg-slate-200 dark:bg-slate-700 mx-1"></div>
                <button @click="showSettings = !showSettings" class="p-2 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-all" :class="showSettings ? 'bg-primary-100 dark:bg-primary-900/30 text-primary-600 dark:text-primary-400' : 'text-slate-500'">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </button>
            </div>
        </div>

        {{-- ─── Settings Drawer ─── --}}
        <div x-show="showSettings" x-cloak
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="border-t border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900">
            <div class="max-w-4xl mx-auto px-4 py-5 space-y-5">

                {{-- Font Size --}}
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Font Size</label>
                        <span class="text-sm text-primary-600 dark:text-primary-400 font-mono" x-text="fontSize + 'px'"></span>
                    </div>
                    <div class="flex items-center gap-3">
                        <button @click="fontSize = Math.max(12, fontSize - 2)" class="p-1.5 rounded-lg bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 transition-all">
                            <svg class="w-4 h-4 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                        </button>
                        <input x-model="fontSize" type="range" min="12" max="28" step="1" class="flex-1 h-2 bg-slate-200 dark:bg-slate-700 rounded-lg appearance-none cursor-pointer accent-primary-500">
                        <button @click="fontSize = Math.min(28, fontSize + 2)" class="p-1.5 rounded-lg bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 transition-all">
                            <svg class="w-4 h-4 text-slate-600 dark:text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        </button>
                    </div>
                </div>

                {{-- Line Height --}}
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Line Height</label>
                        <span class="text-sm text-primary-600 dark:text-primary-400 font-mono" x-text="lineHeight.toFixed(1)"></span>
                    </div>
                    <input x-model="lineHeight" type="range" min="1.2" max="2.5" step="0.1" class="w-full h-2 bg-slate-200 dark:bg-slate-700 rounded-lg appearance-none cursor-pointer accent-primary-500">
                </div>

                {{-- Background Theme --}}
                <div>
                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 block mb-2">Background</label>
                    <div class="flex gap-2">
                        <template x-for="(t, key) in themes" :key="key">
                            <button @click="theme = key"
                                    :class="theme === key ? 'ring-2 ring-primary-500 ring-offset-2 dark:ring-offset-slate-900' : ''"
                                    :style="'background-color:' + t.bg + '; color:' + t.text"
                                    class="px-5 py-2.5 rounded-xl text-sm font-medium border border-slate-200 dark:border-slate-700 transition-all"
                                    x-text="t.name">
                            </button>
                        </template>
                    </div>
                </div>

                {{-- Font Family --}}
                <div>
                    <label class="text-sm font-semibold text-slate-700 dark:text-slate-300 block mb-2">Font Family</label>
                    <div class="flex gap-2">
                        <template x-for="f in fonts" :key="f.value">
                            <button @click="fontFamily = f.value"
                                    :class="fontFamily === f.value ? 'bg-primary-600 text-white shadow-lg shadow-primary-500/25' : 'bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-slate-700'"
                                    :style="'font-family:' + f.family"
                                    class="px-5 py-2.5 rounded-xl text-sm font-medium transition-all"
                                    x-text="f.label">
                            </button>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ─── Reading Content ─── --}}
    <div class="flex-1 transition-colors duration-300" :style="'background-color:' + currentTheme.bg">
        <article class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-14 transition-all duration-300"
                 :style="'font-size:' + fontSize + 'px; line-height:' + lineHeight + '; color:' + currentTheme.text + '; font-family:' + currentFont">

            {{-- Chapter Title --}}
            <h1 class="text-2xl md:text-3xl font-bold mb-8 pb-6 border-b" :style="'border-color: rgba(0,0,0,0.1); font-family:' + currentFont" style="line-height: 1.3;">
                {{ $chapter['title'] }}
            </h1>

            {{-- Content Paragraphs --}}
            @foreach($content as $paragraph)
            <p class="mb-6">{{ $paragraph }}</p>
            @endforeach
        </article>
    </div>

    {{-- ─── Bottom Navigation ─── --}}
    <div class="border-t border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900">
        <div class="max-w-3xl mx-auto px-4 py-4 flex items-center justify-between">
            @if($prev_chapter)
            <a href="{{ route('novel.read', [$novel['slug'], $prev_chapter]) }}" class="btn-secondary text-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Previous Chapter
            </a>
            @else
            <div></div>
            @endif

            <a href="{{ route('novel.show', $novel['slug']) }}" class="text-sm text-slate-500 hover:text-primary-500 transition-colors font-medium">
                Back to Novel
            </a>

            @if($next_chapter)
            <a href="{{ route('novel.read', [$novel['slug'], $next_chapter]) }}" class="btn-primary text-sm">
                Next Chapter
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
            @else
            <span class="text-sm text-slate-400 font-medium">You've reached the end!</span>
            @endif
        </div>
    </div>
</div>
@endsection
