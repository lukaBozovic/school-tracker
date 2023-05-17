<?php

namespace App\Traits;

use App\Models\Document;
use Illuminate\Database\Eloquent\Relations\MorphMany;

Trait Documentable
{
    public function documents(): MorphMany
    {
        return $this->morphMany(Document::class, 'documentable');
    }
}
