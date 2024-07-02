<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class Transactions extends Component
{
    public $transactions;

    public function mount()
    {
        $this->transactions = Transaction::where('user_id', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.transactions', ['transactions' => $this->transactions]);
    }
}

