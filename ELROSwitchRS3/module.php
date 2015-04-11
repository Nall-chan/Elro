<?

require_once(__DIR__ . "/../ELROBase.php");  // ELROBase Klasse

class ELROSwitchRS3 extends ELROBase {

    const on = '5';
    const off = '0';

    public function __construct($InstanceID) {
        //Never delete this line!
        parent::__construct($InstanceID);
        //Register Property
        $this->RegisterPropertyString('CharAdr', 'D5');
        $this->RegisterPropertyString('ByteAdr', 'D4');
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