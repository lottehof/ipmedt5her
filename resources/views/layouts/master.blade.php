@extends('welcome')
@section('content')









<div class="container">
    @yield('content')
</div>

@endsection
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    @if(Auth::check())
    <!-- check if pusher is allowed -->
        @if(config('chatmessenger.use_pusher')) {
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/4.2.1/pusher.min.js"></script>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('form').submit(function(e) {
                        e.preventDefault();
                        var data = $(this).serialize();
                        var url = $(this).attr('action');
                        var method = $(this).attr('method');
                        // clear textarea/ reset form
                        $(this).trigger('reset');
                        $.ajax({
                            method: method,
                            data: data,
                            url: url,
                            success: function(response) {
                                var thread = $('#thread_' + response.message.thread_id);

                                $('body').find(thread).append(response.html);
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    });
                    var pusher = new Pusher('{{ config('pusher.connections.main.auth_key') }}', {
                        cluster: '{{ config('pusher.connections.main.options.cluster') }}',
                        encrypted: true
                    });
                    var channel = pusher.subscribe('for_user_{{ Auth::id() }}');
                    channel.bind('new_message', function(data) {
                        // console.log(data);
                        var thread = $('#' + data.div_id);
                        var thread_id = data.thread_id;
                        var thread_plain_text = data.text;
                        var thread_subject = data.thread_subject;
                        if (thread.length) {
                            // thread opened
                            // append message to thread
                            thread.append(data.html);
                            // make sure the thread is set to read
                            $.ajax({
                                url: "/messages/" + thread_id + "/read"
                            });
                        } else {
                            // thread not currently opened
                            // create message
                            var message = '<strong>' + data.sender_name + ': </strong>' + data.text + '<br/><a href="' + data.thread_url + '" class="text-right">View Message</a>';
                            // notify the user
                            toastr.success(thread_subject + '<br/>' + message);
                            // set unread count
                            let url = "{{ route('messages.unread') }}";
                            console.log(url);
                            $.ajax({
                                method: 'GET',
                                url: url,
                                success: function(data) {
                                    console.log('data from fetch: ', data);
                                    var div = $('#unread_messages');
                                    var count = data.msg_count;
                                    if (count == 0) {
                                        $(div).addClass('hidden');
                                    } else {
                                        $(div).text(count).removeClass('hidden');
                                        // if on messages.index - add alert class and update latest message
                                        $('#thread_list_' + thread_id).addClass('alert-info');
                                        $('#thread_list_' + thread_id + '_text').html(thread_plain_text);
                                    }
                                }
                            });
                        }
                    });
                });
            </script>
        @endif
    @endif
