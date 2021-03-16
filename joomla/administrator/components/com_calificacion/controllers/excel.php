<?php
/**
 * @version     1.0.0
 * @package     com_calificacion_1.0.0
 * @copyright   Copyright (C) 2018. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Jorge <je.peralta@uniandes.edu.co> -
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;

/**
 * Calificacion list controller
 */
class CalificacionControllerExcel extends JControllerAdmin
{

	/**
	 * Proxy for getModel
	 * @since	1.6
	 */
	public function excel()
	{
		require_once JPATH_BASE . '/components/com_calificacion/excel/vendor/autoload.php';

		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from($db->quoteName('#__calificacion_notas'));

		$query->order('ordering ASC');
		$db->setQuery($query);
		$results = $db->loadObjectList();

		// echo "<pre>";
		// for ($i=0; $i < count($results); $i++) {
		// 	var_dump($results[$i]);
		// }

		$helper = new Sample();
		if ($helper->isCli()) {
		    $helper->log('Calificaciones' . PHP_EOL);
		    return;
		}
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Jorge Eduardo Peralta Guzman')
		    ->setLastModifiedBy('Jorge Eduardo Peralta Guzman')
		    ->setTitle('Office 2007 XLSX Test Document')
		    ->setSubject('Office 2007 XLSX Test Document')
		    ->setDescription('document for Office 2007 XLSX')
		    ->setKeywords('office 2007 openxml php')
		    ->setCategory('Result file');

		// Add some data
		$spreadsheet->setActiveSheetIndex(0);

	  $col = 0;
		for ($i=0; $i < count($results); $i++) {
			$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $col, $results[$i]->id);
			$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $col, $results[$i]->nombre);
			$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, $col, $results[$i]->correo);
			$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(4, $col, $results[$i]->comentario);
			$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, $col, $results[$i]->nota);
			$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(6, $col, $results[$i]->fecha);
			$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(7, $col, $results[$i]->usuario);
 		  $col++;
		}

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Simple');

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Calificaciones.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;

	}

}
