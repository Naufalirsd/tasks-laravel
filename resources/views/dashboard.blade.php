<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <a href="{{ route('tasks.index') }}"
               class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M9 5l7 7-7 7"></path>
                </svg>
                Tasks
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-gray-100 to-indigo-100 dark:from-gray-900 dark:to-indigo-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Welcome card -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-8 flex flex-col justify-center items-start">
                    <h3 class="text-2xl font-bold mb-2 text-gray-800 dark:text-white">Selamat Datang 👋</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        {{ __("You're logged in!") }} Nikmati pengalaman mengelola tugas dengan mudah.
                    </p>
                    <a href="{{ route('tasks.index') }}"
                       class="mt-auto inline-block px-5 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600 transition">
                        Lihat Tasks
                    </a>
                </div>
                <!-- Stats card (contoh, bisa diisi data dinamis nantinya) -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-8 flex flex-col justify-center items-start">
                    <div class="flex items-center mb-4">
                        <span class="inline-block p-2 bg-indigo-100 dark:bg-indigo-700 rounded-full mr-3">
                            <svg class="w-6 h-6 text-indigo-600 dark:text-indigo-200" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M9 17v-6h6v6m2 4H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586A2 2 0 0114 4.586l3.414 3.414A2 2 0 0118 9.414V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </span>
                        <div>
                            <div class="text-lg font-semibold text-gray-800 dark:text-white">Total Tasks</div>
                            <div class="text-3xl font-bold text-indigo-600 dark:text-indigo-200">12</div>
                        </div>
                    </div>
                    <p class="text-gray-500 dark:text-gray-400">Terus produktif dan selesaikan tugasmu!</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>