@extends("layouts.main")

@section("content")
    @section("title", "User Roles")

    <x-forms.form :action="route('admin.change-role', $user)" method="POST">
        <x-forms.select name="role_id" span="Role">
            @foreach($roles as $role)
                <option value="{{ $role->id }}" @selected($role->id === $user->role_id)>{{ $role->name }}</option>
            @endforeach
        </x-forms.select>
        <button type="submit" class="btn btn-primary">Save</button>
    </x-forms.form>

@endsection
