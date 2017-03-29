<?php
  include_once("regData.php");
  include_once("/usr/local/lib/phpmodbus/ModbusMaster.php");
  include_once("/usr/local/lib/phpmodbus/PhpType.php");

  function getCurrentValue($reg) {
    global $regData;
    global $plcData;
    $ret = array(
      "$reg" => null,
      "flow" => null
    );

    if (array_key_exists($reg, $regData)) {
      $plcId = $regData[$reg]["location"];
      $addr = $regData[$reg]["dir"];
      $words = $regData[$reg]["words"];

      $plcIp = $plcData[$plcId]["ip"];
      $modBus = new ModbusMaster ($plcIp, 'TCP');
      try {
        $rawValue = $modBus->readMultipleRegisters(1, $addr, $words);
        $value = PhpType::bytes2unsignedInt($rawValue);
        $flow = 0;
        if (array_key_exists("readHandler", $regData[$reg])) {
          $value = call_user_func($regData[$reg]['readHandler'], $value);
          if (array_key_exists("flowHandler", $regData[$reg])) {
            $flow = call_user_func($regData[$reg]['flowHandler'], $value);
          }
        }
        $ret[$reg] = $value;
        $ret['flow'] = $flow;
      } catch (Exception $e) {
        header('HTTP/1.1 500 Read plc value error');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array(
              'message' => $e->getMessage(),
              'code' => 1,
              'reg' => $reg)));
      }
    }
    return $ret;
  }
  
  $reg = null;
  if (!empty($_POST['reg'])) {
    $reg = $_POST['reg'];
  }

  $data = getCurrentValue($reg);
  header("Content-Type: application/json");
  echo json_encode($data);
?>
