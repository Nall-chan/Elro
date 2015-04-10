<?

require_once('../ELROBase/module.php');  // ELROBase Klasse

class ELROSwitchRS3 extends ELROBase {

    public function __construct($InstanceID) {
        //Never delete this line!
        parent::__construct($InstanceID);
        //Register Variables
        $this->RegisterVariableBoolean('STATE', 'STATE', '~Switch');
        $this->RegisterAction('STATE', 'ActionHandler');
        //Register Property
        $this->RegisterPropertyString('CharAdr', 'D5');
        $this->RegisterPropertyString('ByteAdr', 'D4');
        $this->RegisterPropertyInteger('Repeat', 2);
//        $this->RegisterPropertyString('ON', '5');
//        $this->RegisterPropertyString('ON', '4');
         $this->on = '5';
         $this->off = '0';
        
    }

    public function ApplyChanges() {
        //Never delete this line!
        parent::ApplyChanges();

        
        $Target = $this->ReadPropertyString('CharAdr') . $this->ReadPropertyString('ByteAdr') . '5';
        $this->SetSummary('0x' . $Target);
        $this->Address = $Target;
        //hex2bin
    }


}

?>