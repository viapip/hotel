<form action="{{ route('register.store') }}" method="post">
    @csrf

    <div class="form-group">
        <input type="text" placeholder="Имя" name="name">
    </div>
    <div class="form-group">
        <input type="email" placeholder="E-mail" name="email" value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <input type="password" placeholder="Password" name="password">
    </div>
    <div class="form-group">
        <input type="password" placeholder="Confirm password" name="password_confirmation">
    </div>
    <button type="submit" class="btn">Зарегистрироваться</button>
</form>
