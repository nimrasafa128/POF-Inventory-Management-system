<style>
    .list-group{
        
    }
</style>
<ul class="list-group mt-2">
    @foreach($nodes as $node)
        <li class="list-group-item">
            <strong>{{ $node->heading }}</strong> ({{ $node->type }})

            <a href="{{ route('nodes.edit', $node) }}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('nodes.destroy', $node) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>

            {{-- If this node has children, include this same partial again --}}
            @if($node->children->count())
                @include('nodes.partials.tree', ['nodes' => $node->children])
            @endif
        </li>
    @endforeach
</ul>
