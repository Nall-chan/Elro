<?php

declare(strict_types=1);
/*
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

/**
 * ELROBase ist die Basis-Klasse für 433Mhz Funksteckdose, welche über den HE583 gesteuert wird.
 * Erweitert ipsmodule.
 */
abstract class ELROBase extends IPSModule
{
    protected $on;
    protected $off;
    protected $Address;

    /**
     * Interne Funktion des SDK.
     */
    public function Create()
    {
        parent::Create();
        $this->RegisterVariableBoolean('STATE', 'STATE', '~Switch');
        $this->EnableAction('STATE');
        $this->ConnectParent('{E6D7692A-7F4C-441D-827B-64062CFE1C02}');
    }

    /**
     * Interne Funktion des SDK.
     */
    public function ApplyChanges()
    {
        parent::ApplyChanges();
        $this->SetReceiveDataFilter('.9999999999.');
        $Address = $this->GetAdress();
        $bin = '';
        for ($index = 0; $index < strlen($Address); $index++) {
            switch ($Address[$index]) {
                case '0':
                    $bin .= '00';
                    break;
                case '1':
                    $bin .= '0F';
                    break;
                case '3':
                    $bin .= '01';
                    break;
                case '4':
                    $bin .= 'F0';
                    break;
                case 'C':
                    $bin .= '10';
                    break;
                case '5':
                    $bin .= 'FF';
                    break;
                case '7':
                    $bin .= 'F1';
                    break;
                case 'D':
                    $bin .= '1F';
                    break;
                case 'F':
                    $bin .= '11';
                    break;
            }
        }
        $this->SetSummary('IT ' . $bin);
    }

    //################# PRIVATE

    /**
     * Sendet das Telegramm an den HE853.
     */
    protected function DoSend($Value)
    {
        $i = 0;
        $Repeat = $this->ReadPropertyInteger('Repeat');
        $SendData[] = hex2bin('01002003CA000000');
        $SendData[] = hex2bin('0200206060201812');
        $SendData[] = hex2bin('03' . $this->Address . $Value . '00000000');
        $SendData[] = hex2bin('0400000000000000');
        $SendData[] = hex2bin('0500000000000000');
        do {
            foreach ($SendData as $Data) {
                try {
                    $this->SendDebug('Send', $Data, 1);
                    $this->SendDataToParent(json_encode([
                        'DataID'  => '{4A550680-80C5-4465-971E-BBF83205A02B}',
                        'EventID' => 0,
                        'Buffer'  => utf8_encode($Data)]));
                } catch (Exception $ex) {
                    return false;
                }
            }
            $i++;
        } while ($i < $Repeat);
        return true;
    }

    //################# ActionHandler

    /**
     * Interne Funktion des SDK.
     */
    public function RequestAction($Ident, $Value)
    {
        if ($Ident == 'STATE') {
            $this->SendSwitch($Value);
        }
    }

    //################# PUBLIC

    /**
     * Schaltet den Aktor ein oder aus und führt die Statusvariable nach.
     */
    public function SendSwitch(bool $State)
    {
        if (!$this->HasActiveParent()) {
            trigger_error($this->Translate('Instance has no active parent instance!'), E_USER_NOTICE);
        } else {
            $this->Address = $this->GetAdress();
            if ((bool) $State) {
                $SendState = $this->on;
            } else {
                $SendState = $this->off;
            }
            if ($this->DoSend($SendState)) {
                SetValueBoolean($this->GetIDForIdent('STATE'), $State);
                return true;
            } else {
                trigger_error($this->Translate('Error on transmit!'), E_USER_NOTICE);
            }
        }
        return false;
    }

    /**
     * Liefert die Adresse des Aktor im Hex-Format.
     *
     * @abstract
     */
    abstract protected function GetAdress();

    /**
     * Interne Funktion des SDK.
     * Erweitert die SDK funktion um die Prüfung ob überhaupt ein Parent verbunden ist.
     *
     * @return bool True wenn Parent-Kette vorhanden und aktiv ist.
     */
    protected function HasActiveParent()
    {
        $instance = @IPS_GetInstance($this->InstanceID);
        if ($instance['ConnectionID'] > 0) {
            return parent::HasActiveParent();
        }
        return false;
    }
}

/* @} */
