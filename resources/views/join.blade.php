@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Join the Organization') }}</div>

                    <div class="card-body">
                        <form action="{{ route('join.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="organization_id" value="{{ $organization->id }}" />
                            Do you want to join to <strong>{{ $organization->name }}</strong>?
                            <br>
                            Join as:
                            <br>
                            <select name="role_id">
                                <option value="1">Simple User</option>
                                <option value="2">Administrator</option>
                                <option value="3">Publisher</option>
                            </select>
                            <input type="submit" value="Yes, join" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
