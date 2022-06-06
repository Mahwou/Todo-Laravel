@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>

            </div>
            <div class="card">
                <div class="card-header"> TODO
                    <a class="btn btn-success float-right ml-2" href="{{ route('history')}}">
                        History
                    </a>
                    <a class="btn btn-primary float-right" href="{{ route('create')}}">
                        New Todo
                    </a>
                </div>
                <table class="table">
                    <tr>

                        <th>Task</th>
                        <th>Description</th>
                        <th>Start Time</th>
                        <th>Stop Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach($contacts as $contact)
                    <tr>
                        <td>
                            <a href="{{ route('edit', $contact->id)}}">
                            {{ $contact->task }}  
                            </a>
                        </td>
                        <td>{{ $contact->description }}</td>
                        <td>{{  Carbon\Carbon::parse($contact->start_at)->format('H:i:s') }}</td>
                        <td>{{  Carbon\Carbon::parse($contact->end_at)->format('H:i:s') }}</td>
                        <td>{{ $contact->status == null ? 'pending': $contact->status }}</td>
                        <td>
                            @if ($contact->status == null)
                            <form method="POST" action="{{ route('status', $contact->id) }}">
                                @csrf
                                <button class="btn btn-primary">Mark</button>
                            </form>
                            @else
                            <form method="POST" action="{{ route('statusRemove', $contact->id) }}">
                                @csrf
                                <button class="btn btn-danger">Mark</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </table>
                <form method="POST" action="{{ route('close') }}">
                    @csrf
                    <button type="submit" class='btn btn-success btn-xs'>Close Day</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection