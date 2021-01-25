<?php

namespace app\models;

use Exception;
use PDO;
use PDOException;

final class Connection
{
    private static $connection;

    private function __construct()
    {}

    private function __clone()
    {}

    private function __wakeup()
    {}

    private static function load(string $arquivo): array
    {
        if (file_exists($arquivo)) {
            $dados = parse_ini_file($arquivo);
        } else {
            throw new Exception("Erro: Arquivo {$arquivo} não encontrado!");
        }

        return $dados;
    }

    private static function make(array $dados): PDO
    {
        $drive    = isset($dados['drive']) ? $dados['drive'] : null;
        $username = isset($dados['username']) ? $dados['username'] : null;
        $password = isset($dados['password']) ? $dados['password'] : null;
        $dbname   = isset($dados['dbname']) ? $dados['dbname'] : null;
        $host     = isset($dados['host']) ? $dados['host'] : null;
        $port     = isset($dados['port']) ? $dados['port'] : null;
        $charset  = isset($dados['charset']) ? $dados['charset'] : null;

        switch (strtoupper($drive)) {
            case 'MYSQL':
                $port = isset($port) ? $port : 3306;
                return new PDO("mysql:host={$host};port={$port};dbname={$dbname};charset={$charset}", $username, $password);
                break;
            case 'MSSQL':
                $port = isset($port) ? $port : 1433;
                return new PDO("mssql:host={$host},{$port};dbname={$dbname}", $username, $password);
                break;
            case 'PGSQL':
                $port = isset($port) ? $port : 5432;
                return new PDO("pgsql:dbname={$dbname}; user={$username}; password={$password}, host={$host};port={$port}");
                break;
            case 'SQLITE':
                return new PDO("sqlite:{$dbname}");
                break;
            case 'OCI8':
                return new PDO("oci:dbname={$dbname}", $username, $password);
                break;
            case 'FIREBIRD':
                return new PDO("firebird:dbname={$dbname}", $username, $password);
                break;
            default:
                throw new Exception('Erro: tipo de banco de dados não informado.');
        }
    }

    public static function getConnection(string $arquivo): PDO
    {
        if (self::$connection == null) {

            try {

                self::$connection = self::make(self::load($arquivo));
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                self::$connection->exec("SET NAMES UTF8");

            } catch (PDOException $e) {

                die("Erro: <code>{$e->getMessage()}</code>");

            } catch (Exception $e) {

                die("Erro: <code>{$e->getMessage()}</code>");
            }
        }

        return self::$connection;
    }

}
