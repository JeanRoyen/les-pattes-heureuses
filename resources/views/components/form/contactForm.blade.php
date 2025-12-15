<form action="/"
      class="bg-white min-w-[250px] inline-block shadow-general rounded-card py-6 px-10 md:py-12 md:px-22 w-full">
    <div class="md:flex gap-5 md:mb-4">
        <x-form.input
            name="name"
            :title="__('form.name')"
            type="text"
            :placeholder="__('form.name_placeholder')"/>
        <x-form.input
            name="phone"
            :title="__('form.phone')"
            type="tel"
            :placeholder="__('form.phone_placeholder')"/>
    </div>
    <div class="md:mb-4">
        <x-form.input
            name="email"
            :title="__('form.email')"
            type="email"
            :placeholder="__('form.email_placeholder')"/>
    </div>
    <div class="mb-8">
        <x-form.textarea
            name="message"
            :placeholder="__('form.message_placeholder')"
            rows="10"
        />
    </div>
    <div>
        <x-form.button :title="__('form.submit')"/>
    </div>
</form>
