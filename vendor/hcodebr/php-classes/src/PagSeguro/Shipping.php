<?php

namespace Hcode\PagSeguro;

use DOMDocument;
use DOMElement;
use Exception;

class Shipping {

    const PAC = 1;
    const SEDEX = 2;
    const OTHER = 3;
    
    private $address;
    private $type;
    private $cost;
    private $addressRequired;

    public function __construct(
        Address $address,
        float $cost,
        int $type,
        bool $addressRequired
    )
    {
        
        if ($type < 1 || $type > 3)
        {

            throw new Exception("Informe um tipo de frete válido.");

        }

        $this->address = $address;
        $this->cost = $cost;
        $this->type = $type;
        $this->addressRequired = $addressRequired;

    }

    public function getDOMElement():DOMElement
    {

        $dom = new DOMDocument();

        $shipping = $dom->createElement("shipping");
        $shipping = $dom->appendChild($shipping);

        $documents = $dom->createElement("documents", $this->documents);
        $documents = $shipping->appendChild($documents);

        $address = $this->address->getDOMElement();
        $address = $dom->importNode($address, true);
        $address = $documents->appendChild($address);

        $cost = $dom->createElement("cost", number_format($this->cost, 2, ".", ""));
        $cost = $shipping->appendChild($cost);

        $type = $dom->createElement("type", $this->type);
        $type = $shipping->appendChild($type);

        $addressRequerid = $dom->createElement("addressRequerid", ($this->addressRequerid ? "true" : "false"));
        $addressRequerid = $shipping->appendChild($addressRequerid);

        return $shipping;

    }

}