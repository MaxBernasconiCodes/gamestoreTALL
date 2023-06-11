<div class="p-8 w-4/5 mx-auto grid grid-cols-3 gap-4 ">
    @forelse($deals as $deal)
    <livewire:game.card>
    @empty
        <h3>No hay registros que coincidan con la consulta</h3>
    @endforelse

</div>
