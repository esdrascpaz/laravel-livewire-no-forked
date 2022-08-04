<div>
    Exibição dos Tweets

    <p> {{ $message }} </p>

    {{-- prevent: previne a ação padrão do submit, de recarregar a página --}}
    <form method="post" wire:submit.prevent="create"> {{--chama o método
        create --}}
        <input type="text" name="message" id="message" wire:model="message">
        <button type="submit">Criar Tweet</button>
    </form>

    <hr>

    @foreach ($tweets as $tweet)
        {{ $tweet->user->name }} - {{ $tweet->content }} <br>
    @endforeach
</div>
