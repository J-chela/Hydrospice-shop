@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 flex">

    <main class="flex-1 p-6">

        <div class="bg-white shadow rounded-lg w-full overflow-hidden">

            {{-- Header --}}
            <div class="border-b border-gray-200 px-6 py-4 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-gray-800">
                        Chat with {{ $user->name }}
                    </h2>
                    <p class="text-gray-500 text-sm">Direct conversation</p>
                </div>
                <a href="{{ route('messages.index') }}" 
                   class="text-green-600 hover:underline">Back to Inbox</a>
            </div>

            {{-- Chat Box --}}
            <div id="chatBox" class="h-[70vh] px-6 py-4 overflow-y-auto bg-gray-100">

                @foreach($messages as $msg)
                    <div class="mb-4 {{ $msg->sender_id == Auth::id() ? 'text-right' : 'text-left' }}">
                        
                        <div class="inline-block px-4 py-2 rounded-xl 
                            {{ $msg->sender_id == Auth::id() 
                                ? 'bg-green-600 text-white' 
                                : 'bg-gray-300 text-gray-800' }}">
                            {{ $msg->message }}
                        </div>

                        <div class="text-xs mt-1 text-gray-500">
                            {{ $msg->created_at->format('H:i') }}
                        </div>

                    </div>
                @endforeach

            </div>

            {{-- Input Area --}}
            <div class="border-t border-gray-200 p-4 flex">
                <textarea id="messageInput"
                          class="flex-1 border border-gray-300 rounded-lg p-3 resize-none focus:outline-none focus:border-green-500"
                          placeholder="Type a message..."
                          rows="1"></textarea>

                <button id="sendBtn"
                        class="ml-3 bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-lg transition">
                    Send
                </button>
            </div>

        </div>
    </main>
</div>
@endsection


@section('scripts')
<script>
    const receiverId = {{ $user->id }};
    const chatBox = document.getElementById('chatBox');

    window.Echo.private("chat.{{ Auth::id() }}")
    .listen("MessageSent", (e) => {
        if (e.sender == {{ $user->id }}) {
            appendIncomingMessage(e.message);
        }
    });
    function appendIncomingMessage(msg) {
        const bubble = document.createElement('div');
        bubble.classList.add('mb-4', 'text-left');

        bubble.innerHTML = `
            <div class="inline-block px-4 py-2 rounded-xl bg-gray-300 text-gray-800">
                ${msg.message}
            </div>
            <div class="text-xs mt-1 text-gray-500">
                ${msg.created_at}
            </div>
        `;

    // Auto-scroll on load
    chatBox.scrollTop = chatBox.scrollHeight;

    // Enter sends (except Shift+Enter)
    document.getElementById('messageInput').addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            document.getElementById('sendBtn').click();
        }
    });

    // Send Message

        function appendIncomingMessage(msg) {
    const bubble = document.createElement('div');
    bubble.classList.add('mb-4', 'text-left');

    bubble.innerHTML = `
        <div class="inline-block px-4 py-2 rounded-xl bg-gray-300 text-gray-800">
            ${msg.message}
        </div>
        <div class="text-xs mt-1 text-gray-500">
            now
        </div>
    `;

    chatBox.appendChild(bubble);
    chatBox.scrollTop = chatBox.scrollHeight;
}


    document.getElementById('sendBtn').addEventListener('click', function() {

        const input = document.getElementById('messageInput');
        const text = input.value.trim();

        if (text === '') return;

        fetch("{{ route('messages.store') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                receiver_id: receiverId,
                message: text
            })
        })
        .then(r => r.json())
        .then(data => {
            appendMessage(data.message);
            input.value = "";
        });
    });

    // Add message instantly
    function appendMessage(msg) {

        const bubble = document.createElement('div');
        bubble.classList.add('mb-4', 'text-right');

        bubble.innerHTML = `
            <div class="inline-block px-4 py-2 rounded-xl bg-green-600 text-white">
                ${msg.message}
            </div>
            <div class="text-xs mt-1 text-gray-500">
                ${msg.created_at}
            </div>
        `;

        chatBox.appendChild(bubble);
        chatBox.scrollTop = chatBox.scrollHeight;
    }
</script>
@endsection
