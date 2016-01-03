<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $title_for_layout; ?>
    </title>
    <?php
    //echo $this->Html->meta('icon');
    //echo $this->Html->css('cake.generic');
    //echo $this->Html->css('footer-distributed');
    //echo $this->Html->css('header-distributed');
    echo $this->Html->css('http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');
    echo $this->Html->css('style');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>
<body>
<div id="wrap">

    <div id="header"><br/>

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

        <p><strong>"you can be anything this time around "</strong><br/>
            ( anything! )</p>
    </div>
    <div class="header_title"><h1>Bulletin Board</h1></div>
    <?php echo $this->Html->image('second.jpg', array('alt' => 'banner', 'class' => 'header_image', 'width' => '790', 'height' => '200', array('fullBase' => true))); ?>
    <!--<img  src="second.jpg" width="790" height="228" alt="" /> -->

    <?php echo $this->element('topics_edit_menu'); ?>

    <div id="extras">
        <h3>&nbsp;<br/>
            More Info:</h3>

        <p> consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
            minim veniam, quis nostrud exercitation ullamco laboris nisi ut</p>

        <h3>Links:</h3>

        <p><img src="arrow.gif" alt="arrow" width="7" height="7"/> <a href="#">Link 1</a><br/>
            <img src="arrow.gif" alt="arrow" width="7" height="7"/> <a href="#">Link 2</a><br/>
            <img src="arrow.gif" alt="arrow" width="7" height="7"/> <a href="#">Link 3</a><br/>
        </p>

        <p class="small">Design<br/>(4 Jan, 2007)<br/>
            <a href="http://validator.w3.org/check/referer">Validate XHTML 1.0 Strict</a><br/> and Css </p>
    </div>

    <div id="content">
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
    </div>

    <div id="footer">
        Copyright &copy; 2020 (Duane McMahon).
        <div class="footer-right">
            <a href="https://au.linkedin.com/in/duanemcmahon"><i class="fa fa-linkedin"></i></a>
            <a href="https://github.com/s3116979/bbs_proj"><i class="fa fa-github"></i></a>
        </div>
    </div>


</div>
</body>