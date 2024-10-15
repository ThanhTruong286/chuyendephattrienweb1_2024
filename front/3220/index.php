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
                                            <img id="avatar" height="150" width="150" src="./assets/images/avatar.jpg" alt="">
                                        </a>
                                    </span>
                                </div>
                                <div id="bbp-user-navigation">
                                    <ul>
                                        <li class="current">
                                            <span class="vcard bbp-user-profile-link">
                                                <a href="#" class="url fn n">
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
                            <div id="bbp-user-body"></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>