<div>
    <h1>Login</h1>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="email" value="{{ old('email') }}" name="email" required>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>
</div>