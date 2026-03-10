@extends('layouts.app')

@section('content')
<div class="container">

    <h1 style="margin-bottom:20px;">View Message</h1>

    <a href="{{ route('admin.messages.index') }}" 
       style="display:inline-block; margin-bottom:20px; text-decoration:none; color:blue;">
        ← Back to Messages
    </a>

    <div style="background:white; padding:20px; border-radius:8px; 
                box-shadow:0 2px 5px rgba(0,0,0,0.1); margin-bottom:20px;">

        <h3>Message ID: {{ $id }}</h3>

        <p><strong>From:</strong> Example User</p>
        <p><strong>Email:</strong> example@email.com</p>
        <p><strong>Date:</strong> {{ now()->format('Y-m-d H:i') }}</p>

        <hr>

        <p>
            This is where the user's message will appear once your message
            system is connected to the database.
        </p>

    </div>

    <div style="background:white; padding:20px; border-radius:8px;
                box-shadow:0 2px 5px rgba(0,0,0,0.1);">

        <h3>Reply</h3>

        <form method="POST" action="{{ route('admin.messages.reply', $id) }}">
            @csrf

            <textarea name="reply"
                      rows="6"
                      style="width:100%; padding:10px; border:1px solid #ccc; border-radius:5px;"
                      placeholder="Type your reply here..."></textarea>

            <br><br>

            <button type="submit"
                    style="padding:10px 20px; background:#28a745; color:white;
                           border:none; border-radius:5px; cursor:pointer;">
                Send Reply
            </button>

        </form>

    </div>

</div>
@endsection