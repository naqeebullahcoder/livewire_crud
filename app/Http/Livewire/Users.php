<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
class Users extends Component
{
    public $user_id, $name, $email, $users;
    public $updateMode = false;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.users');
    }

    public function resetInputFields(){

        $this->name='';
        $this->email='';
    }

    public function store()
    {
        $validateData  = $this->validate([
            'name'=> 'required',
            'email'=> 'required|email',
        ]);

        user::create($validateData);

        session()->flash('message', 'User Created Successfully');
        $this->resetInputFields();

        $this->emit('userStore');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $user = User::where('id', $id)->first();
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function cancel()
    {
        $this->updateMode= false;
        $this->resetInputFields();

    }
    public function update()
    {
        $validateData = $this->validate([
            'name'=> 'required',
            'email'=>'required|email'
        ]);

        if($this->user_id){
            $user = User::find($this->user_id);
            $user->update([
                'name'=>$this->name,
                'email'=>$this->email
            ]);
            $this->updateMode = false;
            session()->flash('message', 'User Update Successfully');
            $this->resetInputFields();
            $this->emit('userStore');
        }
    }

    public function delete($id)
    {
        if($id){
            User::where('id', $id)->delete();
            session()->flash('Message', 'User Successfully Deleted!');
        }
    }
}
l
