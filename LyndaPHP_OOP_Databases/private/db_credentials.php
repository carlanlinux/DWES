<?php
//Keep Database credentials in a separate file
//1. Easy to exclude from source code managers
//2. Unique credentials on development and production servces
//3. Unique credentials if working with multiple developers.

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "root");
define("DB_NAME_LYNDA", "chain_gang");