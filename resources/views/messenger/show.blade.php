@extends('layouts.master')

@section('content')
    <div class="col-md-6">
        <h2 class="onderwerpBericht">{{ $thread->subject }}</h2>
        <div id="thread_{{ $thread->id }}">
            @each('messenger.partials.messages', $thread->messages, 'message')
        </div>

        @include('messenger.partials.form-message')
    </div>
@stop
