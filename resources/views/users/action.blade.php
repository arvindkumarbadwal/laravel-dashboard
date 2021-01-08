<a class="btn btn-warning btn-sm" href="{{ route('users.show', $id) }}">
{{ __('Show') }}
</a>
<a class="btn btn-info btn-sm" href="{{ route('users.edit', $id) }}">
{{ __('Edit') }}
</a>

<form action="{{ route('users.destroy', $id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure?') }}');" style="display: inline-block;">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" class="btn btn-sm btn-danger" value="{{ __('Delete') }}">
</form>