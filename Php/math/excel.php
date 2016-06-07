<?php
    
    /*三种execl导出方式*/

    /*方法1*/
    function download($data, $fileName)
    {
        $fileName = $this->_charset($fileName);
        header("Content-Type: application/vnd.ms-excel; charset=gbk");
        header("Content-Disposition: inline; filename=\"" . $fileName . ".xls\"");
        echo "<?xml version=\"1.0\" encoding=\"gbk\"?>\n
            <Workbook xmlns=\"urn:schemas-microsoft-com:office:spreadsheet\"
            xmlns:x=\"urn:schemas-microsoft-com:office:excel\"
            xmlns:ss=\"urn:schemas-microsoft-com:office:spreadsheet\"
            xmlns:html=\"http://www.w3.org/TR/REC-html40\">";
        echo "\n<Worksheet ss:Name=\"" . $fileName . "\">\n<Table>\n";
        $guard = 0;
        foreach($data as $v)
        {
            $guard++;
            if($guard==$this->limit)
            {
                ob_flush();
                flush();
                $guard = 0;
            }
            echo $this->_addRow($this->_charset($v));
        }
        echo "</Table>\n</Worksheet>\n</Workbook>";
    }

    function _addRow($row)
    {
        $cells = "";
        foreach ($row as $k => $v)
        {
            $cells .= "<Cell><Data ss:Type=\"String\">" . $v . "</Data></Cell>\n";
        }
        return "<Row>\n" . $cells . "</Row>\n";
    }
     
    function _charset($data)
    {
        if(!$data)
        {
            return false;
        }
        if(is_array($data))
        {
            foreach($data as $k=>$v)
            {
                $data[$k] = $this->_charset($v);
            }
            return $data;
        }
        return iconv('utf-8', 'gbk', $data);
    }


    /*方法2*/
    function mkexcel_attendee()
    {
        //header("content-type:text/html;charset=utf-8");
        $file_type = "vnd.ms-excel";  // excel表头固定写法
        $file_ending = "xls"; // excel表的后缀名
        header("Content-Type: application/$file_type"); 
        header("Content-Disposition: attachment; filename=attendee.$file_ending"); // agentfile到处的表名
        header("Pragma: no-cache"); // 缓存
        header("Expires: 0");
        $rs=M('user')->select();
        ?>
<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:x='urn:schemas-microsoft-com:office:excel'  
xmlns='http://www.w3.org/TR/REC-html40'>  
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>    
    <head>  
        <meta http-equiv='Content-type' content='text/html;charset=utf-8' />  
        <style id='Classeur1_16681_Styles'></style>  
    </head>  
    <body>
        <div id='Classeur1_16681' align=center x:publishsource='Excel'>
        <table border="1" cellpadding="0" cellspacing="0">
        <tr>
            <th>编号</th>
            <th>所属公司</th>
            <th>姓名</th>
            <th>性别</th>
            <th>生日</th>
            <th>电话</th>
            <th>邮箱</th>
            <th>职位</th>
            <th>到达目的地航班号</th>
            <th>到达时间</th>
            <th>离开目的地航班号</th>
            <th>离开时间</th>
            <th>用房要求</th>
            <th>用餐要求</th>
            <th>助手姓名</th>
            <th>助手电话</th>
            <th>助手邮箱</th>
        </tr>   
        <?php
        foreach($rs as $val)
        {
            $cname=M('company')->where('id='.$val['cid'])->getField('cname');
        ?>
    <tr>
        <td style="font-size:16px; text-align:center;"><?php echo $val['id']?></td>
        <td style="font-size:16px; text-align:center;"><?php echo $cname?></td>
        <td style="font-size:16px; text-align:center;"><?php echo $val['name']?></td>
        <?php
        if($val['sex']==0)
        {
        ?>
            <td style="font-size:16px; text-align:center;">男</td>
        <?php   
        }
        else
        {
        ?>
            <td style="font-size:16px; text-align:center;">女</td>
        <?php       
        }
        ?>
        <td style="font-size:16px; text-align:center;"><?php echo date('Y-m-d',$val['birthday'])?></td>
        <td style="font-size:16px; text-align:center;"><?php echo $val['tel']?></td>
        <td style="font-size:16px; text-align:center;"><?php echo $val['email']?></td>
        <td style="font-size:16px; text-align:center;"><?php echo $val['position']?></td>
        <td style="font-size:16px; text-align:center;"><?php echo $val['cNumber']?></td>
        <td style="font-size:16px; text-align:center;"><?php echo date('Y-m-d H:i',$val['cendTime'])?></td>
        <td style="font-size:16px; text-align:center;"><?php echo $val['lNumber']?></td>
        <td style="font-size:16px; text-align:center;"><?php echo date('Y-m-d H:i',$val['lstartTime'])?></td>
        <?php
        if($val['house']==0)
        {
        ?>
            <td style="font-size:16px; text-align:center;">无烟</td>
        <?php   
        }
        else
        {
        ?>
            <td style="font-size:16px; text-align:center;">有烟</td>
        <?php   
        }
        ?>
        <td style="font-size:16px; text-align:center;"><?php echo $val['dinner']?></td>
        <td style="font-size:16px; text-align:center;"><?php echo $val['gmName']?></td>
        <td style="font-size:16px; text-align:center;"><?php echo $val['gmTel']?></td>
        <td style="font-size:16px; text-align:center;"><?php echo $val['gmEmail']?></td>
    </tr>
        <?php 
        }
         ?>
    <?php 
        echo "</table></div></body></html> ";
    }

    /*方法3 phpexecl 兼容性最好*/
    function export_execl()
    {
        //APISURL.
        //$url = "http://apis.59hw.com/index.php/finance/order_complete/month/{$_GET['month']}/status/{$_GET['status']}";
        $url = APISURL."/finance/order_complete/month/{$_GET['month']}/status/{$_GET['status']}";
        $list = json_decode(CurlGet($url), true);

        require_once(ROOT.'/open/PHPExcel/Classes/PHPExcel.php');
        require_once(ROOT.'/open/PHPExcel/Classes/PHPExcel/Writer/Excel2007.php');

        $objExcel = new PHPExcel(); 
        $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
        $objProps = $objExcel->getProperties(); 
        $objProps->setCreator("huiwan");
        $objProps->setTitle("收款登记表_".$_GET['month']);
        $objExcel->setActiveSheetIndex(0); 

        $objActSheet = $objExcel->getActiveSheet();  
        $objActSheet->getColumnDimension('A')->setWidth(20); 
        $objActSheet->getColumnDimension('B')->setWidth(20); 
        $objActSheet->getColumnDimension('C')->setWidth(20); 
        $objActSheet->getColumnDimension('D')->setWidth(20); 
        $objActSheet->getColumnDimension('E')->setWidth(20); 
        $objActSheet->getColumnDimension('F')->setWidth(20); 
        $objActSheet->getColumnDimension('G')->setWidth(20); 
        $objActSheet->getColumnDimension('H')->setWidth(20); 
        $objActSheet->getColumnDimension('I')->setWidth(20); 
        $objActSheet->getColumnDimension('J')->setWidth(20); 
        $objActSheet->getColumnDimension('K')->setWidth(20); 
        $objActSheet->getColumnDimension('L')->setWidth(20); 
        $objActSheet->getColumnDimension('M')->setWidth(20); 
        $objActSheet->getColumnDimension('N')->setWidth(20); 
        $objActSheet->getColumnDimension('O')->setWidth(20); 
        $objActSheet->getColumnDimension('P')->setWidth(20); 
        $objActSheet->getColumnDimension('Q')->setWidth(20);
        $objActSheet->getColumnDimension('R')->setWidth(20);
        $objActSheet->getColumnDimension('S')->setWidth(20);
        $objActSheet->getColumnDimension('T')->setWidth(20);  
        
        $objActSheet->setCellValue('A1', '序号');
        $objActSheet->setCellValue('B1', '订单编号');
        $objActSheet->setCellValue('C1', '订单时间'); 
        $objActSheet->setCellValue('D1', '客户姓名'); 
        $objActSheet->setCellValue('E1', '目的地'); 
        $objActSheet->setCellValue('F1', '出行时间');
        $objActSheet->setCellValue('G1', '人数'); 
        $objActSheet->setCellValue('H1', '服务类型'); 
        $objActSheet->setCellValue('I1', '渠道'); 
        $objActSheet->setCellValue('J1', '自定义'); 
        $objActSheet->setCellValue('K1', '收款金额(RMB)');
        $objActSheet->setCellValue('L1', '收款方式'); 
        $objActSheet->setCellValue('M1', '业务经办人'); 
        $objActSheet->setCellValue('N1', '客户支付(RMB)');
        $objActSheet->setCellValue('O1', '平台补贴(RMB)'); 
        $objActSheet->setCellValue('P1', '到账时间'); 
        $objActSheet->setCellValue('Q1', '支出金额');
        $objActSheet->setCellValue('R1', '收款单位');
        $objActSheet->setCellValue('S1', '支出时间');
        $objActSheet->setCellValue('T1', '支出方式');
        
        foreach($list['orderInfo'] as $key => $value)
        {
            $i = $key + 2;
            $objActSheet->setCellValue('A'.$i, $value['id']);
            $objActSheet->setCellValue('B'.$i, $value['order_code']);
            $objActSheet->setCellValue('C'.$i, $value['create_time']); 
            $objActSheet->setCellValue('D'.$i, $value['name']); 
            $objActSheet->setCellValue('E'.$i, $value['city']); 
            $objActSheet->setCellValue('F'.$i, $value['start_date']); 
            $objActSheet->setCellValue('G'.$i, $value['number']); 
            $objActSheet->setCellValue('H'.$i, $value['type']); 
            $objActSheet->setCellValue('I'.$i, $value['source']); 
            $objActSheet->setCellValue('J'.$i, $value['other_source']); 
            $objActSheet->setCellValue('K'.$i, $value['user_total_rmb']); 
            $objActSheet->setCellValue('L'.$i, $value['statements']); 
            $objActSheet->setCellValue('M'.$i, $value['agent']); 
            $objActSheet->setCellValue('N'.$i, $value['from_user']); 
            $objActSheet->setCellValue('O'.$i, $value['from_ota']); 
            $objActSheet->setCellValue('P'.$i, $value['receive_time'] == "" ? "" : $value['receive_time']);
            $objActSheet->setCellValue('Q'.$i, $value['zhichu']); 
            $objActSheet->setCellValue('R'.$i, $value['danwei']);
            $objActSheet->setCellValue('S'.$i, $value['expend_time'] == "" ? "" : $value['expend_time']);
            $objActSheet->setCellValue('T'.$i, $value['zhichu_type']);
        }

        $dir = ROOT.'/upload/execl/';
        if(!is_dir($dir)){
           mkdir($dir, 0777, true);
        }
        $fileName = $dir.date("Y",time()).'_'.$_GET['month'].'.xlsx';
        $objWriter->save($fileName);
        $donwload_path = FILEURL."/execl/".date("Y",time()).'_'.$_GET['month'].".xlsx";
        echo '<script type="text/javascript">';
        echo "window.open('".$donwload_path."','_blank');";
        echo "</script>";
    }


    function download_excel($table)
    {
        $file_type = "vnd.ms-excel";  // excel表头固定写法
        $file_ending = "xls"; // excel表的后缀名
        header("Content-Type: application/$file_type");
        header("Content-Disposition: attachment; filename=TeamIn".time().".$file_ending"); // agentfile导出的表名
        header("Pragma: no-cache"); // 缓存
        header("Expires: 0");
        ?>
        <html xmlns:o='urn:schemas-microsoft-com:office:office'
              xmlns:x='urn:schemas-microsoft-com:office:excel'
              xmlns='http://www.w3.org/TR/REC-html40'>
        <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
        <html>
        <head>
            <meta http-equiv='Content-type' content='text/html;charset=utf-8'/>
            <style id='Classeur1_16681_Styles'></style>
        </head>
        <body>
        <div id='Classeur1_16681' align=center x:publishsource='Excel'>
        <?php echo $table ?>
        </div></body></html>
        <?php
    }