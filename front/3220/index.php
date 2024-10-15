<?php
$url_host = 'http://' . $_SERVER['HTTP_HOST'];
$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');
$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);
$url_path = $url_host . $matches[1][0];
$url_path = str_replace('\\', '/', $url_path);

if (!class_exists('lessc')) {
    $dir_block = dirname($_SERVER['SCRIPT_FILENAME']);
    require_once($dir_block . '/assets/libs/lessc.inc.php');
}
$less = new lessc;
$less->compileFile('./assets/less/3220.less', './assets/css/3220.css');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/3220.css">
</head>

<body>
    <div id="qodef-page-inner" class="qodef-content-grid">
        <main id="qodef-page-content" class="qodef-grid qodef-layout--template qodef-gutter--large">
            <div class="qodef-grid-inner clear">
                <div class="qodef-grid-item qodef-page-content-section qodef-col--12">
                    <div id="bbpress-forums">
                        <div id="bbp-user-wrapper">
                            <div id="bbp-single-user-details">
                                <div id="bbp-user-avatar">
                                    <span class="vcard">
                                        <a href="#" class="url fn n">
                                            <img id="avatar" height="150" width="150" src="./assets/images/avatar.jpg"
                                                alt="">
                                        </a>
                                    </span>
                                </div>
                                <div id="bbp-user-navigation">
                                    <ul>
                                        <li class="current">
                                            <span class="vcard bbp-user-profile-link">
                                                <a id="current-link" href="#" class="url fn n">
                                                    Profile
                                                </a>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="bbp-user-topics-created-link">
                                                <a href="#">
                                                    Topics Started
                                                </a>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="bbp-user-topics-created-link">
                                                <a href="#">
                                                    Replies Created
                                                </a>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="bbp-user-topics-created-link">
                                                <a href="#">
                                                    Engagements
                                                </a>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="bbp-user-topics-created-link">
                                                <a href="#">
                                                    Favorites
                                                </a>
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="bbp-user-body">
                                <div class="bbp-user-profile">
                                    <h2>@anthony-johnson</h2>
                                    <div class="bbp-user-section">
                                        <h3>Profile</h3>
                                        <p class="bbp-user-forum-role">Registered: 3 years, 11 months ago</p>
                                        <p class="bbp-user-description">Lorem ipsum dolor sit amet, consectetur
                                            adipisicing elit, sed do eius tempor incididunt ut labore et dolore magna.
                                        </p>
                                        <hr>
                                        <h3>Forums</h3>
                                        <p class="bbp-user-last-activity">Last Activity: 3 years, 10 months ago</p>
                                        <p class="bbp-user-topic-count">Topics Started: 0</p>
                                        <p class="bbp-user-reply-count">Replies Created: 4</p>
                                        <p class="bbp-user-forum-role">Forum Role: Participant</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>