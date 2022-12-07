<?php

namespace App\Http\Livewire\Admin\User;

use App\Enums\Users\Gender;
use App\Enums\Users\Roles;
use App\Http\GeneralComponents\Components\Editing;
use App\Http\GeneralComponents\Validation\Validation;
use App\Http\Validation\Admin\Users\Update;
use App\Models\User;
use Livewire\WithFileUploads;

class Edit extends Editing
{
    use WithFileUploads;

    //fields
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string|null $description = '';
    public string|Roles $role = '';
    public string|Gender $gender = '';
    public $photo;
    public string|null $oldPhoto = '';
    //end
    protected string $model = User::class;
    protected string $message = 'User updated successfully';
    protected string $viewPath = 'admin.users.edit';
    protected string $routePath = 'admin.users.index';
    public array $roles = [];
    public array $genders = [];

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->updateValidation = app(Update::class);


    }

    public function mount($id)
    {
        $user = $this->query->find($id);
        $this->editId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->description = $user->description;
        $this->role = $user->role;
        $this->gender = $user->gender;
        $this->password = '';
        $this->roles = Roles::roles();
        $this->genders = Gender::genders();
        $this->oldPhoto = $user->photo;
    }

    protected function rules(): array
    {
        return $this->updateValidation::rules($this->editId);
    }

    protected function updateRow($data, $id)
    {
        if (isset($data['photo'])) {
            $data['photo'] = $this->photo->store('profiles', 'public');
        }
        parent::updateRow($data, $id);
    }


}
