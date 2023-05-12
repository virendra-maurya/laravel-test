<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Traits\HasModal;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Manage extends Component
{
    use HasModal;

    public User $user;

    public $password;

    protected $rules = [
        'user.first_name' => ['required', 'min:3', 'max:55'],
        'user.last_name' => ['required', 'min:3', 'max:55'],
        'user.email' => ['required', 'email'],
        'user.is_active' => ['in:0,1'],
        'password' => ['required', 'min:6', 'max:55'],
    ];

    protected $listeners = [
        'show',
    ];

    public function show(User $user)
    {
        $this->resetErrorBag();
        $this->reset('password');
        $this->user = $user;
        $this->open();
    }

    public function submit()
    {
        $this->addRule();

        $this->validate($this->rules, [], ['is_active' => 'Status']);

        if ($this->password){
            $this->user->fill(['password' => Hash::make($this->password)]);
        }

        $this->user->save();

        $this->close();

        $this->emitTo(Index::getName(),'reload');
    }

    public function render()
    {
        return view('livewire.user.manage');
    }

    /**
     * @return void
     */
    public function addRule(): void
    {
        $this->rules = array_merge($this->rules, [
            'user.email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->user->id)],
            'password' => [($this->user->id ? 'nullable' : 'required'), 'min:6', 'max:55'],
        ]);
    }
}
