<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anemone</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <div class="clearfix">
        <div id="main" class="float-left">
            <div class="nav-search">
                <div class="search-bar">
                    <form action=""><input type="text" placeholder="Search"></form>
                </div>
                <div class="nav">
                    <div class="extension">
                        <a href="login" title="log in">
                            <img src="../imgs/icon/user.png" alt="">{{ auth()->user()->name }}
                        </a>
                        
                        <!-- <a href="#" title="add a note">
                            <img src="../imgs/icon/book-alt.svg" alt="">
                        </a> -->
                    </div>
                    <div class="more">
                        <div class="title">
                            <h2>DOCUMENTATION</h2>
                        </div>
                        <div class="info">
                            <ul class="list">
                                <li class="each">
                                    <a href="#">
                                        <div class="wrapper"><span class="name">Android</span></div>
                                    </a>
                                </li>
                                <li class="each">
                                    <a href="#">
                                        <div class="wrapper"><span class="name">Android</span></div>
                                    </a>
                                </li>
                                <li class="each">
                                    <a href="#">
                                        <div class="wrapper"><span class="name">Android</span></div>
                                    </a>
                                </li>
                                <li class="each">
                                    <a href="#">
                                        <div class="wrapper"><span class="name">Android</span></div>
                                    </a>
                                </li>
                                <li class="each">
                                    <a href="#">
                                        <div class="wrapper"><span class="name">Android</span></div>
                                    </a>
                                </li>
                                <li class="each">
                                    <a href="#">
                                        <div class="wrapper"><span class="name">Android</span></div>
                                    </a>
                                </li>
                                <li class="each">
                                    <a href="#">
                                        <div class="wrapper"><span class="name">Android</span></div>
                                    </a>
                                </li>
                                <li class="each">
                                    <a href="#">
                                        <div class="wrapper"><span class="name">Android</span></div>
                                    </a>
                                </li>
                                <li class="each">
                                    <a href="#">
                                        <div class="wrapper"><span class="name">Android</span></div>
                                    </a>
                                </li>
                                <li class="each">
                                    <a href="#">
                                        <div class="wrapper"><span class="name">Android</span></div>
                                    </a>
                                </li>
                                <li class="each">
                                    <a href="#">
                                        <div class="wrapper"><span class="name">Android</span></div>
                                    </a>
                                </li>
                                <li class="each">
                                    <a href="#">
                                        <div class="wrapper"><span class="name">Android</span></div>
                                    </a>
                                </li>
                                <li class="each">
                                    <a href="#">
                                        <div class="wrapper"><span class="name">Android</span></div>
                                    </a>
                                </li>
                                <li class="each">
                                    <a href="#">
                                        <div class="wrapper"><span class="name">Android</span></div>
                                    </a>
                                </li>
                                <li class="each">
                                    <a href="#">
                                        <div class="wrapper"><span class="name">Android</span></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="display" class="float-right">
            <form class="note-form" action="{{ route('documents') }}" method="post">
                @csrf
                <input class="note-info" type="text" name="note-lable">
                <input class="addbtn" type="submit" value="add">
                <div><p class="note1">node 1:Lorem ipsum dolor sit amet.</p><input type="submit" value="delete"></div>
                <div><p class="note2">node 1:Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.Lorem ipsum dolor sit amet.s</p><input type="submit" value="delete"></div>
                <div><p class="note1">node 1:Lorem ipsum dolor sit amet.</p><input type="submit" value="delete"></div>
            </form>
        </div>
    </div>
</body>

</html>