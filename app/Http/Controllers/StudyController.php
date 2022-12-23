<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Languages;
use App\Models\Post;
use App\Interfaces\StudyInterface;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\StudyResource;
use App\Http\Requests\StudyStoreRequest;

class StudyController extends Controller
{
    
    public $study;

    public function __construct(StudyInterface $study) {
        $this->study = $study;
    }

    public function index(Request $req) {
        $posts = $this->getStudies($req->page);
        // $postCount = $this->study->getStudiesCount();
        $data = StudyResource::collection($posts);
        $linkdata = array(
            'perPage' => $posts->perPage(),
            'currentPage' => $posts->currentPage(),
            'lastPage' => $posts->lastPage(),
            'total' => $posts->total(),
        );

        return response()->json(array($data, $linkdata));
    }

    public function getStudies($page) {
        return $this->study->getStudies($page);
    }

    // 언어 목록 가져오기
    public function getCategory(Request $req) {
        $languages = $this->study->getCategories();
        return CategoryResource::collection($languages);
    }

    // 게시글 등록
    public function store(StudyStoreRequest $req) {
        $validatedData = $req->validated();
        // $validatedData['writer'] = $req->session()->get('userpid');
        $validatedData['writer'] = 1;
        // echo $qq;exit;

        $post = $this->study->storeStudyPost($validatedData);
        return response()->json($post->id);
        // return StudyResource::collection($languages);
    }
}
