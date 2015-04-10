<?php

namespace Application\Structures;

/**
 * The top interface for all forms of structures used
 *
 * @author tdubois
 */
abstract class Container {
    public abstract function getArray();
    public abstract function setArray(Container $container);
}
