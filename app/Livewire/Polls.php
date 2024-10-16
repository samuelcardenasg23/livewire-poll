<?php

namespace App\Livewire;

use App\Models\Poll;
use App\Models\Option;
use Livewire\Component;
use Livewire\WithPagination;

class Polls extends Component
{
    use WithPagination;

    protected $listeners = ['pollCreated' => 'render'];

    public function render()
    {
        $polls = Poll::with('options.votes')->latest()->paginate(3);

        return view('livewire.polls', ['polls' => $polls]);
    }

    public function vote(Option $option)
    {
        $option->votes()->create();
    }
}
