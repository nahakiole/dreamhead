<?php

echo shell_exec( 'git reset --hard HEAD && git pull' );
echo 'Finished';