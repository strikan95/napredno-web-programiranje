<html>
<body>
<div>
    <p>Profiles</p>
    <ul>
        <?php
        include_once 'parse.php';

        $profiles = parse('./xml/LV2.xml');

        if(!$profiles)
        {
            echo '<li><span>No profiles found.</span></li>';
            exit;
        }

        foreach ($profiles as $profile)
        {
            echo
            <<<PROFILE
                <li>
                    <a
                        href="profile.php?id=$profile->id"
                    >
                        <span>$profile->ime $profile->prezime</span>
                    </a>
                </li>
            PROFILE;

        }

        ?>
    </ul>
</div>
</body>
</html>

