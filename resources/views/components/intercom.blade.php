@php
    $user = \Illuminate\Support\Facades\Auth::user();
    if($user->hasRole('admin'))
    {
       $all_problems    = \App\Models\Problem::orderBy('updated_at','desc');
       $unreadproblems  = $all_problems->where('read_at',null)->count();
       $problems        = $all_problems->get();
    }
@endphp
<div class="floating-chat">
    <i class="fa fa-comments" aria-hidden="true"></i>
    @if($user->hasRole('admin'))
        @if($unreadproblems)
            <i class="badge badge-notifications badge-accent" aria-hidden="true">{{ $unreadproblems }}</i>
        @endif
    @endif

    <div class="chat">
        <div class="header">
            <span class="title">
                {{ $user->hasRole('admin') ? 'All Problems':'Report a Problem' }}
            </span>
            <button>
                <i class="fa fa-times" aria-hidden="true"></i>
            </button>

        </div>
        @if($user->hasRole('admin'))
            <ul class="messages">
                @foreach($problems as $problem)
                    <li class="self">{{ $problem->subject }}<br>{{ $problem->details }}</li>
                @endforeach
            </ul>
            <div class="footer" hidden>
                <div class="text-box" contenteditable="true" disabled="true"></div>
                <button id="sendMessage">send</button>
            </div>
        @else
            <div class="messages">
                <form action="">
                    <label for="subject">Subject:</label>
                    <input id="subject" class="text-box" type="text"><br>
                    <label for="details">Details:</label>
                    <textarea id="details" class="text-box" name=""  cols="30" rows="10"></textarea>
                </form>
            </div>
            <div class="footer">
                <button id="sendMessage" style="width: 100%">send</button>
            </div>
        @endif
    </div>
</div>

