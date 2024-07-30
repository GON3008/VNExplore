@foreach($messages as $message)
<a href="{{ route('admin.messages.show', $message->receiver_id == Auth::id() ? $message->sender_id : $message->receiver_id) }}" class="text-body">
    <div class="d-flex align-items-start mt-1 p-2">
        <img src="{{asset('assets/images/users/avatar-2.jpg')}}" class="me-2 rounded-circle" height="48" alt="Brandon Smith" />
        <div class="w-100 overflow-hidden">
            <h5 class="mt-0 mb-0 font-14">
                <span class="float-end text-muted font-12">4:30am</span>
                Brandon Smith
                {{ $message->receiver_id == Auth::id() ? $message->sender->name : $message->receiver->name }}
            </h5>
            <p class="mt-1 mb-0 text-muted font-14">
                <span class="w-25 float-end text-end"><span class="badge badge-danger-lighten">3</span></span>
                <span class="w-75">How are you today?</span>
            </p>
        </div>
    </div>
</a>
@endforeach


