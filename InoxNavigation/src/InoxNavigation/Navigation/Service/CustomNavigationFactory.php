<?php

namespace InoxNavigation\Navigation\Service;

use Zend\Navigation\Service\AbstractNavigationFactory;

class CustomNavigationFactory extends AbstractNavigationFactory {

    /**
     *
     * @var string
     */
    protected $name;

    /**
     * 
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * 
     * @param string $name
     * @return CustomNavigationFactory
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

}