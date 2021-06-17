<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Домашнее задание 1</title>
</head>
<body>
    <h1>Главная</h1>
    <hr>

<?php
    class Product
    {
        protected $name;
        protected $weight;
        protected $category;
        protected $prise;
        
        function __construct($name,$weight,$category,$prise)
        {
            $this->name=$name;
            $this->weight=$weight;
            $this->category=$category;
            $this->prise=$prise;
        }
        // Вывод инфы по товару
        function view(){
            echo "
                <p>Наименование товара : $this->name</p>
                <p>Категория товара :$this->category</p>
                <p>Вес товара : $this->weight кг</p>
                <p>Цена товара: $this->prise рублей</p>
            ";
        }
    }
    // Продуты питания добовляем срок годности
    class Food_products extends Product{
        public $expiration_date;
        public function Set_expiration($expiration_date){
            $this->expiration_date=$expiration_date;
        }
        public function Get_Food_products(){
            $this->view();
            echo"
            <p>Срок годности : $this->expiration_date месяца</p>
            ";
        }
    }
    // Пром товары добовляем срок гарантии
    class Industrial_products extends Product{
        public $warranty_period;
        public function Set_warranty_period($warranty_period){
            $this->warranty_period=$warranty_period;
        }
        public function Get_Food_products(){
            $this->view();
            echo"
            <p>Срок гарантии : $this->warranty_period года</p>
            ";
        }
    }
    $Hleb=new Food_products("hleb",0.1,"food",200);
    $Hleb->Set_expiration(3);
    $Hleb->Get_Food_products();
    echo "<hr><br>";
    $Stanok =new Industrial_products("stanok MD2000", 500, "promtovar",10000000);
    $Stanok->Set_warranty_period(36);
    $Stanok->Get_Food_products();

?>
<?php
// 5. Дан код:
// class A {
//     public function foo() {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// $a1 = new A();   тут $x = 0 так как мы еще не вызывали функцию
// $a2 = new A();   тут $x = 0 так как мы еще не вызывали функцию
// $a1->foo();      первый вызов функ $x = 1;тк он пренадлежит классу то и в классе $x = 1
// $a2->foo();      вторы вызов функ $x = 2;тк он пренадлежит классу то и в классе $x = 2
// $a1->foo();      ну и тд.
// $a2->foo();
// Что он выведет на каждом шаге? Почему?
// выведет 1234

//Немного изменим п.5:
// class A {
//     public function foo() {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// class B extends A {}
// $a1 = new A(); тут $x = 0 так как мы еще не вызывали функцию
// $b1 = new B(); тут $x = 0 так как мы еще не вызывали функцию
// $a1->foo(); первый вызов функ $x = 1;тк он пренадлежит классу то и в классе $x = 1
// $b1->foo(); второй вызов функции тк. класс дочерний он не может влиять на родительский поэтому не изменяется и остается $x = 1
// $a1->foo();  вторы вызов функ $x = 2;тк он пренадлежит классу то и в классе $x = 2
// $b1->foo();

// выводит 1122

//  А да забыл написать что при вызове foo() $x изменяется на +1 и выводится на экран

// 7. *Дан код:
// class A {
//     public function foo() {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// class B extends A {}
// $a1 = new A;
// $b1 = new B;
// $a1->foo(); 
// $b1->foo(); 
// $a1->foo(); 
// $b1->foo(); 
// Что он выведет на каждом шаге? Почему?

// тоже самое  1122  
// если параметры в конструктор не передаются можно 
// объявлять его без скобок  $a1 = new A то же что и $a1 = new A(); 
?>

    <?php include("footer.php"); ?>
 </body>
</html>