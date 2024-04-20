<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container">

    <h2>welcom back {{$user->name}}</h2>
    <form action="{{ route('users.storePivot') }}" method="post">
        @csrf
        {{-- @foreach ($roles as $r)
        <tr>
            <td><input type="checkbox" name="roles[]" >{{$r->nom}} </td>
        </tr>

        @endforeach --}}
        <input type="hidden" name="id" value="{{$user->id}}">
        @foreach ($roles as $r)
            <tr>
                <td>
                    <input type="checkbox" name="roles[]" value="{{ $r->id }}" {{ $user->roles->contains($r) ? 'checked' : '' }}>
                    {{ $r->nom }}
                </td>
            </tr>
        @endforeach
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>


