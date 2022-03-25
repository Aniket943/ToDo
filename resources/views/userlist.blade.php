
<link rel="stylesheet" type="text/css" href="{{ URL::to('css/userlist.css') }}">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User List') }}
        </h2>
    </x-slot>

    <div class="py-12">
    @livewire('user.show')
    </div>
</x-app-layout>
