<?php
$DB_NAME = "chinook";
$BACKUP_DIR = "./backup/$DB_NAME";
$TIME = time();


if(!is_dir($BACKUP_DIR))
{
    if(!mkdir($BACKUP_DIR, 0777, true))
    {
        die('Cannot create directory: '.$BACKUP_DIR);
    }
}

try {
    $db = new PDO("sqlite:".__DIR__."/$DB_NAME.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}   catch (Exception $e) {
    echo "Unable to connect";
    echo $e->getMessage();
    die('Exiting...');
}

$tablesQuery = fetchAllTablesQuery($db);
while($table = $tablesQuery->fetch(PDO::FETCH_ASSOC))
{
    $tableName = $table['name'];
    $tableColumnNames = fetchTableColumnNames($db, $tableName);
    $rowsQuery = fetchAllTableRowsQuery($db, $tableName);

    $fileName = "$BACKUP_DIR/{$tableName}_{$TIME}.txt";
    if($file = fopen($fileName, "w+"))
    {
        while ($row = $rowsQuery->fetch(PDO::FETCH_ASSOC))
        {
            fwrite(
                $file,
                generateInsertStatement($tableName, $tableColumnNames, $row)
            );
            fwrite($file, "\n");
        }

        if(!compressFile($fileName))
        {
            echo 'Failed to compress file '. $fileName;
        }
    }
}

function compressFile(string $fileName): bool
{
    if($fp = gzopen($fileName.'.gz', 'w9'))
    {
        gzwrite($fp, file_get_contents($fileName));
        gzclose($fp);
        return true;
    }
    return false;
}

function generateInsertStatement(string $tableName, array $columnNames, array $data): string
{
    $sqlInsertAttributes = "(".implode(", ", $columnNames).")";

    $sqlInsertValues = "VALUES (";
    foreach ($data as $item)
    {
        $value = '';
        if(gettype($item) === 'string')
        {
            $value = "'".$item."'";
        } else
        {
            $value = $item;
        }

        $sqlInsertValues .= $value . ', ';
    }
    $sqlInsertValues = substr($sqlInsertValues, 0, -2);
    $sqlInsertValues = $sqlInsertValues.");";


    return "INSERT INTO " . $tableName . " " . $sqlInsertAttributes . " " . $sqlInsertValues;
}

function fetchAllTablesQuery(PDO $db): PDOStatement
{
    return $db
        ->query("SELECT `name` FROM sqlite_master WHERE `type`='table'");
}

function fetchAllTableRowsQuery(PDO $db, string $tableName): PDOStatement
{
    $query = "SELECT * FROM $tableName";
    return $db
        ->query($query);
}

function fetchTableColumnNames(PDO $db, string $tableName): array
{
    $tableInfoQuery = $db->query("PRAGMA table_info($tableName)");
    $tableColumns = $tableInfoQuery->fetchAll();
    $columns = [];
    foreach ($tableColumns as $tableColumn)
    {
        $columns[] = $tableColumn['name'];
    }
    return $columns;
}
