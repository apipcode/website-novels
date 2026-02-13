@extends('layouts.app')

@section('content')
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10" x-data="{
    search: '',
    activeGenre: 'All',
    genres: ['All', 'Fantasy', 'Sci-Fi', 'Romance', 'Action', 'Horror', 'LitRPG', 'Steampunk', 'Thriller', 'Mystery'],
    novels: {{ Js::from($novels) }},
    get filteredNovels() {
        return this.novels.filter(n => {
            const matchGenre = this.activeGenre === 'All' || (n.tags && n.tags.includes(this.activeGenre));
            const matchSearch = this.search === '' || n.title.toLowerCase().includes(this.search.toLowerCase()) || n.author.toLowerCase().includes(this.search.toLowerCase());
            return matchGenre && matchSearch;
        });
    }
}">
    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 dark:text-white mb-2">Browse Novels</h1>
        <p class="text-slate-500 dark:text-slate-400">Discover your next favorite story from our curated collection.</p>
    </div>

    {{-- Search & Filter --}}
    <div class="mb-8 space-y-4">
        <div class="relative max-w-lg">
            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <input x-model="search" type="text" placeholder="Search by title or author..."
                   class="w-full pl-12 pr-4 py-3 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl text-sm focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all shadow-sm">
        </div>
        <div class="flex flex-wrap gap-2">
            <template x-for="genre in genres" :key="genre">
                <button @click="activeGenre = genre"
                        :class="activeGenre === genre
                            ? 'bg-primary-600 text-white shadow-lg shadow-primary-500/25'
                            : 'bg-white dark:bg-slate-800 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-slate-700 hover:border-primary-300 dark:hover:border-primary-600'"
                        class="px-4 py-2 rounded-xl text-sm font-medium transition-all"
                        x-text="genre"></button>
            </template>
        </div>
    </div>

    {{-- Results Count --}}
    <div class="mb-6">
        <p class="text-sm text-slate-500 dark:text-slate-400">
            Showing <span class="font-semibold text-slate-700 dark:text-slate-300" x-text="filteredNovels.length"></span> novels
        </p>
    </div>

    {{-- Novel Grid --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">
        <template x-for="novel in filteredNovels" :key="novel.slug">
            <a :href="'/novel/' + novel.slug" class="novel-card group">
                <div class="relative aspect-[3/4] overflow-hidden rounded-t-2xl">
                    <img :src="novel.cover" :alt="novel.title" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                    <div class="absolute top-3 right-3">
                        <span class="px-2 py-1 rounded-full text-[10px] font-bold uppercase tracking-wide"
                              :class="novel.status === 'Completed' ? 'bg-emerald-500/80 text-white' : 'bg-primary-500/80 text-white'"
                              x-text="novel.status" style="backdrop-filter: blur(4px)"></span>
                    </div>
                    <div class="absolute bottom-3 left-3 right-3">
                        <div class="flex gap-1">
                            <template x-for="tag in (novel.tags || []).slice(0, 2)" :key="tag">
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-white/20 text-white backdrop-blur-sm" x-text="tag"></span>
                            </template>
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <h3 class="font-bold text-sm text-slate-900 dark:text-white truncate group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors" x-text="novel.title"></h3>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5" x-text="novel.author"></p>
                    <div class="flex items-center gap-2 mt-2">
                        <span class="text-xs text-amber-500 flex items-center gap-0.5" x-show="novel.rating">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                            <span x-text="novel.rating"></span>
                        </span>
                        <span class="text-xs text-slate-400" x-text="(novel.chapters || '?') + ' chapters'"></span>
                    </div>
                </div>
            </a>
        </template>
    </div>

    {{-- Empty State --}}
    <div x-show="filteredNovels.length === 0" class="text-center py-20">
        <svg class="w-16 h-16 text-slate-300 dark:text-slate-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <h3 class="text-lg font-semibold text-slate-500 dark:text-slate-400">No novels found</h3>
        <p class="text-sm text-slate-400 dark:text-slate-500 mt-1">Try adjusting your search or filter.</p>
    </div>
</section>
@endsection
