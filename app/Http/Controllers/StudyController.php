<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Languages;
use App\Interfaces\StudyInterface;
use App\Http\Resources\LanguageResource;

class StudyController extends Controller
{
    
    public $study;

    public function __construct(StudyInterface $study) {
        $this->study = $study;
    }

    public function index() {
    }

    // 언어 목록 가져오기
    public function loadLang() {
        $languages = $this->study->getLanguages();
        return LanguageResource::collection($languages);
    }

    // 게시글 등록
    public function store(Request $req) {
        dd($req);exit;
    }
}
