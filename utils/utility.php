<?php

    function setActive($self, $actual){
        $self = explode('/',$self);
        $self = end($self);
        if($self == $actual)    echo "active ";
    }

?>