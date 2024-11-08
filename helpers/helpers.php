<?php
if (! function_exists('formatDate')) {
    function formatDate($date)
    {
        $date=\Carbon\Carbon::parse($date)->format('d-m-Y H:i:s');
        return $date;
    }
}
if (! function_exists('formatDateNew')) {
    function formatDateNew($date)
    {
        if($date!="" || $date!=null)
            $date=\Carbon\Carbon::parse($date)->format('d-m-Y H:i:s');
        return $date;
        
    }
}

if (! function_exists('formatDateHIS')) {
    function formatDateHIS($date)
    {
        
        $date=\Carbon\Carbon::parse($date)->format('H:i:s d-m-Y');
        
        return $date;
    }
}
if (! function_exists('formatDateAll')) {
    function formatDateAll($date)
    {
        if($date !=""){
            $date=\Carbon\Carbon::parse($date)->format('d-m-Y');
        }else{
            $date="";
        }
        
        return $date;
    }
}
if (! function_exists('formatDateAllNew')) {
    function formatDateAllNew($date)
    {
        if($date !=""){
            $date=\Carbon\Carbon::parse($date)->format('d/m/Y');
        }else{
            $date="";
        }
        
        return $date;
    }
}
if (! function_exists('formatDateM')) {
    function formatDateM()
    {
        $date=\Carbon\Carbon::now()->format('m-Y');
      
        return $date;
    }
}
if (!function_exists('numberFormatMoney')) {
    function numberFormatMoney($num)
    {
        $money=number_format($num,0,",",".");
      
        return $money;
    }
}
if (! function_exists('renderMenu')) {
    function renderMenu($items) {
        $render = '<ul>';
        foreach ($items as $item) {
           
            if (!empty($item->children)) {
                $render .= '<li><span><i class="fa fa-minus-square"></i><a target="_blank" style="color:black" href='.route("accounts.detail",["id"=> $item->acc_id_target]).'> '.$item->chucvu_code.'_'.$item->acc_fullname.'</a>: '.numberFormatMoney($item->dsqd_sale+$item->dsqd_sale1). '<br> NHÓM: '.numberFormatMoney($item->dsqd_nhom+$item->dsqd_nhom1).'</span> ';
                $render .= renderMenu($item->children);
            }else{
                $render .= '<li><span><a target="_blank" style="color:black" href='.route("accounts_business.detail",["id"=> $item->acc_id_target]).'> '.$item->chucvu_code.'_'.$item->acc_fullname.'</a>: '.numberFormatMoney($item->dsqd_sale+$item->dsqd_sale1). '<br> NHÓM: '.numberFormatMoney($item->dsqd_nhom+$item->dsqd_nhom1).'</span> ';
              
            }
            $render .= '</li>';
        }
    
        return $render . '</ul>';
    }
}
if (! function_exists('renderTable')) {
    function renderTable($items) {
        $render = '';
        foreach ($items as $item) {
           
            if (!empty($item->children)) {
                $render .= '<td>'.$item->chucvu_code.'_'.$item->acc_fullname;
                $render .= renderTable($item->children);
            }else{
                $render .= '<td>'.$item->chucvu_code.'_'.$item->acc_fullname;
              
            }
            $render .= '</td>';
        }
    
        return $render ;
    }
}
if (! function_exists('nameBalanceLogs')) {
    function nameBalanceLogs($code)
    {
        switch ($code) {
            case '1000':
                echo 'Nạp tiền qua bank';
                break;
            case '1100':
                echo 'Cộng tiền bởi admin';
                break;
            case '2000':
                echo 'Rút tiền';
                break;
            case '2100':
                echo 'Mua sản phẩm';
                break; 
            case '2200':
                echo 'Trừ tiền bởi admin';
                break; 
                   
            default:
                # code...
                break;
            }
    }
}
if (! function_exists('balanceRequest')) {
    function balanceRequest($code)
    {
       switch ($code) {
           case '1100':
               echo '';
               break;
           case '2100':
               echo '';
               break;
           case '2000':
               echo '';
               break;
           default:
               # code...
               break;
       }
    }
}
if (! function_exists('settingMess')) {
    function settingMess($code)
    {

       switch ($code) {
           case '1':
               echo 'Sinh nhật';
               break;
           case '2':
               echo 'Tết dương';
               break;
           case '3':
               echo 'Tết âm';
               break;
            case '4':
                echo 'Noen';
                break;
            case '5':
                echo 'Quốc khánh';
                break;
            case '6':
                echo 'Giải phóng miền Nam';
                break;
            case '7':
                echo 'Quốc tế Lao động 1/5';
                break;
            case '8':
                echo 'Giỗ tổ';
                break;
            case '9':
                echo 'Quốc tế Phụ nữ';
                break;
            case '10':
                echo 'Ngày Doanh nhân Việt Nam';
                break;
            case '11':
                echo 'Tết Hàn Thực';
                break; 
            case '12':
                echo 'Lễ Vu Lan';
                break; 
            case '13':
                echo 'Tết Trung Thu';
                break;
            case '14':
                echo 'Sinh nhật Công ty';
                break;
            case '15':
                echo 'Ngày thành lập Hội Phụ nữ Việt Nam';
                break;
               
           default:
               break;
       }
    }
}
?>