<?php
$dbconn = pg_connect('host=web-pgsql port=5432 dbname=db user=root password=root')
    or die('Could not connect');

echo '<pre>' . var_export(pg_version($dbconn), true) . '</pre>';

pg_close($dbconn);
// user
    // username
    // mail
    // password
    // role
// articles
    // title
    // content
    // createdAt
    // user_id
// comments
    // content
    // user_id
    // article_id
?>