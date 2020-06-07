<?php
setcookie('admin', true, time() - 3600, '/');
header("Location: /");
