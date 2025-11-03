<?php


class LecturerController
{
    private $lecturers = [
        1 => ['id' => 1, 'name' => 'Joris Maervoet'],
        2 => ['id' => 2, 'name' => 'Pieter Van Peteghem']];

    public function overview() {
        ApiResponse::success(array_values($this->lecturers));
    }

    public function get($id) {
        if (array_key_exists($id, $this->lecturers)) {
            ApiResponse::success($this->lecturers[$id]);
        } else {
            ApiResponse::error('Lecturer not found.', 404); // 404 Not Found.
        }
    }

    public function methodNotAllowed() {
        ApiResponse::error('HTTP request method ' .  $_SERVER['REQUEST_METHOD']. ' not allowed.', 405);
    }

}