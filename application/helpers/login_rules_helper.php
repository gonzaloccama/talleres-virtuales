<?php

function getLoginRules()
{
	return array(
		array(
			'field' => 'email',
			'label' => 'Correo',
			'rules' => 'required|trim|valid_email',
			'errors' => array(
				'required' => 'El %s es requerido',
				'valid_email' => 'El campo es de tipo correo "@"',
			),
		),
		array(
			'field' => 'password',
			'label' => 'Contraseña',
			'rules' => 'required|trim',
			'errors' => array(
				'required' => 'La {field} es requerido',
			),
		)
	);
}
