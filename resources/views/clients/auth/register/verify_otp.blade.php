<h1>Verify OTP</h1>
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif
@if($errors->any())
    <p style="color: red;">{{ $errors->first() }}</p>
@endif
<form action="{{ route('verifyOtp') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="email">Email:</label>
    <input type="email" name="email" value="{{ old('email') }}" required>
    <label for="otp">OTP:</label>
    <input type="text" name="otp" value="{{ old('otp') }}" required>
    <button type="submit">Verify</button>
</form>
