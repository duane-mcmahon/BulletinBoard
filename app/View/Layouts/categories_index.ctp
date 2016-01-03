<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $title_for_layout; ?>
    </title>
    <?php
    echo $this->Html->css("main.css", null, array("inline"=>false));
    echo $this->Html->css("bootstrap.min.css", null, array("inline"=>false));
    echo $this->Html->css("bootstrap-theme.min.css", null, array("inline"=>false));
    echo $this->Html->css("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css", null, array("inline"=>false));
    echo $this->Html->script("vendor/modernizr-2.8.3-respond-1.4.2.min.js");
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>
<body>
<div class="container">

    <?php echo $this->element('cats_index_menu'); ?>

    <div class="jumbotron"><br/>

        <h3>    <?php if (AuthComponent::user()):
                // The user is logged in, show the logout link

                echo "G'day " . "<em>" . (AuthComponent::user('user_name') . "</em>");
                echo "<br />";
                echo $this->Html->link('Log out', array('controller' => 'users', 'action' => 'logout'));
            else:
                // The user is not logged in, show login link
                echo $this->Html->link('Log in', array('controller' => 'users', 'action' => 'login'));
                echo "&nbsp;";
                echo "or";
                echo "\t";
                echo "\t";
                echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'add'));
            endif;
            ?></h3>

        <p><strong>"you can be anything this time around "</strong><br/></p>
    </div>

    <h1>Bulletin Board</h1>

    <br />


    <?php echo $this->Html->image('second.jpg', array('alt' => 'banner', 'class' => 'header_image', 'width' => '100%', 'height' => '200', array('fullBase' => true))); ?>

    <br />

    <br />


    <div id="content">

        <?php echo $this->Session->flash("flash", array("element" => "alert")); ?>
        <?php echo $this->fetch('content'); ?>
    </div>

    <div class="footer">

        <h3>&nbsp;<br/>
            More Info:</h3>

        <p> In threaded message boards, the messages are threaded together so that a user may see where a
            discussion begins and where it ends. In a threaded board, the "context" of the post is explicit and fixed.
            For example, one person creates a
            post and then someone responds so that the response is placed right underneath the original post and it
            remains there. In this sense a threaded board has multiple levels, corresponding to the number of replies.
            Aesthetically, especially with the option to expand or un-expand threads,
            a threaded board appears like a tree structure.

        </p>

        <h3>Links:</h3>

        <p>

            <a href="https://www.bulletinboards.com/ThreadHelp.cfm">BulletinBoards.Com</a><br />

        <div class="col-xs-4 col-sm-3 col-md-2" ><i class="fa fa-fw fa-github"></i>   <a href="https://github.com/s3116979/bbs_proj"> Github   </a>      </div><br />
        <div class="col-xs-4 col-sm-3 col-md-2" ><i class="fa fa-fw fa-linkedin"></i> <a href="https://au.linkedin.com/in/duanemcmahon"> Linkedin  </a></div>
        </p>
        <br />

        <p>Copyright &copy; 2020 (Duane McMahon).</p>


    </div>


</div>




</body>