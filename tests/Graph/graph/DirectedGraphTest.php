<?php


use doganoo\PHPAlgorithms\Datastructure\Graph\Graph\DirectedGraph;
use doganoo\PHPAlgorithms\Datastructure\Graph\Graph\Node;

class DirectedGraphTest extends \PHPUnit\Framework\TestCase {

    public function testAdd() {
        $graph = new DirectedGraph();
        $this->assertTrue($graph->addNode(new Node(1)) === true);
    }

}