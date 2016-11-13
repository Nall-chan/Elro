<?

require_once(__DIR__ . DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."ELROBase.php");  // ELROBase Klasse

class ELROSwitchRS extends ELROBase
{

    const on = '5';
    const off = '4';

    public function Create()
    {
        parent::Create();
        $this->RegisterPropertyString("CharAdr", "00");
        $this->RegisterPropertyString("ByteAdr", "00");
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
    
    public function SendSwitchRS(boolean $State)
    {
        parent::SendSwitch($State);
    }
}

?>