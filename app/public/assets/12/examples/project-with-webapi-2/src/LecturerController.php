<?php


class LecturerController extends ApiBaseController
{
    private $lecturers = [
        1 => ['id' => 1, 'name' => 'Joris Maervoet'],
        2 => ['id' => 2, 'name' => 'Pieter Van Peteghem']];

    public function overview() {
        echo json_encode(['lecturers' => array_values($this->lecturers)]);
    }

    public function get($id) {
        if (array_key_exists($id, $this->lecturers)) {
            echo json_encode($this->lecturers[$id]);
        } else {
            $this->message(404, 'Lecturer not found.' );// 404 Not Found.
        }
    }

}