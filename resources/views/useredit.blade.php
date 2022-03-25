
<link rel="stylesheet" type="text/css" href="{{ URL::to('css/userlist.css') }}">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
    @livewire('user.form', ['user' => $user])
    </div>
</x-app-layout>
<style>
  .profile_btn {
  position: relative;
  overflow: hidden;
}
.profile_btn input {
  position: absolute;
  font-size: 50px;
  opacity: 0;
  right: 0;
  top: 0;
}
</style>
