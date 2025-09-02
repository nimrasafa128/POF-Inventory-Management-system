@foreach($nodes as $node)
    @php
        $collapseId = "collapse{$node->id}_{$level}";
    @endphp

    @if($node->type === 'module' && $node->childrenRecursive->count() > 0)
        <div class="nav-item">
            <div class="d-flex justify-content-between align-items-center">
                {{-- Module link - now clickable to view all content --}}
                <a href="{{ $context === 'user' ? route('user.documentation.show', $node->id) : route('documentation.show', $node->id) }}" 
                   class="nav-link d-flex justify-content-between align-items-center flex-grow-1 text-decoration-none">
                    <span>
                        <i class="fas fa-folder"></i>
                        {{ $node->heading }}
                    </span>
                </a>

                {{-- Collapse toggle button --}}
                <button class="btn btn-sm btn-outline-secondary me-1"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#{{ $collapseId }}"
                    aria-expanded="false"
                    aria-controls="{{ $collapseId }}">
                    <i class="fas fa-chevron-down"></i>
                </button>

                {{-- Edit/Delete --}}
                @if($context !== 'user')
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{ route('nodes.edit', $node->id) }}">
                                    <i class="fas fa-edit"></i> Edit Module
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('nodes.destroy', $node->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Delete this module and children?')">
                                        <i class="fas fa-trash"></i> Delete Module
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endif
            </div>

            {{-- Recursive children --}}
            <div class="collapse" id="{{ $collapseId }}">
                <nav class="nav flex-column ms-3">
                    @include('nodes.partials.sidebar-tree', [
                        'nodes' => $node->childrenRecursive, 
                        'level' => $level + 1,
                        'context' => $context
                    ])
                </nav>
            </div>
        </div>

    @elseif($node->type === 'module')
        {{-- Module without children - still clickable --}}
        <div class="d-flex justify-content-between align-items-center nav-item">
            <a href="{{ $context === 'user' ? route('user.documentation.show', $node->id) : route('documentation.show', $node->id) }}" 
               class="nav-link flex-grow-1 text-decoration-none">
                <i class="fas fa-folder-open"></i>
                {{ $node->heading }}
            </a>

            @if($context !== 'user')
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('nodes.edit', $node->id) }}">
                                <i class="fas fa-edit"></i> Edit Module
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('nodes.destroy', $node->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Delete this module?')">
                                    <i class="fas fa-trash"></i> Delete Module
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endif
        </div>

    @elseif($node->type === 'content')
        {{-- Content items - clickable links that scroll to content section --}}
        <div class="nav-item ms-3">
            <a href="#content-{{ $node->id }}" class="nav-link content-link" data-content-id="{{ $node->id }}">
                <i class="fas fa-file-alt"></i>
                {{ $node->heading }}
            </a>
        </div>
    @endif
@endforeach