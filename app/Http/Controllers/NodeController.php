<?php

namespace App\Http\Controllers;

use App\Models\Node;
use Illuminate\Http\Request;

class NodeController extends Controller
{
    public function index()
    {
        // Eager-load recursive children
        $roots = Node::whereNull('parent_id')
            ->with('childrenRecursive')
            ->get();

        return view('documentation.index', [
            'roots' => $roots,
            'currentNode' => null,
        ]);
    }

    // Updated method for documentation layout with sidebar
    public function documentation($id = null)
    {
        $roots = Node::whereNull('parent_id')->with('childrenRecursive')->get();
        $currentNode = $id ? Node::findOrFail($id) : null;
        
        // If it's a module, get all its content children
        $moduleContent = null;
        if ($currentNode && $currentNode->type === 'module') {
            $moduleContent = $currentNode->children()->where('type', 'content')->get();
        }

        return view('nodes.documentation', compact('roots', 'currentNode', 'moduleContent'))
            ->with('context', 'developer');
    }

    public function userdocumentation($id = null)
    {
        $roots = Node::whereNull('parent_id')->with('childrenRecursive')->get();
        $currentNode = $id ? Node::findOrFail($id) : null;
        
        // If it's a module, get all its content children
        $moduleContent = null;
        if ($currentNode && $currentNode->type === 'module') {
            $moduleContent = $currentNode->children()->where('type', 'content')->get();
        }

        return view('nodes.user.userdocumentation', compact('roots', 'currentNode', 'moduleContent'))
            ->with('context', 'user');
    }

    public function debugTree()
    {
        $roots = Node::whereNull('parent_id')->with('childrenRecursive')->get();
        
        echo "<h3>Debug Tree Structure:</h3>";
        foreach ($roots as $root) {
            $this->printNode($root, 0);
        }
    }

    private function printNode($node, $level)
    {
        $indent = str_repeat('--', $level);
        echo "<br>{$indent} {$node->heading} ({$node->type}) - ID: {$node->id} - Children: {$node->childrenRecursive->count()}";

        foreach ($node->childrenRecursive as $child) {
            $this->printNode($child, $level + 1);
        }
    }

    public function create()
    {
        $modules = Node::where('type', 'module')->get();
        return view('nodes.create', compact('modules'));
    }

    public function createParent()
    {
        return view('nodes.create-parent');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'required|string|max:255',
            'subheading' => 'nullable|string|max:255',
            'paragraph1' => 'nullable|string',
            'paragraph2' => 'nullable|string',
            'paragraph3' => 'nullable|string',
            'picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'parent_id' => 'nullable|exists:nodes,id',
            'type' => 'required|string|in:module,content'
        ]);

        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        $node = Node::create($validated);

        // Redirect based on where the form was submitted from
        if ($request->has('redirect_to_admin')) {
            return redirect()->route('nodes.index')->with('success', 'Node created successfully.');
        }
        
        // If content was created under a module, redirect to that module page
        if ($node->type === 'content' && $node->parent_id) {
            return redirect()->route('documentation.show', $node->parent_id)
                ->with('success', 'Content added to module successfully.');
        }
        
        return redirect()->route('documentation')->with('success', 'Node created successfully.');
    }

    public function edit(Node $node)
    {
        // Check if it's a module or content and return appropriate view
        if ($node->type === 'module') {
            return view('nodes.edit-module', compact('node'));
        } else {
            $modules = Node::where('type', 'module')->get();
            return view('nodes.edit', compact('node', 'modules'));
        }
    }

    public function update(Request $request, Node $node)
    {
        // Different validation rules for modules vs content
        if ($node->type === 'module') {
            $validated = $request->validate([
                'heading' => 'required|string|max:255',
                'subheading' => 'nullable|string|max:255',
                'parent_id' => 'nullable|exists:nodes,id',
                'type' => 'required|string|in:module,content'
            ]);
        } else {
            $validated = $request->validate([
                'heading' => 'required|string|max:255',
                'subheading' => 'nullable|string|max:255',
                'paragraph1' => 'nullable|string',
                'paragraph2' => 'nullable|string',
                'paragraph3' => 'nullable|string',
                'picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
                'parent_id' => 'nullable|exists:nodes,id',
                'type' => 'required|string|in:module,content'
            ]);

            if ($request->hasFile('picture')) {
                if ($node->picture && file_exists(storage_path('app/public/' . $node->picture))) {
                    unlink(storage_path('app/public/' . $node->picture));
                }
                $validated['picture'] = $request->file('picture')->store('pictures', 'public');
            }
        }

        $node->update($validated);

        // Redirect to the module page if updating content
        if ($node->type === 'content' && $node->parent_id) {
            return redirect()->route('documentation.show', $node->parent_id)
                ->with('success', 'Content updated successfully.');
        }

        return redirect()->route('documentation')->with('success', 
            ($node->type === 'module' ? 'Module' : 'Content') . ' updated successfully.');
    }

    public function children()
    {
        return $this->hasMany(Node::class, 'parent_id')->with('children');
    }

    public function show(Node $node)
    {
        return view('nodes.show', compact('node'));
    }

    public function destroy(Node $node)
    {
        // Check if it's a module with children
        if ($node->type === 'module' && $node->children()->count() > 0) {
            return redirect()->route('documentation')
                ->with('error', 'Cannot delete module that contains other items. Please move or delete the contents first.');
        }

        // Store parent_id before deletion for redirect
        $parentId = $node->parent_id;

        // Handle file deletion for content nodes
        if ($node->picture && file_exists(storage_path('app/public/' . $node->picture))) {
            unlink(storage_path('app/public/' . $node->picture));
        }
        
        $node->delete();
        
        // Redirect to parent module if content was deleted
        if ($node->type === 'content' && $parentId) {
            return redirect()->route('documentation.show', $parentId)
                ->with('success', 'Content deleted successfully.');
        }
        
        return redirect()->route('documentation')->with('success', 
            ($node->type === 'module' ? 'Module' : 'Content') . ' deleted successfully.');
    }

    // API endpoint for getting node data (for AJAX)
    public function getNode($id)
    {
        $node = Node::findOrFail($id);
        return response()->json($node);
    }
}