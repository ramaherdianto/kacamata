<a href="#" onclick="deleteData({{ $id }})" {{ $attributes->merge(['class' => 'btn btn-danger']) }}>
    {{ $title }}
</a>
<form id="delete-form-{{ $id }}" action="{{ $url }}" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>
