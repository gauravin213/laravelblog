@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                @can('isAdmin')
                    <div class="alert alert-success">
                        Role Admin
                    </div>
                @endif

                @can('isAuthor')
                    <div class="alert alert-success">
                        Role Author
                    </div>
                @endif

                @can('isUser')
                    <div class="alert alert-success">
                        Role User
                    </div>
                @endif

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
