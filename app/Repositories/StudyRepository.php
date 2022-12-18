<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Hash; // 패스워드 암호화

// models
use App\Models\Languages;

// interface
use App\Interfaces\StudyInterface;

class StudyRepository implements StudyInterface {
    
    public function getLanguages() {
        return Languages::where('deleted_at', null)->get(['id','language']);
    }
}