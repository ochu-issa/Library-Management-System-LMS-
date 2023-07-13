<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

class ManageUser extends Component
{
    // public $user;
    public $full_name, $email, $password, $user_id;

    protected function rules()
    {
        return [
            'email' => [
                'required',
                'string',
                Rule::unique('users')->ignore($this->user_id),
            ],
            'full_name' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }


    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    //update user info
    public function updateUser()
    {
        $validatedData = $this->validate();
        //update info
        User::where('id',  $this->user_id)->update([
            'full_name' => $validatedData['full_name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
        session()->flash('success', 'Updated Successfully');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }

    //get user infor in modal
    public function editUser(int $userid)
    {
        $this->user_id = $userid;
        $user  = User::find($userid);
        if ($user) {
            $this->full_name = $user->full_name;
            $this->email = $user->email;
        } else {
            return redirect('/user');
        }
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->full_name = "";
        $this->email ="";
        $this->password ="";
    }

    public function render()
    {
        $users = User::role('user')->latest()->get();
        return view('livewire.manage-user', ['users' => $users]);
    }
}
