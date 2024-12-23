<?php

function list_items($model, $condition, $order, $sort){

    /* Examples on the controller:

    Condition format:   $condition['id', '123']
    Order format:       $order = "date"
    Sort format:  $sort = "desc" 
                        $sort = "asc"
    
    */

    if (isset($order)) {

        if (isset($sort)) {
        
            if (isset($condition)) {
    
                $list = $model->orderBy($order, $sort)->where($condition)->findAll();
                return $list;

            }
        
            $list = $model->orderBy($order, $sort)->findAll();
            return $list;
    
        }

        if (isset($condition)) {
    
            $list = $model->orderBy($order)->where($condition)->findAll();
            return $list;

        }
        
    }

    if (isset($condition)) {
        
        $list = $model->where($condition)->findAll();
        return $list;	

    }

    $list = $model->findAll();
    return $list;

}