@props([
    'name',
    'title',
    'first_option',
    'wire',
])
<div>
    <label for="{{ $name }}" class="block">{{$title}}</label>
    <select
        id="{{ $name }}"
        name="{{ $name }}"
        wire:model.live="{{ $wire }}"
        class="border-input-grey border rounded-button pl-2 w-full py-1 focus:border-background-green focus:outline-none disabled:bg-gray-200">
        <option value="">{{$first_option}}</option>

        {{ $slot }}
        @error($name) <span class="text-red-500">{{ $message }}</span> @enderror

    </select>
</div>

