<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Role as Roles;

class Role extends Component
{


    use WithPagination;

    public $sortField = 'role'; // default sorting field
    public $sortAsc = true; // default sort direction
    public $search = null;

    protected $listeners = ['delete', 'triggerRefresh' => '$refresh'];

    /* private RoleRepositoryInterface $roleRepository;

    public function mount(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    } */

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function render()
    {
        //$this->roleRepository->getRoleBySlug($this->search)
        return view('livewire.backend.roles.role', [
            'roles' => $this->search ? Roles::search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->simplePaginate(10) : Roles::latest()
                ->simplePaginate(10),
        ]);
    }


    public function delete($id)
    {
        $role = Roles::find($id);
        $role->delete();
        $this->dispatchBrowserEvent('role-deleted', ['role_name' => $role->role]);
    }
}
