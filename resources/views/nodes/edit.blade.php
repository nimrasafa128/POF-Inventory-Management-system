<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Node</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h1>✏️ Edit {{ $node->type === 'module' ? 'Module' : 'Content' }}</h1>

    <a href="{{ route('documentation') }}" class="btn btn-secondary mb-3">⬅ Back to Documentation</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('nodes.update', $node) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" id="type" class="form-select" required>
                <option value="module" {{ $node->type === 'module' ? 'selected' : '' }}>Module</option>
                <option value="content" {{ $node->type === 'content' ? 'selected' : '' }}>Content</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="parent_id" class="form-label">Parent Module</label>
            <select name="parent_id" id="parent_id" class="form-select">
                <option value="">-- None (Top Level) --</option>
                @foreach($modules->where('id', '!=', $node->id) as $module)
                    <option value="{{ $module->id }}" {{ $node->parent_id == $module->id ? 'selected' : '' }}>
                        {{ $module->heading }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Heading</label>
            <input type="text" name="heading" class="form-control" value="{{ $node->heading }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Subheading</label>
            <input type="text" name="subheading" class="form-control" value="{{ $node->subheading }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Paragraph 1</label>
            <textarea name="paragraph1" class="form-control" rows="4">{{ $node->paragraph1 }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Paragraph 2</label>
            <textarea name="paragraph2" class="form-control" rows="4">{{ $node->paragraph2 }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Paragraph 3</label>
            <textarea name="paragraph3" class="form-control" rows="4">{{ $node->paragraph3 }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Picture</label>
            @if($node->picture)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $node->picture) }}" 
                         alt="Current picture" 
                         class="img-thumbnail" 
                         style="max-width: 200px;">
                    <p class="text-muted small">Current picture</p>
                </div>
            @endif
            <input type="file" name="picture" class="form-control">
            <div class="form-text">Leave empty to keep current picture</div>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('documentation') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>