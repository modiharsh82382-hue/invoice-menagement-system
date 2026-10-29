<form method="POST" action="{{ route('logout') }}" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-sm btn-outline-light">Sign out</button>
</form>
