@extends('layouts.app')

@section('content')
    <div class="relative min-h-screen min-vw-100 flex flex-col justify-between items-center bg-black  text-white">
        <livewire:components.nav-bar />
        <div class="w-full flex flex-col">
            <livewire:components.banner />
            <livewire:game.index />
        </div>
        <livewire:components.footer />
    </div>
@endsection
