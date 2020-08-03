<?php

declare(strict_types=1);
/**
 * @addtogroup Elro
 * @{
 *
 * @file          module.php
 *
 * @author        Michael Tröger <micha@nall-chan.net>
 * @copyright     2019 Michael Tröger
 * @license       https://creativecommons.org/licenses/by-nc-sa/4.0/ CC BY-NC-SA 4.0
 *
 * @version       5.1
 */
require_once __DIR__ . '/../libs/ELROBase.php';  // ELROBase Klasse

/**
 * ELROSwitchRS ermöglicht das Steuern von 433Mhz Intertechno-Geräten mit Drehschaltern.
 * Erweitert ELROBase.
 */
class ELROSwitchRS extends ELROBase
{
    protected $on = '5';
    protected $off = '4';

    /**
     * Interne Funktion des SDK.
     */
    public function Create()
    {
        parent::Create();
        $this->RegisterPropertyString('CharAdr', '00');
        $this->RegisterPropertyString('ByteAdr', '00');
        $this->RegisterPropertyInteger('Repeat', 2);
    }

    /**
     * Liefert die Adresse des Aktor im Hex-Format.
     */
    protected function GetAdress()
    {
        $Target = $this->ReadPropertyString('CharAdr') . $this->ReadPropertyString('ByteAdr') . '1';
        return $Target;
    }
}

/* @} */
