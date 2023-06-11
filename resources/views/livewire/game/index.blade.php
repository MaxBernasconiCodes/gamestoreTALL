<div class="mx-auto flex flex-col justify-center">
    <div style="background-image: linear-gradient(90deg, hsl(40, 75%, 52%), hsl(282, 88%, 29%)); padding:2px; border-radius:5px;"
        class="relative w-2/5 max-w-4xl  mx-auto flex">
        <input wire:model.debounce="search" wire:change.debounce='getData'
            class="w-full p-2 bg-black rounded text-pink-600 placeholder:text-pink-600 outline-3 outline-transparent focus:outline-pink-500 "
            placeholder="Search" />
    </div>

    <div class="p-8 w-full max-w-7xl mx-auto flex flex-wrap gap-2 justify-center items-center ">
        @forelse($filteredDeals as $deal)
            <livewire:game.card wire:key="{{ $deal['dealID'] }}" :deal="$deal" />
            @empty
                <h3>No hay registros que coincidan con la consulta</h3>
        @endforelse
    </div>
</div>
