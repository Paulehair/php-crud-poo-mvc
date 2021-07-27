<?php

namespace Controller;

class CommentController {
    public function addComment() {
        $this->view->addComment('addComment');
    }
    public function deleteComment() {
        $this->view->deleteComment('deleteComment');
    }
}