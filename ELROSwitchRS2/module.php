<?

require_once(__DIR__ . "/../ELROBase.php");  // ELROBase Klasse

class ELROSwitchRS2 extends ELROBase {

    const on = '1';
    const off = '0';

    public function __construct($InstanceID) {
        //Never delete this line!
        parent::__construct($InstanceID);
        //Register Property
        $this->RegisterPropertyString('CharAdr', '15');
        $this->RegisterPropertyString('ByteAdr', '15');
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