<link href="css/search.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">        </script>
<script src="typeahead.min.js"></script>
<script>
    $(document).ready(function(){
    $('input.typeahead').typeahead({
        name: 'typeahead',
        remote:'search.php?key=%QUERY',
        limit : 10
    });
});
    </script>
<form class="search">
  <input class=" typeahead" name="typeahead" type="text" placeholder="Cari produk">
  <i class="fa fa-search"></i>
</form>


    