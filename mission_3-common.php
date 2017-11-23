<?php

/**
 * common.php
 */

/**
 * connect_db
 * @return \PDO
 */
function connect_db()
{
    $dsn = 'mysql:host=localhost;dbname=sample;charset=utf8';
    $username = 'root';
    $password = 'password';
   
   
    return new PDO('mysql:host=ホスト名;dbname=データベース名','ユーザー名','パスワード');
}

/**
 * insert
 * @param string $sql
 * @param array $arr
 * @return int lastInsertId
 */
function insert($sql, $arr)
{
    $pdo = connect_db();
    $stmt = $pdo->prepare($sql);
    $stmt->execute($arr);
    return $pdo->lastInsertId();
}

/**
 * select
 * @param string $sql
 * @param array $arr
 * @return array $rows
 */
function select($sql, $arr)
{
    $pdo = connect_db();
    $stmt = $pdo->prepare($sql);
    return $stmt->fetchAll();
}

/**
 * htmlspecialchars
 * @param string $string
 * @return $string
 */
function h($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'utf-8');
}
