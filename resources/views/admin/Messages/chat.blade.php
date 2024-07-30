<div class="chat-box">
    @foreach($messages as $message)
        <div class="{{ $message->sender_id == Auth::id() ? 'text-right' : 'text-left' }}">
            <p>{{ $message->message }}</p>
        </div>
    @endforeach
</div>
<form id="chat-form">
    @csrf
{{--    <input type="hidden" name="receiver_id" value="{{ $otherUser->id }}">--}}
    <input type="text" name="message" placeholder="Type your message...">
    <button type="submit">Send</button>
</form>

    <script>
        $('#chat-form').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('admin.messages.store') }}",
                method: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    // Append message to chat box
                    $('.chat-box').append('<div class="text-right"><p>' + response.message + '</p></div>');
                    $('input[name="message"]').val('');
                }
            });
        });
    </script>


{{--<ul class="conversation-list px-3" data-simplebar style="max-height: 538px">--}}
{{--    <li class="clearfix">--}}
{{--        <div class="chat-avatar">--}}
{{--            <img src="{{asset('assets/images/users/avatar-5.jpg')}}" class="rounded" alt="Shreyu N" />--}}
{{--            <i>10:00</i>--}}
{{--        </div>--}}
{{--        <div class="conversation-text">--}}
{{--            <div class="ctext-wrap">--}}
{{--                @foreach($messages as $message)--}}
{{--                    <li class="list-group-item d-flex align-items-center">--}}
{{--                        <img src="{{ $message->sender->avatar }}" alt="avatar" class="rounded-circle" width="40" height="40">--}}
{{--                        <div class="ms-2">--}}
{{--                            <strong>{{ $message->sender->name }}:</strong> {{ $message->message }}--}}
{{--                            <span class="text-muted float-end">{{ $message->created_at->diffForHumans() }}</span>--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--            <form id="chat-form">--}}
{{--                @csrf--}}
{{--                <div class="input-group">--}}
{{--                    <input type="text" id="receiver_id" name="receiver_id" class="form-control" placeholder="Receiver ID" required>--}}
{{--                    <input type="text" id="message" name="message" class="form-control" placeholder="Enter your message" required>--}}
{{--                    <button type="submit" class="btn btn-primary">Send</button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </li>--}}
{{--</ul>--}}
