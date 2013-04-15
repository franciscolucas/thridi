<html>
<head>
<title>jQuery autocomplete with JSON / JSONP, overriding q and limit parameters to use geoNames.org</title>

<script type="text/javascript">
  $(document).ready(function() {
  $("#city").autocomplete("http://ws.geonames.org/searchJSON", {
    dataType: 'jsonp',
    parse: function(data) {
      var rows = new Array();
      data = data.geonames;
      for(var i=0; i<data.length; i++){
        rows[i] = { data:data[i], value:data[i].name, result:data[i].name };
      }
      return rows;
    },
    formatItem: function(row, i, n) {
      return row.name + ', ' + row.adminCode1;
    },
    extraParams: {
      // geonames doesn't support q and limit, which are the autocomplete plugin defaults, so let's blank them out.
      q: '',
      limit: '',
      country: 'US',
      featureClass: 'P',
      style: 'full',
      maxRows: 50,
      name_startsWith: function () { return $("#city").val() }
    },
    max: 50
  }); 
     
  });
</script>

</head>
<body>
This is a demonstration of a few things:
<ul>
  <li>hacking the jQuery autocomplete plugin to support JSONP data</li>
  <li>Overriding the default q and limit parameters that the autocomplete plugin sends (they're hard-coded!)</li>
  <li>Toying with the geonames.org web service, which allows you to do all sorts of great searches on geographic data</li>
</ul>
<form name="test" action="">
        <input id="city" name="city"> Type the start of a US city name in this field...
</form>
</body>
</html>

