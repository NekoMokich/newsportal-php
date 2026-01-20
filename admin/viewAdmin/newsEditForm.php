<?php ob_start(); ?>

<div class="container" style="min-height:400px;">
    <div class="col-md-11">
        <h2>News Edit</h2>
        <?php
        if(isset($test)) {
            if($test==true) {
                ?>
                <div class="alert alert-info">
                    <strong>Запись изменена. </strong><a href="newsAdmin"> Список новостей</a>
                </div>
                <?php
            }
            else if($test==false) {
                ?>
                <div class="alert alert-warning">
                    <strong>Ошибка изменения записи!</strong> <a href="newsAdmin"> Список новостей</a>
                </div>
                <?php
            }
        }
        else {
        ?>
        
        <form method='POST' action="newsEditResult?id=<?php echo $id; ?>" enctype="multipart/form-data">
            <table class='table table-bordered'>
                <tr>
                    <td>News title</td>
                    <td><input type='text' name='title' class='form-control' required value="<?php echo htmlspecialchars($detail['title']); ?>"></td>
                </tr>
                <tr>
                    <td>News text</td>
                    <td><textarea rows="5" name="text" class='form-control' required><?php echo htmlspecialchars($detail['text']); ?></textarea></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="idCategory" class="form-control">
                            <?php
                            foreach($arr as $row){
                                $selected = ($row['id'] == $detail['category_id']) ? 'selected' : '';
                                echo '<option value="'.$row['id'].'" '.$selected.'>'.htmlspecialchars($row['name']).'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                

                <tr>
                    <td>Old Picture</td>
                    <td>
                        <?php if(!empty($detail['picture'])): ?>
                            <?php 

                            if(is_resource($detail['picture']) || (is_string($detail['picture']) && strlen($detail['picture']) > 100)) {
                                echo '<img src="data:image/jpeg;base64,'.base64_encode($detail['picture']).'" width="150" />';
                            } 
                           
                            else if(file_exists("../images/" . $detail['picture'])) {
                                echo '<img src="../images/'.$detail['picture'].'" width="150" />';
                            }
                            ?>
                        <?php else: ?>
                            <p>No image</p>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td>Picture</td>
                    <td>
                        <input type="file" name="picture" style="color:black;" class="form-control">
                        <small class="text-muted">Оставьте пустым, если не хотите менять изображение</small>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <button type="submit" class="btn btn-primary" name="save">
                            <span class="glyphicon glyphicon-plus"></span> Изменить
                        </button>
                        <a href="newsAdmin" class="btn btn-large btn-success">
                            <i class="glyphicon glyphicon-backward"></i> &nbsp;Назад к списку
                        </a>
                    </td>
                </tr>
            </table>
        </form>
        
        <?php 
        } 
?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include "viewAdmin/templates/layout.php"; ?>




//--delete news

<?php ob_start(); ?>

<div class="container" style="min-height:400px;">
    <div class="col-md-11">
        <h2>News Delete</h2>
        <?php
        if(isset($test)) {
            if($test == true) {
                ?>
                <div class="alert alert-info">
                    <strong>Запись удалена. </strong><a href="newsAdmin"> Список новостей</a>
                </div>
                <?php
            }
            else if($test == false) {
                ?>
                <div class="alert alert-warning">
                    <strong>Ошибка удаления записи!</strong> <a href="newsAdmin"> Список новостей</a>
                </div>
                <?php
            }
        }
        else {
        ?>
        
        <form method='POST' action="newsDelResult?id=<?php echo $id; ?>" enctype="multipart/form-data">
            <table class='table table-bordered'>
                <tr>
                    <td>News title</td>
                    <td><input type='text' name='title' class='form-control' required value="<?php echo htmlspecialchars($detail['title']); ?>" readonly></td>
                </tr>
                <tr>
                    <td>News text</td>
                    <td><textarea rows="5" name="text" class='form-control' required readonly><?php echo htmlspecialchars($detail['text']); ?></textarea></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td>
                        <select name="idCategory" class="form-control" disabled>
                            <?php
                            foreach($arr as $row){
                                $selected = ($row['id'] == $detail['category_id']) ? 'selected' : '';
                                echo '<option value="'.$row['id'].'" '.$selected.'>'.htmlspecialchars($row['name']).'</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                <!-- image -->
                <tr>
                    <td>Old Picture</td>
                    <td>
                        <div>
                            <?php 
                
                            if(!empty($detail['picture'])) {

                                if(is_string($detail['picture']) && strlen($detail['picture']) > 100) {
                                    echo '<img src="data:image/jpeg;base64,'.base64_encode($detail['picture']).'" width=150 />';
                                }

                                else if(file_exists("../../images/" . $detail['picture'])) {
                                    echo '<img src="../../images/'.$detail['picture'].'" width=150 />';
                                }
                            } else {
                                echo 'Нет изображения';
                            }
                            ?>
                        </div>
                    </td>
                </tr>
                <!-- end image -->
                
                <tr>
                    <td colspan="2">
                        <div class="alert alert-danger">
                            <strong>Внимание!</strong> Вы действительно хотите удалить эту новость? Это действие нельзя отменить.
                        </div>
                        
                        <button type="submit" class="btn btn-danger" name="save">
                            <span class="glyphicon glyphicon-trash"></span> Удалить
                        </button>
                        <a href="newsAdmin" class="btn btn-success">
                            <i class="glyphicon glyphicon-backward"></i> &nbsp;Назад к списку
                        </a>
                    </td>
                </tr>
            </table>
        </form>
        
        <?php } ?>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include "viewAdmin/templates/layout.php"; ?>

