<?php
const
host = 'db',
users = 'users',
name = 'name',
dbUser = 'user',
password = 'password',
db = 'appDb',
goods = 'goods',
id = 'ID',
title = 'title',
description = 'description',
cost = 'cost';

function openMysqli(): mysqli
{
    return new mysqli(
        host, dbUser, password, db
    );

}