<?php

namespace App\Http\Livewire;

use App\Models\Tweet;

use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{
    // Faz com que a paginação ocorra sem atualizar a página
    use WithPagination;

    public $message = '';
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        // lasted: exibe a paginação em ordem decrescente
        $tweets = Tweet::with('user')->latest()->paginate(2);
        return view('livewire.show-tweets', [
            'tweets' => $tweets
        ]);
    }

    public function create()
    {
        // *** Antes do Jetstream ***

        /* Tweet::create([
            'content' => $this->message,
            'user_id' => 1
        ]); */

        auth()->user()->tweets()->create([
            'content' => $this->message
        ]);

        $this->message = '';

        // dd($this -> message); // Tipo um console.log
    }
}
