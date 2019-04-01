<?php include_once('header.php') ?>
<div class="ecc">
    <h3 class="title"><?php echo $data['title'] ?></h3>
    <form >
        <input type="text" name='' value='' id="amount">
        <select name="" id="from">
            <?php  foreach ($data['currencies']->results as $cur) { ?>
                    <option data-sumb="<?php if(isset($cur->currencySymbol)) echo $cur->currencySymbol ?>" value="<?php echo $cur->id ?>"><?php echo $cur->id ?></option>
            <?php  } ?>
        </select>
        <label >To</label>
        <select name="" id="to">
            <?php  foreach ($data['currencies']->results as $cur) { ?>
                    <option data-sumb="<?php if(isset($cur->currencySymbol)) echo $cur->currencySymbol ?>" value="<?php echo $cur->id ?>"><?php echo $cur->id ?></option>
            <?php  } ?>
        </select>
        <input type="submit" value="Convert">
    </form>
        <div id="result">
            <?php if(!empty($data['res'])){ ?>

            <?php  foreach ($data['res'] as $r) { ?>
                    <br>
                    <h4>
                        <?php echo $r ?>
                    </h4>
            <?php  } ?>
            <?php  } ?>
        </div>
    

</div>
<?php include_once('footer.php') ?>
