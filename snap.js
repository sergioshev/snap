$( document ).ready( function () {
  $.getJSON("ajaxGetRegs.php", 
    function(data) { 
      $.each(data, 
        function (k, v) {
          $("#" + k + "-display")[0].innerHTML = v["displayName"]+
          "   min:" + v['min'] + " max:" + v['max'];
          var td = $("#" + k + "-curr");
          var flow = $("#" + k + "-flow");
          $.ajax("ajaxGetCurrentValue.php", 
            { cache: false,
              dataType: "json",
              data: { "reg" : k },
              type: "POST",
              timeout: 5000,
              success:
                function(data, textStatus, xhr) {
                  td[0].innerHTML = data[k];
                  flow[0].innerHTML = data['flow'];
                  td.addClass("success");
                },
              error: 
                function (xhr, textStatus, error) {
                  td[0].innerHTML = error;
                  td.addClass("error");
                }
            }
          ); 
        });
    });
  $("input.button").click(
    function() {
      $(this).prop('disabled', true);
      $.getJSON("ajaxGetRegs.php", 
        function(data) { 
          var j = 0;
          $.each(data, 
            function (k, v) {
              var inputValue = $("#" + k + "-new :input").val();
              $("#" + k + "-new :input").val(null);
              var td = $("#" + k + "-curr");
              var flow = $("#" + k + "-flow");
              var min = v['min'];
              var max = v['max'];
              if (inputValue.length > 0 && ! isNaN(inputValue) &&
                  inputValue >= min && inputValue <= max ) {
                j++;
                $.ajax("ajaxWriteValue.php", {
                    cache: 'false',
                    dataType: 'json',
                    data: {
                      reg: k,
                      value: inputValue
                    },
                    type: 'POST',
                    timeout: 30000,
                    success: function(data, textStatus, xhr) {
                      td[0].innerHTML = data[k];
                      flow[0].innerHTML = data['flow'];
                      td.addClass("success");
                      td.removeClass("error");
                    },
                    error: function(xhr, textStatus, error) {
                      td[0].innerHTML = error;
                      td.addClass("error");
                      td.removeClass("success");
                    }
                  }
                );
              }
            });
          //alert("valores enviados:"+j);
        });
      $(this).prop('disabled', false); 
    });
})
