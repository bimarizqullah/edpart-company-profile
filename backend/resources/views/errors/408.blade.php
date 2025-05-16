@extends('errors.layouts')

@section('content')
    <div class="container-fluid">
        <div class="text-center">
            <div class="error mx-auto" data-text="408">408</div>
            <p class="lead text-gray-800 mb-5">Request Timeout</p>
            <p class="text-gray-500 mb-0">Request Timeout..</p>
            <a href="javascript:window.history.back()">&larr; Back to Dashboard</a>
        </div>
    </div>
@endsection