<?php

function dashboard_panel($reports, $column, $action){

    if (isset($reports[0]["{$column}"])) {

        switch ($action) {
            case 'sum':
                
                $dashboard[$column] = 0;

                foreach ($reports as $index => $report) {
                             
                    $dashboard[$column] += $report[$column];
                    
                }
                
                break;

            case 'average':
            
                $dashboard[$column] = 0;

                foreach ($reports as $index => $report) {
                                
                    $dashboard[$column] += $report[$column];
                    
                }

                $index++;

                $dashboard[$column] = $dashboard[$column] / $index;
                break;

            case 'total':
        
                $dashboard['total'] = count($reports);

                break;

        }

    }else{

        return "Column doesn't exist!";

    }

    return $dashboard;

}