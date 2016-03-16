<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use app\themes\adminLTE\components\ThemeNav;

?>
<?php $this->beginContent('@app/themes/adminLTE/layouts/main.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

     <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo Yii::$app->request->baseUrl; ?>/images/user_accounts.png" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>
                      <?php
                          $info[] = Yii::t('app','Hello');

                          if(isset(Yii::$app->user->identity->username))
                              $info[] = ucfirst(\Yii::$app->user->identity->username);

                          echo implode(', ', $info);
                      ?>
                    </p>
                    <?php if(isset(Yii::$app->user->identity->username))
                      echo "<a><i class='fa fa-circle text-success'></i> Online</a>";
                     else
                      echo "<a><i class='fa fa-circle text-danger'></i> Offline</a>";
                      ?>
                </div>
                <div class="pull-left image">
                <!-- search form -->
                <form action="/global-test/index?" method="get" class="sidebar-form">
                            <div class="input-group">
                              <input type="text" name="GlobalTestSearch[SERIALNUMBER]" class="form-control" placeholder="Search...">
                              <span class="input-group-btn">
                                <button type="submit" name="" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                              </span>
                            </div>
                          </form>
              <!-- /.search form -->
                      </div>

            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?php

                $left_menuItems = [
                  ['label'=>Yii::t('app','MAIN NAVIGITION'), 'options'=>['class'=>'header']],
                  ['label' => ThemeNav::link('Dashboard', 'fa fa-dashboard'), 'url' => ['/site/index'], 'visible'=>!Yii::$app->user->isGuest],
                  ['label' => ThemeNav::link('Global Tests', 'fa fa-list-alt'), 'url' => ['/global-test/index'], 'visible'=>!Yii::$app->user->isGuest],
            //      ['label' => ThemeNav::link('Daily Statistics', 'fa fa-bar-chart'), 'url' => ['dayly-test-results/index'], 'visible'=>!Yii::$app->user->isGuest],
            //      ['label' => ThemeNav::link('DB statistics', 'fa fa-pie-chart'), 'url' => ['db-stat/index'], 'visible'=>!Yii::$app->user->isGuest],
                  ['label' => ThemeNav::link('Server Status', 'fa fa-desktop'), 'url' => ['/server/index'], 'visible'=>!Yii::$app->user->isGuest],

              //    ['label' => ThemeNav::link('Manage users', 'fa fa-users'), 'url' => ['/user/admin/index'], 'visible'=>Yii::$app->user->identity->getIsAdmin()]
                ];

                if(!Yii::$app->user->isGuest){
                if (Yii::$app->user->identity->getIsAdmin()) {
    							array_push($left_menuItems,  ['label' => ThemeNav::link('Manage users', 'fa fa-users'), 'url' => ['user/admin/index'], 'visible'=>Yii::$app->user->identity->getIsAdmin()]);
                  array_push($left_menuItems,  ['label' => ThemeNav::link('Gii',  'fa fa-file-code-o'), 'url' => ['/gii'], 'visible'=>Yii::$app->user->identity->getIsAdmin()]);
                  array_push($left_menuItems,  ['label' => ThemeNav::link('Debug', 'fa fa-cogs'), 'url' => ['/debug'], 'visible'=>Yii::$app->user->identity->getIsAdmin()]);

  							}
              }
                echo Menu::widget([
                  'encodeLabels'=>false,
                  'options' => [
                    'class' => 'sidebar-menu'
                  ],
                  'items' => $left_menuItems,
                //  'submenuTemplate' => "<ul class='treeview-menu'>{items}</ul>",
                //  'activateParents' => true,
                ]);
            ?>

        </section>
  <!-- /.sidebar -->
</aside>

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">

   <!-- Content Header (Page header) -->
   <section class="content-header">
        <h1> <?php echo Html::encode($this->title); ?> </h1>
           <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $content; ?>
    </section><!-- /.content -->

</div><!-- /.right-side -->
<?php $this->endContent();