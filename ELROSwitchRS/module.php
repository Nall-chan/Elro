<?

require_once(__DIR__."/../ELROBase.php");  // ELROBase Klasse
         const on = '5';
         const off = '4';
class ELROSwitchRS extends ELROBase {

    public function __construct($InstanceID) {
        //Never delete this line!
        parent::__construct($InstanceID);
        //Register Variables
        $this->RegisterVariableBoolean('STATE', 'STATE', '~Switch');
        $this->RegisterAction('STATE', 'ActionHandler');
        //Register Property
        $this->RegisterPropertyString('CharAdr', '00');
        $this->RegisterPropertyString('ByteAdr', '00');
        $this->RegisterPropertyInteger('Repeat', 2);
//        $this->on = '5';
  //      $this->off = '4';
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