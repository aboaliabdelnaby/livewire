<?php

namespace App\Http\Livewire\Admin\User;

use App\Enums\Users\Gender;
use App\Enums\Users\Roles;
use App\Http\GeneralComponents\GeneralEdit;
use App\Http\Validation\Admin\Users\Update;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Edit extends GeneralEdit
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
    public string|null $oldPhoto='';
    //end
    public Model $model;
    protected string $module = 'User';
    protected string $update = Update::class;
    protected string $parent = 'admin.users';
    public array $roles = [];
    public array $genders = [];

    public function mount(User $user)
    {
        $this->model = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->description = $user->description;
        $this->role = $user->role;
        $this->gender = $user->gender;
        $this->password = '';
        $this->roles = Roles::roles();
        $this->genders = Gender::genders();
        $this->oldPhoto=$user->photo;
    }

    protected function validatedData($validatedData)
    {
        if (empty($validatedData['password'])) {
            $validatedData = Arr::except($validatedData, 'password');
        }
        if (isset($validatedData['photo'])) {
            $validatedData['photo'] = $this->photo->store('profiles','public');
            Storage::disk('public')->delete($this->oldPhoto);
        }else{
            $validatedData = Arr::except($validatedData, 'photo');

        }
        return $validatedData;
    }


}
