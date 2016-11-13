<?

require_once(__DIR__ . DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."ELROBase.php");  // ELROBase Klasse

class ELROSwitchRS2 extends ELROBase
{

    const on = '1';
    const off = '0';

    public function Create()
    {
        parent::Create();
        $this->RegisterPropertyString("CharAdr", "15");
        $this->RegisterPropertyString("ByteAdr", "15");
        $this->RegisterPropertyInteger("Repeat", 2);
    }

    public function ApplyChanges()
    {
        parent::ApplyChanges();
    }

    protected function GetAdress()
    {
        $Target = $this->ReadPropertyString("CharAdr") . $this->ReadPropertyString("ByteAdr") . "1";
        return $Target;
    }
    
    public function SendSwitch(boolean $State)
    {
        parent::SendSwitch($State);
    }
    
    public function SendSwitchRS2(boolean $State)
    {
        parent::SendSwitch($State);
    }
}

?>