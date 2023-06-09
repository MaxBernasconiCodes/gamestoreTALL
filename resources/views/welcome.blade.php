@extends('layouts.app')

@section('content')
   <div class="relative min-h-screen flex flex-col justify-start items-center bg-black  text-white">
    <livewire:components.nav-bar>
    <livewire:components.banner>
    <livewire:game.index>
   </div>

@endsection
