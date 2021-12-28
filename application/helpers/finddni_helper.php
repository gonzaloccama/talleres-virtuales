<?php


class Finddni_helper
{

	function search_dni($dni)
	{

		$result = null;

		$data['facturacion'] = $this->get_result_facturacion($dni);

		if (
			isset($data['facturacion']['result']['Nombre']) &&
			!empty($data['facturacion']['result']['Nombre'])
		) {

			$result['dni'] = $data['facturacion']['result']['DNI'];
			$result['nombres'] = $data['facturacion']['result']['Nombre'];
			$result['ape_pat'] = $data['facturacion']['result']['Paterno'];
			$result['ape_mat'] = $data['facturacion']['result']['Materno'];

//			$Fecha =  strval($data['facturacion']['result']['FechaNac']);
//			$result['fecha_nacimiento'] = date("Y-m-d", strtotime( $Fecha));

			$Fecha = strval($data['facturacion']['result']['FechaNac']);
			$Fecha = str_replace('/', '-', $Fecha);

			$result['fecha_nacimiento'] = date("Y-m-d", strtotime( $Fecha));

			if ($data['facturacion']['result']['Sexo'] == 2 || $data['facturacion']['result']['Sexo'] == '2')
				$result['sexo'] = '1';

			elseif ($data['facturacion']['result']['Sexo'] == 3 || $data['facturacion']['result']['Sexo'] == '3')
				$result['sexo'] = '2';

			else
				$result['sexo'] = '';

			$result['api'] = 'facturacion';

			return $result;

		} else {
			$data['api_reniec'] = $this->get_result_reniec($dni);

			if (isset($data['api_reniec']['nombres']) && !empty($data['api_reniec']['nombres'])) {

				$result['dni'] = $data['api_reniec']['dni'];
				$result['nombres'] = $data['api_reniec']['nombres'];
				$result['ape_pat'] = $data['api_reniec']['apellido_paterno'];
				$result['ape_mat'] = $data['api_reniec']['apellido_materno'];
				$result['api'] = 'cloud.reniec';

				return $result;
			}


			$data['eldni'] = $this->get_result_eldni($dni);

			if (isset($data['eldni']['nombres']) && !empty($data['eldni']['nombres'])) {
				$result['dni'] = $data['eldni']['dni'];
				$result['nombres'] = $data['eldni']['nombres'];
				$result['ape_pat'] = $data['eldni']['apellidoPaterno'];
				$result['ape_mat'] = $data['eldni']['apellidoMaterno'];
				$result['api'] = 'apis.peru';

				return $result;
			}

			$result['dni'] = "$dni";
			$result['nombres'] = '';
			$result['ape_pat'] = '';
			$result['ape_mat'] = '';
			$result['api'] = '';

			return $result;
		}

	}

	private function get_result_reniec($dni)
	{
		$arrContextOptions = array(
			"ssl" => array(
				"verify_peer" => false,
				"verify_peer_name" => false,
			),
		);
		return json_decode(file_get_contents("http://api.reniec.cloud/dni/" . $dni, false, stream_context_create($arrContextOptions)), true);
	}

	private function get_result_facturacion($dni)
	{
		$url = "https://www.facturacionelectronica.us/facturacion/controller/ws_consulta_rucdni_v2.php?documento=DNI&usuario=10447915125&password=985511933&nro_documento=";

		if (@($data = file_get_contents($url . $dni)))
			return json_decode($data, true);
		else
			return '';
	}

	function get_result_eldni($dni)
	{
		$token = "?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6ImF0aWwubWVuZXMueGRAZ21haWwuY29tIn0.avTlYC0Hl7OgsH3qQu4rvYC8mfHv8hBlPzhRTI-JCbI";
		$url = "https://dniruc.apisperu.com/api/v1/dni/";

		if (@($data = file_get_contents($url . $dni . $token)))
			return json_decode($data, true);
		else
			return '';
	}

	function strreplace($str, $original, $replace)
	{
		return str_replace($original, $replace, $str);
	}

}
