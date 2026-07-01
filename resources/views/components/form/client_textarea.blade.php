@props([
    'name',
    'title',
    'placeholder',
])

<div>
    <label class="mb-1.5 block text-sm text-gray-700">{{ $title }}<x-general.required_star/></label>
    <textarea name="{{ $name }}" rows="4" placeholder="{{ $placeholder }}"
              class="w-full rounded-lg border border-gray-300 bg-white px-3.5 py-2.5 text-sm placeholder-gray-400 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">{{ old($name) }}</textarea>
    @error($name) <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
</div>
