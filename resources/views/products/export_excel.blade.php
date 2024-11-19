<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Category</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $index => $product)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->category->name }}</td>
            </tr>
        @endforeach
    </tbody>
