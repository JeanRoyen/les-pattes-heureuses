<button class="hover:cursor-pointer text-blue-500 underline"
        wire:key="openEditModal-{{ $animal }}"
        wire:click="openEditModal({{ $animal }})">
    Modifier
</button>
