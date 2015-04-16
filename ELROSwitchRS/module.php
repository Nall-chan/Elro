<?

require_once(__DIR__ . "/../ELROBase.php");  // ELROBase Klasse

class ELROSwitchRS extends ELROBase
{

    const on = '5';
    const off = '4';

    public function __construct($InstanceID)
    {
        //Never delete this line!
        IPSModule::__construct($InstanceID);
        //Register Property
        $this->RegisterPropertyString('CharAdr', '00');
        $this->RegisterPropertyString('ByteAdr', '00');
        $this->RegisterPropertyInteger("Repeat", 2);
        $this->RegisterVariableBoolean('STATE', 'STATE', '~Switch');
        $this->EnableAction("STATE");
        $this->ConnectParent("{E6D7692A-7F4C-441D-827B-64062CFE1C02}");        
    }

    protected function GetAdress()
    {
        $Target = $this->ReadPropertyString('CharAdr') . $this->ReadPropertyString('ByteAdr') . '1';
        $this->SetSummary('0x' . $Target);
        return $Target;
    }

}

?>