<?php

namespace App\Http\Livewire\Admin\User;

use App\Enums\Users\Gender;
use App\Enums\Users\Roles;
use App\Http\GeneralComponents\GeneralCreate;
use App\Http\Validation\Admin\Users\Store;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rules\Enum;
use Livewire\WithFileUploads;

class Create extends GeneralCreate
{
    use WithFileUploads;
    //fields
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string|null $description='';
    public string|Roles $role='';
    public string|Gender $gender='';
    public $photo;
    //end
    protected string $model = User::class;
    protected string $module = 'User';
    protected string $store = Store::class;
    protected string $route='';
    protected string $parent = 'admin.users';
    public array $roles=[];
    public array $genders=[];
    public function mount()
    {
        $this->roles=Roles::roles();
        $this->genders=Gender::genders();
    }
    protected function validatedData($validatedData)
    {
        $validatedData['photo'] = $this->photo->store('profiles','public');
        return $validatedData;
    }


}
