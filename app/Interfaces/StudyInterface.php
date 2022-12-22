<?php

namespace App\Interfaces;

interface StudyInterface {
    public function getCategories();

    public function storeStudyPost($post_data);
}
?>