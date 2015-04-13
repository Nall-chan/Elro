<?

require_once(__DIR__ . "/../ELROBase.php");  // ELROBase Klasse

class ELROSwitchRS3 extends ELROBase {

    const on = '5';
    const off = '0';

    public function __construct($InstanceID) {
        //Never delete this line!
        parent::__construct($InstanceID);
        //Register Variables
        $this->RegisterVariableBoolean('STATE', 'STATE', '~Switch');
//OFFEN        $this->MaintainAction('STATE', 'ActionHandler',True);
        //Register Property
        $this->RegisterPropertyString('CharAdr', 'D5');
        $this->RegisterPropertyString('ByteAdr', 'D4');
//        $this->RegisterPropertyInteger("Repeat", 2);
    }

    protected function GetAdress() {


        $Target = $this->ReadPropertyString('CharAdr') . $this->ReadPropertyString('ByteAdr') . '5';
        $this->SetSummary('0x' . $Target);
        return $Target;
    }

}

?>