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
        $tweets = Tweet::with('user')->paginate(2);
        return view('livewire.show-tweets', [
            'tweets' => $tweets
        ]);
    }

    public function create()
    {
        Tweet::create([
            'content' => $this->message,
            'user_id' => 1
        ]);

        $this->message = '';

        // dd($this -> message); // Tipo um console.log
    }
}
