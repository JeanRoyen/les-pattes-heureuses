<div class="grow">
    <label for="{{ $name }}" class="block">{{ $title }}</label>
    <input name="{{ $name }}" type="{{ $type }}" id="{{ $name }}" {{ $attributes }} placeholder="{{ $placeholder}} " class="border-input-grey border rounded-button pl-2 w-full py-1 focus:border-background-green focus:outline-none">
    @error($name) <span class="text-red-500">{{ $message }}</span> @enderror
</div>
