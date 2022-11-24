<?php

namespace App\Http\Repositories\Admin;

use App\Http\Repositories\Base\Crud\CrudRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class UserRepository extends CrudRepository
{

    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function update(array $data, int $id): Model
    {
        if (empty($data['password'])) {
            $data = Arr::except($data, 'password');
        }
        if (isset($data['photo'])) {
            $user = $this->find($id);
            Storage::disk('public')->delete($user->photo);
        } else {
            $data = Arr::except($data, 'photo');
        }
        return parent::update($data, $id);
    }

    public function destroy(int $id): ?bool
    {
        $user = $this->find($id);
        Storage::disk('public')->delete($user->photo);
        return parent::destroy($id);
    }


}
