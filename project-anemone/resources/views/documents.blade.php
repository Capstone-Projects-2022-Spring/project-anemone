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
                <input class="note-info" type="text" name="file_metadata">
                <input class="addbtn" type="submit" value="add">
            </form>
            @if($documents->count())
                @foreach($documents as $document)
                    @if($document->user_id == auth()->id())
                        <div>
                        <p>{{ $document->file_metadata }}</p>
                        </div>
                    @endif
                @endforeach
            @else
                <p>There are no posts<p>
            @endif
        </div>
    </div>
</body>

</html>