<?php
  include_once("regData.php");
  
  function generateJson() {
    global $regData;
    foreach ($regData as $reg => $regDesc) {
      $regs[$reg]['displayName'] = $regDesc['displayName'] ;
      $regs[$reg]['max'] = $regDesc['max'] ;
      $regs[$reg]['min'] = $regDesc['min'] ;
    }
    return json_encode($regs);
  }

  header("Content-Type: application/json");
  echo generateJson();
?>
