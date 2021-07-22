<?php
session_start();
include_once 'Controller/Main_Func.php';

$mainObj =new Main_Func();
if (isset($_GET['id']))
{
    $_SESSION['Qid'] = $_GET['id'];

}
$questionData = $mainObj->getQuestion($_SESSION['Qid']);
$userID = $_SESSION['UserID'];
$userData = $mainObj->userInfo($userID);

$answersData = $mainObj->getAnswers($questionData['ID']);

if (isset($_GET['submitAns']))
{
 $ansData = $_GET['ans'];
$mainObj->answerQuestion($ansData,$questionData['ID'],$userID);

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

    $ref = "Question_Post.php";
    echo '<script>window.location = "'.$ref.'"</script>';
    exit;

}
if(isset($_GET['downvote']))
{
    $data = $_GET;
    $qData = $mainObj->getQuestion($data['downvote']);
    $dbObj = new DataBase();
    $sql = "UPDATE question SET downvote_count = ? where ID = ".$data['downvote'];
    $newCount = $qData['downvote_count'] + 1;
    $conn = $dbObj->getConnection();
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([$newCount]);
    }
    catch (PDOException $exception)
    {
        echo $exception;
    }

    $ref = "Question_Post.php";
    echo '<script>window.location = "'.$ref.'"</script>';
    exit;

}
if(isset($_GET['ans_upvote']))
{
    $data = $_GET;
    $qData = $mainObj->getAnswer($data['ans_upvote']);
    $dbObj = new DataBase();
    $sql = "UPDATE answer SET upvote = ? where ID = ".$data['ans_upvote'];
    $newCount = $qData['upvote'] + 1;
    $conn = $dbObj->getConnection();

//    print_r($qData);
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([$newCount]);
    }
    catch (PDOException $exception)
    {
        echo $exception;
    }

    $ref = "Question_Post.php";
    echo '<script>window.location = "'.$ref.'"</script>';
    exit;

}
if(isset($_GET['ans_downvote']))
{
    $data = $_GET;
    $qData = $mainObj->getAnswer($data['ans_downvote']);
    $dbObj = new DataBase();
    $sql = "UPDATE answer SET downvote = ? where ID = ".$data['ans_downvote'];
    $newCount = $qData['downvote'] + 1;
    $conn = $dbObj->getConnection();

//    print_r($qData);
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute([$newCount]);
    }
    catch (PDOException $exception)
    {
        echo $exception;
    }

    $ref = "Question_Post.php";
    echo '<script>window.location = "'.$ref.'"</script>';
    exit;

}

?>
<html>
    <head>
         <script type="text/javascript" src="Semantic-UI-CSS-master/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.css">
        <link rel="stylesheet" type="text/css" href="materialize_button.css">
        <script type="text/javascript" src="Semantic-UI-CSS-master/semantic.min.js"></script>
        <link rel="stylesheet" type="text/css" href="medals.css">
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
            <h3 class="ui center aligned icon header">
                         <div class="item">
                              <img class="ui tiny centered circular image" src="kk.jpg"/><br/>
                            <div class="content">
                                    <br/>
                             </div>
                        </div>
              </h3> </a>
                       <div class="ui fluid buttons">
                            
                                <a class="ui button" href="unregisterhome.php"><button class="ui button">
                                        Logout <i class="sign out icon"></i>
                                    </button></a>
                                    <a class="ui button" href="setting.php"><button class="ui button">
                                        Setting <i class="settings icon"></i>
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
              
              <a class="item" href="Home.php"><i class="large blue newspaper icon"></i></a>
              <a class="item"><i class="large blue talk icon" id="event1"></i></a>
              <a class="item sidebar"><i class="large blue user outline icon"></i></a>
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
                                <a class="ui label">Gym and Fitness</a>
                                <br/>
                                <a class="ui grey label">Tech</a>
                                <a class="ui yellow label">Networking</a>
                                <a class="ui blue label">Lakwan</a>
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
                        <h2 class="ui orange header">Question</h2>
                    </div>
                      <div class="ui raised piled segment">
                        <div class="ui items">
                          <div class="item">
                            <div class="content">
                              <h2 class="header"><?php echo $questionData['Title'];?></h2>
                                <span class="right floated time"><?php echo $questionData['DATE'];?></span>
                                <div class="ui divider"></div>
                                    <a class="ui label"><?php echo $questionData['Type'];?></a>
                                    <a class="ui grey label">Tech</a>
                                    <a class="ui yellow label">Networking</a>
                                    <a class="ui blue label">Lakwan</a>
                                    <div class="right floated author">
                                  <img class="ui avatar image" src="kk.jpg">

                                        <?php
                                        $ques  = $mainObj->userInfo($questionData['Question_UserID']);
                                        echo $ques['Name'];
                                        ?>
                                </div>
                                <div class="ui divider"></div>
                              <div class="description">
                                  <?php echo '  </div>
                                <div class="ui divider"></div>
                                <div class="description">'; ?>
                                    <?php echo $questionData['Question']; ?>
                                  <div class="ui divider"></div>
                              </div>
                              <div class="extra">
                                <span class="left floated like">
                                    <div class="ui tiny teal statistic">
                                      <div class="value">
                                        <a class="ui label"> <?php echo $questionData['upvote_count']; ?></a>
                                      </div>
                                      <div class="label">
                                        <i class="teal thumbs up icon"></i>UpVotes
                                      </div>
                                    </div>
                                    <div class="ui tiny red statistic">
                                      <div class="value">
                                        <a class="ui label"><?php echo $questionData['downvote_count']; ?></a>
                                      </div>
                                      <div class="label">
                                        <i class="red thumbs down icon"></i>DownVotes
                                      </div>
                                    </div>
                                </span>
                                  <form action="Question_Post.php?test=t" method="get">
                                      <div class="right floated author">
                                          <button class="ui  button" type="submit" name="upvote" value="<?php echo $questionData['ID']; ?>"><i class="teal thumbs up icon"></i>UpVote</button>
                                          <button class="ui button" type="submit" name="downvote"  value="<?php echo $questionData['ID']; ?>"><i class="red thumbs down icon"></i>Downvote</button>
                                      </div>
                                  </form>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>


            <br/>
            <!--Start answers-->
                <div class="ui grid">
                    <div class="ui ten wide column">
                        <div class="ui horizontal divider">
                            <h3 class="ui centered orange header">Answers</h3>
                        </div>
                        <?php
                        if ($answersData)
                        {
                            foreach ($answersData as $row) {
                                echo '<div class="ui raised segment">
                                    <div class="ui items">
                                      <div class="item">
                                        <div class="content">
                                          
                                              <img class="ui avatar image" src="kk.jpg">';
                                $showD = $mainObj->userInfo($row['Answer_UserID']);
                                echo $showD['Name'] . " Answer This";

                                echo '<div class="ui divider"></div>
                                          <div class="description">
                                            <p>';
                                echo $row['Answer'];

                                echo '</p>
                                              <div class="ui divider"></div>
                                          </div>
                                          <div class="extra">
                                            <span class="left floated like">
                                                <div class="ui tiny teal statistic">
                                                  <div class="value">
                                                    <a class="ui label">'.$row['upvote'].'</a>
                                                  </div>
                                                  <div class="label">
                                                    <i class="teal thumbs up icon"></i>UpVotes
                                                  </div>
                                                </div>
                                                <div class="ui tiny red statistic">
                                                  <div class="value">
                                                     <i class="ui label">'.$row['downvote'].'</i>
                                                  </div>
                                                  <div class="label">
                                                    <i class="red thumbs down icon"></i>DownVotes
                                                  </div>
                                                </div>
                                            </span>
                                            <form action="Question_Post.php?test=t" method="get">
                                  <div class="right floated author">
                                  <button class="ui  button" type="submit" name="ans_upvote" value="'.$row['ID'].'"><i class="teal thumbs up icon"></i>UpVote</button>
                                  <button class="ui button" type="submit" name="ans_downvote"  value="'.$row['ID'].'"><i class="red thumbs down icon"></i>Downvote</button>
                                </div>
                                </form>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                            </div>';
                            }
                        }
                        else
                        {
                            echo 'No answer yet';
                        }
                        ?>

            </div>

                <br/>

                    </div>
            </div>
                <div class="ui raised segment">
                    <h3 class="ui centered brown header">Add your answer here</h3>
                    <form class="ui reply form" action="Question_Post.php" method="get">
                        <div class="field">
                            <textarea name="ans[answer]"></textarea>
                        </div>
                        <button type="submit" name="submitAns" class="ui teal fluid icon button">
                            <i class="icon edit"></i> Add your answer
                        </button>
                    </form>
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
                                <a class="item" target="_blank">2019 Copyright. All right reserved.</a>
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
                                <form class="ui form">
                                <div class="field">
                                    <input type="text" name="email" placeholder="Question's Title">
                                  </div>
                                <select name="skills" multiple="" class="ui fluid search multiple dropdown" >
                                    <option value="">Tags</option>
                                    <option value="Role1">Gym and Fitness</option>
                                    <option value="Role2">Technology</option>
                                    <option value="Role3">Health</option>
                                    <option value="Role3">Beauty</option>
                                    <option value="Role3">Sport</option>
                                </select> <br/>
                                <div class="field">
                                  <textarea maxlength="100" placeholder="Enter your Question in detail"></textarea>
                                </div>
                                <div class="ui teal fluid button">
                                    <i class="send icon"></i>Request</div><br/>
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
        -->
        <script>
    $('.ui.search')
  .search({
    type: 'category',
    source: categoryContent
  })
;
    </script>
    </body>
</html>



