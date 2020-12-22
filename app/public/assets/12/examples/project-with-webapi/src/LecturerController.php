<?php


class LecturerController extends ApiBaseController
{
    private $lecturers = [
        1 => ['id' => 1, 'name' => 'Joris Maervoet'],
        2 => ['id' => 2, 'name' => 'Pieter Van Peteghem']];

    protected function overview($urlParams, $bodyParams) {
        return ['lecturers' => array_values($this->lecturers)];
    }

    protected function get($urlParams, $bodyParams, $id) {
        if (array_key_exists($id, $this->lecturers)) {
            return $this->lecturers[$id];
        } else {
            http_response_code(404); // 404 Not Found.
            return ['message' => 'Lecturer not found.'];
        }
    }

}