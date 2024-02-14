@extends("layouts.main")

@section("content")
    @section("title", "Admin Panel")
    <h2 class="text-center text-primary">Admin Panel</h2>

    <hr>

    @forelse($data as $data_item)
        <h5>{{ $data_item["title"] }}: <span class="text-primary">{{ $data_item["data"]->count() }}</span></h5>
    @empty
        <h5 class="text-center">No Data</h5>
    @endforelse

    <hr>

    <x-forms.form :action="route('admin.admin-panel')" method="GET">
        <x-forms.input name="login" type="text" :value="$filters['login'] ?? ''">
            Login
        </x-forms.input>

        <x-forms.select name="is_active" span="Active">
            <option value="" @selected(!$filters["is_active"])>All Users</option>
            <option value="active" @selected($filters["is_active"] === "active")>Active Users</option>
            <option value="ban" @selected($filters["is_active"] === "ban")>Banned Users</option>
        </x-forms.select>

        <x-forms.select name="is_admin" span="Role">
            <option value="" @selected(!$filters["is_admin"])>All Roles</option>
            <option value="admin" @selected($filters["is_admin"] === "admin")>Admins</option>
            <option value="user" @selected($filters["is_admin"] === "user")>Users</option>
        </x-forms.select>

        <button type="submit" class="btn btn-primary">Search</button>
    </x-forms.form>

    <hr>

    @forelse($users as $user)
        <x-users.user-card :user="$user"/>
    @empty
        <h2 class="text-center">No Users</h2>
    @endforelse

    {{ $users->withQueryString()->links() }}
@endsection
