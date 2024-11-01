<?php
class Queue {
    private $queue;
    private $limit;

    public function __construct($limit = 20) {
        $this->queue = [];
        $this->limit = $limit;
    }

    public function enqueue($item) {
        // Check if the queue has reached its limit
        if (count($this->queue) < $this->limit) {
            array_push($this->queue, $item);
        } else {
            echo "Queue is full!";
        }
    }

    public function dequeue() {
        // Check if the queue is empty before removing
        if (!$this->isEmpty()) {
            return array_shift($this->queue);
        } else {
            return "Queue is empty!";
        }
    }

    public function peek() {
        // Check if the queue is empty before peeking
        if (!$this->isEmpty()) {
            return $this->queue[0];
        } else {
            return "Queue is empty!";
        }
    }

    public function isEmpty() {
        return empty($this->queue);
    }

    public function size() {
        return count($this->queue);
    }

    public function display() {
        return $this->queue;
    }
}

// Example Usage
$queue = new Queue();
$queue->enqueue(100);
$queue->enqueue(150);
$queue->enqueue(400);

echo "Queue after enqueues: ";
print_r($queue->display());

echo "Dequeued element: " . $queue->dequeue() ;

echo "Queue after dequeue: ";
print_r($queue->display());

echo "Peek element: " . $queue->peek() ;

echo "Queue size: " . $queue->size() ;
?>