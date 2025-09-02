<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Module / Content</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-4">
    <h1>➕ Add Module / Content</h1>

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

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" id="type" class="form-select" required onchange="toggleFields()">
                <option value="module">Module (Container for content)</option>
                <option value="content" {{ request('parent_id') ? 'selected' : '' }}>Content (Goes inside a module)</option>
            </select>
            <div class="form-text" id="type-help">
                <strong>Module:</strong> Creates a category/section that can contain multiple content items.<br>
                <strong>Content:</strong> Creates actual content that will be displayed inside a module.
            </div>
        </div>

        <div class="mb-3">
            <label for="parent_id" class="form-label">Parent Module</label>
            <select name="parent_id" id="parent_id" class="form-select">
                <option value="">-- None (Top Level) --</option>
                @foreach($modules as $module)
                    <option value="{{ $module->id }}" {{ request('parent_id') == $module->id ? 'selected' : '' }}>
                        {{ $module->heading }}
                    </option>
                @endforeach
            </select>
            <div class="form-text" id="parent-help">
                For <strong>Modules:</strong> Leave blank to make it top-level, or choose a parent module.<br>
                For <strong>Content:</strong> Choose which module this content belongs to.
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Heading *</label>
            <input type="text" name="heading" class="form-control" required>
            <div class="form-text">
                For modules: The name of the section (e.g., "Advertisement")<br>
                For content: The title of the content item
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Subheading</label>
            <input type="text" name="subheading" class="form-control">
            <div class="form-text">Optional subtitle or description</div>
        </div>

        <!-- Content-specific fields -->
        <div id="content-fields">
            <div class="mb-3">
                <label class="form-label">Paragraph 1</label>
                <textarea name="paragraph1" class="form-control" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Paragraph 2</label>
                <textarea name="paragraph2" class="form-control" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Paragraph 3</label>
                <textarea name="paragraph3" class="form-control" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Picture</label>
                <input type="file" name="picture" class="form-control">
                <div class="form-text">Upload an image for this content (JPG, PNG, JPEG - max 2MB)</div>
            </div>
        </div>

        <div class="alert alert-info" id="workflow-info">
            <h6><i class="fas fa-info-circle"></i> How it works:</h6>
            <p class="mb-0">
                1. Create a <strong>Module</strong> first (like "Advertisement")<br>
                2. Then create <strong>Content</strong> items inside that module<br>
                3. All content in a module will be displayed together on one page
            </p>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Save
        </button>
        <a href="{{ route('documentation') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
function toggleFields() {
    const type = document.getElementById('type').value;
    const contentFields = document.getElementById('content-fields');
    const parentHelp = document.getElementById('parent-help');
    const typeHelp = document.getElementById('type-help');
    
    if (type === 'module') {
        contentFields.style.display = 'none';
        // Make content fields not required for modules
        document.querySelectorAll('#content-fields textarea, #content-fields input').forEach(field => {
            field.removeAttribute('required');
        });
    } else {
        contentFields.style.display = 'block';
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    toggleFields();
    
    // If parent_id is pre-selected, auto-select content type
    if (document.getElementById('parent_id').value) {
        document.getElementById('type').value = 'content';
        toggleFields();
    }
});
</script>

</body>
</html>