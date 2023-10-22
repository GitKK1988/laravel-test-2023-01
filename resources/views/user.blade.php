@if (counte($users))
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }}</li>
        @endforeach
    </ul>
@else
    <p>No users</p>    
@endif