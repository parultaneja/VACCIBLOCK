pragma solidity ^0.4.0;

contract vaccine{

    address device;
    address public sender;
    address public receiver;

    uint shipmentPrice;

    enum alertType { None, Temp, Open, Light}
    alertType public alert;
    int temper;
    int open;
    int light;

    function vaccine(){
         shipmentPrice = 0.00025 ether;
         device = 0xCA35b7d915458EF540aDe6068dFe2F44E8fa733c;
         sender = msg.sender;
         receiver = 0x14723A09ACff6D2A60DcdF7aA4AFf308FDDC160C;
    }

     modifier  OnlyContainer(){
        require(msg.sender == device);
        _;
    }
    modifier costs() {
        require(msg.value == shipmentPrice);
        _;

    }

    event ShipmentViolatedandRefund(address device);

    event TemperAlert(string msg, bool t, int v);
    event SuddenLight(string msg, bool j, int v);
    event SuddenDeviceOpening(string msg, bool o, int v);

    function Refund() OnlyContainer{
        if(alert != alertType.None){
            receiver.transfer(shipmentPrice);
            ShipmentViolatedandRefund(msg.sender);
            selfdestruct(msg.sender);
        }
    }
    function violationOccurred(string msg, alertType v, int value) OnlyContainer{
        alert= v;
        if(alert == alertType.Temp){
            temper = value;
            TemperAlert( msg ,true, temper);
        }
        else if(alert == alertType.Light){
            light  = value;
            SuddenLight(msg, true, light);
        }
        else if(alert == alertType.Open){
            open = value;
            SuddenDeviceOpening(msg, true, open);
        }
        Refund();
    }


}
