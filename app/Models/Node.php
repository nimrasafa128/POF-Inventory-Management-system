<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
   
    protected $fillable = [
        'parent_id',
        'type',
        'heading',
        'subheading',
        'paragraph1',
        'paragraph2',
        'paragraph3',
        'picture'
    ];

    public function parent()
    {
        return $this->belongsTo(Node::class, 'parent_id');
    }

 public function children()
    {
        return $this->hasMany(Node::class, 'parent_id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }


}
