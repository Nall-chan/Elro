<?
//
// --- BASE MESSAGE
define('IPS_BASE', 10000);                             //Base Message

define('IPS_KERNELSHUTDOWN', IPS_BASE + 1);            //Pre Shutdown Message, Runlevel UNINIT Follows
define('IPS_KERNELSTARTED', IPS_BASE + 2);             //Post Ready Message
// --- KERNEL
define('IPS_KERNELMESSAGE', IPS_BASE + 100);           //Kernel Message
define('KR_CREATE', IPS_KERNELMESSAGE + 1);            //Kernel is beeing created
define('KR_INIT', IPS_KERNELMESSAGE + 2);              //Kernel Components are beeing initialised, Modules loaded, Settings read
define('KR_READY', IPS_KERNELMESSAGE + 3);             //Kernel is ready and running
define('KR_UNINIT', IPS_KERNELMESSAGE + 4);            //Got Shutdown Message, unloading all stuff
define('KR_SHUTDOWN', IPS_KERNELMESSAGE + 5);          //Uninit Complete, Destroying Kernel Inteface

define('IPS_LOGMESSAGE', IPS_BASE + 200);              //Logmessage Message
define('KL_MESSAGE', IPS_LOGMESSAGE + 1);              //Normal Message                      | FG: Black | BG: White  | STLYE : NONE
define('KL_SUCCESS', IPS_LOGMESSAGE + 2);              //Success Message                     | FG: Black | BG: Green  | STYLE : NONE
define('KL_NOTIFY', IPS_LOGMESSAGE + 3);               //Notiy about Changes                 | FG: Black | BG: Blue   | STLYE : NONE
define('KL_WARNING', IPS_LOGMESSAGE + 4);              //Warnings                            | FG: Black | BG: Yellow | STLYE : NONE
define('KL_ERROR', IPS_LOGMESSAGE + 5);                //Error Message                       | FG: Black | BG: Red    | STLYE : BOLD
define('KL_DEBUG', IPS_LOGMESSAGE + 6);                //Debug Informations + Script Results | FG: Grey  | BG: White  | STLYE : NONE
define('KL_CUSTOM', IPS_LOGMESSAGE + 7);               //User Message                        | FG: Black | BG: White  | STLYE : NONE
// --- MODULE LOADER
define('IPS_MODULEMESSAGE', IPS_BASE + 300);           //ModuleLoader Message
define('ML_LOAD', IPS_MODULEMESSAGE + 1);              //Module loaded
define('ML_UNLOAD', IPS_MODULEMESSAGE + 2);            //Module unloaded
// --- OBJECT MANAGER
define('IPS_OBJECTMESSAGE', IPS_BASE + 400);
define('OM_REGISTER', IPS_OBJECTMESSAGE + 1);          //Object was registered
define('OM_UNREGISTER', IPS_OBJECTMESSAGE + 2);        //Object was unregistered
define('OM_CHANGEPARENT', IPS_OBJECTMESSAGE + 3);      //Parent was Changed
define('OM_CHANGENAME', IPS_OBJECTMESSAGE + 4);        //Name was Changed
define('OM_CHANGEINFO', IPS_OBJECTMESSAGE + 5);        //Info was Changed
define('OM_CHANGETYPE', IPS_OBJECTMESSAGE + 6);        //Type was Changed
define('OM_CHANGESUMMARY', IPS_OBJECTMESSAGE + 7);     //Summary was Changed
define('OM_CHANGEPOSITION', IPS_OBJECTMESSAGE + 8);    //Position was Changed
define('OM_CHANGEREADONLY', IPS_OBJECTMESSAGE + 9);    //ReadOnly was Changed
define('OM_CHANGEHIDDEN', IPS_OBJECTMESSAGE + 10);     //Hidden was Changed
define('OM_CHANGEICON', IPS_OBJECTMESSAGE + 11);       //Icon was Changed
define('OM_CHILDADDED', IPS_OBJECTMESSAGE + 12);       //Child for Object was added
define('OM_CHILDREMOVED', IPS_OBJECTMESSAGE + 13);     //Child for Object was removed
define('OM_CHANGEIDENT', IPS_OBJECTMESSAGE + 14);      //Ident was Changed
// --- INSTANCE MANAGER
define('IPS_INSTANCEMESSAGE', IPS_BASE + 500);         //Instance Manager Message
define('IM_CREATE', IPS_INSTANCEMESSAGE + 1);          //Instance created
define('IM_DELETE', IPS_INSTANCEMESSAGE + 2);          //Instance deleted
define('IM_CONNECT', IPS_INSTANCEMESSAGE + 3);         //Instance connectged
define('IM_DISCONNECT', IPS_INSTANCEMESSAGE + 4);      //Instance disconncted
define('IM_CHANGESTATUS', IPS_INSTANCEMESSAGE + 5);    //Status was Changed
define('IM_CHANGESETTINGS', IPS_INSTANCEMESSAGE + 6);  //Settings were Changed
define('IM_CHANGESEARCH', IPS_INSTANCEMESSAGE + 7);    //Searching was started/stopped
define('IM_SEARCHUPDATE', IPS_INSTANCEMESSAGE + 8);    //Searching found new results
define('IM_SEARCHPROGRESS', IPS_INSTANCEMESSAGE + 9);  //Searching progress in %
define('IM_SEARCHCOMPLETE', IPS_INSTANCEMESSAGE + 10); //Searching is complete
// --- VARIABLE MANAGER
define('IPS_VARIABLEMESSAGE', IPS_BASE + 600);              //Variable Manager Message
define('VM_CREATE', IPS_VARIABLEMESSAGE + 1);               //Variable Created
define('VM_DELETE', IPS_VARIABLEMESSAGE + 2);               //Variable Deleted
define('VM_UPDATE', IPS_VARIABLEMESSAGE + 3);               //On Variable Update
define('VM_CHANGEPROFILENAME', IPS_VARIABLEMESSAGE + 4);    //On Profile Name Change
define('VM_CHANGEPROFILEACTION', IPS_VARIABLEMESSAGE + 5);  //On Profile Action Change
// --- SCRIPT MANAGER
define('IPS_SCRIPTMESSAGE', IPS_BASE + 700);           //Script Manager Message
define('SM_CREATE', IPS_SCRIPTMESSAGE + 1);            //On Script Create
define('SM_DELETE', IPS_SCRIPTMESSAGE + 2);            //On Script Delete
define('SM_CHANGEFILE', IPS_SCRIPTMESSAGE + 3);        //On Script File changed
define('SM_BROKEN', IPS_SCRIPTMESSAGE + 4);            //Script Broken Status changed
// --- EVENT MANAGER
define('IPS_EVENTMESSAGE', IPS_BASE + 800);             //Event Scripter Message
define('EM_CREATE', IPS_EVENTMESSAGE + 1);             //On Event Create
define('EM_DELETE', IPS_EVENTMESSAGE + 2);             //On Event Delete
define('EM_UPDATE', IPS_EVENTMESSAGE + 3);
define('EM_CHANGEACTIVE', IPS_EVENTMESSAGE + 4);
define('EM_CHANGELIMIT', IPS_EVENTMESSAGE + 5);
define('EM_CHANGESCRIPT', IPS_EVENTMESSAGE + 6);
define('EM_CHANGETRIGGER', IPS_EVENTMESSAGE + 7);
define('EM_CHANGETRIGGERVALUE', IPS_EVENTMESSAGE + 8);
define('EM_CHANGETRIGGEREXECUTION', IPS_EVENTMESSAGE + 9);
define('EM_CHANGECYCLIC', IPS_EVENTMESSAGE + 10);
define('EM_CHANGECYCLICDATEFROM', IPS_EVENTMESSAGE + 11);
define('EM_CHANGECYCLICDATETO', IPS_EVENTMESSAGE + 12);
define('EM_CHANGECYCLICTIMEFROM', IPS_EVENTMESSAGE + 13);
define('EM_CHANGECYCLICTIMETO', IPS_EVENTMESSAGE + 14);

// --- MEDIA MANAGER
define('IPS_MEDIAMESSAGE', IPS_BASE + 900);           //Media Manager Message
define('MM_CREATE', IPS_MEDIAMESSAGE + 1);             //On Media Create
define('MM_DELETE', IPS_MEDIAMESSAGE + 2);             //On Media Delete
define('MM_CHANGEFILE', IPS_MEDIAMESSAGE + 3);         //On Media File changed
define('MM_AVAILABLE', IPS_MEDIAMESSAGE + 4);          //Media Available Status changed
define('MM_UPDATE', IPS_MEDIAMESSAGE + 5);

// --- LINK MANAGER
define('IPS_LINKMESSAGE', IPS_BASE + 1000);           //Link Manager Message
define('LM_CREATE', IPS_LINKMESSAGE + 1);             //On Link Create
define('LM_DELETE', IPS_LINKMESSAGE + 2);             //On Link Delete
define('LM_CHANGETARGET', IPS_LINKMESSAGE + 3);       //On Link TargetID change
// --- DATA HANDLER
define('IPS_DATAMESSAGE', IPS_BASE + 1100);             //Data Handler Message
define('DM_CONNECT', IPS_DATAMESSAGE + 1);             //On Instance Connect
define('DM_DISCONNECT', IPS_DATAMESSAGE + 2);          //On Instance Disconnect
// --- SCRIPT ENGINE
define('IPS_ENGINEMESSAGE', IPS_BASE + 1200);           //Script Engine Message
define('SE_UPDATE', IPS_ENGINEMESSAGE + 1);             //On Library Refresh
define('SE_EXECUTE', IPS_ENGINEMESSAGE + 2);            //On Script Finished execution
define('SE_RUNNING', IPS_ENGINEMESSAGE + 3);            //On Script Started execution
// --- PROFILE POOL
define('IPS_PROFILEMESSAGE', IPS_BASE + 1300);
define('PM_CREATE', IPS_PROFILEMESSAGE + 1);
define('PM_DELETE', IPS_PROFILEMESSAGE + 2);
define('PM_CHANGETEXT', IPS_PROFILEMESSAGE + 3);
define('PM_CHANGEVALUES', IPS_PROFILEMESSAGE + 4);
define('PM_CHANGEDIGITS', IPS_PROFILEMESSAGE + 5);
define('PM_CHANGEICON', IPS_PROFILEMESSAGE + 6);
define('PM_ASSOCIATIONADDED', IPS_PROFILEMESSAGE + 7);
define('PM_ASSOCIATIONREMOVED', IPS_PROFILEMESSAGE + 8);
define('PM_ASSOCIATIONCHANGED', IPS_PROFILEMESSAGE + 9);

// --- TIMER POOL
define('IPS_TIMERMESSAGE', IPS_BASE + 1400);            //Timer Pool Message
//TM_REGISTER = IPS_TIMERMESSAGE + 1;
//TM_UNREGISTER = IPS_TIMERMESSAGE + 2;
//TM_SETINTERVAL = IPS_TIMERMESSAGE + 3;
//TM_UPDATE = IPS_TIMERMESSAGE + 4;
//TM_RUNNING = IPS_TIMERMESSAGE + 5;
// --- TInstanceStatus Constants
// --- STATUS CODES
define('IS_SBASE', 100);
define('IS_CREATING', IS_SBASE + 1); //module is being created
define('IS_ACTIVE', IS_SBASE + 2); //module created and running
define('IS_DELETING', IS_SBASE + 3); //module us being deleted
define('IS_INACTIVE', IS_SBASE + 4); //module is not beeing used
// --- ERROR CODES
define('IS_EBASE', 200);          //default errorcode
define('IS_NOTCREATED', IS_EBASE + 1); //instance could not be created
// --- Search Handling
define('FOUND_UNKNOWN', 0);     //Undefined value
define('FOUND_NEW', 1);         //Device is new and not configured yet
define('FOUND_OLD', 2);         //Device is already configues (InstanceID should be set)
define('FOUND_CURRENT', 3);     //Device is already configues (InstanceID is from the current/searching Instance)
define('FOUND_UNSUPPORTED', 4); //Device is not supported by Module

class ELROBase extends IPSModule {

    protected static $Address = '';
//    protected static $on ;
//    protected static $off;
    //Dummy
    private $fKernelRunlevel;

    public function __construct($InstanceID) {

        //Never delete this line!
        parent::__construct($InstanceID);
        IPS_LogMessage(__CLASS__, __FUNCTION__); //           
        //These lines are parsed on Symcon Startup or Instance creation
        //You cannot use variables here. Just static values.
        $this->fKernelRunlevel = KR_READY;
    }

/*    public function ApplyChanges() {
        IPS_LogMessage(__CLASS__, __FUNCTION__.'Start'); //           
        //Never delete this line!
        parent::ApplyChanges();
        IPS_LogMessage(__CLASS__, __FUNCTION__.'End'); //           
    }*/

################## PRIVATE     

    protected function DoSend($Adresse, $Value, $Resend) {
        IPS_LogMessage(__CLASS__, __FUNCTION__); //           
        IPS_LogMessage("ELRO_DoSend", "DummyFunktion");
    }

    /*              parent:=getParent();
      //Test ob Instance existiert
      if parent=NIL then
      begin
      //nein->Melden
      Result:=false;
      end else begin
      //test ob IIPSSendString-Interface existiert
      if supports(parent,IIPSSendHID,ifsend) then
      begin
      //existiert, kann senden
      for i:=Resend downto 1 do
      if IsDbg=true then    LogMessage(KL_DEBUG,'Sende '+IntToStr(Resend));
      ifsend.SendEvent(0,HexStrToString('01002003CA000000'));
      ifsend.SendEvent(0,HexStrToString('0200206060201812'));
      ifsend.SendEvent(0,HexStrToString('03'+Adresse+Value+'00000000'));
      ifsend.SendEvent(0,HexStrToString('0400000000000000'));
      ifsend.SendEvent(0,HexStrToString('0500000000000000'));

      Result:= true;
      end else begin
      //Problem mitteilen
      Result:=false;
      end;
      end;
     */

################## ActionHandler

    public function ActionHandler($StatusVariableIdent, $Value) {
        IPS_LogMessage(__CLASS__, __FUNCTION__); //           

        if ($StatusVariableIdent == 'STATE')
            $this->SwitchHandler('STATE', $Value);
    }

################## PUBLIC
    /**
     * This function will be available automatically after the module is imported with the module control.
     * Using the custom prefix this function will be callable from PHP and JSON-RPC through:
     */

    public function SendSwitch($State) {
        IPS_LogMessage(__CLASS__, __FUNCTION__); //           

        if (!$this->HasActiveParent())
            throw new Exception("Instance has no active Parent Instance!");
        else {
            if ((bool) $State)
                $SendState = self::on;
            else
                $SendState = self::off;
            if ($this->DoSend($this->Address, $SendState, $this->ReadPropertyInteger('Repeat')))
                IPS_SetValueBoolean($this->GetIDForIdent('STATE'), $State);
            else
                throw new Exception('Fehler beim senden!');
        }
    }

//$send[] = hex2str("03".$addr.$hexvalue."00000000");   //0x03
//0x0003 // Ger�t 1 = Alle
//0x3CC1 // Ger�t 1001 = Steckdose 1
//0x3CCC // Ger�t 1002 = Steckdose 2
//0x3CCF // Ger�t 1003 = Steckdose 3
//0x15 = ein
//0x14=aus
################## DUMMYS / WOARKAROUNDS - PRIVATE

    protected function HasActiveParent() {
        IPS_LogMessage(__CLASS__, __FUNCTION__); //           

        $id = @IPS_GetInstanceParentID($this->InstanceID);
        if ($id > 0) {
            if (IPS_GetInstance($id)['InstanceStatus'] == IS_ACTIVE)
                return true;
            else
                return false;
            
        }
    }

    protected function SetStatus($data) {
        IPS_LogMessage(__CLASS__, __FUNCTION__); //           
    }

    protected function RegisterTimer($data, $cata) {
        IPS_LogMessage(__CLASS__, __FUNCTION__); //           
    }

    protected function SetTimerInterval($data, $cata) {
        IPS_LogMessage(__CLASS__, __FUNCTION__); //           
    }

    protected function LogMessage($data, $cata) {
        
    }
    protected function SetSummary($data){
        IPS_LogMessage(__CLASS__, __FUNCTION__); //                   
    }

}

?>