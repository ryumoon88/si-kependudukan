@extends('users.layouts.main')

@section('content')
    <div class="container">
        <form action="{{ route('submissions.create') }}" method="post">
            @csrf

        </form>
    </div>
@endsection
