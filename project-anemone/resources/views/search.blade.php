<!DOCTYPE html>
<html>
<head>
    <title>Search from your Anemone Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
</head>
<body>
     
<div class="container">
    <h1>Search from your Anemone Database</h1>   
    <input class="typeahead form-control" id="search" type="text">
</div>
     
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
  
    $('#search').typeahead({
            source: function (query, process) {
                return $.get(path, {
                    query: query
                }, function (data) {
                    return process(data);
                });
            }
        });
  
</script>
     
</body>
</html>