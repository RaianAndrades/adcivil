<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
//require_once base_url().'/tcpdf/tcpdf.php';
 
class Pdf extends TcPdf
{
    function __construct()
    {
        parent::__construct();
    }
}
 
/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */
