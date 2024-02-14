<div class="card mb-3">
    <h5 class="card-header">Role: <span
            class="text-{{ $user->role_id === 1 || $user->role_id === 2 ? "danger" : "primary" }}">{{ $user->role->name }}</span>
    </h5>
    <div class="card-body">
        <h5 class="card-title">Login: <span class="text-primary">{{ $user->login }}</span></h5>
        <p class="card-text">Email <span class="text-primary">{{ $user->email }}</span></p>
        <p class="card-text">Posts: <span class="text-primary">{{ $user->posts->count() }}</span></p>
        <p class="card-text">Comments: <span class="text-primary">{{ $user->comments->count() }}</span></p>
        <p class="card-text">Likes: <span class="text-primary">{{ $user->likes->count() }}</span></p>
        <p class="card-text">Registred At <span class="text-primary">{{ $user->created_at }}</span></p>
        @can("change-role")
            <a href="{{ route('admin.roles', $user) }}" class="btn btn-primary">Change Roles</a>
        @endcan
    </div>
    @if(\Illuminate\Support\Facades\Auth::user()->role_id === 1 || \Illuminate\Support\Facades\Auth::user()->role_id < $user->role_id)
        <x-forms.form :action="route('admin.active-toggle', $user)" method="PATCH" class="ms-3 mb-3">
            <button type="submit"
                    class="btn btn-{{ $user->is_active ? "danger" : "success" }}">{{ $user->is_active ? "Deactivate User" : "Activate User" }}</button>
        </x-forms.form>
    @endif
</div>
