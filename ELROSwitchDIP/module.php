<?php

declare(strict_types=1);
/**
 * @addtogroup ipselro
 * @{
 *
 * @file          module.php
 *
 * @author        Michael Tröger <micha@nall-chan.net>
 * @copyright     2018 Michael Tröger
 * @license       https://creativecommons.org/licenses/by-nc-sa/4.0/ CC BY-NC-SA 4.0
 *
 * @version       5.00
 */
require_once __DIR__ . '/../libs/ELROBase.php';  // ELROBase Klasse

/**
 * ELROSwitchDIP ermöglicht das Steuern von 433Mhz Geräten mit DIP-Schaltern.
 * Erweitert ELROBase.
 */
class ELROSwitchDIP extends ELROBase
{
    protected $on = '5';
    protected $off = '4';

    /**
     * Interne Funktion des SDK.
     */
    public function Create()
    {
        parent::Create();
        $this->RegisterPropertyBoolean('Bit0', false);
        $this->RegisterPropertyBoolean('Bit1', false);
        $this->RegisterPropertyBoolean('Bit2', false);
        $this->RegisterPropertyBoolean('Bit3', false);
        $this->RegisterPropertyBoolean('Bit4', false);
        $this->RegisterPropertyBoolean('Bit5', false);
        $this->RegisterPropertyBoolean('Bit6', false);
        $this->RegisterPropertyBoolean('Bit7', false);
        $this->RegisterPropertyBoolean('Bit8', false);
        $this->RegisterPropertyBoolean('Bit9', false);
        $this->RegisterPropertyInteger('Repeat', 2);
    }

    /**
     * Liefert die Adresse des Aktor im Hex-Format.
     */
    protected function GetAdress()
    {
        $Adresse = 0;
        if (!$this->ReadPropertyBoolean('Bit8')) {
            $Adresse = 1;
        }
        if (!$this->ReadPropertyBoolean('Bit9')) {
            $Adresse += 4;
        }
        $Target = dechex($Adresse);
        $Adresse = 0;
        if (!$this->ReadPropertyBoolean('Bit6')) {
            $Adresse = 1;
        }
        if (!$this->ReadPropertyBoolean('Bit7')) {
            $Adresse += 4;
        }
        $Target .= dechex($Adresse);
        $Adresse = 0;
        if (!$this->ReadPropertyBoolean('Bit4')) {
            $Adresse = 1;
        }
        if (!$this->ReadPropertyBoolean('Bit5')) {
            $Adresse += 4;
        }
        $Target .= dechex($Adresse);
        $Adresse = 0;
        if (!$this->ReadPropertyBoolean('Bit2')) {
            $Adresse = 1;
        }
        if (!$this->ReadPropertyBoolean('Bit3')) {
            $Adresse += 4;
        }
        $Target .= dechex($Adresse);
        $Adresse = 0;
        if (!$this->ReadPropertyBoolean('Bit0')) {
            $Adresse = 1;
        }
        if (!$this->ReadPropertyBoolean('Bit1')) {
            $Adresse += 4;
        }
        $Target .= dechex($Adresse);
        return $Target;
    }

    /**
     * IPS-Instanz-Funktion ELRO_SendSwitch.
     * Schaltet den Aktor ein oder aus und führt die Statusvariable nach.
     */
    public function SendSwitch(bool $State)
    {
        parent::SendSwitch($State);
    }

    /**
     * IPS-Instanz-Funktion ELRO_SendSwitchDIP.
     * Schaltet den Aktor ein oder aus und führt die Statusvariable nach.
     */
    public function SendSwitchDIP(bool $State)
    {
        parent::SendSwitch($State);
    }
}

/* @} */
