<?php
use BatoiPOP\Connection;
use BatoiPOP\QueryBuilder;
$connexio = Connection::make('test');
return new QueryBuilder($connexio);