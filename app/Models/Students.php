<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function studentClassSection()
    {
        return $this->belongsTo(ClassSections::class, 'class_section_id');
    }

    public function parents()
    {
        return $this->belongsToMany(Parents::class, 'parent_student', 'student_id', 'parent_id');
    }

    public function getParentNamesAttribute()
    {
        if ($this->parents->isEmpty()) {
            return 'Unknown';
        }

        // Join parent names with a comma
        return $this->parents->pluck('full_name')->join(', ');
    }
}
