<?php
// prevents this code from being loaded directly in the browser
// or without first setting the necessary object
if (!isset($bicycle)) {
    redirect_to(url_for('/staff/bicycles/index.php'));
}
?>

<dl>
    <dt>Brand</dt>
    <!-- Poniendo la notación de array en el campo name lo que conseguimos es crear un array bicycle y dentro de él
    todas los valores opr cada campo y se recoge de una única vez -->
    <dd><input type="text" name="bicycle[brand]" value="<?php echo h($bicycle->brand) ?>"/></dd>
</dl>

<dl>
    <dt>Model</dt>
    <dd><input type="text" name="bicycle[model]" value="<?php echo h($bicycle->model) ?>"/></dd>
</dl>

<dl>
    <dt>Year</dt>
    <dd>
        <select name="bicycle[year]">
            <option value=""></option>
            <?php $this_year = idate('Y') ?>
            <!-- Nos recorreos para sume 20 años atrás y nos muestre de 20 años a este y luego nos decimos que si ese año
            coincide con el año que tiene el objeto bici, entonces pinte selected para que aparezca como escogido por defecto -->
            <?php for ($year = $this_year - 20; $year <= $this_year; $year++) { ?>
                <option value="<?php echo $year; ?>" <?php if ($bicycle->year == $year) echo 'selected' ?>><?php echo $year; ?></option>
            <?php } ?>
        </select>
    </dd>
</dl>

<dl>
    <dt>Category</dt>
    <dd>
        <select name="bicycle[category]">
            <option value=""></option>
            <?php foreach (BicycleP::CATEGORIES as $category) { ?>
                <option value="<?php echo $category; ?>" <?php if ($bicycle->category == $category) echo 'selected' ?>><?php echo $category; ?></option>
            <?php } ?>
        </select>
    </dd>
</dl>

<dl>
    <dt>Gender</dt>
    <dd>

        <select name="bicycle[gender]">
            <option value=""></option>
            <?php foreach (BicycleP::GENDERS as $gender) { ?>
                <option value="<?php echo $gender; ?>" <?php if ($bicycle->gender == $gender) echo 'selected' ?>><?php echo $gender; ?></option>
            <?php } ?>
        </select>
    </dd>
</dl>

<dl>
    <dt>Color</dt>
    <dd><input type="text" name="bicycle[color]" value="<?php echo h($bicycle->color) ?>"/></dd>
</dl>

<dl>
    <dt>Condition</dt>
    <dd>
        <select name="bicycle[condition_id]">
            <option value=""></option>
            <?php foreach (BicycleP::CONDITION_OPTIONS as $cond_id => $cond_name) { ?>
                <option value="<?php echo $cond_id; ?>" <?php $bicycle->condition() == $cond_name;
                echo 'selected' ?>><?php echo $cond_name; ?></option>
            <?php } ?>
        </select>
    </dd>
</dl>

<dl>
    <dt>Weight (kg)</dt>
    <dd><input type="text" name="bicycle[weight_kg]" value="<?php echo h($bicycle->getWeightKg()) ?>"/></dd>
</dl>

<dl>
    <dt>Price</dt>
    <dd>$ <input type="text" name="bicycle[price]" size="18" value="<?php echo h($bicycle->price) ?>"/></dd>
</dl>

<dl>
    <dt>Description</dt>
    <dd><textarea name="bicycle[description]" rows="5" cols="50"><?php echo h($bicycle->description) ?></textarea></dd>
</dl>
