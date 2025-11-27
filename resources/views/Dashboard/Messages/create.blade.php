<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('✉️ New Message') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                {{-- Page Title --}}
                <div class="mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Send a Message to Admin 🌿
                    </h3>
                    <p class="text-gray-600 text-sm">
                        Have a question, issue, or suggestion? Send us a quick message below.
                    </p>
                </div>

                {{-- Form --}}
                <form method="POST" action="{{ route('dashboard.messages.store') }}">
                    @csrf

                    {{-- Subject --}}
                    <div class="mb-5">
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">
                            Subject
                        </label>
                        <input type="text" name="subject" id="subject"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500"
                            placeholder="Enter message subject..." required>
                    </div>

                    {{-- Message --}}
                    <div class="mb-5">
                        <label for="body" class="block text-sm font-medium text-gray-700 mb-1">
                            Message
                        </label>
                        <textarea name="body" id="body" rows="6"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-green-500 focus:border-green-500"
                            placeholder="Type your message here..." required></textarea>
                    </div>

                    {{-- Buttons --}}
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('dashboard.messages') }}"
                           class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                            Cancel
                        </a>
                        <button type="submit"
                                class="px-4 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition">
                            Send Message
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
