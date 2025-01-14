<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    @role('Admin')
                    <p>Su rol es Admin (Sigma Σ, se le permite eliminar juegos)</p>
                    @endrole

                    @role('usuario')
                    <p>Su rol es usuario (Cringe β)</p>
                    @endrole
                    <br>
                    <h1 class="text-2xl text-green-400">Muestra de todos los juegos</h1>
                    @livewire('Videogames')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
