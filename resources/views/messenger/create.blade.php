@extends('layouts.master')


@section('content')
    <h1>Maak nieuw bericht</h1>
    <form action="{{ route('messages.store') }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-6">
            <!-- Subject Form Input -->
            <div class="form-group">
                <label class="label__messages">Onderwerp</label><br>
                <input type="text" class="onderwerpInput" name="subject" placeholder="Onderwerp"
                       value="{{ old('subject') }}">
            </div>

            <!-- Message Form Input -->

                <label class="label__messages">Bericht</label><br>
                <textarea name="message" class="textarea__message">{{ old('message') }}</textarea>


            @if($users->count() > 0)
                <div class="checkbox">
                    @foreach($users as $user)
                        <label title="{{ $user->name }}"><input type="checkbox" name="recipients[]"
                                                                value="{{ $user->id }}">{!!$user->name!!}</label>
                    @endforeach
                </div>
            @endif

            <!-- Submit Form Input -->
            <div class="form-group">
                <button type="submit" class="button__message">Verzenden</button>
            </div>
        </div>
    </form>
@stop
