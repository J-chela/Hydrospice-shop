@extends('layouts.app')

@section('content')
<div class="container">

    <h1 style="margin-bottom:20px;">Admin Messages</h1>

    @if(session('success'))
        <div style="padding:10px; background:#d4edda; color:#155724; margin-bottom:15px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="background:white; padding:20px; border-radius:8px; box-shadow:0 2px 5px rgba(0,0,0,0.1);">

        <table style="width:100%; border-collapse: collapse;">
            <thead>
                <tr style="background:#f5f5f5;">
                    <th style="padding:10px; text-align:left;">ID</th>
                    <th style="padding:10px; text-align:left;">User</th>
                    <th style="padding:10px; text-align:left;">Subject</th>
                    <th style="padding:10px; text-align:left;">Date</th>
                    <th style="padding:10px; text-align:left;">Action</th>
                </tr>
            </thead>

            <tbody>

                {{-- Example placeholder row --}}
                <tr>
                    <td style="padding:10px;">1</td>
                    <td style="padding:10px;">Example User</td>
                    <td style="padding:10px;">Test message</td>
                    <td style="padding:10px;">{{ now()->format('Y-m-d') }}</td>
                    <td style="padding:10px;">
                        <a href="#" style="color:blue;">View</a>
                    </td>
                </tr>

                {{-- Later you will loop messages here --}}
                {{--
                @foreach($messages as $message)
                <tr>
                    <td>{{ $message->id }}</td>
                    <td>{{ $message->user->name }}</td>
                    <td>{{ $message->subject }}</td>
                    <td>{{ $message->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('admin.messages.show', $message->id) }}">View</a>
                    </td>
                </tr>
                @endforeach
                --}}

            </tbody>
        </table>

    </div>

</div>
@endsection