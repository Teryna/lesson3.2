<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Классы и объекты</title>
</head>
<body>
<?php 
error_reporting(E_ALL);

abstract class AllThings
{
    public $name;
    public $category;
    public $price;
    public $discount;
    public $isAvailable = 1;
    
    public function __construct($name, $category, $price, $discount, $isAvailable)
    {
        $this->name = $name;
        $this->category = $category;
        $this->discount = $discount;
        $this->price = $price;
        $this->isAvailable = $isAvailable;
    }
    
    public function isAvailable()
    {
        if ($this->isAvailable) {
            echo 'да';
        } else {
            echo 'нет';
        }
    }  
}

abstract class Birds
{
    public $name;
    public $category;
    
    public function __construct($name, $category)
    {
        $this->name = $name;
        $this->category = $category;
    }    
}
 
    
interface CarInterface 
{
    public function miliageCompare($name, $miliage);
}

class Car extends AllThings implements CarInterface
{
    public $color;
    public $year;
    public $transmission;
    public $miliage;
    
    public function __construct($name, $category, $price, $discount, $isAvailable, $color, $year, $transmission, $miliage)
    {
        parent::__construct($name, $category, $price, $discount, $isAvailable);
        $this->color = $color;
        $this->year = $year;
        $this->transmission = $transmission;
        $this->miliage = $miliage;
    }
    
     public function miliageCompare($name, $miliage)
    {
        if ($this->miliage) {
        echo  '<li>Пробег машины ' . $name . ' больше ' . $this->miliage . ' км</li><br>';                 
        } else {
        echo '<li>Машина ' . $name . ' новая без пробега</li><br>';   
        }
    } 
}

$audi = new Car('AUDI', 'машина', '17 640', '5%', '1', 'metalic', '2015', 'автомат', '56 000');
$audi->miliageCompare($audi->name, $audi->miliage);
$volvo = new Car('VOLVO', 'машина', '24 300', '3%', '1', 'black', '2016', 'механика', '0');
$volvo->miliageCompare($volvo->name, $volvo->miliage);
        
$cars = [];
array_push($cars, $audi, $volvo);
?>    
<div>   
    <h3>Машины</h3>
    <table>
        <thead>
            <th>Марка</th>
            <th>Категория</th>
            <th>Цена, EUR</th>
            <th>Скидка</th>
            <th>Есть ли в наличии</th>
            <th>Цвет</th>
            <th>Год</th>
            <th>КП</th>
            <th>Пробег, км</th>
        </thead>
        <tbody>
            <?php foreach ($cars as $car): ?>
            <tr>
                <td><?php echo $car->name; ?></td>
                <td><?php echo $car->category; ?></td>
                <td><?php echo $car->price; ?></td>
                <td><?php echo $car->discount; ?></td>
                <td><?php echo $car->isAvailable(); ?></td>
                <td><?php echo $car->color; ?></td>
                <td><?php echo $car->year; ?></td>
                <td><?php echo $car->transmission; ?></td>
                <td><?php echo $car->miliage; ?></td>
            </tr>
            <?php endforeach; ?>    
        </tbody>
    </table>   
</div>

<?php
interface TvInterface 
{
    public function getWifi($name, $wifi);
}

class Tv extends AllThings implements TvInterface
{
    public $color;
    public $size;
    public $wifi;
    
    public function __construct($name, $category, $price, $discount, $isAvailable, $color, $size, $wifi)
    {
        parent::__construct($name, $category, $price, $discount, $isAvailable);
        $this->color = $color;
        $this->size = $size;
        $this->wifi = $wifi;
    }
    
    public function getWifi($name, $wifi)
    {
        if ($wifi === 'есть') {
            echo '<li>Телевизор ' . $name . ' wifi ' . $wifi . '</li><br>';         
        } else {
            echo '<li>Телевизор ' . $name . ' wifi ' . $wifi . '</li><br>';    
        }
    } 
}

$lg = new Tv('LG', 'телевизоры', '529.99', '2%', '1 ', 'metalic', '55"', 'есть' );
$lg->getWifi($lg->name, $lg->wifi);
$samsung = new Tv('samsung', 'телевизоры', '219.99', '12%', '0', 'black', '32"', 'нет');
$samsung->getWifi($samsung->name, $samsung->wifi);
        
$tvs = [];
array_push($tvs, $lg, $samsung);
?>
<div>
<h3>Телевизоры</h3>
    <table>
        <thead>
            <th>Название</th>
            <th>Категория</th>
            <th>Цена, EUR</th>
            <th>Скидка</th>
            <th>Есть ли в наличии</th>
            <th>Цвет</th>
            <th>Размер</th>
            <th>WiFi</th>
        </thead>
        <tbody>
            <?php foreach ($tvs as $tv): ?>
            <tr>
                <td><?php echo $tv->name; ?></td>
                <td><?php echo $tv->category; ?></td>
                <td><?php echo $tv->price; ?></td>
                <td><?php echo $tv->discount; ?></td>
                <td><?php echo $tv->isAvailable(); ?></td>
                <td><?php echo $tv->color; ?></td>
                <td><?php echo $tv->size; ?></td>
                <td><?php echo $tv->wifi ?></td>
            </tr>
            <?php endforeach; ?>    
        </tbody>
    </table>   
</div>

<?php
interface PenInterface 
{
    public function getErasable($name, $erasable);
}    
    
class Pen extends AllThings implements PenInterface
{
    public $color;
    public $quality;
    public $quantity;
    public $ersable = TRUE;
   
    public function __construct($name, $category, $price, $discount, $isAvailable, $color, $quality, $quantity, $erasable)
    {
        parent::__construct($name, $category, $price, $discount, $isAvailable);
        $this->color = $color;
        $this->quality = $quality;
        $this->quantity = $quantity;
        $this->erasable = $erasable;
    }
    
    public function getErasable($name, $erasable)
    {
        if ($erasable === 'TRUE') {
            echo $name . '<li>В данной ручке чернила можно сдереть</li><br>';         
        } else {
            echo $name . '<li>В этой ручке чернила не стираются</li><br>';    
        }
    } 
}

$pen1 = new Pen('Гелевая ручка', 'ручки', '6.00', 'нет', '1', 'синяя', 'гелевая', '4', 'TRUE');
$pen1->getErasable($pen1->name, $pen1->erasable);
$pen2 = new Pen('Шариковая ручка', 'ручки', '1.50', '5%', '1', 'черная', 'шариковая', '2', 'FALSE');
$pen2->getErasable($pen2->name, $pen2->erasable);
        
$pens = [];
array_push($pens, $pen1, $pen2);
?>
<div>
<h3>Ручки</h3>  
    <table>
        <thead>
            <th>Название</th>
            <th>Категория</th>
            <th>Цена, EUR</th>
            <th>Скидка</th>
            <th>Есть ли в наличии</th>
            <th>Цвет</th>
            <th>Кол-во</th>
            <th>Качество</th>       
        </thead>
        <tbody>
            <?php foreach ($pens as $pen): ?>
            <tr>
                <td><?php echo $pen->name; ?></td>
                <td><?php echo $pen->category; ?></td>
                <td><?php echo $pen->price; ?></td>
                <td><?php echo $pen->discount; ?></td>
                <td><?php echo $pen->isAvailable(); ?></td>
                <td><?php echo $pen->color; ?></td>
                <td><?php echo $pen->quality; ?></td>
                <td><?php echo $pen->quantity; ?></td>
            </tr>
            <?php endforeach; ?>    
        </tbody>
    </table>  
</div>

<?php 
interface DuckInterface 
{
    public function getEggs($name, $eggsCount);
}
    
class Duck extends Birds implements DuckInterface
{
    public $color;
    public $weight;
    public $eagsInYear;
  
    public function __construct($name, $category, $color, $weight, $eagsInYear, $eggsCount)
    {
        parent::__construct($name, $category);
        $this->color = $color;
        $this->weight = $weight;
        $this->eagsInYear = $eagsInYear;
        $this->eggsCount = $eggsCount;
    }
    
    public function getEggs($name, $eggsCount)
    {
        echo '<li>В этом году у утки ' . $name . ' уже ' . $eggsCount . ' яиц</li><br>';
    } 
}

$duck1 = new Duck('Пекинская', 'птицы', 'белый', '4 кг', '~ 100 шт', '55');
$duck1->getEggs($duck1->name, $duck1->eggsCount);
$duck2 = new Duck('Украинская', 'птицы', 'глинистый', '3,5 кг', '~ 160 шт', '78');
$duck2->getEggs($duck2->name, $duck2->eggsCount); 
    
$ducks = [];
array_push($ducks, $duck1, $duck2);
?>
<div>
<h3>Утки</h3>  
    <table>
        <thead>
            <th>Название</th>
            <th>Окрас</th>
            <th>Вес</th>
            <th>Яиц в год</th>         
        </thead>
        <tbody>
            <?php foreach ($ducks as $duck): ?>
            <tr>
                <td><?php echo $duck->name; ?></td>
                <td><?php echo $duck->color; ?></td>
                <td><?php echo $duck->weight; ?></td>
                <td><?php echo $duck->eagsInYear; ?></td>
            </tr>
            <?php endforeach; ?>    
        </tbody>
    </table>    
</div>
<?php
interface ProductInterface 
{
    public function productPrice($name, $price, $quantity, $change);
}
    
class Product extends AllThings implements ProductInterface
{
    public $quantity;
    public $change;
    
    public function __construct($name, $category, $price, $discount, $isAvailable, $quantity, $change)
    {
        parent::__construct($name, $category, $price, $discount, $isAvailable);
        $this->quantity = $quantity;      
        $this->change = $change;
    }
    
    public function productPrice($name, $price, $quantity, $change) 
    {
        if ($quantity === '1') {
            $price = $price;
            echo '<li>Цена 1 единицы ' . $name . ' EUR ' . $price . '</li></br>';
        } 
        if ($quantity >= '2') {
            $price = round($price * $change, 2);
            echo '<li>Если покупать более одного товара, цена 1 единицы ' . $name . ' EUR ' . $price . '</li></br>';
        }
    }
}

$product1 = new Product('шампунь', 'косметика', '2.75', '0', '1', '3','0.7');
$product1->productPrice($product1->name, $product1->price, $product1->quantity, $product1->change);
$product2 = new Product('крем', 'косметика', '5.50', '7%', '1', '1', '0.8');
$product2->productPrice($product2->name, $product2->price, $product2->quantity, $product2->change);
        
$products = [];
array_push($products, $product1, $product2);
?>
<div>  
<h3>Товары</h3>
    <table>
        <thead>
            <th>Название</th>
            <th>Категория</th>
            <th>Цена</th>
            <th>Скидка</th>
            <th>Есть ли в наличии</th>
            <th>Кол-во</th>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo $product->name; ?></td>
                <td><?php echo $product->category; ?></td>
                <td><?php echo $product->price; ?></td>
                <td><?php echo $product->discount; ?></td>
                <td><?php echo $product->isAvailable(); ?></td>
                <td><?php echo $product->quantity; ?></td>
            </tr>
            <?php endforeach; ?>    
        </tbody>
    </table>    
</div>  
</body>
</html>
		