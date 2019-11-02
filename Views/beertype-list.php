
<?php 
include_once('header.php');
include_once('nav-bar.php');
?>

<div id="breadcrumb" class="hoc clear"> 
    <h6 class="heading">Listado de Tipos de Cervezas</h6>
  </div>
</div>
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content"> 
      <div class="scrollable">
      <form action="<?php echo FRONT_ROOT?>BeerType/eliminar/" method="post">
        <table style="text-align:center;">
          <thead>
            <tr>
              <th style="width: 100px;">Codigo</th>
              <th style="width: 150px;">Nombre</th>
              <th style="width: 450px;">Descripción</th>
              <th style="width: 450px;">Receta</th>
              <th style="width: 100px;">Eliminar</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($beerList as $beer) {?>
            
            <tr>
                <td><?php echo $beer->getCode();?></td>
                <td><?php echo $beer->getName();?></td>
                <td><?php echo $beer->getDescription();?></td>
                <td><?php echo $beer->getRecipe();?></td>
                <td>
                  <button type="submit" name="id"class="btn" value="<?php echo $beer->getId();?>">Eliminar</button>
                </td>
            </tr>
            <?php  };?>
          </tbody>
          
        </table>
      </form> 
      </div>
    </div>
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>

<?php 
include_once('footer.php');
?>
  