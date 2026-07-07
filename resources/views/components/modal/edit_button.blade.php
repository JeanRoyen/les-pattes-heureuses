<button class="hover:cursor-pointer text-blue-500 underline"
        wire:key="editAnimal-{{ $animal }}"
        wire:click="editAnimal({{ $animal }})">
    Modifier
</button>
