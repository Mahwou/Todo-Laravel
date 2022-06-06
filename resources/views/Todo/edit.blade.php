@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">TODO
                    <a class="btn btn-primary float-right" href=" {{url()->previous()}}">
                        Back
                    </a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update') }}" class="Form-group">
                        @csrf
                        <label>Task:</label>
                        <input type="text" name="task" id="task" class="form-control mb-4">
                        <label>Describtion:</label>
                        <textarea type="text-area" name="description" class="form-control mb-4"></textarea>

                        <div class="row mb-4">
                            <div class="col">
                                <label>Start At:</label>
                                <input type="datetime-local" name="start_at" class="form-control mb-4">
                            </div>
                            <div class="col">
                                <label>End At:</label>
                                <input type="datetime-local" name="end_at" class="form-control mb-4">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection