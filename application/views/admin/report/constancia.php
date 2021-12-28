<?php

//echo json_encode($persona[0]->dni);

date_default_timezone_set('America/Lima');

$date_current = date("Y-m-d H:i:s");

$size_font_content = 10;

$higth_content = 4.5;
$higth_title = 8;
$higth_sep = 1.5;

$co_he_table = array(115, 121, 120);
$co_con_table = 248;

//echo json_encode($persona);

$text = 'Como padre de familia me doy fe que mi hijo(a), se encuentra en condiciones óptimas, '
	. 'para participar en la escuela municipal, y me compremeto enviar todos los días a sus clases '
	. 'y también asumir la responsabilidad respecto a su salud, indole o incidente.';

function dateSpanish($date)
{
	$date = substr($date, 0, 10);
	$numeroDia = date('d', strtotime($date));
	$dia = date('l', strtotime($date));
	$mes = date('F', strtotime($date));
	$anio = date('Y', strtotime($date));
	$dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
	$dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
	$nombredia = str_replace($dias_EN, $dias_ES, $dia);
	$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	$meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
	$nombreMes = str_replace($meses_EN, $meses_ES, $mes);

	return $nombredia . " " . $numeroDia . " de " . $nombreMes . " de " . $anio;
}

$fpdf->AliasNbPages();

foreach ($persona as $person):

	$fpdf->AddPage(); //'P', 'A4', 0
	$fpdf->SetFont('Arial', 'B', 12);

	$fpdf->SetY(46);

	$fpdf->Cell(190, 5, utf8_decode($title.' - '. $person->disciplina), 0, 1, 'C');
	$fpdf->Ln();

//BEGIN DATOS PERSONALES
	$fpdf->SetY(55);
	$fpdf->SetTextColor(255, 255, 255);
	$fpdf->SetFillColor($co_he_table[0], $co_he_table[1], $co_he_table[2]);

	$fpdf->Cell(10, $higth_title, '1.', 0, 0, 'C', 1);
	$fpdf->Cell(180, $higth_title, 'DATOS PERSONALES DEL PARTICIPANTE', 0, 1, 'L', 1);


	$fpdf->SetTextColor(0, 0, 0);

	$fpdf->SetFillColor($co_con_table, $co_con_table, $co_con_table);
	$fpdf->Cell(10, $higth_sep, '', 0, 0, 'C', 1);
	$fpdf->Cell(180, $higth_sep, '', 0, 1, 'L', 1);

//dni
	$fpdf->SetFont('Arial', '', $size_font_content);
	$fpdf->Cell(10, $higth_content, '', 0, 0, 'C', 1);
	$fpdf->Cell(50, $higth_content, utf8_decode('DNI:'), 0, 0, 'L', 1);

	$fpdf->SetTextColor(39, 97, 139);
	$fpdf->Cell(130, $higth_content, utf8_decode($person->dni), 0, 1, 'L', 1);

//nombres
	$fpdf->SetTextColor(0, 0, 0);
	$fpdf->SetFont('Arial', '', $size_font_content);
	$fpdf->Cell(10, $higth_content, '', 0, 0, 'C', 1);
	$fpdf->Cell(50, $higth_content, utf8_decode('NOMBRES Y APELLIDOS:'), 0, 0, 'L', 1);

	$fpdf->SetTextColor(39, 97, 139);
	$fpdf->Cell(130, $higth_content, utf8_decode($person->nombres), 0, 1, 'L', 1);

//genero
	$fpdf->SetTextColor(0, 0, 0);
	$fpdf->SetFont('Arial', '', $size_font_content);
	$fpdf->Cell(10, $higth_content, '', 0, 0, 'C', 1);
	$fpdf->Cell(50, $higth_content, utf8_decode('GENERO:'), 0, 0, 'L', 1);

	$fpdf->SetTextColor(39, 97, 139);
	$fpdf->Cell(130, $higth_content, utf8_decode($person->sexo), 0, 1, 'L', 1);

//edad
	$fpdf->SetTextColor(0, 0, 0);
	$fpdf->SetFont('Arial', '', $size_font_content);
	$fpdf->Cell(10, $higth_content, '', 0, 0, 'C', 1);
	$fpdf->Cell(50, $higth_content, utf8_decode('EDAD:'), 0, 0, 'L', 1);

	$fpdf->SetTextColor(39, 97, 139);
	$fpdf->Cell(130, $higth_content, utf8_decode($person->edad), 0, 1, 'L', 1);

//edad
	$fpdf->SetTextColor(0, 0, 0);
	$fpdf->SetFont('Arial', '', $size_font_content);
	$fpdf->Cell(10, $higth_content, '', 0, 0, 'C', 1);
	$fpdf->Cell(50, $higth_content, utf8_decode('CELULAR:'), 0, 0, 'L', 1);

	$fpdf->SetTextColor(39, 97, 139);
	$fpdf->Cell(130, $higth_content, utf8_decode($person->celular), 0, 1, 'L', 1);

	$fpdf->Cell(10, $higth_sep, '', 0, 0, 'C', 1);
	$fpdf->Cell(180, $higth_sep, '', 0, 1, 'L', 1);

//SEPARADOR
//$fpdf->SetFillColor(255, 255, 255);
//$fpdf->Cell(10, 2, '', 0, 0, 'C', 1);
//$fpdf->Cell(180, 2, '', 0, 1, 'L', 1);


//BEGIN DIRECCION
	$fpdf->SetFont('Arial', 'B', 12);

	$fpdf->SetTextColor(255, 255, 255);
	$fpdf->SetFillColor($co_he_table[0], $co_he_table[1], $co_he_table[2]);

	$fpdf->Cell(10, $higth_title, '2.', 0, 0, 'C', 1);
	$fpdf->Cell(180, $higth_title, utf8_decode('DIRECCIÓN'), 0, 1, 'L', 1);

	$fpdf->SetFillColor($co_con_table, $co_con_table, $co_con_table);
	$fpdf->Cell(10, $higth_sep, '', 0, 0, 'C', 1);
	$fpdf->Cell(180, $higth_sep, '', 0, 1, 'L', 1);

//direccion
	$fpdf->SetTextColor(0, 0, 0);
	$fpdf->SetFont('Arial', '', $size_font_content);
	$fpdf->Cell(10, $higth_content, '', 0, 0, 'C', 1);
	$fpdf->Cell(50, $higth_content, utf8_decode('DIRECCIÓN:'), 0, 0, 'L', 1);

	$fpdf->SetTextColor(39, 97, 139);
	$fpdf->Cell(130, $higth_content,
		utf8_decode(isset($responsable[0]->direccion) && !empty($responsable[0]
			->direccion)?$responsable[0]
			->direccion:$person
			->direccion),
		0, 1, 'L', 1);

//barrio
	$fpdf->SetTextColor(0, 0, 0);
	$fpdf->SetFont('Arial', '', $size_font_content);
	$fpdf->Cell(10, $higth_content, '', 0, 0, 'C', 1);
	$fpdf->Cell(50, $higth_content, utf8_decode('BARRIO:'), 0, 0, 'L', 1);

	$fpdf->SetTextColor(39, 97, 139);
	$fpdf->Cell(130, $higth_content,
		utf8_decode(isset($responsable[0]->barrio) && !empty($responsable[0]
			->barrio)?$responsable[0]
			->barrio:$person
			->barrio),
		0, 1, 'L', 1);

	$fpdf->Cell(10, $higth_sep, '', 0, 0, 'C', 1);
	$fpdf->Cell(180, $higth_sep, '', 0, 1, 'L', 1);


//SEPARADOR
//$fpdf->SetFillColor(255, 255, 255);
//$fpdf->Cell(10, 2, '', 0, 0, 'C', 1);
//$fpdf->Cell(180, 2, '', 0, 1, 'L', 1);

//BEGIN DATOS INSTITUCION
	$fpdf->SetFont('Arial', 'B', 12);

	$fpdf->SetTextColor(255, 255, 255);
	$fpdf->SetFillColor($co_he_table[0], $co_he_table[1], $co_he_table[2]);

	$fpdf->Cell(10, $higth_title, '3.', 0, 0, 'C', 1);
	$fpdf->Cell(180, $higth_title, utf8_decode('DATOS DE LA INSTITUCIÓN PROCEDENTE DEL PARTICIPANTE'), 0, 1, 'L', 1);

	$fpdf->SetFillColor($co_con_table, $co_con_table, $co_con_table);
	$fpdf->Cell(10, $higth_sep, '', 0, 0, 'C', 1);
	$fpdf->Cell(180, $higth_sep, '', 0, 1, 'L', 1);

//INSTITUCION
	$fpdf->SetTextColor(0, 0, 0);
	$fpdf->SetFont('Arial', '', $size_font_content);
	$fpdf->Cell(10, $higth_content, '', 0, 0, 'C', 1);
	$fpdf->Cell(50, $higth_content, utf8_decode('INSTITUCIÓN:'), 0, 0, 'L', 1);

	$fpdf->SetTextColor(39, 97, 139);
	$fpdf->Cell(130, $higth_content,
		utf8_decode(isset($institucion[0]->institucion) && !empty($institucion[0]->institucion) ?
			$institucion[0]->institucion : 'No aplica'), 0, 1, 'L', 1);

//GRADO
	$fpdf->SetTextColor(0, 0, 0);
	$fpdf->SetFont('Arial', '', $size_font_content);
	$fpdf->Cell(10, $higth_content, '', 0, 0, 'C', 1);
	$fpdf->Cell(50, $higth_content, utf8_decode('GRADO:'), 0, 0, 'L', 1);

	$fpdf->SetTextColor(39, 97, 139);
	$fpdf->Cell(130, $higth_content,
		utf8_decode(isset($institucion[0]->grado) && !empty($institucion[0]->grado) ?
			$institucion[0]->grado : 'No aplica'), 0, 1, 'L', 1);

	$fpdf->Cell(10, $higth_sep, '', 0, 0, 'C', 1);
	$fpdf->Cell(180, $higth_sep, '', 0, 1, 'L', 1);

//SEPARADOR
//$fpdf->SetFillColor(255, 255, 255);
//$fpdf->Cell(10, 2, '', 0, 0, 'C', 1);
//$fpdf->Cell(180, 2, '', 0, 1, 'L', 1);

//BEGIN RESPONSABLE
	$fpdf->SetFont('Arial', 'B', 12);

	$fpdf->SetTextColor(255, 255, 255);
	$fpdf->SetFillColor($co_he_table[0], $co_he_table[1], $co_he_table[2]);

	$fpdf->Cell(10, $higth_title, '4.', 0, 0, 'C', 1);
	$fpdf->Cell(180, $higth_title, utf8_decode('RESPONSABLE DEL PARTICIPANTE'), 0, 1, 'L', 1);

	$fpdf->SetFillColor($co_con_table, $co_con_table, $co_con_table);
	$fpdf->Cell(10, $higth_sep, '', 0, 0, 'C', 1);
	$fpdf->Cell(180, $higth_sep, '', 0, 1, 'L', 1);

//dni responsable
	$fpdf->SetTextColor(0, 0, 0);
	$fpdf->SetFont('Arial', '', $size_font_content);
	$fpdf->Cell(10, $higth_content, '', 0, 0, 'C', 1);
	$fpdf->Cell(50, $higth_content, utf8_decode('DNI:'), 0, 0, 'L', 1);

	$fpdf->SetTextColor(39, 97, 139);
	$fpdf->Cell(130, $higth_content,
		utf8_decode(isset($responsable[0]->dni_resp)
			&& !empty($responsable[0]->dni_resp) ? $responsable[0]->dni_resp :'No aplica'),
		0, 1, 'L', 1);

//nombres responsable
	$fpdf->SetTextColor(0, 0, 0);
	$fpdf->SetFont('Arial', '', $size_font_content);
	$fpdf->Cell(10, $higth_content, '', 0, 0, 'C', 1);
	$fpdf->Cell(50, $higth_content, utf8_decode('NOMBRES Y APELLIDOS:'), 0, 0, 'L', 1);

	$fpdf->SetTextColor(39, 97, 139);
	$fpdf->Cell(130, $higth_content,
		utf8_decode(isset($responsable[0]->nombres)
		&& !empty($responsable[0]->nombres) ? $responsable[0]->nombres :'No aplica'),
		0, 1, 'L', 1);

//celular responsable
	$fpdf->SetTextColor(0, 0, 0);
	$fpdf->SetFont('Arial', '', $size_font_content);
	$fpdf->Cell(10, $higth_content, '', 0, 0, 'C', 1);
	$fpdf->Cell(50, $higth_content, utf8_decode('CELULAR:'), 0, 0, 'L', 1);

	$fpdf->SetTextColor(39, 97, 139);
	$fpdf->Cell(130, $higth_content,
		utf8_decode(isset($responsable[0]->celular)
		&& !empty($responsable[0]->celular) ? $responsable[0]->celular :'No aplica'),
		0, 1, 'L', 1);

	$fpdf->Cell(10, $higth_sep, '', 0, 0, 'C', 1);
	$fpdf->Cell(180, $higth_sep, '', 0, 1, 'L', 1);

//BEGIN DISCIPLINA
	$fpdf->SetFont('Arial', 'B', 12);

	$fpdf->SetTextColor(255, 255, 255);
	$fpdf->SetFillColor($co_he_table[0], $co_he_table[1], $co_he_table[2]);

	$fpdf->Cell(10, $higth_title, '5.', 0, 0, 'C', 1);
	$fpdf->Cell(180, $higth_title, utf8_decode('DISCIPLINA, ESPECIALIDAD Y MENCIÓN'), 0, 1, 'L', 1);

	$fpdf->SetFillColor($co_con_table, $co_con_table, $co_con_table);
	$fpdf->Cell(10, $higth_sep, '', 0, 0, 'C', 1);
	$fpdf->Cell(180, $higth_sep, '', 0, 1, 'L', 1);

//DISCIPLINA
	$fpdf->SetTextColor(0, 0, 0);
	$fpdf->SetFont('Arial', '', $size_font_content);
	$fpdf->Cell(10, $higth_content, '', 0, 0, 'C', 1);
	$fpdf->Cell(50, $higth_content, utf8_decode('DISCIPLINA:'), 0, 0, 'L', 1);

	$fpdf->SetTextColor(39, 97, 139);
	$fpdf->Cell(130, $higth_content, utf8_decode($person->disciplina), 0, 1, 'L', 1);

//ESPECIALIDAD
	$fpdf->SetTextColor(0, 0, 0);
	$fpdf->SetFont('Arial', '', $size_font_content);
	$fpdf->Cell(10, $higth_content, '', 0, 0, 'C', 1);
	$fpdf->Cell(50, $higth_content, utf8_decode('ESPECIALIDAD:'), 0, 0, 'L', 1);

	$fpdf->SetTextColor(39, 97, 139);
	$fpdf->Cell(130, $higth_content, utf8_decode($person->especialidad), 0, 1, 'L', 1);

//ESCUELA
	$fpdf->SetTextColor(0, 0, 0);
	$fpdf->SetFont('Arial', '', $size_font_content);
	$fpdf->Cell(10, $higth_content, '', 0, 0, 'C', 1);
	$fpdf->Cell(50, $higth_content, utf8_decode('ESCUELA:'), 0, 0, 'L', 1);

	$fpdf->SetTextColor(39, 97, 139);
	$fpdf->Cell(130, $higth_content, utf8_decode($person->escuela), 0, 1, 'L', 1);

//CICLO
	$fpdf->SetTextColor(0, 0, 0);
	$fpdf->SetFont('Arial', '', $size_font_content);
	$fpdf->Cell(10, $higth_content, '', 0, 0, 'C', 1);
	$fpdf->Cell(50, $higth_content, utf8_decode('CICLO:'), 0, 0, 'L', 1);

	$fpdf->SetTextColor(39, 97, 139);
	$fpdf->Cell(130, $higth_content, utf8_decode($person->cicle), 0, 1, 'L', 1);

	$fpdf->Cell(10, $higth_sep, '', 0, 0, 'C', 1);
	$fpdf->Cell(180, $higth_sep, '', 0, 1, 'L', 1);

	$fpdf->Ln();

	$fpdf->SetTextColor(0, 0, 0);
	$fpdf->SetFont('Arial', 'B', 12);

	$fpdf->SetY(190);
	$fpdf->Cell(190, 5, utf8_decode('DECLARACIÓN JURADA'), 0, 1, 'C');

	$fpdf->Ln();

	$fpdf->SetFont('Arial', '', 10);

	$fpdf->Justify(utf8_decode($text), 190, 5);

	$fpdf->SetY(220);

	$fpdf->Cell(110, 5, utf8_decode(''), 0, 0, 'C');
	$fpdf->Cell(80, 5, utf8_decode('Macusani, '.dateSpanish($date_current).'.'), 0, 1, 'L');

	$fpdf->SetY(228);

	$fpdf->Cell(150, 30, utf8_decode(''), 0, 0, 'C');
	$fpdf->Cell(25, 30, utf8_decode(''), 1, 1, 'C');

	$fpdf->Cell(150, -30, utf8_decode('________________________________________'), 0, 1, 'C');
	$fpdf->Cell(150, 40,
		utf8_decode(isset($responsable[0]->nombres) && !empty($responsable[0]->nombres)
			? $responsable[0]->nombres
			: $person->nombres),
		0, 1, 'C');
	$fpdf->Cell(150, -30, utf8_decode(isset($responsable[0]->dni_resp) && !empty($responsable[0]->dni_resp)
		? $responsable[0]->dni_resp
		: $person->dni),
		0, 0, 'C');

	$fpdf->Ln();

endforeach;

$fpdf->Output();


