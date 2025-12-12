@extends('layouts.app')

@section('content')
<div class="min-h-screen flex bg-gray-50">


    <!-- MAIN CONTENT -->
    <main class="flex-1 p-10">
        <div class="bg-white shadow rounded-lg p-6">

            {{-- Header Section --}}
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">
                        Hello, {{ Auth::user()->name }} 👋
                    </h3>
                    <p class="text-gray-600 text-sm">
                        View or send messages to admin support.
                    </p>
                </div>
                <a href="{{ route('messages.create') }}"
                   class="bg-green-600 hover:bg-green-700 text-white font-medium px-4 py-2 rounded-lg transition">
                    ✉️ New Message
                </a>
            </div>

            {{-- Messages List --}}
            @if($messages->isEmpty())
                <div class="text-center py-10 text-gray-500">
                    <p>No messages yet. Click “New Message” to start a conversation 🌿</p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full border border-gray-200 rounded-lg">
                        <thead class="bg-green-100">
                            <tr>
                                <th class="py-3 px-4 text-left text-gray-700">Subject</th>
                                <th class="py-3 px-4 text-left text-gray-700">Status</th>
                                <th class="py-3 px-4 text-left text-gray-700">Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($messages as $message)
                                <tr class="hover:bg-green-50 transition">
                                    <td class="py-3 px-4">
                                        <a href="#" class="text-green-700 hover:underline">
                                            {{ $message->subject }}
                                        </a>
                                    </td>
                                    <td class="py-3 px-4">
                                        @if($message->is_read)
                                            <span class="text-sm text-gray-600">Read</span>
                                        @else
                                            <span class="text-sm text-green-600 font-semibold">Unread</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 text-sm text-gray-500">
                                        {{ $message->created_at->format('M d, Y') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </main>

</div>
@endsection
