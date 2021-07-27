<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Models\User;


use Livewire\Component;

class Show extends Component {

    use WithPagination;
    public User $user;
    public $tweets;

    public function mount(User $user) {
        dd("Hey");
        $this->user = $user;
        $this->tweets = $user->tweets()->paginate(10);
    }

    public function render() {
        dd("Hey");
        return view('livewire.profile.show');
    }
}
