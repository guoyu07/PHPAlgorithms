<?php
/**
 * MIT License
 *
 * Copyright (c) 2018 Dogan Ucar
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace doganoo\PHPAlgorithms\Datastructure\Graph\Graph;

use doganoo\PHPAlgorithms\Common\Abstracts\AbstractGraph;

/**
 * Class Graph
 *
 * @package doganoo\PHPAlgorithms\Graph
 */
class UndirectedGraph extends AbstractGraph {

    /**
     * DirectedGraph constructor.
     *
     * @throws \doganoo\PHPAlgorithms\common\exception\InvalidGraphTypeException
     */
    public function __construct() {
        parent::__construct(self::UNDIRECTED_GRAPH);
    }


    public function addNode(Node $node): bool {
        return $this->nodeList->add($node);
    }

    /**
     * @param Node $startNode
     * @param Node $endNode
     * @return bool
     * @throws \doganoo\PHPAlgorithms\Common\Exception\IndexOutOfBoundsException
     */
    public function addEdge(Node $startNode, Node $endNode): bool {
        $hasStart = $this->nodeList->containsValue($startNode);
        $hasEnd = $this->nodeList->containsValue($endNode);
        if (false === $hasStart) {
            //TODO notify caller
            return false;
        }
        if (false === $hasEnd) {
            //TODO notify caller
            return false;
        }
        $indexOfStartNode = $this->nodeList->indexOf($startNode);
        /** @var Node $startNode */
        $startNode = $this->nodeList->get($indexOfStartNode);
        $indexOfEndNode = $this->nodeList->indexOf($endNode);
        /** @var Node $endNode */
        $endNode = $this->nodeList->get($indexOfEndNode);

        if ($startNode->hasAdjacent($endNode)) {
            //TODO notify caller
            return false;
        }
        $startNode->addAdjacent($endNode);

        $this->nodeList->set($indexOfStartNode, $startNode);
        return true;
    }
}