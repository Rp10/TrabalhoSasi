<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html lang="en">
<div class="container-fluid">
    <head>
        <meta charset="UTF-8">
        <title>Emprestei</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>        <?= $this->Html->css('rodape');?>
    </head>
    <body>

            <nav class="navbar navbar-default nav-tabs navbar-collapse">
                <div class="nav navbar-right container-fluid">
                    <?php if (!$authUser)
                    {
                        echo 'Erro no LOGIN';
                    }else{
                            echo $authUser;
                            }
                            ?>
                    <a href="/users/logout">
                        <button type="button" class="btn btn-default navbar-btn">Logout</button>
                    </a>
                </div>
                <div class="nav navbar-header">
                    <a class="navbar-brand" href="/">
                        <strong>
                            <p>Emprestei</p>
                        </strong>
                    </a>
                </div>
                    <ul class="nav nav-tabs navbar-nav navbar-collapse">
                       <li><a href="/users/view">Meu Perfil</a></li>
                                       <li class="dropdown">
                                           <a data-toggle="dropdown" data-target="#">Objetos<b class="caret"></b></a>
                                           <ul class="dropdown-menu">
                                               <li><a href="/historicos">Empréstimos</a></li>
                                               <li><a href="/objetos">Meus Objetos</a></li>
                                               <li><a href="/objetos/add">Adicionar Objeto</a></li>
                                           </ul>
                                       </li>
                        <li><a href="/historicos/add">Efetuar Empréstimo</a></li>
                    </ul>
            </nav>


            <div class="container">
                <?= $this->fetch('content') ?>
            </div>

            <div class="footer">
                <div class="container">

                    <div class="col-md-12">

                        <div class="col-xs-6">
                        <div class="col-xs-6">
                        <a href="https://gitlab.com/LFelipeEB/emprestei-project">
                            <?php echo $this->Html->image('gitlab.png', array('alt' => 'GitLab', 'width' => '100', 'class' => 'img-thumbnail')); ?>
                           </a>
                            </div>
                            <div class="col-xs-6">
                            <h4><span class="glyphicon glyphicon-info-sign" aria-hidden="true">Sobre o projeto</span></h4>
                            </div>
                       </div>
                        <div class="">
                            <div class="container">
                            <strong>Projeto Emprestei</strong>
                            </div>
                            Site criado por Breno Caldeira e Pedro Henrique
                            </br>
                            Código sob licensa do MIT
                        </div>
                    </div>
                </div>
            </div>

    </body>
</div>
</html>