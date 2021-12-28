<?php

//require_once ('application/models/admin/conn.php');
require_once('application/helpers/fpdf/fpdf.php');

class PDF_helper extends fpdf
{
	function Header()
	{
		$this->SetFillColor(55, 125, 196);
		$this->Rect(0, 0, 220, 40, 'F');
		$this->SetY(15);

		$this->SetFont('Arial', 'B', 20);
		$this->SetTextColor(255, 255, 255);

		$this->SetX(26);
		$this->Write(8, 'MUNICIPALIDAD PROVINCIAL DE CARABAYA');

		$this->Ln();
		$this->Cell(80);
		$this->SetFont('Arial', '', 14);
		$this->Cell(30, 5, utf8_decode('OFICINA DE EDUCACIÓN, CULTURA Y DEPORTE'), 0, 1, 'C');

		$this->Cell(80);
		$this->SetFont('Arial', '', 7);
		$this->Cell(30, 5, utf8_decode('SUB-GERENCIA DE DESARROLLO SOCIAL'), 0, 1, 'C');

		$this->AddLink();

		$this->Image('assets/admin/img/Escudo_de_Macusani.png', 10, 12, 15, 0, '');
		$this->Image('assets/admin/img/Escudo_de_Macusani.png', 185, 12, 15, 0, '');

	}

	function Footer()
	{
		$this->SetFillColor(55, 125, 196);
		$this->Rect(0, 275, 220, 25, 'F');
		$this->SetY(-19);
		$this->SetFont('Arial', 'I', 10);
		$this->SetTextColor(255, 255, 255);
		$this->SetX(120);
		$this->Write(5, utf8_decode('Municipalidad Provincial Carabaya'));
		$this->Ln();
		$this->SetX(120);
		$this->Write(5, utf8_decode('Oficina de Educación, Cultura y Deporte'));

		$this->SetX(120);
		$this->Ln();
		$this->SetX(120);
		$this->Write(5, utf8_decode('www.municarabaya.com'));

		$this->SetY(-17);
		$this->SetFont('Arial', 'I', 12);
		$this->AddLink();

		$this->SetFont('Arial', 'I', 10);
		$this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . ' de {nb}', 0, 0, 'L');

	}

	function Justify($text, $w, $h)
	{
		$tab_paragraphe = explode("\n", $text);
		$nb_paragraphe = count($tab_paragraphe);
		$j = 0;

		while ($j < $nb_paragraphe) {

			$paragraphe = $tab_paragraphe[$j];
			$tab_mot = explode(' ', $paragraphe);
			$nb_mot = count($tab_mot);

			// Handle strings longer than paragraph width
			$k = 0;
			$l = 0;
			while ($k < $nb_mot) {

				$len_mot = strlen($tab_mot[$k]);
				if ($len_mot < ($w - 5)) {
					$tab_mot2[$l] = $tab_mot[$k];
					$l++;
				} else {
					$m = 0;
					$chaine_lettre = '';
					while ($m < $len_mot) {

						$lettre = substr($tab_mot[$k], $m, 1);
						$len_chaine_lettre = $this->GetStringWidth($chaine_lettre . $lettre);

						if ($len_chaine_lettre > ($w - 7)) {
							$tab_mot2[$l] = $chaine_lettre . '-';
							$chaine_lettre = $lettre;
							$l++;
						} else {
							$chaine_lettre .= $lettre;
						}
						$m++;
					}
					if ($chaine_lettre) {
						$tab_mot2[$l] = $chaine_lettre;
						$l++;
					}

				}
				$k++;
			}

			// Justified lines
			$nb_mot = count($tab_mot2);
			$i = 0;
			$ligne = '';
			while ($i < $nb_mot) {

				$mot = $tab_mot2[$i];
				$len_ligne = $this->GetStringWidth($ligne . ' ' . $mot);

				if ($len_ligne > ($w - 5)) {

					$len_ligne = $this->GetStringWidth($ligne);
					$nb_carac = strlen($ligne);
					$ecart = (($w - 2) - $len_ligne) / $nb_carac;
					$this->_out(sprintf('BT %.3F Tc ET', $ecart * $this->k));
					$this->MultiCell($w, $h, $ligne);
					$ligne = $mot;

				} else {

					if ($ligne) {
						$ligne .= ' ' . $mot;
					} else {
						$ligne = $mot;
					}

				}
				$i++;
			}

			// Last line
			$this->_out('BT 0 Tc ET');
			$this->MultiCell($w, $h, $ligne);
			$tab_mot = '';
			$tab_mot2 = '';
			$j++;
		}
	}

}
