@extends('layouts.master')


@section('content')
<!-- <h2>Berichten</h2>

  <button onclick="window.location.href = '/messages'" class="message__button" type="submit" name="messages">Berichten @include('messenger.unread-count')</button> -->
  <button onclick="window.location.href = '/messages/create'" class="button__message" type="submit" name="newmessage">Nieuw bericht</button>
  <h2>Berichten</h2>

    @include('messenger.partials.flash')

    @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
@stop
