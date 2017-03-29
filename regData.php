<?php
  $permitedHosts = array(
    '192.168.1.154' => true,
    '192.168.1.98' => false,
    '192.168.1.132' => true,
    '192.168.1.133' => true,
    '192.168.1.131' => true,
    '192.168.1.129' => true
  );

  $plcData = array(
    'plcTorre1' => array (
      'ip' => '192.168.10.82',
      'regs' => array(
        'MW101', 'MW102', 'MW103', 'MW104', 'MW105', 'MW106', 'MW107',
        'MW109', 'MW110', 'MW111', 'MW112', 'MW113', 'MW114', 'MW115'
      )
    ),
    'plcTorre2' => array (
      'ip' => '192.168.10.89',
      'regs' => array(
        'MW574', 'MW575', 'MW576', 'MW577', 'MW578',
        'MW582', 'MW583', 'MW584', 'MW585', 'MW586'
      )
    )
  );


  $regData = array(
    "MW101" => array(
      "dir" => 101,
      "min" => 20,
      "max" => 50,
      "words" => 1,
      "readHandler" => 'readValueHandler',
      "writeHandler" => 'writeValueHandler',
      "flowHandler" => 'flowHandlerT1',
      "location" => 'plcTorre1',
      "displayName" => "Snap N1"
    ),
    "MW102" => array(
      "dir" => 102,
      "min" => 20,
      "max" => 50,
      "words" => 1,
      "readHandler" => 'readValueHandler',
      "writeHandler" => 'writeValueHandler',
      "flowHandler" => 'flowHandlerT1',
      "location" => 'plcTorre1',
      "displayName" => "Snap N2"
    ),
    "MW103" => array(
      "dir" => 103,
      "min" => 20,
      "max" => 50,
      "words" => 1,
      "readHandler" => 'readValueHandler',
      "writeHandler" => 'writeValueHandler',
      "location" => 'plcTorre1',
      "flowHandler" => 'flowHandlerT1',
      "displayName" => "Snap N3"
    ),
    "MW104" => array(
      "dir" => 104,
      "min" => 20,
      "max" => 50,
      "words" => 1,
      "readHandler" => 'readValueHandler',
      "writeHandler" => 'writeValueHandler',
      "flowHandler" => 'flowHandlerT1',
      "location" => 'plcTorre1',
      "displayName" => "Snap N4"
    ),
    "MW105" => array(
      "dir" => 105,
      "min" => 20,
      "max" => 50,
      "words" => 1,
      "readHandler" => 'readValueHandler',
      "writeHandler" => 'writeValueHandler',
      "flowHandler" => 'flowHandlerT1',
      "location" => 'plcTorre1',
      "displayName" => "Snap N6"
    ),
    "MW106" => array(
      "dir" => 106,
      "min" => 20,
      "max" => 50,
      "words" => 1,
      "readHandler" => 'readValueHandler',
      "writeHandler" => 'writeValueHandler',
      "flowHandler" => 'flowHandlerT1',
      "location" => 'plcTorre1',
      "displayName" => "Snap N6"
    ),
    "MW107" => array(
      "dir" => 107,
      "min" => 20,
      "max" => 50,
      "words" => 1,
      "readHandler" => 'readValueHandler',
      "writeHandler" => 'writeValueHandler',
      "flowHandler" => 'flowHandlerT1',
      "location" => 'plcTorre1',
      "displayName" => "Snap N7"
    ),
    "MW109" => array(
      "dir" => 109,
      "min" => 4000,
      "max" => 20000,
      "words" => 1,
      "location" => 'plcTorre1',
      "displayName" => "Dosif. N1"
    ),
    "MW110" => array(
      "dir" => 110,
      "min" => 4000,
      "max" => 20000,
      "words" => 1,
      "location" => 'plcTorre1',
      "displayName" => "Dosif. N2"
    ),
    "MW111" => array(
      "dir" => 111,
      "min" => 4000,
      "max" => 20000,
      "words" => 1,
      "location" => 'plcTorre1',
      "displayName" => "Dosif. N3"
    ),
    "MW112" => array(
      "dir" => 112,
      "min" => 4000,
      "max" => 20000,
      "words" => 1,
      "location" => 'plcTorre1',
      "displayName" => "Dosif. N4"
    ),
    "MW113" => array(
      "dir" => 113,
      "min" => 4000,
      "max" => 20000,
      "words" => 1,
      "location" => 'plcTorre1',
      "displayName" => "Dosif. N5"
    ),
    "MW114" => array(
      "dir" => 114,
      "min" => 4000,
      "max" => 20000,
      "words" => 1,
      "location" => 'plcTorre1',
      "displayName" => "Dosif. N6"
    ),
    "MW115" => array(
      "dir" => 115,
      "min" => 4000,
      "max" => 20000,
      "words" => 1,
      "location" => 'plcTorre1',
      "displayName" => "Dosif. N7"
    ),
    "MW574" => array(
      "dir" => 574,
      "min" => 20,
      "max" => 50,
      "words" => 1,
      "readHandler" => 'readValueHandler',
      "writeHandler" => 'writeValueHandler',
      "flowHandler" => 'flowHandlerT2',
      "location" => 'plcTorre2',
      "displayName" => "Snap N1"
    ),
    "MW575" => array(
      "dir" => 575,
      "min" => 20,
      "max" => 50,
      "words" => 1,
      "readHandler" => 'readValueHandler',
      "writeHandler" => 'writeValueHandler',
      "flowHandler" => 'flowHandlerT2',
      "location" => 'plcTorre2',
      "displayName" => "Snap N2"
    ),
    "MW576" => array(
      "dir" => 576,
      "min" => 20,
      "max" => 50,
      "words" => 1,
      "readHandler" => 'readValueHandler',
      "writeHandler" => 'writeValueHandler',
      "flowHandler" => 'flowHandlerT2',
      "location" => 'plcTorre2',
      "displayName" => "Snap N3"
    ),
    "MW577" => array(
      "dir" => 577,
      "min" => 20,
      "max" => 50,
      "words" => 1,
      "readHandler" => 'readValueHandler',
      "writeHandler" => 'writeValueHandler',
      "flowHandler" => 'flowHandlerT2',
      "location" => 'plcTorre2',
      "displayName" => "Snap N4 A"
    ),
    "MW578" => array(
      "dir" => 578,
      "min" => 20,
      "max" => 50,
      "words" => 1,
      "readHandler" => 'readValueHandler',
      "writeHandler" => 'writeValueHandler',
      "flowHandler" => 'flowHandlerT2',
      "location" => 'plcTorre2',
      "displayName" => "Snap N4 B"
    ),
    "MW582" => array(
      "dir" => 582,
      "min" => 4000,
      "max" => 20000,
      "words" => 1,
      "location" => 'plcTorre2',
      "displayName" => "Dosif. N1"
    ),
    "MW583" => array(
      "dir" => 583,
      "min" => 4000,
      "max" => 20000,
      "words" => 1,
      "location" => 'plcTorre2',
      "displayName" => "Dosif. N2"
    ),
    "MW584" => array(
      "dir" => 584,
      "min" => 4000,
      "max" => 20000,
      "words" => 1,
      "location" => 'plcTorre2',
      "displayName" => "Dosif. N3"
    ),
    "MW585" => array(
      "dir" => 585,
      "min" => 4000,
      "max" => 20000,
      "words" => 1,
      "location" => 'plcTorre2',
      "displayName" => "Dosif. N4 A"
    ),
    "MW586" => array(
      "dir" => 586,
      "min" => 4000,
      "max" => 20000,
      "words" => 1,
      "location" => 'plcTorre2',
      "displayName" => "Dosif. N4 B"
    )
  );


  function readValueHandler($value) {
    $newValue = (int)($value/10);
    return $newValue;
  }

  function writeValueHandler($value) {
    $newValue = (int)($value*10);
    return $newValue;
  }

  function flowHandlerT1($value) {
    //litros por minuto
    $lpm = 25;
    //frecuencia hz
    $freq = 50;
    $coef = $lpm / $freq;
    return round($value*$coef, 2);
  }

  function flowHandlerT2($value) {
    //litros por minuto
    $lpm = 30;
    //frecuencia hz
    $freq = 50;
    $coef = $lpm / $freq;
    return round($value*$coef, 2);
  }


?>
