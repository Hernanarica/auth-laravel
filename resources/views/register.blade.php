@auth
  {{ auth()->user() }}
@endauth
<form action="{{ route('users.store') }}" method="post">
  @csrf
  <div>
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
  </div>
  <div>
    <label for="lastname">Lastname</label>
    <input type="text" name="lastname" id="lastname">
  </div>
  <div>
    <label for="email">Email</label>
    <input type="email" name="email" id="email">
  </div>
  <div>
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
  </div>
  <button>Register</button>
</form>