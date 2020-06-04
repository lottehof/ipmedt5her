<?php $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; ?>

<div class="media alert {{ $class }}" id="thread_list_{{ $thread->id }}">
    <h4 class="media-heading">
        <a href="{{ route('messages.show', $thread->id) }}">{{ $thread->subject }}</a>
        ({{ $thread->userUnreadMessagesCount(Auth::id()) }} bekeken)</h4>
    <p>
        Bericht: <br> {{ $thread->latestMessage->body }}
    </p>
    <p>
        <small><strong>Verzender:</strong> {{ $thread->creator()->name }}</small>
    </p>
    <p>
        <small><strong>Deelnemers:</strong> {{ $thread->participantsString(Auth::id()) }}</small>
    </p>
</div>
