<div class="form-group row">
    <label for="Name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
        <input name="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="Name"
            placeholder="Name" value="{{ $data->name ?? old('name') }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="Username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
        <input name="username" type="text" class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}"
            id="Username" placeholder="Username" value="{{ $data->username ?? old('username') }}" required>
        @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="Email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        <input name="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
            id="Email" placeholder="Email" value="{{ $data->email ?? old('email') }}" required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
        <input name="password" type="password"
            class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password"
            placeholder="Password">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
