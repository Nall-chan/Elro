<?

require_once(__DIR__ . "/../ELROBase.php");  // ELROBase Klasse

class ELROSwitchRS2 extends ELROBase
{

    const on = '1';
    const off = '0';

    public function Create()
    {
        //Never delete this line!
        parent::Create();
        //Register Property
        $this->RegisterPropertyString("CharAdr", "15");
        $this->RegisterPropertyString("ByteAdr", "15");
        $this->RegisterPropertyInteger("Repeat", 2);
    }

    protected function GetAdress()
    {
        $Target = $this->ReadPropertyString("CharAdr") . $this->ReadPropertyString("ByteAdr") . "1";
        $this->SetSummary("0x" . $Target);
        return $Target;
    }
    public function SendSwitch(boolean $State)
    {
        parent::SendSwitch($State);
    }

}

?>