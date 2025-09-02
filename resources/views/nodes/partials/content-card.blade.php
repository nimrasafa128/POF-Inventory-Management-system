<div class="content-card mb-4 p-3 border rounded shadow-sm">
    <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
            <h1 class="display-6">{{ $node->heading }}</h1>
            @if($node->subheading)
                <p class="text-muted">{{ $node->subheading }}</p>
            @endif
        </div>
        <div class="dropdown">
            <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                <i class="fas fa-cog"></i>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('nodes.edit', $node->id) }}"><i class="fas fa-edit"></i> Edit</a></li>
                <li>
                    <form action="{{ route('nodes.destroy', $node->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Delete this content?')">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    @if($node->picture)
        <div class="text-center mb-4">
            <img src="{{ asset('storage/' . $node->picture) }}" class="img-fluid rounded shadow" style="max-height: 400px;">
        </div>
    @endif

    <div class="content-text">
        @if($node->paragraph1) <p>{{ $node->paragraph1 }}</p> @endif
        @if($node->paragraph2) <p>{{ $node->paragraph2 }}</p> @endif
        @if($node->paragraph3) <p>{{ $node->paragraph3 }}</p> @endif
    </div>
</div>
