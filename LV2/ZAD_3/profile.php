<html>
    <?php
    include_once 'parse.php';

    $profileId = $_GET['id'];

    if(!$profileId)
    {
        die('No profile id specified');
    }

    $profile = getProfileWithId('./xml/LV2.xml', $profileId);

    if(!$profile)
    {
        die('Profile not found');
    }

    echo
    <<<PROFILE
        <img src="$profile->slika"/>
        <p>$profile->ime $profile->prezime</p>
        <p>$profile->email</p>
        <p>$profile->spol</p>
        <p>$profile->zivotopis</p>
    PROFILE;

    ?>
</html>
