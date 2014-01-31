<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';

$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => array(
        Yii::t('app','About'),
    ),
)); ?>

<legend>About DomotiGa</legend>
DomotiGa is Open Source Home Automation Software for Linux.
It's designed to control all sorts of devices, and receive input from various sensors.</br></br>

<legend>About DomotiYii</legend>
<p>Both DomotiGa and DomotiYii are released under the terms of GNU GPL v3 license.</p>

<p>This program is free software: you can redistribute it and/or modify</br>
it under the terms of the GNU General Public License as published by</br>
the Free Software Foundation, either version 3 of the License, or</br>
(at your option) any later version.</p>
<p>This program is distributed in the hope that it will be useful,</br>
but WITHOUT ANY WARRANTY; without even the implied warranty of</br>
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the</br>
GNU General Public License for more details.</p>
<p>You should have received a copy of the GNU General Public License</br>
along with this program.  If not, see http://www.gnu.org/licenses/.</p>

<legend>Versions</legend>
PHP <?php echo phpversion(); ?></br>
Yii framework <?php echo Yii::getVersion(); ?></br>
Yiistrap 1.2.0</br>
