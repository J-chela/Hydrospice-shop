@extends('layouts.app')

@section('content')
<div class="min-h-screen flex bg-gray-100">

    <main class="flex-1 flex flex-col h-full">

        <!-- Page Header -->
        <div class="p-6 border-b bg-white shadow-sm">
            <h3 class="text-xl font-semibold text-gray-900">
                ✉️ Send a Message to Shop 🌿
            </h3>
            <p class="text-gray-600 text-sm">Send a quick message below.</p>
        </div>

        <!-- Messages List -->
        <div id="messagesContainer" class="flex-1 overflow-y-auto p-6 space-y-4 bg-gray-50">
            <!-- Messages will appear here dynamically -->
        </div>

        <!-- Chat Form -->
        <form id="messageForm" method="POST" action="{{ route('messages.store') }}" class="border-t bg-white p-4">
            @csrf


            <!-- Message Input -->
            <div class="max-w-3xl mx-auto flex items-center space-x-3">

                <textarea 
                    id="bodyInput"
                    name="body" 
                    rows="1"
                    class="flex-1 resize-none border rounded-xl p-3 shadow-sm focus:ring-green-400 focus:border-green-400"
                    placeholder="Type your message..."
                    required
                ></textarea>

                <button 
                    type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl shadow transition"
                >
                    Send
                </button>
            </div>

            <div class="max-w-3xl mx-auto flex justify-end mt-3">
                <a href="{{ route('messages.index') }}" class="text-gray-500 hover:text-gray-700 text-sm underline">
                    Cancel
                </a>
            </div>
        </form>
    </main>

</div>

{{-- AJAX + Enter to Send --}}
<script>
document.addEventListener('DOMContentLoaded', () => {

    const form = document.getElementById('messageForm');
    const bodyInput = document.getElementById('bodyInput');
    const subjectInput = document.getElementById('subjectInput');
    const messagesContainer = document.getElementById('messagesContainer');

    // Allow ENTER to send (SHIFT+ENTER for new line)
    bodyInput.addEventListener('keydown', function(e) {
        if (e.key === "Enter" && !e.shiftKey) {
            e.preventDefault();
            form.dispatchEvent(new Event('submit'));
        }
    });

    // AJAX submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(form);

        fetch(form.action, {
            method: "POST",
            headers: { 
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value 
            },
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            // Append message to screen
            appendMessage(data.subject, data.body);

            // Clear input fields
            bodyInput.value = "";
            subjectInput.value = "";
        })
        .catch(err => console.error(err));
    });

    // Function to show sent message instantly
    function appendMessage(subject, body) {
        const msg = document.createElement('div');
        msg.className = "max-w-xs ml-auto bg-green-600 text-white p-3 rounded-xl shadow";

        msg.innerHTML = `
            <p class="font-semibold">${subject}</p>
            <p class="text-sm mt-1">${body}</p>
        `;

        messagesContainer.appendChild(msg);

        // Auto-scroll
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }
});
</script>

@endsection


