<?php

$mySoapClient = new \SoapClient('allocadence-ims.wsdl');

$data = ['hello' => 'world',];

/*
<?xml version="1.0"?>
<soap:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns="http://www.ubiquia.com/zenventory/services/">
    <soap:Body>
        <SavePurchaseOrderRequest>
            <session id="ideaguy3d">
                <user key="F4C78A1A-78C3-4254511D3876"/>
            </session>
            <purchaseOrder orderNumber="01012313886">
                <supplier name="Veritiv - Sacramento"/>
                <items quantity="10000">
                    <item sku="P1319-80WH" desc="13x19 80# white"/>
                </items>
            </purchaseOrder>
        </SavePurchaseOrderRequest>
    </soap:Body>
</soap:Envelope>
 */

$po1xml = <<<XML
<?xml version="1.0"?>
<envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns="http://www.ubiquia.com/zenventory/services/">
    <body>
        <SavePurchaseOrderRequest>
            <Session id="ideaguy3d">
                <User key="73FC4C0FB4DECDDD-DE0C-62E0"/>
            </Session>
            <purchaseOrder orderNumber="01012313886">
                <supplier name="Veritiv - Sacramento"/>
                <items quantity="10000">
                    <item sku="P1319-80WH" desc="13x19 80# white"/>
                </items>
            </purchaseOrder>
        </SavePurchaseOrderRequest>
    </body>
</envelope>
XML;

$po1oop = '';

$mySimpleXml = new SimpleXMLElement($po1xml);

$savePurchaseOrderRes = $mySoapClient->savePurchaseOrder($mySimpleXml);

$break = 'point';










//