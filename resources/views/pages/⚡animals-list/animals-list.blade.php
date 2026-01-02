<main>
    <section>
        <div class="lg:relative overflow-hidden">
            <img src="{{ asset('images/adopt-dog.png') }}" alt="" class="w-full lg:min-w-[1098px]">
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
                            number="{{ $this->dogCounter }}"
                            :title="__('animals.stats_dogs')"/>

                        <x-general.square-infos
                            svg="cat"
                            number="{{ $this->catCounter }}"
                            :title="__('animals.stats_cats')"/>

                        <x-general.square-infos
                            svg="human"
                            number="{{ $this->adoptedCounter }}"
                            :title="__('animals.stats_adopted')"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-8 md:mt-12">
        <div class="container mx-auto px-4 md:px-0 space-y-2">
            <x-general.headings2
                color="black"
                :title="__('animals.list_title')"/>
            <x-general.searchbar model="availableSearch"/>
            <x-general.filters_animals-list
                prefix="available"
                :species="$this->species"
                :races="$this->races"
            />
            <div class="grid grid-cols-8 gap-5">
                @foreach($this->availableAnimals as $animal)
                    <x-general.card
                        name="{{ $animal->name }}"
                        race="{{ $animal->race }}"
                        gender="{{ $animal->gender }}"
                        age="{{ $animal->age->format('d/m/Y') }}"
                        :description="{{ $animal->description }}"
                        :picture="$animal->avatar"/>
                @endforeach
            </div>
            {{-- TODO: Pagination --}}
        </div>
    </section>
</main>

