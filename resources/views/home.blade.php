@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->role_id === 1)
                        <ul>
                            <li><a href="{{ route("user.list") }}">User</a></li>
                        </ul>
                    @endif

                    @if(Auth::user()->role_id === 2)
                        <ul>
                            <li><a href="{{ route("bank.index") }}">TopUp</a></li>
                        </ul>
                    @endif

                    @if(Auth::user()->role_id === 3)
                        <ul>
                            <li><a href="{{ route("item.list") }}">Item</a></li>
                        </ul>
                    @endif

                    @if(Auth::user()->role_id === 4)
                        <ul>
                            <li><a href="{{ route("topup.index") }}">TopUp</a></li>
                            <li><a href="{{ route("transaction.index") }}">Shopping</a></li>
                        </ul>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
