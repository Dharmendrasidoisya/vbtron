<div class="table-responsive">
    <table class="table table-striped mb-0">
        <thead>
            <tr>
                <th>Name</th>
                {{-- <th>Slug</th> --}}
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($productsposts as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    {{-- <td>{{ $product->slugable->key ?? '-' }}</td> --}}
                    <td>{{ $product->created_at->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No products found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
