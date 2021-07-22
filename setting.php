<html>
    <head>
        <title></title>
        <link href="Semantic-UI-CSS-master/Font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="Semantic-UI-CSS-master/date_time_picker.min.css" rel="stylesheet" type="text/css" />
          <script type="text/javascript" src="Semantic-UI-CSS-master/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="Semantic-UI-CSS-master/semantic.css">
        <script type="text/javascript" src="Semantic-UI-CSS-master/semantic.min.js"></script> 
        <script src="Semantic-UI-CSS-master/date_time_picker.min.js"></script>
    <style>
            .ui.a.segment {
              position: relative;
              background-color: #ffffff;
              box-shadow: 0px 1px 2px 0 rgba(34, 36, 38, 0.15);
              margin: 1rem 0em;
              padding: 0.8em 0.8em;
              border-radius: 0.28571429rem;
              border: 1px solid rgba(34, 36, 38, 0.15);
            }
            .ui.segment:first-child {
              margin-top: 0em;
            }

            .ui.segment:last-child {
              margin-bottom: 0em;
            }
        </style>
    <style>
             .top.ui.menu {
                  box-shadow: 1.5px 1.5px 6px 1px rgba(0, 0, 0, 0.2)
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
                margin-right: 6px;
                font-size: 1.25em;
            }
            .gg2{
                margin-left: 2px;
                margin-right: 10px;
            }
        </style>
    </head>
    <body>
        <div class="ui right wide sidebar vertical menu">
          <a class="center aligned item"><a class="item" href="prof.php">
            <h3 class="ui center aligned icon header">
                         <div class="item">
                              <img class="ui tiny centered circular image" src="kk.jpg"><br/>
                            <div class="content">
                                    Kaung Khant Kyaw<br/>
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
              
              <a class="item"><i class="large blue newspaper icon"></i></a>
              <a class="item"><i class="large blue talk icon" id="event1"></i></a>
              <a class="item sidebar"><i class="large blue user outline icon"></i></a>
            </div>
          </div>
            
        
        
        <div class="ui container">
            <div class="ui segment">
                <h2 class="ui center orange aligned header">Setting</h2><br/>
                <div class="ui grid">
                    <div class="four wide column">
                        <div class="ui secondary vertical pointing menu">
                            <a class="active orange item" data-tab="tab1">
                            Edit Profile
                            </a>
                            <a class="orange item" data-tab="tab2">
                            Change Email
                            </a>
                            <a class="orange item" data-tab="tab3">
                            Change Password
                            </a>
                            <a class="orange item" data-tab="tab4">
                            Delect Account
                            </a>
                        </div>
                    </div>
                    <div class="twelve wide column">
                        <div class="ui active tab" data-tab="tab1">
            <form class="ui large form">
                    <div class="field">
                        <label>Name</label>
                        <div class="two fields">
                            <div class="field">
                                <input name="fname" type="text" placeholder="First Name"/>
                            </div>
                            <div class="field">
                                <input name="lname" type="text" placeholder="Last Name"/>
                            </div>
                        </div>
                    </div>
                    <!--<div class="disabled field">
                        <label>Username</label>
                        <input name="username" type="text" placeholder="@phantom" disabled=""/>
                    </div>-->

                    <div class="field">
                    <label>Gender</label>
                        <div class="ui selection dropdown">
                          <input name="gender" type="hidden">
                          <i class="dropdown icon"></i>
                          <div class="default text">Gender</div>
                          <div class="menu">
                            <div class="item" data-value="1">Male</div>
                            <div class="item" data-value="0">Female</div>
                          </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Date of Birth</label>
                        <div class="ui calendar" id="example2">
                            <div class="ui input left icon">
                              <i class="calendar icon"></i>
                              <input type="text" placeholder="Date" name="dob">
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>Phone</label>
                        <input name="phone" type="tel" placeholder="+95" />  
                    </div>  
                    <div class="two fields">
                        <div class="field">
                            <label>Working As</label>
                            <input type="text" placeholder="Postion" name="work_as">
                        </div> 
                        <div class="field">
                            <label>Working At</label>
                            <input type="text" placeholder="Company, Organization,..." name="work_at">
                        </div> 
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label>Studying </label>
                            <input type="text" placeholder="Subjects" name="Subjects">
                        </div> 
                        <div class="field">
                            <label>Studying at</label>
                            <input type="text" placeholder="University or College" name="work_at">
                        </div> 
                    </div>
                    <div class="two fields">
                    <div class="field">
                        <label>Location<i class="marker large Map icon"></i></label>
                        <input type="text" placeholder="" name="location"/>
                    </div>
                    <div class="field">
                        <label>Division/State</label>
                        <div class="ui fluid selection dropdown">
                          <input name="division_state" type="hidden">
                          <i class="dropdown icon"></i>
                          <div class="default text">Select Division/State</div>
                          <div class="menu">
                        <div class="header">
                          <i class="map icon"></i>
                          Divisions
                        </div>
                        <div class="divider"></div>
                      <div class="item" data-value="Ayeyarwaddy Division">Ayeyarwaddy</div>
                      <div class="item" data-value="Bago">Bago</div>
                      <div class="item" data-value="Magwe">Magwen</div>
                      <div class="item" data-value="Mandalay">Mandalay</div>
                      <div class="item" data-value="Sagaing">Sagaing</div>
                      <div class="item" data-value="Taminthayi">Taminthayi</div>
                      <div class="item" data-value="Yangon">Yangon</div>
                          <div class="header">
                          <i class="map icon"></i>
                          States
                        </div>
                        <div class="divider"></div>
                      <div class="item" data-value="Chin">Chin</div>
                      <div class="item" data-value="Kachin">Kachin</div>
                      <div class="item" data-value="Kayah">Kayah</div>
                      <div class="item" data-value="Kayin">Kayin</div>
                      <div class="item" data-value="Mon">Mon</div>
                      <div class="item" data-value="Rakkhine">Rakkhine</div>
                      <div class="item" data-value="Shan">Shan</div>
                    </div>
                        </div>
                    </div>
                </div>
                <div class="ui right aligned grid">
                        <div class="thirteen wide column"></div>
                        <div class="three wide column"><button class="ui teal large button"type="submit">Submit</button></div>
                    </div>
        </form>
        </div>
              
        <div class="ui tab" data-tab="tab2">
              <form class="ui large form">
                    <div class="field">
                        <label>Current Email</label>
                        <input name="current_email" type="email" placeholder="email">
                    </div>
                    <div class="field">
                        <label>New Email</label>
                        <input name="new_email" type="email" placeholder="email">
                    </div>
                    <div class="ui error message"></div>
                    <div class="ui right aligned grid">
                        <div class="thirteen wide column"></div>
                        <div class="three wide column"><button class="ui teal large button"type="submit">Submit</button></div>
                    </div>
              </form>
        </div>
              
        <div class="ui tab" data-tab="tab3">
            <form class="ui large form">
                <div class="field">
                <label>Current Password</label>
                <input name="current_password" type="password" placeholder="Password">
            </div>
            <div class="field">
                <label>New Password</label>
                <input name="new_password" type="password" placeholder="Password">
            </div>
            <div class="field">
                <label>Confirm Password</label>
                <input name="confirm_password" type="password" placeholder="Password">
            </div>
            <div class="ui error message"></div>
            <div class="ui right aligned grid">
                        <div class="thirteen wide column"></div>
                        <div class="three wide column"><button class="ui teal large button"type="submit">Submit</button></div>
                    </div>
            </form>
        </div>
              
        <div class="ui tab" data-tab="tab4">
                <br/>
              <form class="ui large form">
                    <h3 class="ui teal header">Why do you want to delete your account?</h3>
                      <div class="inline field">
                        <div class="ui checkbox">
                          <input class="hidden" tabindex="0" type="checkbox">
                          <label>I have another QBOX Account.</label>
                        </div>
                      </div>
                      <div class="inline field">
                        <div class="ui checkbox">
                          <input class="hidden" tabindex="0" type="checkbox">
                          <label>I get too many emails, invitations, requests and notifications from QBOX.</label>
                        </div>
                        <label></label>
                      </div>
                      <div class="inline field">
                        <div class="ui checkbox">
                          <input class="hidden" tabindex="0" type="checkbox">
                          <label>I dont understand how to use QBOX.</label>
                        </div>
                      </div>
                        <div class="inline field">
                        <div class="ui checkbox">
                          <input class="hidden" tabindex="0" type="checkbox">
                          <label>I dont find QBOX useful.</label>
                        </div>
                      </div>
                        <div class="inline field">
                        <div class="ui checkbox">
                          <input class="hidden" tabindex="0" type="checkbox">
                          <label>I spend too muck time using QBOX.</label>
                        </div>
                      </div>
                        <div class="inline field">
                        <div class="ui checkbox">
                          <input class="hidden" tabindex="0" type="checkbox">
                          <label>I dont feel safe on QBOX.</label>
                        </div>
                      </div>
                        <div class="inline field">
                        <div class="ui checkbox">
                          <input class="hidden" tabindex="0" type="checkbox">
                          <label>I dont feel safe on QBOX.</label>
                        </div>
                      </div>
                        <div class="inline field">
                        <div class="ui checkbox">
                          <input class="hidden" tabindex="0" type="checkbox">
                          <label>I have a privacy concern.</label>
                        </div>
                      </div>
                        <div class="inline field">
                        <div class="ui checkbox">
                          <input class="hidden" tabindex="0" type="checkbox">
                          <label>My Account was hacked.</label>
                        </div>
                      </div>
                        <div class="inline field">
                        <div class="ui checkbox">
                          <input class="hidden" tabindex="0" type="checkbox">
                          <label>Other, please explain further:</label><br/>
                        </div><br/>
                            <textarea placeholder="Other......" rows="3"></textarea>
                      </div>
                  
                        <div class="ui right aligned grid">
                            <div class="thirteen wide column"></div>
                            <div class="three wide column"><button class="ui teal large button"type="submit">Delete</button></div>
                        </div>
              </form>
        </div>
            </div>
    </div>      
    </div> 
            </div>


            <br/><br/>
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
        
        <script>
            $('.ui.dropdown').dropdown({transation:'drop'});
        </script>
        
        <script>
             $('.ui.menu')
    .on('click', '.item', function() {
      if(!$(this).hasClass('dropdown')) {
        $(this)
          .addClass('active')
          .siblings('.item')
            .removeClass('active');
      }
    });
        </script>
       <!-- <script>
             $('.ui.pointing.menu')
    .on('click', '.item', function() {
      if(!$(this).hasClass('dropdown')) {
        $(this)
          .addClass('active')
          .siblings('.item')
            .removeClass('active');
      }
    });
        </script>-->
        
<!--        <script>
                  $('.ui.menu a.item')
        .on('click', function() {
          $(this)
            .addClass('active')
            .siblings()
            .removeClass('active')
          ;
        })
      ;
    })
  ;
        </script>-->
        <script>
            $('.tabular.menu .item').tab();
        </script>
        <script>
            $('.pointing.menu .item ').tab();
        </script>
        <script>
            $('.ui.checkbox')
              .checkbox()
            ;
        </script>
            <script>
            $('.ui.sidebar')
              .sidebar('attach events', '.top.ui.menu .item.sidebar')
            ;
        </script>

            <script>
            $('#example1').calendar();
            $('#example2').calendar({
              type: 'date'
            });
            $('#example3').calendar({
              type: 'time'
            });
            $('#rangestart').calendar({
              type: 'date',
              endCalendar: $('#rangeend')
            });
            $('#rangeend').calendar({
              type: 'date',
              startCalendar: $('#rangestart')
            });
            $('#example4').calendar({
              startMode: 'year'
            });
            $('#example5').calendar();
            $('#example6').calendar({
              ampm: false,
              type: 'time'
            });
            $('#example7').calendar({
              type: 'month'
            });
            $('#example8').calendar({
              type: 'year'
            });
            $('#example9').calendar();
            $('#example10').calendar({
              on: 'hover'
            });
            var today = new Date();
            $('#example11').calendar({
              minDate: new Date(today.getFullYear(), today.getMonth(), today.getDate() - 5),
              maxDate: new Date(today.getFullYear(), today.getMonth(), today.getDate() + 5)
            });
            $('#example12').calendar({
              monthFirst: false
            });
            $('#example13').calendar({
              monthFirst: false,
              formatter: {
                date: function (date, settings) {
                  if (!date) return '';
                  var day = date.getDate();
                  var month = date.getMonth() + 1;
                  var year = date.getFullYear();
                  return day + '/' + month + '/' + year;
                }
              }
            });
            $('#example14').calendar({
              inline: true
            });
            $('#example15').calendar();

        </script>

        
        <!--Regular Expression-->
    <script>
            $('.ui.form')
              .form({
                fields: {
                  current_email: {
                    identifier: 'current_email',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Please enter your current email'
                      }
                    ]
                  },
                  new_email: {
                    identifier: 'new_email',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Please enter your new Email.'
                      }
                    ]
                  },
                  current_password:{
                     identifier: 'current_password',
                     rules: [
                         {
                             type    : 'empty',
                             prompt  : 'Please enter your current password'
                         },
                         {
                            type   : 'minLength[8]',
                             prompt : 'Your password must have at least 8 characters'
                         }
                     ]
                  },
                  new_password: {
                    identifier: 'new_password',
                    rules: [
                      {
                        type   : 'empty',
                        prompt : 'Please enter your new password.'
                      },
                         {
                            type   : 'minLength[8]',
                             prompt : 'Your password must have at least 8 characters'
                         }
                     ]
                  },
                  confirm_password:{
                     identifier: 'confirm_password',
                     rules: [
                         {
                             type    : 'empty',
                             prompt  : 'Please confirm your new password'
                         },
                         {
                            type   : 'minLength[8]',
                             prompt : 'Your password must have at least 8 characters'
                         }
                     ]
                  },
                  match: {
                    identifier  : 'confirm_password',
                    rules: [
                      {
                        type   : 'match[new_password]',
                        prompt : 'Please put the same value in both fields'
                      }
                    ]
                  }
                }
              })
            ;
        </script>

    </body>
</html>