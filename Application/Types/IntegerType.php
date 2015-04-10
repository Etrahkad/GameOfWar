<?php

namespace Application\Types;

/**
 * Description of IntegerType
 *
 * @author tdubois
 */
abstract class IntegerType extends AbstractType {
    /**
     * Get the Type Value
     * @return integer
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set the value
     * @param type $typeIndex
     */
    public function setType($typeIndex) {
        $this->type = $typeIndex;
    }

}
