@extends('errors.layouts')

@section('content')
    <div class="container-fluid">
        <div class="text-center">
            <div class="error mx-auto" data-text="405">405</div>
            <p class="lead text-gray-800 mb-5">Method Not Allowed</p>
            <p class="text-gray-500 mb-0">You don't have access to this page..</p>
            <a href="javascript:window.history.back()">&larr; Back to Dashboard</a>
        </div>
    </div>
@endsection