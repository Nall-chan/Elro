<?

require_once(__DIR__ . DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."ELROBase.php");  // ELROBase Klasse

class ELROSwitchRS3 extends ELROBase
{

    const on = '5';
    const off = '0';

    public function Create()
    {
        parent::Create();
        $this->RegisterPropertyString("CharAdr", "D5");
        $this->RegisterPropertyString("ByteAdr", "D4");
        $this->RegisterPropertyInteger("Repeat", 2);
    }

    public function ApplyChanges()
    {
        parent::ApplyChanges();
    }

    protected function GetAdress()
    {
        $Target = $this->ReadPropertyString("CharAdr") . $this->ReadPropertyString("ByteAdr") . "5";
        return $Target;
    }

    public function SendSwitch(boolean $State)
    {
        parent::SendSwitch($State);
    }
        
    public function SendSwitchRS3(boolean $State)
    {
        parent::SendSwitch($State);
    }
}

?>