                <?php
                // Dropdownlist is using the ms_dropdown jquery plugin for the images  
                $path = Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.components.assets.ms_dropdown'));
                
                //$path_ms_dropdown = '/domotiyii/assets/ms_dropdown/';
                // Get client script
                $cs=Yii::app()->clientScript;
                //
                //$cs->assetManager->publish(Yii::getPathOfAlias('application.components.assets.ms_dropdown'));
                // Add CSS
                $cs->registerCSSFile($path .'/dd.css');
                // Add JS
                $cs->registerScriptFile($path .'/jquery.dd.min.js', CClientScript::POS_HEAD);
                $cs->registerScriptFile($path .'/icon_dropdown.js', CClientScript::POS_END);
                ?>
                
                <?php echo $form->dropDownListControlGroup($model,'onicon', $model->getIcons(), $model->getIconsOptions() ); ?>
                <?php echo $form->dropDownListControlGroup($model,'dimicon', $model->getIcons(), $model->getIconsOptions() ); ?>
                <?php echo $form->dropDownListControlGroup($model,'officon', $model->getIcons(), $model->getIconsOptions() ); ?>
                <?php //echo $form->textFieldControlGroup($model,'onicon',array('size'=>32,'maxlength'=>32)); ?>
                <?php //echo $form->textFieldControlGroup($model,'dimicon',array('size'=>32,'maxlength'=>32)); ?>
                <?php //echo $form->textFieldControlGroup($model,'officon',array('size'=>32,'maxlength'=>32)); ?>
