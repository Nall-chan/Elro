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
 * @version       5.2
 */
require_once __DIR__ . '/../libs/ELROBase.php';  // ELROBase Klasse

/**
 * ELROSwitchGen ermöglicht das Steuern von 433Mhz Intertechno-Geräten.
 * Erweitert ELROBase.
 */
class ELROSwitchGen extends ELROBase
{
    protected $on;
    protected $off;

    /**
     * Interne Funktion des SDK.
     */
    public function Create()
    {
        parent::Create();
        $this->RegisterPropertyString('Code', '0000000000');
        $this->RegisterPropertyString('CodeOn', 'FF');
        $this->RegisterPropertyString('CodeOff', 'F0');
        $this->RegisterPropertyInteger('Repeat', 2);
    }

    /**
     * Interne Funktion des SDK.
     */
    public function ApplyChanges()
    {
        if (preg_match('/^[01F]{10}$/', trim($this->ReadPropertyString('Code'))) !== 1) {
            IPS_SetProperty($this->InstanceID, 'Code', '0000000000');
        }
        if (preg_match('/^[01F]{2}$/', trim($this->ReadPropertyString('CodeOn'))) !== 1) {
            IPS_SetProperty($this->InstanceID, 'CodeOn', 'FF');
        }
        if (preg_match('/^[01F]{2}$/', trim($this->ReadPropertyString('CodeOff'))) !== 1) {
            IPS_SetProperty($this->InstanceID, 'CodeOff', 'F0');
        }

        if (IPS_HasChanges($this->InstanceID)) {
            echo 'Config invalid';
            IPS_ApplyChanges($this->InstanceID);
        } else {
            parent::ApplyChanges();
        }
    }

    /**
     * Liefert die Adresse des Aktor im Hex-Format.
     */
    protected function GetAddress()
    {
        $on = trim($this->ReadPropertyString('CodeOn'));
        $this->on = $this->ToHex($on);
        $off = trim($this->ReadPropertyString('CodeOff'));
        $this->off = $this->ToHex($off);
        $Target = '';
        $Address = trim($this->ReadPropertyString('Code'));
        for ($index = 0; $index < strlen($Address); $index = $index + 2) {
            $Target .= $this->ToHex($Address[$index] . $Address[$index + 1]);
        }
        return $Target;
    }

    /**
     * Liefert den Hex-Code von einem Intertechno Code.
     */
    private function ToHex($Char)
    {
        switch ($Char) {
            case '00':
                return '0';
            case '0F':
                return '1';
            case '01':
                return '3';
            case 'F0':
                return '4';
            case '10':
                return 'C';
            case 'FF':
                return '5';
            case 'F1':
                return '7';
            case '1F':
                return 'D';
            case '11':
                return 'F';
        }
    }
}

/* @} */
