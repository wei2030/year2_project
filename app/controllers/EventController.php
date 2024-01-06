<?php

class EventController extends Controller {
    public function __construct() {
        $this->eventModel = $this->model('EventModel');
    }

    public function getEventsForMonth($year, $month) {
        $events = $this->eventModel->getEventsForMonth($year, $month);
        echo json_encode($events);
    }
}
