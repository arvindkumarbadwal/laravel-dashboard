<a class="btn btn-info btn-sm" href="{{ route('permissions.edit', $id) }}">
{{ __('Edit') }}
</a>

<form action="{{ route('permissions.destroy', $id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure?') }}');" style="display: inline-block;">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" class="btn btn-sm btn-danger" value="{{ __('Delete') }}">
</form>