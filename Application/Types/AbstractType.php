<?php

namespace Application\Types;

/**
 * Defines basic function to force declaration of specific functions needed
 *
 * @author tdubois
 */
abstract class AbstractType {
    /**
     * @var integer 
     */
    protected $type = 0;
    
    public function __construct($typeIndex) {
        $this->type = $typeIndex;
    }
    
    public abstract function getType();
    public abstract function setType($typeIndex);
    
    /**
     * Return the String type conversion
     * @return String
     */
    public abstract function getTypeString();
    
    /**
     * Get the Word associated with the value
     * @return String
     */
    public function __toString() {
        return $this->getTypeString();
    }
}
