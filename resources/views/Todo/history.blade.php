@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
                <div class="card-header"> TODO
                <a class="btn btn-primary float-right" href="{{ url('index') }}">
                        Back
                    </a>
                <form class="float-right mx-5" method="GET" action="history" >
                    Choose a day
                    <input type="date" name="from">
                    <button class="btn btn-success float-right mx-2">
                        Submit
                    </button>
                </form>
                </div>
                <table class="table">
                <tr>

                      <th>Task</th>
                      <th>Description</th>
                      <th>Start Time</th>
                      <th>Stop Time</th>
                      <th>Status</th>
                </tr>
                @foreach($contacts as $contact)
                <tr>
                  <td>{{ $contact->task }}</td>
                  <td>{{ $contact->description }}</td>
                  <td>{{ $contact->start_at }}</td>
                  <td>{{ $contact->end_at }}</td>
                  <td>{{ $contact->status == null ? 'pending': $contact->status }}</td>
                </tr> 
                @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
