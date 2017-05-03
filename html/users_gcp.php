<h1>Connect to Google Cloud SQL</h1>

<dt>Update image</dt>
<dd><pre>kubectl set image deploy/php &lt;CONTAINER-NAME&gt;=&lt;IMAGE-NAME&gt;</pre></dd>

<?
// PDO
$pdo = new PDO('mysql:host=127.0.0.1;dbname=mochizuki_test', 'root', 'pass');
$statement = $pdo->query("select * from users;");
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<ul>
<?
foreach ($result as $key => $value) {
  echo '<li>';
  echo $value["name"];
  echo '</li>';
}
?>
</ul>

<pre>
create table users (id int auto_increment, name varchar(255), primary key(id));
insert into users (name) values ('ken'), ('taro');
</pre>
