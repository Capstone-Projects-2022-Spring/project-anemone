<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NotePage</title>
    <link rel="stylesheet" href="../Css/Note.css">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1" />

</head>
<body>
    <div id="header">
        <div id="name">Anemone Note</div>
        <div id="menubutton"><a id="menulink" href="#">MENU</a></div>
        <div id="menu" class="hiddenmenu">
            <div class="menuitem"><a id="home" href="#">Home</a></div>
            <div class="menuitem"><a id="about" href="#">About us</a></div>
        </div>
        <div class="clear"></div>
    </div>
    <div id="container">
        <textarea id="area" rows="10" cols="50"></textarea>
    </div>
    <div id="controls">
        <p><a href="javascript:save();" class="button">Save</a>
            <a href="javascript:clear();" class="button">Clear</a></p>
    </div>
    <div class="footer">
        <p>Copyright (c) 2022 Anemone Note</p>
    </div>
</body>
</html>