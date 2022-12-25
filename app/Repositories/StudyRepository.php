<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Hash; // 패스워드 암호화
use Illuminate\Support\Facades\DB;

// models
use App\Models\Category;
use App\Models\Post;


// interface
use App\Interfaces\StudyInterface;

class StudyRepository implements StudyInterface {
    public function getStudies($cur_page) {
        return Post::join('users', 'writer', '=', 'users.id')
                    ->join('categories', 'category', '=', 'categories.id')
                    ->where('posts.deleted_at', null)
                    ->latest('posts.created_at')
                    ->select('posts.*', 'categories.language', 'users.user_name as userName')
                    ->paginate(10);
    }

    public function getStudiesCount() {
        return Post::where('deleted_at', null)->count();
    }

    public function getCategories() {
        return Category::where('deleted_at', null)->get(['id','language']);
    }

    public function storeStudyPost($post_data) { // 카테고리 이름으로 아이디 찾아서 리턴
        $category_id = $this->getCategoryId($post_data['category'])->id;
        if($category_id > 0) {
            return Post::create([
                'title' => $post_data['title'],
                'content' => $post_data['content'],
                'writer' => $post_data['writer'],
                'category' => $category_id,
                // 'isPrivate' => $input['private'],
                // 'password' => $input['password'],
            ]);
        }
        return null;
    }

    private function getCategoryId($category_name) { // 카테고리 이름으로 아이디 찾아서 리턴
        return Category::where('language', $category_name)->first();
    }
}