<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use miloschuman\highcharts\Highcharts;
use yii\web\JsExpression;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\TracesList */


$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Back', 'url' => Yii::$app->request->referrer];
//$this->params['breadcrumbs'][] = $this->title;
//print_r($arr_freq);

?>
<div class="traces-list-view">

    <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Trace #<?= Html::encode($this->title) ?></h3>

                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div id="modal-body">

                  <div id="container">
                  </div>
                  <?= Highcharts::widget([
                      'scripts' => [
                        'highcharts-more',
                        'modules/exporting',
                        'themes/grid',
                      ],


                      'options' => [
                          'credits' => 'false',
                          'gridLineWidth' => 0,
                          'chart' => [
                            'renderTo' => 'container',
                        //    'height' = 400,
                            'borderWidth' => '0',
                            'backgroundColor' => '#FFFFFF',
                            'plotBackgroundColor' => '#FFFFFF',
                            'marginLeft' => 50
                          ],
                          'title' => [
                              'text' => null,
                          ],
                          'xAxis' => [
                            'categories' => $arr_freq,
                          ],

                          'series' => [
                              [
                              //    'type' => 'line',
                                  'name' => 'Pout(dBm)',
                                  'data' => $arr_power,
                                  'color' => new JsExpression('Highcharts.getOptions().colors[1]'),


                              ],


                          ],
                      ]
                  ]);

          ?>
                </div>
                <!-- /.box-body -->
              </div>

<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

</div>
