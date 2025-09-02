
@if($node->type === 'module')
    <option value="{{ $node->id }}">{{ $prefix }}{{ $node->heading }}</option>
    @foreach($node->children->where('type', 'module') as $child)
        @include('nodes.partials.option-tree', ['node' => $child, 'prefix' => $prefix . '── '])
    @endforeach
@endif