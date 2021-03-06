<nav class="navbar navbar-default">
    <div class="container-fluid">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapsed" aria-expanded="false">
        <span class="glyphicon glyphicon-menu-hamburger"></span>
      </button>

<?php
//SITE LOGO (IF SET) OR SITE NAME
if (str_replace(' ', '', $this->mainlogo) == '') {
    //No logo, just renders site name as link
    echo '<ul class="nav navbar-nav navbar-left"><li class="sitetitle"><a class="navbar-brand" href="'.$this->base_url.'">'.$this->site_name.'</a></li></ul>';
} else {
    //Site main logo as link
    echo '<ul class="nav navbar-nav navbar-left"><li class="mainlogo"><a class="navbar-brand" href="'.$this->base_url.'"><img src="'.$this->mainlogo.'" height="36px"></a></li></ul>';
}
?>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="navbar-collapsed">



<!-- BOOTSTRAP NAV LINKS GO HERE. USE <li> items with <a> links inside of <ul> -->
<ul class="nav navbar-nav">

</ul>


<?php
// SIGN IN / USER SETTINGS BUTTON
if (isset($_SESSION['username'])){

    $usr = profileData::pullUserFields($_SESSION['uid'], Array('firstname', 'lastname'));

    if (is_array($usr) && trim($usr['firstname']) != '' && trim($usr['lastname']) != '') {
        $user = $usr['firstname']. ' ' .$usr['lastname'];
    } else {
        $user = $_SESSION['username'];
    }

?>
    <ul class="nav navbar-nav navbar-right">
    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $user; ?>
    <span class="caret"></span>
    </a>
      <ul class="dropdown-menu" aria-labelledby="userDropdown">
    <li><a href="<?php echo $this->base_url; ?>/user/profileedit.php">Edit Profile</a></li>
    <li><a href="<?php echo $this->base_url; ?>/user/accountedit.php">Account Settings</a></li>

    <!-- Admin Controls -->
    <?php if ((array_key_exists('admin', $_SESSION)) && $_SESSION['admin'] == 1): ?>
          <li role="separator" class="divider"></li>
        <li><a href="<?php echo $this->base_url; ?>/admin/verifyusers.php">Verify/Delete Users</a></li>
    <?php endif; ?>
    <!-- Superadmin Controls -->
    <?php if ((array_key_exists('superadmin', $_SESSION)) && $_SESSION['superadmin'] == 1): ?>
        <li><a href="<?php echo $this->base_url; ?>/admin/editconfig.php">Edit Site Config</a></li>
        <li><a href="<?php echo $this->base_url; ?>/admin/maillog.php">Mail Log</a></li>

    <?php endif; ?>
    <li role="separator" class="divider"></li>
    <li><a href="<?php echo $this->base_url; ?>/login/logout.php">Logout</a></li>
    </ul>
    </li>
    </ul>

<?php

} else {
    //User not logged in
?>
    <ul class="nav navbar-nav navbar-right">
    <li class="dropdown"><a href="<?php echo $this->base_url; ?>/login/index.php" role="button" aria-haspopup="false" aria-expanded="false">Sign In
    </a>
    </li>
    </ul>

<?php

};

?>

</div><!-- /.navbar-collapse -->
</div>

</div>
</nav>
