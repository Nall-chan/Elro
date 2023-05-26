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
 * ELROSwitchGen ermöglicht das Steuern von 433Mhz Intertechno-Geräten.
 * Erweitert ELROBase.
 */
class ELROSwitchGen extends ELROBase
{
    protected string $on;
    protected string $off;

    /**
     * Interne Funktion des SDK.
     */
    public function Create(): void
    {
        parent::Create();
        $this->RegisterPropertyString('Code', '0000000000');
        $this->RegisterPropertyString('CodeOn', 'FF');
        $this->RegisterPropertyString('CodeOff', 'F0');
        $this->RegisterPropertyInteger('Repeat', 2);
    }

    /**
     * Liefert die Adresse des Aktor im Hex-Format.
     */
    protected function GetAddress(): string
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
    private function ToHex($Char): string
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
