<?

require_once(__DIR__."/../ELROBase.php");  // ELROBase Klasse
class ELROSwitchDIP extends ELROBase {

    public function __construct($InstanceID) {
        //Never delete this line!
        parent::__construct($InstanceID);
        IPS_LogMessage(__CLASS__,__FUNCTION__);//           
        
        //Register Variables
//        $this->RegisterVariableBoolean('STATE', 'STATE', '~Switch');
//        $this->MaintainAction('STATE', 'ActionHandler',True);
//        $this->RegisterAction('STATE', 'ActionHandler');
        //Register Property
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
//        $this->RegisterPropertyString('ON', '5');
//        $this->RegisterPropertyString('ON', '4');
//         $this->on = '5';
//         $this->off = '4';
        
    }

    public function ApplyChanges() {
        IPS_LogMessage(__CLASS__,__FUNCTION__);//           
        
        //Never delete this line!
        parent::ApplyChanges();

        $Adresse = 0;
        if (!$this->ReadPropertyBoolean('Bit0'))
            $Adresse = 1;
        if (!$this->ReadPropertyBoolean('Bit1'))
            $Adresse+=4;
        $Target = dechex($Adresse);
        $Adresse = 0;
        if (!$this->ReadPropertyBoolean('Bit2'))
            $Adresse = 1;
        if (!$this->ReadPropertyBoolean('Bit3'))
            $Adresse+=4;
        $Target.=dechex($Adresse);
        $Adresse = 0;
        if (!$this->ReadPropertyBoolean('Bit4'))
            $Adresse = 1;
        if (!$this->ReadPropertyBoolean('Bit5'))
            $Adresse+=4;
        $Target.=dechex($Adresse);
        $Adresse = 0;
        if (!$this->ReadPropertyBoolean('Bit6'))
            $Adresse = 1;
        if (!$this->ReadPropertyBoolean('Bit7'))
            $Adresse+=4;
        $Target.=dechex($Adresse);
        $Adresse = 0;
        if (!$this->ReadPropertyBoolean('Bit8'))
            $Adresse = 1;
        if (!$this->ReadPropertyBoolean('Bit9'))
            $Adresse+=4;
        $Target.=dechex($Adresse);

        $this->SetSummary('0x' . $Target);
        $this->Address = $Target;
        //hex2bin
    }


}

?>