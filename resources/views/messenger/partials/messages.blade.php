<div class="media">
    <a class="pull-left" href="#">
        <!-- <img src="//www.gravatar.com/avatar/{{ md5($message->user->email) }} ?s=64"
             alt="{{ $message->user->name }}" class="img-circle"> -->
    </a>
    <div class="media-body">
        <h5 class="media-heading">Afzender: {{ $message->user->name }}</h5>
        <h5 class="media-heading">Bericht: <br> {{ $message->body }}</h5>
        <div class="text-muted">
            <small>Geplaatst {{ $message->created_at->diffForHumans() }}</small>
        </div>
    </div>
</div>
