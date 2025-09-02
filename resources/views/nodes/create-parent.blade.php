<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Parent Module</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>➕ Add Parent Module</h2>

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

    <form action="{{ route('nodes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="type" value="module">

        <div class="mb-3">
            <label for="heading" class="form-label">Module Name</label>
            <input type="text" name="heading" id="heading" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="subheading" class="form-label">Subheading</label>
            <input type="text" name="subheading" id="subheading" class="form-control">
        </div>

        <div class="mb-3">
            <label for="paragraph1" class="form-label">Description</label>
            <textarea name="paragraph1" id="paragraph1" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="picture" class="form-label">Upload Picture</label>
            <input type="file" name="picture" id="picture" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save Module</button>
        <a href="{{ route('documentation') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>