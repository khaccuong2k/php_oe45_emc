<!-- Comment -->
<li class="mb-5 ml-3">
    <div class="border-left border-3 pl-4">
        <div class="media align-items-center mb-2">
            <div class="avatar avatar-circle mr-3">
                 <img class="avatar-img" src="{{ asset('customers/assets/img/100x100/img11.jpg') }}" alt="Image Description">
            </div>
        <div class="media-body">
            <div class="d-flex justify-content-between align-items-center">
                <span class="h5 mb-0">{{ $replyTo->user->fullname }}</span>
                <small class="text-muted">{{ $replyTo->create_at }}</small>
            </div>
        </div>
        </div>
    <p>{{ $replyTo->content }}</p>
    <a class="font-weight-bold replyBtn" href="javascript:;" data-id="{{ $replyTo->id }}" data-user="{{ $replyTo->user->fullname }}">{{ trans('message.reply') }}</a>
    </div>
    @if($replies->reply)
        @foreach($replyTo->reply as $replyTo)
                @include('client.comments.replyToReply', ['replyTo' => $replyTo])
        @endforeach
    @endif
</li>
<!-- End Comment -->
