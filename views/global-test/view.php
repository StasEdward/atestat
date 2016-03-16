<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;
use kartik\grid\GridView;
use kartik\dynagrid\Module;
use \yii\helpers\ArrayHelper;
use app\models\TestResultsController;
use yii\helpers\Url;
use yii\web\UrlManager;
/* @var $this yii\web\View */
/* @var $model app\models\GlobalTest */

$this->title = 'Test result for S/N '.$model->SERIALNUMBER;
$this->params['breadcrumbs'][] = ['label' => 'Global Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->SERIALNUMBER;

?>
<div class="global-test-view">


<?= /*
  <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'STATIONID',
            'UUTNAME',
            'PARTNUMBER',
            'SERIALNUMBER',
            'TECHNAME',
            'TESTDATE',
            'TIMESTART',
            'TIMESTOP',
            'UUTPLACE',
            'TESTMODE',
            'GLOBALRESULT',
            'VERSIONS',
        ],
    ]) ?>
*/
// DetailView Attributes Configuration

// View file rendering the widget
 DetailView::widget([
    'model' => $model,
    //'attributes' => $attributes,
    'mode' => 'view',
    'bordered' => false,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'hover' => true,
  //  'hAlign'=>true,
  //  'vAlign'=>$vAlign,
  //  'fadeDelay'=>$fadeDelay,
    'deleteOptions'=>[ // your ajax delete parameters
        'params' => ['id' => 1000, 'kvdelete'=>true],
    ],
    'container' => ['id'=>'kv-demo'],
  //  'formOptions' => ['action' => Url::current(['#' => 'kv-demo'])], // your action to delete

    'attributes' => [
        [
            'group'=>true,
            'label'=>'Identification Information',
            'rowOptions'=>['class'=>'default']
        ],
        [
            'columns' => [
                [
                    'attribute'=>'PARTNUMBER',
                    'label'=>'Part Number',
                    'valueColOptions'=>['style'=>'width:25%']
                ],
                [
                    'attribute'=>'UUTNAME',
                    'label'=>'UUT Name',
                    'format'=>'raw',
                    'value'=>$model->UUTNAME,
                    'valueColOptions'=>['style'=>'width:25%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute'=>'STATIONID',
                    'label'=>'Station ID',
                    'valueColOptions'=>['style'=>'width:25%'],
                ],
                [
                    'attribute'=>'TESTMODE',
                    'label'=>'Test Mode',
                    'format'=>'raw',
                //    $testImageFile => Url::to("@web/images/".$model->TESTMODE,
                    'value'=> $model->TESTMODE === 'Test' ? '<span class="label label-warning">'.$model->TESTMODE.'</span>' : '<span class="label label-danger">'.$model->TESTMODE.'</span>',
                    'valueColOptions'=>['style'=>'width:25%'],
                ],
            ],
        ],
        [
            'columns' => [
                [
                    'attribute'=>'FACILITY',
                    'label'=>'Facility',
                    'valueColOptions'=>['style'=>'width:25%'],
                ],
                [
                    'attribute'=>'GLOBALRESULT',
                    'label'=>'Test Result',
                    'format'=>'raw',
                    'value'=> $model->GLOBALRESULT === 'Pass' ? '<span class="label label-success">'.$model->GLOBALRESULT.'</span>' : (($model->GLOBALRESULT === 'Fail' ) ?'<span class="label label-danger">'.$model->GLOBALRESULT.'</span>' : '<span class="label label-warning">'.$model->GLOBALRESULT.'</span>'),
                    'valueColOptions'=>['style'=>'width:25%'],
                ],
            ],
        ],

        [
            'group'=>true,
            'label'=>'Test Details',
            'rowOptions'=>['class'=>'default'],
            //'groupOptions'=>['class'=>'text-center']
        ],
        [
            'columns' => [
                [
                    'attribute'=>'TESTDATE',
                    'label'=>'Test Date',
                    'format'=>'date',
                    'type'=>DetailView::INPUT_DATE,
                    'valueColOptions'=>['style'=>'width:30%']
                ],
                [
                    'attribute'=>'TIMESTART',
                    'label'=>'Test Start',
                    'format'=>'raw',
                    'value'=>$model->TIMESTART ,
                    'type'=>DetailView::INPUT_SWITCH,
                    'valueColOptions'=>['style'=>'width:30%']
                ],
            ]
        ],
        [
            'columns' => [
                [
                    'attribute'=>'TECHNAME',
                    'label'=>'Tech Name',
                    'format'=>'raw',
                    'value'=>$model->TECHNAME,
                    'type'=>DetailView::INPUT_SELECT2,

                    'valueColOptions'=>['style'=>'width:30%']
                ],
                [
                    'attribute'=>'TIMESTOP',
                    'label'=>'Test Stop',
                    'format'=>'raw',
                    'type'=>DetailView::INPUT_SWITCH,
                    'value'=>$model->TIMESTOP,
                    'valueColOptions'=>['style'=>'width:30%']
                ],
            ]
        ],
        [
            'attribute'=>'VERSIONS',
            'label'=>'ATP Versions',
            'format'=>'raw',
            'value'=>'<span class="text-justify"><em>' . $model->VERSIONS . '</em></span>',
            'options'=>['rows'=>4]
        ],
    ],


]); ?>

    <?=  GridView::widget([
    'dataProvider'=> $dataProvider,
    'bootstrap' => true,
    'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
    'pjax'=>true, // pjax is set to always true for this demo
    'toolbar'=> [
      //  ['content'=>
           // Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>Yii::t('kvgrid', 'Add Book'), 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
          //  Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''], ['data-pjax'=>0, 'class'=>'btn btn-default', 'title'=>'Reset Grid'])
    //    ],
        '{export}',
      //  '{toggleData}',
    ],
    // set export properties
    'export'=>[
        'fontAwesome'=>true
    ],
    // parameters from the demo form
    'bordered'=>false,
    'striped'=>true,
    'condensed'=>true,
    'responsive'=>true,
    'hover'=>true,
  //  'showPageSummary'=>$pageSummary,
    'panel'=>[
        'type'=>GridView::TYPE_PRIMARY,
        'heading'=>  Html::tag('i', Html::encode(' S/N: '.$model->SERIALNUMBER), ['class' => 'glyphicon glyphicon-list']),
    ],
    'persistResize'=>false,

//    'filterModel' => $searchModel,
//    'columns' => $gridColumns,
    'responsive'=>true,
    'hover'=>true,
    'columns' => [
      //  'TEST_ID',
      [
        'attribute'=>'TEST_ID',
        'label' => '#',
  //      'contentOptions' => ['style'=>'text-align:center'],
        'format'=>'raw',
        //'noWrap'=>$this->noWrapColor
      ],


//        ['class' => 'yii\grid\SerialColumn'],
        'TESTNAME',
      //  'MINRANGE',
      [
        'attribute'=>'MINRANGE',
        'label' => 'Min',
  //      'contentOptions' => ['style'=>'text-align:center'],
        'format'=>'raw',
        //'noWrap'=>$this->noWrapColor
      ],


        'RESULT',

//        'MAXRANGE',
        [
          'attribute'=>'MAXRANGE',
          'label' => 'Max',
    //      'contentOptions' => ['style'=>'text-align:center'],
          'format'=>'raw',
          //'noWrap'=>$this->noWrapColor
        ],

        'UNITS',
      //'TESTSTATUS',
        [
          'attribute'=>'RESULT',
          'value'=>function ($model, $key, $index, $widget) {
              $pass_or_fail = $model->TESTSTATUS;
              if($pass_or_fail == 'Fail')
                  return "<span class='label label-danger'> " . $model->TESTSTATUS . '</span>';
              else if ($pass_or_fail == 'Error')
                  return "<span class='label label-warning'> " . $model->TESTSTATUS . '</span>';
              else
                  return "<span class='label label-success'> " . $model->TESTSTATUS . '</span>';
          },
          'filterInputOptions'=>['placeholder'=>'Any result'],
          'vAlign'=>'middle',
          'format'=>'raw',
          //'noWrap'=>$this->noWrapColor
        ],

        [
          'class' => 'yii\grid\ActionColumn',
          'template' => '{view}',
          'buttons' => [
            'view' => function ($url,$model) {
              if($model->GRAPH_ID <> '0')
                  return  \yii\bootstrap\Modal::widget([
                        'id' => 'showModalButton'.$model->GRAPH_ID,
                        'toggleButton' => [
                            'label' => null,
                            'class' => 'glyphicon glyphicon-equalizer',
                            'tag' => 'a',
                            'data-toggle' => 'modal',
                        //    'data-target' => '#activity-modal',
                            'data-target' => '#showModalButton'.$model->GRAPH_ID,
                            'href' => Url::toRoute(['/traces-list/view?id='.$model->GRAPH_ID]),
                        ],
                        'clientOptions' => false,
                    ]);
                    //  return Html::a('<span class="showModalButton glyphicon glyphicon-equalizer"></span>', Url::base().'/traces-list/view?id='.$model->GRAPH_ID);
                    else
                      return "";

                },
            ],

        //  'class' => 'yii\grid\ActionColumn',
    /*    'class' => 'yii\grid\ActionColumn',
                  'buttons'=>[
                      'view'=>function($url,$model){
                              $url=Yii::$app->getUrlManager()->createAbsoluteUrl(['/traces-list/view','id'=>$model->GRAPH_ID]);
                              return \yii\helpers\Html::a('<span class="glyphicon glyphicon-magnet"></span>', '#mymodal', [
                                      'title' => 'Назначить','data-toggle'=>'modal','data-backdrop'=>false,'data-remote'=>$url
                                  ]);
                          },
                  ],
                  'template'=>'{view}',*/
          ],
      //  'TIMEOFTEST:time',
        // ...
    ],
]); ?>

</div>
