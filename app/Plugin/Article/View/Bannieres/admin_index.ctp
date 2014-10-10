

<div class="container">
    <div class="row-fluid show-grid">
        <div class="span12">
         <div class="pagination">

<span style="color: red;"> FORMAT 855x282 </span>
<div class="page-header">
    <h1>Gérer les bannieres</h1>
</div>

<?php if ($this->Acl->check('Bannieres','admin_add','Article') == true){?>

<p><?php echo $this->Acl->link("Ajouter une bannieres",array('action'=>'admin_add'),array('class'=>'btn primary')); ?></p>

<?php }?>



<table class="table table-striped">
    <tr>
        <th>Numero</th>
        <th>Titre</th>
        <th>online</th>     
       <th style="text-align: center;">Actions</th>
    </tr>



    <?php  foreach ($bannieres as $banniere): ?>
    <tr>
        <td><?php echo h($banniere['Banniere']['weight']); ?>&nbsp;</td>
        <td><?php echo h($banniere['Banniere']['bannieres_title']); ?>&nbsp;</td>
        <td><?php echo h($banniere['Banniere']['online']); ?>&nbsp;</td>
        <?php if ($this->Acl->check('Bannieres','admin_edit','Article') == true || $this->Acl->check('Bannieres','admin_delete','Article') == true){ ?>
        <td style="text-align: center;">
        <?php echo $this->Acl->link(__('Edit'), array('action' => 'admin_edit', $banniere['Banniere']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
        <?php echo $this->Acl->link(__('Delete'), array('action' => 'admin_delete', $banniere['Banniere']['id']),array('class'=>'btn btn-mini btn-danger'),null,'Voulez vous vraiment supprimer cette Banniere ?'); ?>
        <?php echo $this->Acl->link(__('<i class="icon-arrow-up"></i> Moveup'), array('action' => 'admin_moveup', $banniere['Banniere']['id']),array('escape'=>false)); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php echo $this->Acl->link(__('<i class="icon-arrow-down"></i> Movedown'), array('action' => 'admin_movedown', $banniere['Banniere']['id']),array('escape'=>false)); ?>
        <?php } ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>    
    <?php foreach($bannieres as $k=>$v): $v = current($v); ?>
                <img src="<?php echo $this->html->url('/files/banniere/photo/'.($v['photo_dir'].'/'.$v['photo'])); ?>" />
    <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>
