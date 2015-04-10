<?

require_once('../ELROBase/module.php');  // ELROBase Klasse

class ELROSwitchRS2 extends ELROBase {

    public function __construct($InstanceID) {
        //Never delete this line!
        parent::__construct($InstanceID);
        //Register Variables
        $this->RegisterVariableBoolean('STATE', 'STATE', '~Switch');
        $this->RegisterAction('STATE', 'ActionHandler');
        //Register Property
        $this->RegisterPropertyString('CharAdr', '15');
        $this->RegisterPropertyString('ByteAdr', '15');
        $this->RegisterPropertyInteger('Repeat', 2);
        
//        $this->RegisterPropertyString('ON', '5');
//        $this->RegisterPropertyString('ON', '4');
        $this->on = '1';
        $this->off = '0';
    }

    public function ApplyChanges() {
        //Never delete this line!
        parent::ApplyChanges();


        $Target = $this->ReadPropertyString('CharAdr') . $this->ReadPropertyString('ByteAdr') . '1';
        $this->SetSummary('0x' . $Target);
        $this->Address = $Target;
        //hex2bin
    }

}

?>