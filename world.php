<?php
$host = getenv('IP');
$username = 'lab7_user';
$password = 'qw$:8Kz%';
$dbname = 'world';

/*
TABLES:
cities
countries
languages
*/

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
/*$stmt = $conn->query("SELECT * FROM countries");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>*/

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(!empty($_GET['country'])){
        $santized_country = filter_var($_GET['country'], FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES);
        $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$santized_country%';");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <table class="countries-table">
            <thead>
                <tr>
                    <th>Country Name</th>
                    <th>Continent</th>
                    <th>Independence Year</th>
                    <th>Head of State</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($results as $row): ?>
                    <tr>
                        <td><?= $row['name']?></td>
                        <td><?= $row['continent']?></td>
                        <td><?= $row['independence_year']?></td>
                        <td><?= $row['head_of_state']?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <caption>Table showing names of countries including their continent, independence year and their head of state.</caption>
        </table>
        <?php
    } else{
        $stmt = $conn->query("SELECT * FROM countries;");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <table class="countries-table">
            <thead>
                <tr>
                    <th>Country Name</th>
                    <th>Continent</th>
                    <th>Independence Year</th>
                    <th>Head of State</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($results as $row): ?>
                    <tr>
                        <td><?= $row['name']?></td>
                        <td><?= $row['continent']?></td>
                        <td><?= $row['independence_year']?></td>
                        <td><?= $row['head_of_state']?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <caption>Table showing names of countries including their continent, independence year and their head of state.</caption>
        </table>
        <?php
    }
}