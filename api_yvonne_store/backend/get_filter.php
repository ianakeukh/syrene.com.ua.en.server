<?php 

require '../core/cors.php';
require '../core/db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $Data = json_decode($_POST['data']);

    $type = '';
    $brand = '';
    $seria = '';
    $amount = '';

    if(sizeof($Data->type) > 0)
        $type = implode($Data->type, ',' );

    if(sizeof($Data->brand) > 0)
        $brand = implode($Data->brand, ',');
    
    if(sizeof($Data->seria) > 0)
        $seria = implode($Data->seria, ',');
    
    if(sizeof($Data->amount) > 0)
        $amount = implode($Data->amount, ',');
    
    $sql_type = $type ? " type_id IN ($type)" : "";
    
    $sql_brand = $brand ? " brand_id IN ($brand)" : "";
    $and_brand = $type != "" && $brand != "" ? " AND " : "";
    
    $sql_seria = $seria ? " seria_id IN ($seria)" : "";
    $and_seria = ($type != "" || $brand != "") && $seria != "" ? " AND " : "";
    
    $sql_amount = $amount ? " amount_id IN ($amount)" : "";
    $and_amount = ($type != "" || $brand != "" || $seria != "") && $amount != "" ? " AND " : "";
    
    
    $sql_dry = $Data->dry == 1 ? " dry = '1' " : "";
    $and_dry = ($type != "" || $brand != "" || $seria != "" || $amount != "") && $sql_dry != "" ? " OR " : "";
    
    $sql_fatter = $Data->fatter == 1 ? " fatter = '1' " : "";
    $and_fatter = ($type != "" || $brand != "" || $seria != "" || $amount != "" || $sql_dry != "") && $sql_fatter != "" ? " OR " : "";
    
    $sql_lamina = $Data->lamina == 1 ? " lamina = '1' " : "";
    $and_lamina = ($type != "" || $brand != "" || $seria != "" || $amount != "" || $sql_dry != "" || $sql_fatter != "") && $sql_lamina != "" ? " OR " : "";
    
    $sql_clarified = $Data->clarified == 1 ? " clarified = '1' " : "";
    $and_clarified = ($type != "" || $brand != "" || $seria != "" || $amount != "" || $sql_dry != "" || $sql_fatter != "" || $sql_lamina != "") && $sql_clarified != "" ? " OR " : "";
    
    $sql_alltype = $Data->alltype == 1 ? " alltype = '1' " : "";
    $and_alltype = ($type != "" || $brand != "" || $seria != "" || $amount != "" || $sql_dry != "" || $sql_fatter != "" || $sql_lamina != "" || $sql_clarified != "") && $sql_alltype != "" ? " OR " : "";
    
    
    $sql_health = $Data->health == 1 ? " health = '1' " : "";
    $and_health = ($type != "" || $brand != "" || $seria != "" || $amount != "" || $sql_dry != "" || $sql_fatter != "" || $sql_lamina != "" || $sql_clarified != "" || $sql_alltype != "") && $sql_health != "" ? " OR " : "";
    
    $sql_salon = $Data->salon == 1 ? " salon = '1' " : "";
    $and_salon = ($type != "" || $brand != "" || $seria != "" || $amount != "" || $sql_dry != "" || $sql_fatter != "" || $sql_lamina != "" || $sql_clarified != "" || $sql_alltype != "" || $sql_health != "") && $sql_salon != "" ? " OR " : "";
    
    $sql_reconstraction = $Data->reconstraction == 1 ? " reconstraction = '1' " : "";
    $and_reconstraction = ($type != "" || $brand != "" || $seria != "" || $amount != "" || $sql_dry != "" || $sql_fatter != "" || $sql_lamina != "" || $sql_clarified != "" || $sql_alltype != "" || $sql_health != "" || $sql_salon != "") && $sql_reconstraction != "" ? " OR " : "";
    
    
    $sql_protection = $Data->protection == 1 ? " protection = '1' " : "";
    $and_protection = ($type != "" || $brand != "" || $seria != "" || $amount != "" || $sql_dry != "" || $sql_fatter != "" || $sql_lamina != "" || $sql_clarified != "" || $sql_alltype != "" || $sql_health != "" || $sql_salon != "" || $sql_reconstraction != "") &&  $sql_protection != "" ? " OR " : "";
    
    
    $sql_coloring = $Data->coloring == 1 ? " coloring = '1' " : "";
    $and_coloring = ($type != "" || $brand != "" || $seria != "" || $amount != "" || $sql_dry != "" || $sql_fatter != "" || $sql_lamina != "" || $sql_clarified != "" || $sql_alltype != "" || $sql_health != "" || $sql_salon != "" || $sql_reconstraction != "" || $sql_protection != "") &&  $sql_coloring != "" ? " OR " : "";
    
    $sql_stratening = $Data->stratening == 1 ? " stratening = '1' " : "";
    $and_stratening = ($type != "" || $brand != "" || $seria != "" || $amount != "" || $sql_dry != "" || $sql_fatter != "" || $sql_lamina != "" || $sql_clarified != "" || $sql_alltype != "" || $sql_health != "" || $sql_salon != "" || $sql_reconstraction != "" || $sql_protection != "" || $sql_coloring != "" ) &&  $sql_stratening != "" ? " OR " : "";
    
    
    $sql_natural = $Data->natural == 1 ? " natural = '1' " : "";
    $and_natural = ($type != "" || $brand != "" || $seria != "" || $amount != "" || $sql_dry != "" || $sql_fatter != "" || $sql_lamina != "" || $sql_clarified != "" || $sql_alltype != "" || $sql_health != "" || $sql_salon != "" || $sql_reconstraction != "" || $sql_protection != "" || $sql_coloring != "" || $sql_stratening != "" ) &&  $sql_natural != "" ? " OR " : "";
    
    $sql_curl = $Data->curl == 1 ? " curl = '1' " : "";
    $and_curl = ($type != "" || $brand != "" || $seria != "" || $amount != "" || $sql_dry != "" || $sql_fatter != "" || $sql_lamina != "" || $sql_clarified != "" || $sql_alltype != "" || $sql_health != "" || $sql_salon != "" || $sql_reconstraction != "" || $sql_protection != "" || $sql_coloring != "" || $sql_stratening != "" || $sql_natural != "") &&  $sql_curl != "" ? " OR " : "";
    
    
    $sql_skin = $Data->skin == 1 ? " skin = '1' " : "";
    $and_skin = ($type != "" || $brand != "" || $seria != "" || $amount != "" || $sql_dry != "" || $sql_fatter != "" || $sql_lamina != "" || $sql_clarified != "" || $sql_alltype != "" || $sql_health != "" || $sql_salon != "" || $sql_reconstraction != "" || $sql_protection != "" || $sql_coloring != "" || $sql_stratening != "" || $sql_natural != "" || $sql_curl != "") &&  $sql_skin != "" ? " OR " : "";
    
    $sql_yellow = $Data->yellow == 1 ? " yellow = '1' " : "";
    $and_yellow = ($type != "" || $brand != "" || $seria != "" || $amount != "" || $sql_dry != "" || $sql_fatter != "" || $sql_lamina != "" || $sql_clarified != "" || $sql_alltype != "" || $sql_health != "" || $sql_salon != "" || $sql_reconstraction != "" || $sql_protection != "" || $sql_coloring != "" || $sql_stratening != "" || $sql_natural != "" || $sql_curl != "" || $sql_skin != "") &&  $sql_yellow != "" ? " OR " : "";
    
    
    $sql_volume = $Data->volume == 1 ? " volume = '1' " : "";
    $and_volume = ($type != "" || $brand != "" || $seria != "" || $amount != "" || $sql_dry != "" || $sql_fatter != "" || $sql_lamina != "" || $sql_clarified != "" || $sql_alltype != "" || $sql_health != "" || $sql_salon != "" || $sql_reconstraction != "" || $sql_protection != "" || $sql_coloring != "" || $sql_stratening != "" || $sql_natural != "" || $sql_curl != "" || $sql_skin != "" || $sql_yellow != "") &&  $sql_volume != "" ? " OR " : "";
    
    $sql_sebo = $Data->sebo == 1 ? " sebo = '1' " : "";
    $and_sebo = ($type != "" || $brand != "" || $seria != "" || $amount != "" || $sql_dry != "" || $sql_fatter != "" || $sql_lamina != "" || $sql_clarified != "" || $sql_alltype != "" || $sql_health != "" || $sql_salon != "" || $sql_reconstraction != "" || $sql_protection != "" || $sql_coloring != "" || $sql_stratening != "" || $sql_natural != "" || $sql_curl != "" || $sql_skin != "" || $sql_yellow != "" || $sql_volume != "") &&  $sql_sebo != "" ? " OR " : "";
    
    $sql_lupa = $Data->lupa == 1 ? " lupa = '1' " : "";
    $and_lupa = ($type != "" || $brand != "" || $seria != "" || $amount != "" || $sql_dry != "" || $sql_fatter != "" || $sql_lamina != "" || $sql_clarified != "" || $sql_alltype != "" || $sql_health != "" || $sql_salon != "" || $sql_reconstraction != "" || $sql_protection != "" || $sql_coloring != "" || $sql_stratening != "" || $sql_natural != "" || $sql_curl != "" || $sql_skin != "" || $sql_yellow != "" || $sql_volume != "" || $sql_sebo != "" ) &&  $sql_lupa != "" ? " OR " : "";
    
    $sql_loss = $Data->loss == 1 ? " loss = '1' " : "";
    $and_loss = ($type != "" || $brand != "" || $seria != "" || $amount != "" || $sql_dry != "" || $sql_fatter != "" || $sql_lamina != "" || $sql_clarified != "" || $sql_alltype != "" || $sql_health != "" || $sql_salon != "" || $sql_reconstraction != "" || $sql_protection != "" || $sql_coloring != "" || $sql_stratening != "" || $sql_natural != "" || $sql_curl != "" || $sql_skin != "" || $sql_yellow != "" || $sql_volume != "" || $sql_sebo != "" || $sql_lupa != "") && $sql_loss != "" ? " OR " : "";
    
    $sql_woman = $Data->woman == 1 ? " woman = '1' " : "";
    $and_woman = ($type != "" || $brand != "" || $seria != "" || $amount != "" || $sql_dry != "" || $sql_fatter != "" || $sql_lamina != "" || $sql_clarified != "" || $sql_alltype != "" || $sql_health != "" || $sql_salon != "" || $sql_reconstraction != "" || $sql_protection != "" || $sql_coloring != "" || $sql_stratening != "" || $sql_natural != "" || $sql_curl != "" || $sql_skin != "" || $sql_yellow != "" || $sql_volume != "" || $sql_sebo != "" || $sql_lupa != "" || $sql_loss != "") && $sql_woman != "" ? " OR " : "";
    
    $sql_man = $Data->man == 1 ? " man = '1' " : "";
    $and_man = ($type != "" || $brand != "" || $seria != "" || $amount != "" || $sql_dry != "" || $sql_fatter != "" || $sql_lamina != "" || $sql_clarified != "" || $sql_alltype != "" || $sql_health != "" || $sql_salon != "" || $sql_reconstraction != "" || $sql_protection != "" || $sql_coloring != "" || $sql_stratening != "" || $sql_natural != "" || $sql_curl != "" || $sql_skin != "" || $sql_yellow != "" || $sql_volume != "" || $sql_sebo != "" || $sql_lupa != "" || $sql_loss != "" || $sql_woman != "") && $sql_man != "" ? " OR " : "";
    
    
    $sql_child = $Data->child == 1 ? " child = '1' " : "";
    $and_child = ($type != "" || $brand != "" || $seria != "" || $amount != "" || $sql_dry != "" || $sql_fatter != "" || $sql_lamina != "" || $sql_clarified != "" || $sql_alltype != "" || $sql_health != "" || $sql_salon != "" || $sql_reconstraction != "" || $sql_protection != "" || $sql_coloring != "" || $sql_stratening != "" || $sql_natural != "" || $sql_curl != "" || $sql_skin != "" || $sql_yellow != "" || $sql_volume != "" || $sql_sebo != "" || $sql_lupa != "" || $sql_loss != "" || $sql_woman != "" || $sql_man != "") && $sql_child != "" ? " OR " : "";
    
    $where = '';
    
    
    if($type != '' || $brand != '' || $seria != '' || $amount != '' || $Data->dry != '' || $Data->fatter != '' || $Data->lamina != '' || $Data->clarified != '' || $Data->alltype != '' || $Data->health != '' || $Data->salon != '' || $Data->reconstraction != '' || $Data->protection != '' || $Data->coloring != '' || $Data->stratening != '' || $Data->natural != '' || $Data->curl != '' || $Data->skin != '' || $Data->yellow != '' || $Data->volume != '' || $Data->sebo != '' || $Data->lupa != '' || $Data->loss != '' || $Data->woman != '' || $Data->man != '' || $Data->child != '')
    
    {
        $where = 'WHERE';
    }

    $price_params = '';

    if($Data->price_from != '' && $Data->price_to != '' && $where != '')
        $price_params = " AND price BETWEEN " . $Data->price_from . " AND " . $Data->price_to;
    else if($Data->price_from != '' && $Data->price_to != '' && $where == '')
        $price_params = " WHERE price BETWEEN " . $Data->price_from . " AND " . $Data->price_to;
    else if($Data->price_from != '' && $where == '')
        $price_params = " WHERE price > " . $Data->price_from;
    else if($Data->price_from != '' && $where != '')
        $price_params = " AND price > " . $Data->price_from;
    else if($Data->price_to != '' && $where == '')
        $price_params = " WHERE price < " . $Data->price_to;
    else if($Data->price_to != '' && $where != '')
        $price_params = " AND price < " . $Data->price_to;
   



    
    $sql_query = "products " . $where . $sql_type . $and_brand . $sql_brand . $and_seria . $sql_seria . $and_amount . $sql_amount . $and_dry . $sql_dry . $and_fatter . $sql_fatter . $and_lamina . $sql_lamina . $and_clarified . $sql_clarified . $and_alltype . $sql_alltype . $and_health . $sql_health . $and_salon . $sql_salon . $and_reconstraction . $and_protection . $sql_protection . $and_coloring . $sql_coloring . $and_stratening . $sql_stratening . $and_natural . $sql_natural . $and_curl . $sql_curl . $and_skin . $sql_skin . $and_yellow . $sql_yellow . $and_volume . $sql_volume . $and_sebo . $sql_sebo . $and_lupa . $sql_lupa . $and_loss . $sql_loss . $and_woman . $sql_woman . $and_man . $sql_man . $and_child . $sql_child . $price_params; 
    
    $Res = DB::getAll($sql_query);
    
    // echo $sql_query;
   
    echo $Res ? json_encode($Res) : "[]";
    
}

?>