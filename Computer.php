<?php

require_once __DIR__ . "/vendor/autoload.php";

class Computer
{

    private \MongoDB\Collection $computer;

    public function __construct()
    {
        $client = new \MongoDB\Client("mongodb://127.0.0.1/");
        $this->computer = $client->computer->computers;
    }

    function processor($processor): void
    {
        $statement = $this->computer->find(["processor" => $processor]);
        echo "<div id='content0'>";
        echo "<table>";
        echo " <tr>
         <th> Имя сети  </th>
         <th> Материнская плата </th>
         <th> Производитель </th>
         <th> Процессор </th>
        </tr> ";
        foreach ($statement->toArray() as $data) {
            echo " <tr>
             <th> {$data['netname']}  </th>
             <th> {$data['motherboard']} </th>
             <th> {$data['vendor']} </th>
             <th> {$data["processor"]} </th>
            </tr> ";
        }
        echo "</table></div>";
    }

    function software($software): void
    {
        $statement = $this->computer->find(["software" => $software]);
        echo "<div id='content0'>";
        echo "<table>";
        echo " <tr>
         <th> Имя сети  </th>
         <th> Материнская плата </th>
         <th> Производитель </th>
         <th> Программное обеспечение </th>
        </tr> ";
        foreach ($statement->toArray() as $data) {
            echo " <tr>
             <th> {$data['netname']}  </th>
             <th> {$data['motherboard']} </th>
             <th> {$data['vendor']} </th>
             <th> {$data["software"]} </th>
            </tr> ";
        }
        echo "</table></div>";
    }

    function guarantee(): void
    {
        $now = new MongoDB\BSON\UTCDateTime(date("U")."000");
        $statement = $this->computer->find(["guarantee" => ['$lte' => $now]] );
        echo "<div id='content0'>";
        echo "<table>";
        echo " <tr>
         <th> Имя сети  </th>
         <th> Материнская плата </th>
         <th> Производитель </th>
         <th> Гарантия </th>
        </tr> ";
        foreach ($statement->toArray() as $data) {
            $date = date("Y-m-d", substr(strval($data["guarantee"]), 0, -3));
            echo " <tr>
             <th> {$data['netname']}  </th>
             <th> {$data['motherboard']} </th>
             <th> {$data['vendor']} </th>
             <th> $date </th>
            </tr> ";
        }
        echo "</table></div>";
    }
}