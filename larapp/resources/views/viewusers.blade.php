@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h1 class="text-center">List all USers</h1>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>FullName</th>
                            <th>Email</th>
                            <th>Photo</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                         <tr>
                           <td>{{ $user->fullname}}</td>
                           <td>{{ $user->email}}</td>
                           <td class="text-center"><img src="{{asset($user->photo)}}" width="30px" class="rounded-circle"></td>
                           <td>
                                @if ($user->role =='Admin')
                                    <button class="btn btn-success">
                                    {{ $user->role}}
                                    </button>
                                @else
                                    <button class="btn btn-secondary">
                                    {{ $user->role}}
                                    </button>

                                @endif
                           </td>
                         </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

@endsection
