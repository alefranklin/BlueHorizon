<?php

    function setActive($self, $actual){
        $self = explode('/',$self);
        $self = end($self);
        return ($self == $actual) ? "active space-font" : "space-font";
    }

?>
