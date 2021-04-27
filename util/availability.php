<?php 
    function setAvailabilityValue($availability) {
        $result;

        if ($availability == 1) {
            $result = "Есть в наличи";
        } else {
            $result = "Нету в наличи";
        }
        return $result;
    }

    function setAvailabilityStatus($availability) {
        $result;

        if ($availability == 0) {
            $result = "not_available";
        } else {
            $result = "available";
        }
        return $result;
    }
?>