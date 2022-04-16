<?php

namespace App\Http\Livewire;

use App\Models\Role;
use Livewire\Component;

class RoleForm extends Component
{
    protected $listeners = ['triggerEdit'];
    /**
     * role attribute
     */
    public $role;
    public $role_slug;
    public $role_id;

    public function render()
    {
        return view('livewire.backend.roles.role-form');
    }

    /**
     * create new role function
     */
    public function save()
    {
        $validated = $this->validate([
            'role' => 'required|min:4',
        ]);

        if ($this->role_id) {
            $role = Role::find($this->role_id);
            $inter = $role;
            $role->update([
                    'role' => \Str::ucfirst(addslashes($this->role)),
                    'slug-role' => 'slug-'.str_replace(' ','-',strtolower(addslashes($this->role))),
                ]);

            $this->dispatchBrowserEvent('role-saved', ['action' => 'updated', 'role_name' => $inter->role]);
        } else {
            Role::create(array_merge($validated, [
                'role' => \Str::ucfirst(addslashes($this->role)),
                'slug-role' => 'slug-'.str_replace(' ','-',strtolower(addslashes($this->role))),
            ]));
            $this->dispatchBrowserEvent('role-saved', ['action' => 'created', 'role_name' => $this->role]);
        }

        $this->resetForm();

        $this->emitTo('role', 'triggerRefresh');
    }

    public function resetForm()
    {
        $this->role_id = null;
        $this->role = null;
    }

    public function triggerEdit($role)
    {

        $this->role_id = $role['id'];
        $this->role = $role['role'];

        $this->emit('dataFetched', $role);
    }
}
