<html>
  <head>
    <title>Ajax Search Box using PHP and MySQL</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">        </script>
     <script src="js/typeahead.js"></script>
    </head>
    <body>
     <input type="text" name="typeahead">
     <script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'component/search.php?key=%QUERY',
        limit : 10
    });
});
    </script>
    </body>
    </html>