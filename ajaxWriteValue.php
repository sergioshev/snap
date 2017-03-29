<?php
  include_once("regData.php");
  include_once("/usr/local/lib/phpmodbus/ModbusMaster.php");

  function writeValue($reg, $value) {
    global $regData;
    global $plcData;
    $ret = array(
      "$reg" => null,
      'flow' => null
    );

    if (array_key_exists($reg, $regData) && 
         ($value >= $regData[$reg]["min"] &&
          $value <= $regData[$reg]["max"])) {

      $plcId = $regData[$reg]["location"];
      $addr = $regData[$reg]["dir"];
      $plcIp = $plcData[$plcId]["ip"];

      $modBus = new ModbusMaster ($plcIp, 'TCP');
      $dataTypes = array("WORD");
      $flow = 0;
      $plcValue = $value;
      if (array_key_exists("writeHandler", $regData[$reg])) {
        $plcValue = call_user_func($regData[$reg]['writeHandler'], $value);
        if (array_key_exists("flowHandler", $regData[$reg])) {
          $flow = call_user_func($regData[$reg]['flowHandler'], $value);
        }
      }
      $dataArray = array($plcValue);

      try {
        //FC16
        $modBus->writeMultipleRegister(0, $addr, $dataArray, $dataTypes);
        $ret[$reg] = $value;
        $ret['flow'] = $flow;
      } catch (Exception $e) {
        header('HTTP/1.1 500 Write plc error');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array(
              'message' => $e->getMessage(),
              'code' => 1,
              'reg' => $reg)));
      }
    }
    return $ret;
  }
  
  function setSem() {
    $id = ftok(__FILE__, "s");
    if ( $id < 0 ) { return null; }
    $semRes = sem_get($id);
    if ($semRes === false) { return null; }
    $semAcq = sem_acquire($semRes, false);
    if ($semAcq === false) { return null; }
    return $semRes;
  }

  function releaseSem($semRes) {
    sem_release($semRes);
  }

  $reg = null;
  $data = null;/* 
/* 
  $_POST['reg'] = 'MW102';
  $_POST['value'] = 500;
*/

  $clientIp = $_SERVER['REMOTE_ADDR'];
  $allowRequest = array_key_exists($clientIp, $permitedHosts);
  
  if ($allowRequest) {
    $allowRequest = $permitedHosts[$clientIp];
  }

  if ($allowRequest == false) {
    header("HTTP/1.1 500 Ip [$clientIp] forbidden");
    header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array(
      'message' => "Ip [$clientIp] forbidden",
      'code' => 3,
      'ip' => $clientIp)));
  }
 
  if (!empty($_POST['reg'])) {
    $reg = $_POST['reg'];
    $value = $_POST['value'];
    
    $semId = setSem();
    if (empty($semId)) {
      header('HTTP/1.1 500 Lock acquire error');
      header('Content-Type: application/json; charset=UTF-8');
      die(json_encode(array(
        'message' => "Semaphore acquire error",
        'code' => 2,
        'reg' => $reg)));
    }

    $data = writeValue($reg, $value);
    releaseSem($semId);
    header("Content-Type: application/json");
    echo json_encode($data);
  }
?>
