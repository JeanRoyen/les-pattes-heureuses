<?php

namespace App\Livewire\Forms;

use App\Jobs\ProcessAvatar;
use App\Models\Animal;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class AnimalForm extends Form
{
    use WithFileUploads;

    #[Validate('nullable|max:10240')]
    public $avatar = null;

    #[Validate('required')]
    public ?int $specie_id = null;

    #[Validate('required')]
    public ?int $breed_id = null;

    #[Validate('required')]
    public string $name;

    #[Validate('required|date|before_or_equal:today')]
    public $age;

    #[Validate('required')]
    public bool $gender;

    #[Validate('boolean')]
    public bool $vaccine;

    #[Validate('string|nullable')]
    public string $description = '';

    #[Validate('string|required')]
    public string $status;

    public function store(): void
    {
        $validated = $this->validate();

        if ($this->avatar) {
            $image_type = 'jpeg';
            $original_path = 'avatar/original';
            $file_name = 'avatar_img_' . uniqid() . '.' . $image_type;

            $avatar_path = $this->avatar->storeAs(
                $original_path,
                $file_name,
                'public'
            );

            ProcessAvatar::dispatch($file_name, $avatar_path);

            $validated['avatar'] = $avatar_path;
        }

        Animal::create($validated);
    }
}
