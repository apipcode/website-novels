@extends('layouts.app')

@section('content')
<section x-data="{ activeTab: 'library' }" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 dark:text-white mb-2">Dashboard</h1>
        <p class="text-slate-500 dark:text-slate-400">Manage your library, wallet, and reading progress.</p>
    </div>

    <div class="flex flex-col lg:flex-row gap-8">
        {{-- ─── Sidebar ─── --}}
        <div class="lg:w-64 shrink-0">
            <div class="bg-white dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700/50 rounded-2xl p-2 lg:sticky lg:top-24">
                <button @click="activeTab = 'library'"
                        :class="activeTab === 'library' ? 'bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700/50'"
                        class="flex items-center gap-3 w-full px-4 py-3 rounded-xl text-sm font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                    Library
                </button>
                <button @click="activeTab = 'wallet'"
                        :class="activeTab === 'wallet' ? 'bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700/50'"
                        class="flex items-center gap-3 w-full px-4 py-3 rounded-xl text-sm font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    Wallet
                </button>
                <button @click="activeTab = 'settings'"
                        :class="activeTab === 'settings' ? 'bg-primary-100 dark:bg-primary-900/30 text-primary-700 dark:text-primary-300' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-700/50'"
                        class="flex items-center gap-3 w-full px-4 py-3 rounded-xl text-sm font-medium transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Settings
                </button>
            </div>
        </div>

        {{-- ─── Content Area ─── --}}
        <div class="flex-1 min-w-0">

            {{-- ──── Library Tab ──── --}}
            <div x-show="activeTab === 'library'" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-6">My Library</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">
                    @foreach($library as $book)
                    <div class="bg-white dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700/50 rounded-2xl overflow-hidden card-hover">
                        <div class="flex gap-4 p-4">
                            <img src="{{ $book['cover'] }}" alt="{{ $book['title'] }}" class="w-20 h-28 rounded-xl object-cover shrink-0">
                            <div class="flex-1 min-w-0">
                                <h3 class="font-bold text-sm text-slate-900 dark:text-white truncate">{{ $book['title'] }}</h3>
                                <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">{{ $book['author'] }}</p>
                                <p class="text-xs text-slate-400 dark:text-slate-500 mt-1">Ch. {{ $book['last_chapter'] }}/{{ $book['total_chapters'] }}</p>
                                <p class="text-xs text-slate-400 dark:text-slate-500">{{ $book['last_read'] }}</p>

                                {{-- Progress Bar --}}
                                <div class="mt-3">
                                    <div class="flex justify-between text-xs mb-1">
                                        <span class="text-slate-500 dark:text-slate-400">Progress</span>
                                        <span class="font-semibold {{ $book['progress'] === 100 ? 'text-emerald-500' : 'text-primary-600 dark:text-primary-400' }}">{{ $book['progress'] }}%</span>
                                    </div>
                                    <div class="h-2 bg-slate-100 dark:bg-slate-700 rounded-full overflow-hidden">
                                        <div class="h-full rounded-full transition-all duration-500 {{ $book['progress'] === 100 ? 'bg-emerald-500' : 'bg-primary-500' }}" style="width: {{ $book['progress'] }}%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 pb-4">
                            <a href="{{ route('novel.read', [$book['slug'], $book['last_chapter']]) }}" class="btn-primary w-full text-sm !py-2.5">
                                {{ $book['progress'] === 100 ? 'Read Again' : 'Continue Reading' }}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- ──── Wallet Tab ──── --}}
            <div x-show="activeTab === 'wallet'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-6">My Wallet</h2>

                {{-- Balance Card --}}
                <div class="relative overflow-hidden bg-slate-900 rounded-2xl p-6 md:p-8 mb-8 shadow-xl">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/4"></div>
                    <div class="absolute bottom-0 left-0 w-40 h-40 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/4"></div>
                    <div class="relative">
                        <p class="text-primary-200 text-sm font-medium mb-1">Available Balance</p>
                        <div class="flex items-baseline gap-2 mb-4">
                            <span class="text-4xl md:text-5xl font-extrabold text-white">{{ number_format($wallet['balance']) }}</span>
                            <span class="text-xl text-primary-200 font-semibold">{{ $wallet['currency'] }}</span>
                        </div>
                        <button class="inline-flex items-center px-5 py-2.5 bg-white/20 hover:bg-white/30 text-white font-semibold rounded-xl backdrop-blur-sm transition-all border border-white/10">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            Top Up Coins
                        </button>
                    </div>
                </div>

                {{-- Transaction History --}}
                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-4">Transaction History</h3>
                <div class="bg-white dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700/50 rounded-2xl overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="border-b border-slate-100 dark:border-slate-700">
                                    <th class="text-left text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider px-5 py-3">ID</th>
                                    <th class="text-left text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider px-5 py-3">Description</th>
                                    <th class="text-left text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider px-5 py-3">Date</th>
                                    <th class="text-right text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider px-5 py-3">Amount</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                                @foreach($wallet['transactions'] as $txn)
                                <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/30 transition-colors">
                                    <td class="px-5 py-3 text-xs font-mono text-slate-500 dark:text-slate-400">{{ $txn['id'] }}</td>
                                    <td class="px-5 py-3">
                                        <div class="flex items-center gap-2">
                                            @if($txn['type'] === 'purchase')
                                            <span class="w-7 h-7 flex items-center justify-center rounded-lg bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 shrink-0">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                            </span>
                                            @elseif($txn['type'] === 'unlock')
                                            <span class="w-7 h-7 flex items-center justify-center rounded-lg bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 shrink-0">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2z"/></svg>
                                            </span>
                                            @else
                                            <span class="w-7 h-7 flex items-center justify-center rounded-lg bg-primary-100 dark:bg-primary-900/30 text-primary-600 dark:text-primary-400 shrink-0">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
                                            </span>
                                            @endif
                                            <span class="text-sm text-slate-700 dark:text-slate-300">{{ $txn['description'] }}</span>
                                        </div>
                                    </td>
                                    <td class="px-5 py-3 text-sm text-slate-500 dark:text-slate-400">{{ $txn['date'] }}</td>
                                    <td class="px-5 py-3 text-right text-sm font-semibold {{ $txn['amount'] > 0 ? 'text-emerald-600 dark:text-emerald-400' : 'text-red-500 dark:text-red-400' }}">
                                        {{ $txn['amount'] > 0 ? '+' : '' }}{{ number_format($txn['amount']) }} Coins
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- ──── Settings Tab ──── --}}
            <div x-show="activeTab === 'settings'" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-6">Settings</h2>
                <div class="bg-white dark:bg-slate-800/50 border border-slate-200 dark:border-slate-700/50 rounded-2xl p-6 max-w-2xl space-y-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Display Name</label>
                        <input type="text" value="Alex Reader" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl text-sm focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Email</label>
                        <input type="email" value="alex@example.com" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-700 border border-slate-200 dark:border-slate-600 rounded-xl text-sm focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">Reading Preferences</label>
                        <div class="flex items-center gap-3">
                            <label class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
                                <input type="checkbox" checked class="rounded border-slate-300 dark:border-slate-600 text-primary-600 focus:ring-primary-500">
                                Auto-bookmark
                            </label>
                            <label class="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400">
                                <input type="checkbox" class="rounded border-slate-300 dark:border-slate-600 text-primary-600 focus:ring-primary-500">
                                Email notifications
                            </label>
                        </div>
                    </div>
                    <button class="btn-primary text-sm">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
