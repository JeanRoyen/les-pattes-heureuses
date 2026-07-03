<x-layouts.client title="Nos animaux | Les Pattes Heureuses">
    <x-slot:page_title>
        Les animaux des Pattes Heureuses
    </x-slot:page_title>
    <main>
        <section>
            <div class="lg:relative overflow-hidden">
                <img src="{{ asset('images/adopt-dog.jpg') }}" alt="Chien porté par un homme" class="w-full lg:min-w-[1098p@x]">
                <div class="lg:absolute lg:inset-0 lg:flex lg:flex-col lg:py-4">
                    <div class="container mx-auto px-4 md:px-0 md:mb-4">
                        <x-general.headings2
                            :title="__('animals.hero_title')"
                            color="text-black"/>
                        <p>
                            {{ __('animals.hero_text') }}
                            <span class="font-bold">{{ __('animals.shelter_name') }}</span>
                        </p>
                    </div>

                    <div class="container mx-auto px-4 md:px-0">
                        <div class="flex gap-2">
                            <x-general.square-infos
                                svg="dog"
                                number="{{ $dogCount }}"
                                :title="__('animals.stats_dogs')"/>

                            <x-general.square-infos
                                svg="cat"
                                number="{{ $catCount }}"
                                :title="__('animals.stats_cats')"/>

                            <x-general.square-infos
                                svg="human"
                                number="{{ $adoptedCount }}"
                                :title="__('animals.stats_adopted')"/>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <livewire:animal.index/>
    </main>
</x-layouts.client>
