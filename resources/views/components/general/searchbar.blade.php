@props([
    'model',
    'placeholder' => 'Rechercher...',
])

<div>
    <input
        type="text"
        wire:model.live.debounce.500ms="{{ $model }}"
        placeholder="{{ $placeholder }}"
        class="bg-white text-black w-full px-4 py-2 border-gray-400 border rounded-button focus:border-background-green focus:outline-none"
    >
</div>
