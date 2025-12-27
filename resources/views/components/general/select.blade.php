<div class="col-span-8 md:col-span-4 lg:col-span-2">
    <label for="{{ $name }}" class="block mb-2.5">{{ $title }}</label>

    <select
        id="{{ $name }}"
        {{ $attributes }}
        class="bg-white text-black w-full px-4 py-2 border-gray-400 border rounded-button"
    >
        {{ $slot }}
    </select>
</div>
