<div class="d-flex justify-content-center">
    <a href="{{ route('products.show', ['product' => $product->id]) }}" class="btn btn-outline-dark btn-sm me-2">
        <i class="bi-person-lines-fill"></i>
    </a>
    <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-outline-dark btn-sm me-2">
        <i class="bi-pencil-square"></i>
    </a>
    <form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-outline-dark btn-sm me-2 btn-delete"
            data-name="{{ $product->name }}">
            <i class="bi-trash"></i>
        </button>
    </form>
</div>
