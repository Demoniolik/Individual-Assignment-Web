<?php 
    function setSpecialPropositionStatus($specialProposition) {
        $result;

        switch ($specialProposition) {
            case "Закінчується":
                $result = "limited";
                break;
            case "Знижка": 
                $result = "sale";
                break;
            case "Хіт продажу": 
                $result = "best_seller";
                break;
        }
        return $result;   
    }
?>