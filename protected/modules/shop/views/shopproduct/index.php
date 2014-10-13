<?php
/* @var $this ShopproductController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Shopproducts',
);

$this->menu=array(
	array('label'=>'Create Shopproduct', 'url'=>array('create')),
	array('label'=>'Manage Shopproduct', 'url'=>array('admin')),
);
?>

<h1>Shopproducts</h1>

<?php foreach($products as $product){?>
    <h3>商品编号：<?php echo $product->pid?></h3>
    <h3>名称：<?php echo $product->pname?></h3>
<?php }?>
