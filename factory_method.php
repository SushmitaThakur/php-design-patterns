<!-- 
This program demonstrate Factory Method design pattern.
Usage Scenario - 
    1. When uncertain about the type of object we might need to create
    2. Separates the object creation code from the business logic that uses a product
    3. New Products can be added by simply extending the Product interface

Tutorial Credit: PHP Design Pattern Course (https://app.pluralsight.com/)
 -->

<?php

// Prodcut interface
interface Transport{

    public function ready() : void;
    public function dispatch(): void;
    public function deliver(): void;

}

class PlaneTransport implements Transport{
    public function ready() : void{
        echo "Courier ready to be sent to the plane. \n";
    }
    public function dispatch(): void{
        echo "Courier is on the plane. \n";
    }
    public function deliver(): void{
        echo "Courier from the plane is delivered. \n";
    }
}

class TruckTransport implements Transport{
    public function ready() : void{
        echo "Courier ready to be sent to the truck. \n";
    }
    public function dispatch(): void{
        echo "Courier is on the truck. \n";
    }
    public function deliver(): void{
        echo "Courier from the truck is delivered. \n";
    }
}

// Abstract base class and factory method
abstract class Courier{
    // Factory Method
    abstract function getCourierTransport() : Transport;

    public function sendCourier() {
        $transport = $this->getCourierTransport();
        $transport->ready();
        $transport->dispatch();
        $transport->deliver();
    }
}

// Concrete creators
class AirCourier extends Courier{
    public function getCourierTransport() : Transport{
        return new PlaneTransport();
    }

}
class TruckCourier extends Courier{
    public function getCourierTransport() : Transport{
        return new TruckTransport();
    }

}

// Client code
function deliverCourier(Courier $c){
    return $c->sendCourier();
}

// Example usage:
$airCourier = new AirCourier();
deliverCourier($airCourier);

$truckCourier = new TruckCourier();
deliverCourier($truckCourier);