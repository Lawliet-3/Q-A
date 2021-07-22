<?php
session_start();
include_once 'Controller/Main_Func.php';

$mainObj =new Main_Func();
if (isset($_SESSION['UserID']))
{
    $userID = $_SESSION['UserID'];
    $userData = $mainObj->userInfo($userID);
}
else
{
    echo "<script>alert('Please Register First')</script>";
    $ref = "Login.php";
    echo '<script>window.location = "'.$ref.'"</script>';
    exit;
}
if (isset($_GET['submit']))
{

    $situation = $mainObj->insertQuestion($_GET,$userID);

//    $ref = "Home.php";
//    echo '<script>window.location = "'.$ref.'"</script>';
//    exit;

}
if(isset($_GET['upvote']))
{
    $data = $_GET;
    $qData = $mainObj->getQuestion($data['upvote']);
    $dbObj = new DataBase();
    $sql = "UPDATE question SET upvote_count = ? where ID = ".$data['upvote'];
    $newCount = $qData['upvote_count'] + 1;
    $conn = $dbObj->getConnection();
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([$newCount]);
    }
    catch (PDOException $exception)
    {
        echo $exception;
    }

    $ref = "Home.php";
    echo '<script>window.location = "'.$ref.'"</script>';
    exit;

}
$questionsData = $mainObj->getAllQuestion();
?>
<html>
<title>home</title>
<head>
    <script type="text/javascript" src="Semantic-UI-CSS-master/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.css">
    <script type="text/javascript" src="Semantic-UI-CSS-master/semantic.min.js"></script>
    <style>

        .top.ui.menu {
            box-shadow: 1.5px 1.5px 6px 1px rgba(0, 0, 0, 0.2);
        }

        .top.ui.menu .item {
            padding: 20px;
        }

        .top.ui.secondary.menu .dropdown.item:hover, .top.ui.secondary.menu .link.item:hover, .top.ui.secondary.menu a.item:hover {
            background: none;
        }

        .ui.sidebar ~ .fixed, .ui.sidebar ~ .pusher {
            width: 100%;
        }

        .ui.visible.left.sidebar ~ .fixed, .ui.visible.left.sidebar ~ .pusher {
            width: calc(100% - 260px);
        }

        .pushable > .pusher {
            transition: transform 500ms ease, width 800ms ease;
        }
    </style>
    <style>
        .gg{
            margin-left: 40px;
            margin-right: 0px;
            font-size: 1.25em;
        }
        .gg2{
            margin-left: 20px;
            margin-right: 30px;
        }
    </style>
</head>
<body>
<div class="ui right wide sidebar vertical menu">
    <a class="center aligned item"><a class="item" href="prof.php">
            <h3 class="ui center aligned icon header" >
                <div class="item">

                    <img class="ui tiny centered circular image" src="unregis.jpg"/><br/>

                </div>
            </h3>
        </a>

        <div class="ui fluid buttons">

            <a class="ui button" href="Login.php"><button class="ui button">
                    Login <i class="sign in icon"></i>
                </button></a>


        </div>
    </a>

</div>
<div class="pusher">
    <div class="top ui secondary menu">
        <!--<a class="inverted item">Submit</a>-->
        <div class="left menu">

            <a class="item"><img class="ui tiny centered circular image" src="logo.png">QBOX</a>


        </div>
        <div class="right menu">

            <a class="item"><i class="large blue newspaper icon"></i></a>
            <a class="item"><i class="large blue talk icon" id="event1"></i></a>
            <a class="item sidebar"><i class="large blue user times icon"></i></a>
        </div>
    </div>

    <!--start of question and answers-->

    <div class="ui grid">
        <div class="ui three wide column">
            <div class="gg2"><br/>
                <h3 class="ui centered orange header">Categories</h3>
                <div class="ui raised piled segment">
                    <div class="ui items">
                        <div class="item">
                            <div class="content">
                                <a class="ui label" href="Gym.php">Gym and Fitness</a>
                                <br/>
                                <a class="ui grey label" href="Tech.php">Tech</a>
                                <a class="ui yellow label" href="Networking.php">Networking</a>

                                <a class="ui blue label">Heroes Evolved</a>

                                <a class="ui orange label">Mathematics</a>
                                <a class="ui navy label">Business</a>
                                <a class="ui brown label">Accounting</a>
                                <a class="ui red label">Dota2</a>
                                <a class="ui pink label">Mobilelegends</a>
                                <a class="ui teal label">Pubg</a>
                                <a class="ui olive label">Fortnite</a>
                                <a class="ui purple label">SuperMechaChampions</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="ui ten wide column">
            <div class="gg">
                <div class="ui horizontal divider">
                    <h2 class="ui orange header">Questions</h2>
                </div>
                <?php

                foreach ($questionsData as $row)
                {
                    echo '<div class="ui raised piled segment">
                        <div class="ui items">
                          <div class="item">
                            <div class="content">';
                    echo '<a href="Question_Post.php?id='.$row['ID'].'"> <div class="header">'.$row['Title'].'</div></a></h2>';
                    echo '<span class="right floated time"> Date'.$row['DATE'].'</span>
                                <div class="ui divider"></div>
                                    <a class="ui label">'.$row['Type'].'</a>
                                    <div class="right floated author">
                                  <img class="ui avatar image" src="pzyk.png"> 
                                                                  ';
                    $quesName = $mainObj->userInfo($row['Question_UserID']);
                    echo $quesName['Name'];
                    echo '  </div>
                                <div class="ui divider"></div>
                              <div class="description">';
                    echo '<p>'.$row['Question'].'</p>';
                    echo '<div class="ui divider"></div>
                              </div>
                              <div class="extra">
                                <span class="left floated like">
                                    <div class="ui tiny teal statistic">
                                      <div class="value">
                                        <a class="ui label">'.$row['upvote_count'].'</a>
                                      </div>
                                      <div class="label">
                                        <i class="teal thumbs up icon"></i>UpVotes
                                      </div>
                                    </div>
                                    <div class="ui tiny red statistic">
                                      <div class="value">
                                        <a class="ui label">'.$row['downvote_count'].'</a>
                                      </div>
                                      <div class="label">
                                        <i class="red thumbs down icon"></i>DownVotes
                                      </div>
                                    </div>
                                </span>
                              <form action="Home.php?test=t" method="get">
                                <div class="right floated author">
                                  <button class="ui  button" type="submit" name="upvote" value="'.$row['ID'].'"><i class="teal thumbs up icon"></i>UpVote</button>
                                  <button class="ui button" type="submit" name="downvote"  value="'.$row['ID'].'"><i class="red thumbs down icon"></i>Downvote</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
            </div>';
                }

                ?>
                </form>
                <div class="ui raised piled segment">
                    <div class="ui items">
                        <div class="item">
                            <div class="content">
                                <a href="Question_Post.php?id='.$row['ID'].'"> <div class="header">How?</div></a></h2>
                                <span class="right floated time">2019-07-24</span>
                                <div class="ui divider"></div>
                                <a class="ui label">Gym</a>
                                <div class="right floated author">
                                    <img class="ui avatar image" src="pzyk.png">

                                    Phyo
                                </div>
                                <div class="ui divider"></div>
                                <div class="description">

                                    <div class="ui divider"></div>
                                </div>
                                <div class="extra">
                                <span class="left floated like">
                                    <div class="ui tiny teal statistic">
                                      <div class="value">
                                        <a class="ui label">1</a>
                                      </div>
                                      <div class="label">
                                        <i class="teal thumbs up icon"></i>UpVotes
                                      </div>
                                    </div>
                                    <div class="ui tiny red statistic">
                                      <div class="value">
                                        <a class="ui label">1</a>
                                      </div>
                                      <div class="label">
                                        <i class="red thumbs down icon"></i>DownVotes
                                      </div>
                                    </div>
                                </span>
                                    <div class="right floated author">
                                        <button class="ui upvote button"><i class="teal thumbs up icon"></i>UpVote</button>
                                        <button class="ui downvote button"><i class="red thumbs down icon"></i>Downvote</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ui raised piled segment">
                    <div class="ui items">
                        <div class="item">
                            <div class="content">
                                <a href="Question_Post.php?id='.$row['ID'].'"> <div class="header">How?</div></a></h2>
                                <span class="right floated time">2019-07-24</span>
                                <div class="ui divider"></div>
                                <a class="ui label">Gym</a>
                                <div class="right floated author">
                                    <img class="ui avatar image" src="kp.jpg">

                                    Paing
                                </div>
                                <div class="ui divider"></div>
                                <div class="description">

                                    <div class="ui divider"></div>
                                </div>
                                <div class="extra">
                                <span class="left floated like">
                                    <div class="ui tiny teal statistic">
                                      <div class="value">
                                        <a class="ui label">1</a>
                                      </div>
                                      <div class="label">
                                        <i class="teal thumbs up icon"></i>UpVotes
                                      </div>
                                    </div>
                                    <div class="ui tiny red statistic">
                                      <div class="value">
                                        <a class="ui label">1</a>
                                      </div>
                                      <div class="label">
                                        <i class="red thumbs down icon"></i>DownVotes
                                      </div>
                                    </div>
                                </span>
                                    <div class="right floated author">
                                        <button class="ui upvote button"><i class="teal thumbs up icon"></i>UpVote</button>
                                        <button class="ui downvote button"><i class="red thumbs down icon"></i>Downvote</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--                     -->
                <!--                      <div class="ui raised piled segment">-->
                <!--                        <div class="ui items">-->
                <!--                          <div class="item">-->
                <!--                            <div class="content">-->
                <!--                              <h2 class="header">What is machine learning?</h2>-->
                <!--                                <span class="right floated time">2 days ago</span>-->
                <!--                                <div class="ui divider"></div>-->
                <!--                                    <a class="ui label">Gym and Fitness</a>-->
                <!--                                    <a class="ui grey label">Tech</a>-->
                <!--                                    <a class="ui yellow label">Networking</a>-->
                <!--                                    <a class="ui blue label">Lakwan</a>-->
                <!--                                    <div class="right floated author">-->
                <!--                                  <img class="ui avatar image" src="mhk.png"> Myat Htin Kyaw-->
                <!--                                </div>-->
                <!--                                <div class="ui divider"></div>-->
                <!--                              <div class="description">-->
                <!--                               -->
                <!--                                  <div class="ui divider"></div>-->
                <!--                              </div>-->
                <!--                              <div class="extra">-->
                <!--                                <span class="left floated like">-->
                <!--                                    <div class="ui tiny teal statistic">-->
                <!--                                      <div class="value">-->
                <!--                                        204-->
                <!--                                      </div>-->
                <!--                                      <div class="label">-->
                <!--                                        <i class="teal thumbs up icon"></i>UpVotes-->
                <!--                                      </div>-->
                <!--                                    </div>-->
                <!--                                    <div class="ui tiny red statistic">-->
                <!--                                      <div class="value">-->
                <!--                                        204-->
                <!--                                      </div>-->
                <!--                                      <div class="label">-->
                <!--                                        <i class="red thumbs down icon"></i>DownVotes-->
                <!--                                      </div>-->
                <!--                                    </div>-->
                <!--                                </span>-->
                <!--                                <div class="right floated author">-->
                <!--                                  <button class="ui upvote button"><i class="teal thumbs up icon"></i>UpVote</button>-->
                <!--                                  <button class="ui downvote button"><i class="red thumbs down icon"></i>Downvote</button>-->
                <!--                                </div>-->
                <!--                              </div>-->
                <!--                            </div>-->
                <!--                          </div>-->
                <!--                        </div>-->
                <!--            </div>-->




                <br/>

            </div>
        </div>
        <div class="ui three wide column">
            <div class="gg2"><br/>
                <h3 class="ui centered orange header">Top Questions</h3>

                <div class="ui special cards">
                    <div class="small card">

                        <div class="content">
                            <b class="item">What is Machine Learning?</b>

                        </div>
                        <!--<div class="extra content">
                          <a>
                            <i class="users icon"></i>
                            2 Members
                          </a>
                        </div>-->
                    </div>
                    <div class="small card">

                        <div class="content">
                            <b class="item">What is Machine Learning?</b>


                        </div></div>
                    <div class="small card">

                        <div class="content">
                            <b class="item">What is Machine Learning?</b>


                        </div> </div>
                    <div class="small card">

                        <div class="content">
                            <b class="item">What is Machine Learning?</b>


                        </div></div>
                    <!--<div class="extra content">
                      <a>
                        <i class="users icon"></i>
                        2 Members
                      </a>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <!--end-->

    <!--<div class="ui padded grid">
    </div>-->
    <!--Footer Start-->
    <div class="ui blue raised inverted vertical footer segment">
        <div class="ui container">
            <div class="ui grid">
                <div class="four wide column">
                    <div class="ui blue inverted segment">
                        <h4 class="ui inverted header">Help us</h4>
                        <div class="ui inverted link list">
                            <a class="item" href="" target="_blank">Report us</a>
                            <a class="item" href="" target="_blank">Submit an Issue</a>
                            <a class="item" href="" target="_blank">Join our Chat</a>
                            <a class="item" href="" target="_blank">Q & A</a>
                        </div>
                    </div>
                </div>
                <div class="four wide column">
                    <div class="ui blue inverted segment">
                        <h4 class="ui inverted header">Community</h4>
                        <div class="ui inverted link list">
                            <a class="item" href="" target="_blank">Contact us</a>
                            <a class="item" href="" target="_blank">About us</a>
                            <a class="item" href="" target="_blank">Find us on Facebook</a>
                        </div>
                    </div>
                </div>
                <div class="eight wide column">
                    <div class="ui blue inverted center aligned segment">
                        <div class="ui inverted link list"><br/>
                            <a class="item" target="_blank">Special Thanks from QBOX</a>
                            <a class="item" target="_blank">2019 Copyright. All right received.</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui divider"></div>
            <h2 class="ui centered inverted header"></h2>
        </div>
    </div>
    <!--Footer End-->
</div>

<!--Modal-->
<div class="ui modal inverted" id="modal1">
    <div class="ui teal center aligned header">
        Ask here
    </div>
    <div class="content">
        <div class="ui container">
            <form class="ui form" action="Home.php" method="get">
                <div class="field">
                    <input type="text" name="question[title]" placeholder="Question's Title">
                </div>
                <select name="skills[]"  multiple="multiple" class="ui fluid search multiple dropdown" >
                    <option value="">Tags</option>
                    <option value="Gym">Gym and Fitness</option>
                    <option value="Tech">Technology</option>
                    <option value="Health">Health</option>
                    <option value="Beauty">Beauty</option>
                    <option value="Sport">Sport</option>
                </select> <br/>
                <div class="field">
                    <textarea name="question[questions]" placeholder="Enter your Question in detail"></textarea>
                </div>
                <button type="submit" name="submit" class="ui teal fluid button">
                    <i class="send icon"></i>Request</button><br/>
            </form>
        </div>

    </div>
</div>

<script>
    $('.ui.fluid.dropdown').dropdown();
</script>
<script>
    $('.ui.sidebar')
        .sidebar('attach events', '.top.ui.menu .item.sidebar')
    ;
</script>
<script>
    $( document ).ready(function() {
        $('.ui.card .image').dimmer({on: 'hover'});
    });
    $('.ui.rating').rating({maxRating: 5});
</script>
<script>
    $.fn.api.settings.api = {
        'follow user': '/follow/{id}/'
    };

    // add event handler, triggers '/follow/22'
    $('.ui.upvote.button')
        .api({
            action: 'follow user'
        })
        .state({
            text: {
                inactive   : '<i class="teal thumbs up icon"></i>UpVote',
                active     : '<i class="teal thumbs up icon"></i>UpVoted',
                deactivate : '<i class="teal thumbs outline up icon"></i>Un-Vote'
            }
        })
    ;
</script>
<script>
    $.fn.api.settings.api = {
        'follow user': '/follow/{id}/'
    };

    // add event handler, triggers '/follow/22'
    $('.ui.downvote.button')
        .api({
            action: 'follow user'
        })
        .state({
            text: {
                inactive   : '<i class="red thumbs down icon"></i>Downvote',
                active     : '<i class="red thumbs down icon"></i>DownVoted',
                deactivate : '<i class="red thumbs outline down icon"></i>Un-Vote'
            }
        })
    ;
</script>

<script>
    <!--Hoverable cards-->
    $('.special.cards .image').dimmer({
        on: 'hover'
    });
</script>
<script>
    $('.ui.modal')
        .modal({
            blurring: true,
        })
        .modal('')
    ;
    $(document).on("click", "#event1", function() {
        $("#modal1").modal("setting.php", {
            closable : true,
            onApprove : function() {
                return false;
            }
        }).modal("show");
    })
</script>
<script>
    $(".dimmer").css("background-color","rgba()");
</script>
<!--
<script>
    $('.toggle')
        .state({
          text: {
            inactive : 'Vote',
            active   : 'Voted'
          }
        })
      ;
</script>
--><script>$('.ui.search')
        .search({
            type: 'category',
            source: categoryContent
        })
    ;</script>

</body>
</html>



