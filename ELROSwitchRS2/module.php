<?php

declare(strict_types=1);
/**
 * @addtogroup Elro
 * @{
 *
 * @file          module.php
 *
 * @author        Michael Tröger <micha@nall-chan.net>
 * @copyright     2020 Michael Tröger
 * @license       https://creativecommons.org/licenses/by-nc-sa/4.0/ CC BY-NC-SA 4.0
 *
 * @version       5.21
 */
require_once __DIR__ . '/../libs/ELROBase.php';  // ELROBase Klasse

/**
 * ELROSwitchDIP ermöglicht das Steuern von 433Mhz Geräten vom Typ FLS mit Drehschaltern.
 * Erweitert ELROBase.
 */
class ELROSwitchRS2 extends ELROBase
{
    protected string $on = '1';
    protected string $off = '0';

    /**
     * Interne Funktion des SDK.
     */
    public function Create(): void
    {
        parent::Create();
        $this->RegisterPropertyString('CharAdr', '15');
        $this->RegisterPropertyString('ByteAdr', '15');
        $this->RegisterPropertyInteger('Repeat', 2);
    }

    /**
     * Liefert die Adresse des Aktor im Hex-Format.
     */
    protected function GetAddress(): string
    {
        $Target = $this->ReadPropertyString('CharAdr') . $this->ReadPropertyString('ByteAdr') . '1';
        return $Target;
    }
}

/* @} */
