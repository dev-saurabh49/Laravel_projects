<h2>User Details</h2>
@foreach ($data as $id => $user)
    <h3>Name : {{ $user->name }}</h3>
    <h3>Name : {{ $user->email }}</h3>
    <h3>Name : {{ $user->age }}</h3>
    <h3>Name : {{ $user->city }}</h3>
@endforeach