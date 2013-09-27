<?php
/**
 * This is the template for generating the action script for the form.
 * - $this: the CrudCode object
 */
 // Patched by RDNZL
?>
<?php
$viewName=basename($this->viewName);
?>
public function action<?php echo ucfirst(trim($viewName,'_')); ?>()
{
    $model = <?php echo $this->modelClass; ?><?php echo "::model()->findByPk(1)"; ?>;

    if(isset($_POST['<?php echo $this->modelClass; ?>']))
    {
        $model->attributes=$_POST['<?php echo $this->modelClass; ?>'];
        if($model->validate())
        {
            // form inputs are valid, do something here
            // Patched by RDNZL
            $model->save();
            $this->do_xmlrpc("module.restart","<?php echo $viewName; ?>");
        }
    }
    $this->render('<?php echo $viewName; ?>',array('model'=>$model));
}