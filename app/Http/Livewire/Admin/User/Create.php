<?php

namespace App\Http\Livewire\Admin\User;

use App\Enums\Users\Gender;
use App\Enums\Users\Roles;
use App\Http\GeneralComponents\Components\Creating;
use App\Http\Validation\Admin\Users\Store;
use App\Models\User;
use Livewire\WithFileUploads;

class Create extends Creating
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
    //end
    protected string $model = User::class;
    protected string $message = 'User created successfully';
    protected string $viewPath = 'admin.users.create';
    protected string $routePath = 'admin.users.index';
    public array $roles = [];
    public array $genders = [];

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->storeValidation = app(Store::class);
        $this->roles = Roles::roles();
        $this->genders = Gender::genders();
    }

    protected function createRow($data)
    {
        $data['photo'] = $this->photo->store('profiles', 'public');
        parent::createRow($data);
    }


}
