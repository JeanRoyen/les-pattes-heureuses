<form action="/"
      class="bg-white min-w-[250px] inline-block shadow-general rounded-card py-6 px-10 md:py-12 md:px-22 w-full">
    <div class="md:flex gap-5 md:mb-4">
        <x-form.input name="name" title="Nom*" type="text" placeholder="Sarah Gérard"/>
        <x-form.input name="phone" title="Numero de téléphone*" type="tel" placeholder="0471 42 08 46"/>
    </div>
    <div class="md:mb-4">
        <x-form.input name="email" title="Adresse mail*" type="email" placeholder="Sarah@mail.be"/>
    </div>
    <div class="mb-8">
        <x-form.textarea name="message" placeholder="Écrire mon message..."/>
    </div>
    <div>
        <x-form.button title="Envoyer mon message"/>
    </div>
</form>
