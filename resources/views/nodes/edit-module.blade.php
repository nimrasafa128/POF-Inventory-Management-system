<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Module - Documentation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title mb-0">
                            <i class="fas fa-folder-open"></i> Edit Module
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('nodes.update', $node->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label for="heading" class="form-label">Module Name *</label>
                                <input type="text" class="form-control @error('heading') is-invalid @enderror" 
                                       id="heading" name="heading" value="{{ old('heading', $node->heading) }}" required>
                                @error('heading')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="subheading" class="form-label">Module Description</label>
                                <input type="text" class="form-control @error('subheading') is-invalid @enderror" 
                                       id="subheading" name="subheading" value="{{ old('subheading', $node->subheading) }}">
                                @error('subheading')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Hidden field to maintain type -->
                            <input type="hidden" name="type" value="module">
                            
                            <!-- Hidden field to maintain parent_id -->
                            <input type="hidden" name="parent_id" value="{{ $node->parent_id }}">

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Module
                                </button>
                                <a href="{{ route('documentation') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                @if($node->children->count() > 0)
                <div class="card shadow mt-4">
                    <div class="card-header bg-info text-white">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-list"></i> Module Contents ({{ $node->children->count() }} items)
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle"></i>
                            This module contains the following items. They will remain unchanged when you update the module.
                        </div>
                        <ul class="list-group">
                            @foreach($node->children as $child)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>
                                        @if($child->type === 'module')
                                            <i class="fas fa-folder text-warning"></i>
                                        @else
                                            <i class="fas fa-file-alt text-primary"></i>
                                        @endif
                                        {{ $child->heading }}
                                    </span>
                                    <span class="badge bg-secondary">{{ ucfirst($child->type) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>