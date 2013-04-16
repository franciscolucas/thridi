<html>
<head>
<title>jQuery autocomplete with JSON / JSONP, overriding q and limit parameters to use geoNames.org</title>
<style>
.ac_results {
  padding: 0px;
  border: 1px solid black;
  background-color: white;
  overflow: hidden;
  z-index: 99999;
}

.ac_results ul {
  width: 100%;
  list-style-position: outside;
  list-style: none;
  padding: 0;
  margin: 0;
}

.ac_results li {
  margin: 0px;
  padding: 2px 5px;
  cursor: default;
  display: block;
  /* 
  if width will be 100% horizontal scrollbar will apear 
  when scroll mode will be used
  */
  /*width: 100%;*/
  font: menu;
  font-size: 12px;
  /* 
  it is very important, if line-height not setted or setted 
  in relative units scroll will be broken in firefox
  */
  line-height: 16px;
  overflow: hidden;
}

.ac_loading {
  background: white url('indicator.gif') right center no-repeat;
}

.ac_odd {
  background-color: #eee;
}

.ac_over {
  background-color: #0A246A;
  color: white;
}
</style>
<? $this->load->view('inc/head.php') ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
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
<form name="test" action="">
        <input id="city" name="city"> Type the start of a US city name in this field...
</form>
</body>
</html>

