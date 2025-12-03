<div class="bg-background-green w-45 h-45 p-6 rounded-card">
    <div class="flex flex-col items-center justify-between h-full">
        <x-dynamic-component :component="'svg.' . $svg" class="flex-shrink-0" />
        <p class="text-white text-center md:text-5xl text-3xl font-bold flex-shrink-0">{{ $number }}</p>
        <p class="text-white text-center italic">{{ $title }}</p>
    </div>
</div>
