<?php

/**
 * Html2Pdf Library - example
 *
 * HTML => PDF converter
 * distributed under the OSL-3.0 License
 *
 * @package   Html2pdf
 * @author    Laurent MINGUET <webmaster@html2pdf.fr>
 * @copyright 2017 Laurent MINGUET
 */
require_once $_SERVER['DOCUMENT_ROOT'] . '/ERP/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ERP/model/autoparco.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ERP/functions.php';

$id = intval($_GET['id']);
//$tipo =$_GET['tipo'];
//var_dump($id);
//var_dump($tipo);
$all = getAllegato($id);
$tipo = $all['tipo'];
$decod= decodView('allegati_veicolo',$tipo);
//var_dump($all);
//var_dump($decod);
//die;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

try {
    $html2pdf = new Html2Pdf('P', 'A4', 'en', true, 'UTF-8', array(5, 5, 5, 2));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->pdf->SetProtection(array('print','copy'));
    ob_start();
    if($all['tipo_file']=='IMM'){
        include dirname(__FILE__).'/res/allegato1.php';
        include dirname(__FILE__).'/res/allegato2.php';
    }else{
        include dirname(__FILE__).'/res/allegato.php';
    }
    $content = ob_get_clean();
    $path = $_SERVER['DOCUMENT_ROOT'].'/ERP/docs/';
    $html2pdf->writeHTML($content);
   
    //$html2pdf->createIndex('Sommaire', 30, 12, false, true, 2, null, '10mm');
    if($all['tipo']!=='CC'&&$all['tipo']!=='CP'){
        $dat = date("d_m_Y",strtotime($all['data_ins']));
         $html2pdf->output($id."_".$decod.'_'.$dat.'.pdf','D');
    }else{
        $html2pdf->output($id."_".$decod.'.pdf','D');
    }
} catch (Html2PdfException $e) {
    $html2pdf->clean();

    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}
