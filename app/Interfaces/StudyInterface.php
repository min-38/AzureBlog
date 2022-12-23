<?php

namespace App\Interfaces;

interface StudyInterface {
    public function getCategories();

    public function getStudies();

    public function getStudiesCount();

    public function storeStudyPost($post_data);
}
?>