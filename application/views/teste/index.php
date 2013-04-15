<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>oi</title>
</head>
<body>
  <div class="form">
  <form method="post" action="process.php">
    <div id="city">
      <label>City</label>
      <input type="text" name="city" class="text" />
    </div>
    <div>
      <input type="submit" id="submit"/>
    </div>
  </form>
  </div>
</body>
</html>

<script type="text/javascript">
  $( "#city" ).autocomplete({
  source: function( request, response ) {
    $.ajax({
      url: "http://ws.geonames.org/searchJSON",
      dataType: "jsonp",
      data: {
        featureClass: "P",
        style: "full",
        maxRows: 12,
        name_startsWith: request.term
      },
      success: function( data ) {
        //Display city name, state name, country name
        response( $.map( data.geonames, function( item ) {
          return {
            label: item.name + (item.adminName1 ? ", " + item.adminName1 : "") + ", " + item.countryName,
            value: item.name + (item.adminName1 ? ", " + item.adminName1 : "") + ", " + item.countryName
          }
        }));
      }
    });
  },
  minLength: 2,
  select: function( event, ui ) {
    $('#city').val(ui.item.value);
    return false;
  }
});
</script>

