<?php

shell_exec( 'git reset --hard HEAD && git pull && git submodule update --init --recursive' );
echo 'It works!';
