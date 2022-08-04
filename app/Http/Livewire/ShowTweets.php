<?php

namespace App\Http\Livewire;

use App\Models\Tweet;

use Livewire\Component;

class ShowTweets extends Component
{
    public $message = '';

    public function render()
    {
        $tweets = Tweet::with('user')->get();
        return view('livewire.show-tweets', [
            'tweets' => $tweets
        ]);
    }

    public function create()
    {
        dd($this -> message); // Tipo um console.log
    }
}
