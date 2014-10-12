<div class="row" style="margin-top:70px;margin-left:-20px">
    <?php $arr=array();$this->renderPartial('_tab',array('arr'=>$arr)); ?>

    <div style="float: right;margin: -20px 150px 0 100px;">
<!--    <div class="span9">-->

        <div style="margin:40px 0 0 0;width:450px;">
            <h1 id="page_title" class="page-title">
                订单列表
            </h1>
        </div>

        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'order-grid',
            'dataProvider'=>$dataProvider,
            'columns'=>array(
                'totalprice',
//                'status',
                array(
                    'name'=>'status',
                    'value'=>array($this,'gridDataColumn'),
                ),
                'createtime',
    //            array(
    //                'class'=>'CButtonColumn',
    //            ),
            ),
        ));
        ?>
    </div>
</div>
