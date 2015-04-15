@if(Auth::user()->admin)
    <h2>Admin options</h2>
    <ul class="nav">
        <li><a href="{{ URL::route('admin.user.index') }}">Users</a></li>
        <li><a href="{{ URL::route('admin.person.index') }}">People</a></li>
        <li><a href="{{ URL::route('admin.team.index') }}">Teams</a></li>
        <li><a href="{{ URL::route('admin.game.index') }}">Games</a></li>
    </ul>
    <hr/>
@endif

<ul class="nav">
    <li><a href="{{ URL::route('admin.scores.index') }}">Update scores</a></li>
</ul>
